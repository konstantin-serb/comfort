<?php

namespace app\modules\admin\controllers;

use app\components\Storage;
use app\models\SiteMain;
use app\modules\admin\models\forms\UploadSiteCompanyPictureForm;
use app\modules\admin\models\forms\UploadSiteMinePictureForm;
use Yii;
use app\models\SiteCompany;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SiteCompanyController implements the CRUD actions for SiteCompany model.
 */
class SiteCompanyController extends Controller
{
    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
                'path' => '@alias/to/my/path', // Or absolute path to directory where files are stored.
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SiteCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SiteCompany::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteCompany model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SiteCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteCompany();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SiteCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionUpdateImage($type)
    {
        $currentPhoto = SiteCompany::findOne(1)->$type;
        $model = new UploadSiteCompanyPictureForm();
        $model->type = $type;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if (is_uploaded_file($image->tempName)) {
                if ($model->addImage($image)) {
                    return $this->redirect(['view','id'=>1]);
                }
            }
        }

        return $this->render('update-image',[
            'model' => $model,
            'currentPhoto' => $currentPhoto,
            'type' => $type,
        ]);
    }


    public function actionDeleteImage($type)
    {
        $content = SiteCompany::findOne(1);
        if ($content->$type) {
            Storage::clean($content->$type);
            $content->$type = null;
            $content->save(false);
            return $this->redirect(['view','id'=>1]);
        }
    }

    public function actionCheckAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = SiteCompany::findOne(1);
        $checked = Yii::$app->request->post('checked');
        $photo = Yii::$app->request->post('check');
        $model->$photo = $checked;
        if ($model->save()) {
            return true;
        }
    }

    /**
     * Deletes an existing SiteCompany model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SiteCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteCompany::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSaveImage()
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;

        $this->enableCsrfValidation = false;
        if (Yii::$app->request->isPost)
        {
            $dir = Yii::getAlias('@images');
            $result_link = Url::home(true) . 'uploads/img/';
            $file = UploadedFile::getInstanceByName('file');
            $model = new DynamicModel(compact('file'));
            $model->addRule('file', 'image')->validate();

            if($model->hasErrors()) {
                $result = [
                    'error' => $model->getFirstError('file'),
                ];
            } else {
                $model->file->name = '/'.strtotime('now') . '_'
                    . Yii::$app->getSecurity()->generateRandomString(6) . '.'
                    . $model->file->extension;

                if($model->file->saveAs($dir . $model->file->name)) {
                    // $imag = Yii::$app->image->load($dir . $model->file->name);
                    // $imag->resize(800, NULL, yii\image\drivers\Image::PRECISE)
                    // ->save($dir . $model->file->name, 85);

                    $result = [
                        'filelink' => $result_link . $model->file->name,
                        'filename' => $model->file->name,
                    ];
                } else {
                    $result = [
                        'error' => Yii::t('vova07/imperavi', 'ERROR_CAN_NOT_UPLOAD_FILE')
                    ];
                }
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;

        } else {
            throw new BadRequestHttpException('Only POST is allowed');
        }

    }
}

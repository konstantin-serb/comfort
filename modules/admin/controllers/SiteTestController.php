<?php

namespace app\modules\admin\controllers;

use app\components\KotHelper;
use app\modules\admin\models\forms\UploadTechinfoFilesForm;
use app\modules\admin\models\TechInfo;
use app\modules\admin\models\forms\UpdateTitleTechInfoForm;
use Yii;
use app\models\SiteTest;
use yii\base\DynamicModel;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SiteTestController implements the CRUD actions for SiteTest model.
 */
class SiteTestController extends Controller
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
     * Lists all SiteTest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SiteTest::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteTest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $tech = TechInfo::find()->where(['type' => 2])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'tech' => $tech,
        ]);
    }


    public function actionUpdateFile($id)
    {
        $tech = TechInfo::findOne($id);
        $model = new UpdateTitleTechInfoForm();
        if($model->load(Yii::$app->request->post())) {
            $model->id = $id;
            if($model->save()) {
                return $this->redirect(['view', 'id'=>1]);
            }
        }

        return $this->render('update-file', [
            'tech' => $tech,
            'model' => $model,
        ]);
    }


    public function actionDeleteFile($id)
    {
        $tech = TechInfo::findOne($id);
        if($tech->delete()){
            return $this->redirect(['view', 'id' => 1]);
        }
    }

    /**
     * Creates a new SiteTest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteTest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionAddFile()
    {
        $model = new UploadTechinfoFilesForm();
        $tech = new TechInfo();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $filename = Yii::$app->security->generateRandomString();
                $tableName = 'uploads/tech/' . $filename . '.' . $model->file->extension;

                if ($model->file->saveAs($tableName)) {
                    $tech->link = $tableName;
                    $tech->size = KotHelper::get_size($model->file->size);
                    $tech->format = $model->file->extension;
                    $tech->type = 2;
                    $tech->title = $model->file->baseName;
                    $tech->status = 1;
                    $tech->save();
                    return $this->redirect(['view', 'id' => 1]);
                }

            }
        }

        return $this->render('add-file', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SiteTest model.
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

    /**
     * Deletes an existing SiteTest model.
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
     * Finds the SiteTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteTest::findOne($id)) !== null) {
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

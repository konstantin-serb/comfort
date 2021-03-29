<?php

namespace app\modules\admin\controllers;

use app\components\Storage;
use app\modules\admin\models\forms\CreateNewsForm;
use app\modules\admin\models\forms\UpdateNewsForm;
use app\modules\admin\models\forms\UploadNewsPictureForm;
use Yii;
use app\modules\admin\models\News;
use app\modules\admin\models\NewsSearch;
use yii\base\DynamicModel;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CreateNewsForm();

        if ($model->load(Yii::$app->request->post()) && $id = $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionAddImage($id)
    {
        $model = new UploadNewsPictureForm();
        $model->newsId = $id;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if (is_uploaded_file($image->tempName)) {
                if ($model->addImage($image)) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            }
        }
        return $this->render('add-image', [
            'model' => $model,
        ]);
    }


    public function actionImageView($id)
    {
        $model = News::findOne($id);

        return $this->render('image-view', [
            'model' => $model,
        ]);
    }

    public function actionDeleteImage($id)
    {
        $news = News::findOne($id);
        if ($news->image) {
            if (Storage::clean($news->image) && Storage::clean($news->mini)) {
                $news->image = null;
                $news->mini = null;
                $news->type_view = News::WITHOUT_IMAGE;
                if($news->save()) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            }
        }


    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $news = $this->findModel($id);
        $model = new UpdateNewsForm();
        $model->id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'news' => $news,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $news = News::findOne($id);
//        dumper($news);die;
        if (!$news->image == '' || !$news->image == null) {
            Storage::clean($news->image) && Storage::clean($news->mini);
            $news->delete();
        } else {
            $news->delete();
        }
            return $this->redirect(['index']);

    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
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

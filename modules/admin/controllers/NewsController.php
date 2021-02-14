<?php

namespace app\modules\admin\controllers;

use app\components\Storage;
use app\modules\admin\models\forms\CreateNewsForm;
use app\modules\admin\models\forms\UpdateNewsForm;
use app\modules\admin\models\forms\UploadNewsPictureForm;
use Yii;
use app\modules\admin\models\News;
use app\modules\admin\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
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
            return $this->redirect(['view', 'id' => $id]);
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
        if ($news->image) {
            if (Storage::clean($news->image) && Storage::clean($news->mini)) {
                $news->delete();
                return $this->redirect(['index']);
            }
        }
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
}

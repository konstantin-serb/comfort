<?php

namespace app\modules\admin\controllers;

use app\components\Storage;
use app\modules\admin\models\forms\CreateProjectForm;
use app\modules\admin\models\forms\UpdateProjectForm;
use app\modules\admin\models\forms\UploadNewsPictureForm;
use app\modules\admin\models\forms\UploadProjectPictureForm;
use Yii;
use app\modules\admin\models\Project;
use app\modules\admin\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
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
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CreateProjectForm();

        if ($model->load(Yii::$app->request->post()) && $id = $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionAddImage($id)
    {
        $model = new UploadProjectPictureForm();
        $model->projectId = $id;
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
        $model = Project::findOne($id);

        return $this->render('image-view', [
            'model' => $model,
        ]);
    }

    public function actionDeleteImage($id)
    {
        $news = Project::findOne($id);
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
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $project = $this->findModel($id);
        $model = new UpdateProjectForm();

        $model->id = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
            'project' => $project,
        ]);
    }

    /**
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

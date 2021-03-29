<?php

namespace app\modules\admin\controllers;

use app\components\KotHelper;
use app\modules\admin\models\forms\UploadTechinfoFilesForm;
use Yii;
use app\modules\admin\models\TechInfo;
use app\modules\admin\models\TechInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TechinfoController implements the CRUD actions for TechInfo model.
 */
class TechinfoController extends Controller
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
     * Lists all TechInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TechInfoSearch();
        $dataProvider = $searchModel->searchTech(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TechInfo model.
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
     * Creates a new TechInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TechInfo();
        $model->type = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionAddFile($id)
    {
        $model = new UploadTechinfoFilesForm();
        $tech = TechInfo::findOne($id);
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $filename = Yii::$app->security->generateRandomString();
                $tableName = 'uploads/tech/' . $filename . '.' . $model->file->extension;
                if ($model->file->saveAs($tableName)) {
                    $tech->link = $tableName;
                    $tech->size = KotHelper::get_size($model->file->size);
                    $tech->format = $model->file->extension;
                    $tech->save();
//                    return $this->redirect(['view', 'id' => $id]);
                    return $this->redirect(['index']);
                }

            }
        }

        return $this->render('add-file', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing TechInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TechInfo model.
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
     * Finds the TechInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TechInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TechInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

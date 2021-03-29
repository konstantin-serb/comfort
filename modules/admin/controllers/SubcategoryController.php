<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Cart;
use app\modules\admin\models\Category;
use app\modules\admin\models\forms\CreateSubcategoryForm;
use app\modules\admin\models\forms\UpdateSubcategoryForm;
use Yii;
use app\modules\admin\models\Subcategory;
use app\modules\admin\models\SubcategorySearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcategoryController implements the CRUD actions for Subcategory model.
 */
class SubcategoryController extends Controller
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
     * Lists all Subcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcategory model.
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
     * Creates a new Subcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CreateSubcategoryForm();
        $categoryObjects = Category::find()->orderBy('order')->all();
        $categoryArray = ArrayHelper::map($categoryObjects, 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $id = $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'categoryArray' => $categoryArray,
        ]);
    }

    /**
     * Updates an existing Subcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $subCat = $this->findModel($id);
        $model = new UpdateSubcategoryForm();
        $model->id = $subCat->id;

        $categoryObjects = Category::find()->orderBy('order')->all();
        $categoryArray = ArrayHelper::map($categoryObjects, 'id', 'title');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'subCat' => $subCat,
            'categoryArray' => $categoryArray,
        ]);
    }

    /**
     * Deletes an existing Subcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $subcategory = Subcategory::findOne($id);
        $cart = Cart::find()->where(['subcategory_id' => $id])->one();
        if($cart){
            Yii::$app->session->setFlash('danger', 'Нельзя удалить подкатегорию, которая присвоена какому-либо товару');
            return $this->redirect(['index']);
        } else {
            $subcategory->delete();
            return $this->redirect(['index']);
        }


    }

    /**
     * Finds the Subcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

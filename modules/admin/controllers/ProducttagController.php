<?php

namespace app\modules\admin\controllers;

use app\components\KotHelper;
use app\modules\admin\models\CartTag;
use app\modules\admin\models\forms\CreateLinkTagForm;
use app\modules\admin\models\forms\CreateProductTagForm;
use app\modules\admin\models\Manufacturer;
use Yii;
use app\modules\admin\models\ProductTag;
use app\modules\admin\models\ProductTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProducttagController implements the CRUD actions for ProductTag model.
 */
class ProducttagController extends Controller
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
     * Lists all ProductTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTag model.
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
     * Creates a new ProductTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CreateProductTagForm();

        if ($model->load(Yii::$app->request->post()) && $lastId = $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $tag = ProductTag::findOne($id);
        $tagCart = CartTag::find()->where(['tag_id' => $id])->all();
       foreach ($tagCart as $item) {
           $item->delete();
       }
       if ($tag->delete()) {
           return $this->redirect(['index']);
       }
    }

    /**
     * Finds the ProductTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductTag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionAddTagAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $tag = new CreateProductTagForm();
        $tag->title = Yii::$app->request->post('tag');
        if($tag->save()) {
            $allTags = ProductTag::find()->orderBy('id desc')->all();
            $value = KotHelper::selectHelper($allTags, 'id', 'title');
            return [
                'success' => true,
                'value' => $value,
            ];
        }


        return $tag->title;

    }
}

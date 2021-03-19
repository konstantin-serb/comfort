<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\Storage;
use app\modules\admin\models\CartTag;
use app\modules\admin\models\forms\ChangeOrderImageForm;
use app\modules\admin\models\forms\CreateLinkTagForm;
use app\modules\admin\models\forms\CreateProductTagForm;
use app\modules\admin\models\forms\UploadCartPictureForm;
use app\modules\admin\models\Category;
use app\modules\admin\models\forms\CreateCartForm;
use app\modules\admin\models\forms\CreateSubcategoryForm;
use app\modules\admin\models\forms\CreatManufacturerForm;
use app\modules\admin\models\forms\UpdateCartForm;
use app\modules\admin\models\ImagesProduct;
use app\modules\admin\models\Manufacturer;
use app\modules\admin\models\ProductTag;
use app\modules\admin\models\Subcategory;
use app\modules\admin\models\Cart;
use app\modules\admin\models\CartSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\KotHelper;
use yii\web\UploadedFile;
use yii\helpers\Url;


/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        $model = Cart::find()->where(['slug' => $id])->one();
        $images = ImagesProduct::find()->where(['cart_id' => $model->id])->orderBy('sort')->all();
        $tags = ProductTag::find()->all();
        $tagArray = ArrayHelper::map($tags, 'id', 'title');
        $linkModel = new CreateLinkTagForm();

        $links = CartTag::find()->where(['cart_id' => $model->id])->orderBy('tag_id')->all();
        $cartTag = [];
        $num = 0;
        foreach ($links as $item){
            $tag = ProductTag::findOne($item->tag_id);
            $cartTag += [$num => $tag];
            $num = $num + 1;
        }

        $tagModel = new CreateProductTagForm();

        return $this->render('view', [
            'model' => $model,
            'images' => $images,
            'tagArray' => $tagArray,
            'linkModel' => $linkModel,
            'cartTag' => $cartTag,
            'tagModel' => $tagModel,
        ]);
    }


    public function actionCreate()
    {
        $model = new CreateCartForm();
        $modelMan = new CreatManufacturerForm();

        $manufacturer = Manufacturer::find()->all();
        $manufacArray = ArrayHelper::map($manufacturer, 'id', 'manufactured');

        $subCatArray = $this->getSubCatArray();
        $categories = Category::find()->all();
        $option = KotHelper::selectHelper($categories, 'id', 'title');

        if ($model->load(Yii::$app->request->post())) {

            if($slug = $model->save()) {
                return $this->redirect(['view', 'id' => $slug]);
            }

        }

        return $this->render('create', [
            'model' => $model,
            'modelMan' => $modelMan,
            'manufacArray' => $manufacArray,
            'subCatArray' => $subCatArray,
            'option' => $option,
        ]);
    }

    /**
     * Updates an existing Cart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $cart = $this->findModel($id);
        $model = new UpdateCartForm();

        $manufacturer = Manufacturer::find()->all();
        $manufacArray = ArrayHelper::map($manufacturer, 'id', 'manufactured');
        $subCatArray = $this->getSubCatArray();

        $categories = Category::find()->all();
        $option = KotHelper::selectHelper($categories, 'id', 'title');

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $id;
            if ($model->save()) {
                $cartNew = Cart::findOne($model->id);
            return $this->redirect(['view', 'id' => $cartNew->slug]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'cart' => $cart,
            'manufacArray' => $manufacArray,
            'subCatArray' => $subCatArray,
            'option' => $option,
        ]);
    }


    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            $images = ImagesProduct::find()->where(['cart_id' => $id])->all();
            if ($images) {
                foreach($images as $image) {
                    Storage::clean($image->image);
                    Storage::clean($image->mini);
                    $image->delete();
                }
            }
            $tags = CartTag::find()->where(['cart_id' => $id])->all();
            if ($tags) {
                foreach($tags as $tag) {
                    $tag->delete();
                }
            }

            return $this->redirect(['index']);
        }


    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionAddImage($id)
    {
        $model = new UploadCartPictureForm();
        $cart = Cart::findOne($id);
        $slug = $cart->slug;
        $model->cartId = $id;
        if($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if (is_uploaded_file($image->tempName)) {
                if ($model->addImage($image)) {
                    return $this->redirect(['view', 'id' => $slug]);
                }
            }
        }

        return $this->render('add-image',[
            'model' => $model,
        ]);

    }


    public function actionImageView($id)
    {
        $image = ImagesProduct::findOne($id);
        $model = new ChangeOrderImageForm();
        $model->sort = $image->sort;
        $model->imageId = $image->id;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $cart = Cart::findOne($image->cart_id);
                $slug = $cart->slug;
                return $this->redirect(['view', 'id' => $slug]);
            }
        }

        return $this->render('image-view', [
            'image' => $image,
            'model' => $model,
        ]);
    }


    public function actionDeleteImage($id)
    {
        $image = ImagesProduct::findOne($id);
        $cart = Cart::findOne($image->cart_id);
        $slug = $cart->slug;
        if ($image) {
            if(Storage::clean($image->image) && Storage::clean($image->mini)) {
                if ($image->delete()) {
                    return $this->redirect(['view', 'id' => $slug]);
                }
            }

        }
    }


    private function getSubCatArray()
    {
        $subCat = Subcategory::find()->orderBy('category_id')->all();
        $array1 = [];
        foreach($subCat as $item)
        {
            $array1 += [$item->category_id => 1];
        }
        $array2 = [];
        foreach($array1 as $key => $val){
            $category = Category::findOne($key);
            $sub = Subcategory::find()->where(['category_id' => $category->id])->all();
            $array3 = [];
            foreach ($sub as $oneSub) {
                $array3 += [$oneSub->id => $oneSub->title];
            }
            $array2 += [$category->title => $array3];
        }
        return $array2;
    }

    private function getSubCatOption()
    {
        $subCat = Subcategory::find()->orderBy('category_id')->all();
        $array1 = [];
        foreach($subCat as $item)
        {
            $array1 += [$item->category_id => 1];
        }
        $string = '';
        foreach($array1 as $key => $val){
            $category = Category::findOne($key);


            $string .= '<optgroup label="'.$category->title.'">';
            $sub = Subcategory::find()->where(['category_id' => $category->id])->all();
            foreach ($sub as $oneSub) {
                $string .= '<option value="'. $oneSub->id .'">'.  $oneSub->title.'</option>';
            }

        }
        return $string;
    }


    public function actionAddManufacturedAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $manufacturer = new CreatManufacturerForm();
        $manufacturer->manufactured = Yii::$app->request->post('man');
        if($manufacturer->save()) {
            $man = Manufacturer::find()->orderBy('id desc')->all();
            $value = KotHelper::selectHelper($man, 'id', 'manufactured');
            return [
                'success' => true,
                'value' => $value,
            ];
        }
        return false;
    }


    public function actionAddSubcategoryAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $subcat = new CreateSubcategoryForm();
        $subcat->title = Yii::$app->request->post('subCat');
        $subcat->categoryId = Yii::$app->request->post('cat');
        if($subcat->save()) {

            $value = $this->getSubCatOption();
            return [
                'success' => true,
                'value' => $value,
            ];
        }
        return $subcat;
    }


    public function actionAddLinkAjax()
    {
        $this->layout = 'empty';
        Yii::$app->response->format = Response::FORMAT_JSON;
        $link = new CreateLinkTagForm();
        $link->tagId = Yii::$app->request->post('tagId');
        $link->cartId = Yii::$app->request->post('cartId');
        $cart = Cart::findOne($link->cartId);

        if ($link->save()) {
            $links = CartTag::find()->where(['cart_id' => $link->cartId])->orderBy('tag_id')->all();
            $cartTag = [];
            $num = 0;
            foreach ($links as $item){
                $tag = ProductTag::findOne($item->tag_id);
                $cartTag += [$num => $tag];
                $num = $num + 1;
            }
            $value = $this->render('part/tags', [
                'cartTag' => $cartTag,
                'model' => $cart,
            ]);

            return [
                'success' => true,
                'value' => $value,
            ];
        }

        return false;
    }


    public function actionDeleteLink($id, $tag_id)
    {
        $cart = Cart::findOne($id);
        $links = CartTag::find()->where(['cart_id' => $id])->andWhere(['tag_id' => $tag_id])->one();
        if ($links) {
            $links->delete();
            return $this->redirect(['view', 'id' => $cart->slug]);
        }
        die;
    }

}


    
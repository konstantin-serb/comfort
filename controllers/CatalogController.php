<?php

namespace app\controllers;

use app\models\Subcategory;
use app\models\Category;
use app\models\Cart;
use app\models\News;
use app\models\Carttag;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\Response;
use \yii\data\Pagination;

class CatalogController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        

        return $this->render('index', [
            
        ]);
    }


    public function actionSubcategory($id)
    {
        $subcategory = Subcategory::find()->where(['slug' => $id])->one();
        $categories = Category::find()->orderBy('order')->all();
        $carts = Cart::find()->where(['subcategory_id' => $subcategory->id])->andWhere(['status' => Cart::STATUS_VISIBLE])->orderBy('id desc')->all();

        $data = Cart::getAll(6, $subcategory->id);
        $randomNews = News::find()->where(['status'=>News::STATUS_VISIBLE])
            ->orderBy('RAND()')->limit(2)->all();
        $recommend = Cart::find()->where(['recommend' => '1'])->all();

    

        return $this->render('subcategory', [
            'subcategory' => $subcategory,
            'categories' => $categories,
            'carts' => $data['carts'],
            'pagination' => $data['pagination'],           
            'randomNews' => $randomNews,
            'recommend' => $recommend,

        ]);
    } 


    public function actionCart($id)
    {
        $cart = Cart::find()->where(['slug' => $id])->one();
        $subcategory = Subcategory::findOne($cart->subcategory_id);
        $category = Category::findOne($subcategory->category_id);
        $recommend = Cart::find()->where(['subcategory_id' => $cart->subcategory_id])
        ->andWhere(['status' => Cart::STATUS_VISIBLE])
        ->orderBy('RAND()')->limit(4)->all();
        $recom = Cart::find()->where(['recommend' => 1])->all();
    
        $this->view->params['modal'] = $this->addModal($cart);

        return $this->render('cart', [
            'cart' => $cart,
            'subcategory' => $subcategory,
            'category' => $category,
            'recommend' => $recommend,
            'recom' => $recom,
        ]);
    }


    public function addModal($cart)
    {

        $images = $cart->getImages();
        $content = '';
        $content .= '<div class="catalog-cart-slider block" id="catalog-cart-slider">
                <div id="catalog-cart-slider-close" class="catalog-cart-slider-close"></div>
                <div class="owl-carousel" id="owl-carousel2">';
                if($images){
                    foreach($images as $image) {
                        $content .= '<div class="catalog-cart-slider-item">
                        <img src="'.$image->getImage().'" alt="">
                    </div>';
                    
                    } 
                } else {
                        $content .= '<h1>Нет доступных изображений</h1>';
                    }
                    
                    
        $content .= '</div>
                <div id="catalog-cart-slider-nav-left" class="catalog-cart-slider-nav-left">&#9668;</div>
                <div id="catalog-cart-slider-nav-right" class="catalog-cart-slider-nav-right"> &#9658;</div>
                <div class="d-flex jcsb">
                    <div>'.$cart->title.'</div>
                    
                </div>
                
            </div>';


        return $content;
    }


    public function actionTag($id)
    {
        $subcategory = Subcategory::find()->where(['slug' => $id])->one();
        $categories = Category::find()->orderBy('order')->all();
        $tag = Carttag::find()->where(['slug' => $id])->one();
        $carts = Cart::getAllFromTag($tag->id);
        $randomNews = News::find()->where(['status'=>News::STATUS_VISIBLE])
            ->orderBy('RAND()')->limit(2)->all();       


        return $this->render('tag', [
            'subcategory' => $subcategory,        
            'carts' => $carts,
            'categories' => $categories,
            'tag' => $tag,
            'randomNews' => $randomNews,
            
        ]);        
    }

   

   
}

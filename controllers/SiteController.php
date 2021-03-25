<?php

namespace app\controllers;

use app\models\News;
use app\models\Project;
use app\models\Subcategory;
use app\models\Category;
use app\models\SearchCarts;
use app\models\Carttag;
use app\models\Cart;
use app\models\Article;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Mysite;
use yii\web\Response;
use app\models\TechInfo;

class SiteController extends Controller
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
    
        $limit = 50;
        $site = Mysite::findOne(1);
        $projects = Project::find()->where(['status' => Project::STATUS_VISIBLE])
            ->orderBy('id desc')->limit(4)->all();
        if (count($projects)) {
            $number = 1;
           foreach ($projects as $project) {
               $project->id = $number;
               $item[$number] = $project;
               $number = $number + 1;
           }
        } else {
            $item = '';
        }
        $recommend = Cart::find()->where(['recommend' => '1'])->all();



        return $this->render('index', [
            'site' => $site,
            'item' => $item,
            'limit' => $limit,
            'recommend' => $recommend,
        ]);
    }

    public function actionNews()
    {
        $news = News::find()->where(['status'=>News::STATUS_VISIBLE])
            ->orderBy('id desc')->limit(40)->all();


            if ($news) {
                if (count($news) >= 7) {            
                 $array = array_chunk($news, 4);
                
            } elseif (count($news) > 4) {
                $array = array_chunk($news, 3);    
                        
            } elseif(count($news) > 3) {
                $array = array_chunk($news, 2);
                
            } else {
                $array = array_chunk($news, 1);            
            }
        }       


        for($i=0;$i<11;$i++) {
            if(empty($array[$i])) {
                $array[$i] = '';
            }
        }          
    
        return $this->render('news', [
            'array' => $array,
        ]);
    }


    public function actionOneNews($id) 
    {
        $news = News::find()->where(['slug' => $id])->one();
        $randomNews = News::find()->where(['status'=>News::STATUS_VISIBLE])
            ->orderBy('RAND()')->limit(2)->all();


        return $this->render('one-news', [
            'news' => $news,
            'randomNews' => $randomNews,
        ]);
    }


    public function actionProjects()
    {
        $projects = Project::find()->where(['status'=>Project::STATUS_VISIBLE])
            ->orderBy('id desc')->limit(40)->all();

            if ($projects) {
                if (count($projects) >= 7) {            
                 $array = array_chunk($projects, 4);
                
            } elseif (count($projects) > 4) {
                $array = array_chunk($projects, 3);    
                        
            } elseif(count($projects) > 3) {
                $array = array_chunk($projects, 2);
                
            } else {
                $array = array_chunk($projects, 1);            
            }
        }       


        for($i=0;$i<11;$i++) {
            if(empty($array[$i])) {
                $array[$i] = '';
            }
        }          


        return $this->render('projects', [
            'array' => $array,

        ]);
    }



    public function actionOneProject($id) 
    {
        $project = Project::find()->where(['slug' => $id])->one();
        $randomNews = Project::find()->where(['status'=>Project::STATUS_VISIBLE])
            ->orderBy('RAND()')->limit(2)->all();


        return $this->render('one-project', [
            'project' => $project,
            'randomNews' => $randomNews,

        ]);
    }



    public function actionService()
    {
        $article = Article::findOne(1);

        return $this->render('service', [
            'article' => $article,
        ]);
    }
    
  


    public function actionTechinfo()
    {
        $info = Techinfo::find()->where(['status' => 1])->all();

        return $this->render('techinfo', [
            'info' => $info,
        ]);
    }


    public function actionDesigners()
    {
       $article = Article::findOne(2);

        return $this->render('designers', [
            'article' => $article,
        ]);

    }


     public function actionAbout()
    {
        $tags = Carttag::find()->all();
        $site = Mysite::findOne(1);
        $article = Article::findOne(3);

        return $this->render('about', [
            'tags' => $tags,
            'site' => $site,
            'article' => $article,
        ]);
    }


    public function actionSearch()
    {
    
        $category = Category::find()->all();
        $result = null;
        $news = News::find()->where(['status'=>News::STATUS_VISIBLE])
            ->orderBy('RAND()')->limit(2)->all();


        if(Yii::$app->request->post()) {
            $model = new SearchCarts;
            $model->key = Yii::$app->request->post('textSearch');

        
            if(Yii::$app->request->post('category_id') == '') {
                $model->category_id = 1000;
            } else {
                $model->category_id = Yii::$app->request->post('category_id');
            }

            if(Yii::$app->request->post('inDescript') == '') {
                $model->inDescript = 9;
            } else {
                $model->inDescript = 10;
            }
            if(Yii::$app->request->post('category') == '') {
                $model->category = 9;
            } else {
                $model->category = 10;
            }


            if($model->simpleSearch()) {
                $result = $model->simpleSearch();
               }                
        
        } 
    

        return $this->render('search', [
            'category' => $category,
            'result' => $result,
            'news' => $news,
        ]);
    }




    public function actionLogin()
    {
        if (Yii::$app->user->identity && Yii::$app->user->identity->is_admin == 1) {
            $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionGetSubcategoryAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $categoryId = Yii::$app->request->post('category_Id');
        $subcat = Subcategory::find()->where(['category_id' => $categoryId])->all();
        if ($subcat) {
            $value = '';
            foreach($subcat as $item) {
                $value .= '<a href="' . Url::to(['/catalog/subcategory', 'id' => $item->slug]) . '">'
                . $item->title . '</a>';
            }
        } else {
            $value = '';
        }


        return [
            'success' => true,
            'value' => $value,
        ];
    }



    public function actionSearchAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $key = Yii::$app->request->post('key');
        $sql = "SELECT * FROM cart WHERE status = 1 AND title LIKE '%$key%' LIMIT 7";
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        if($result) {
           
            $value = '<h3>Результати пошуку:</h3><hr>';
            $num = 1;
            foreach($result as $searchItem) {
                $value .= '<p class="cart-link"><a href="'.Url::to(['/catalog/cart', 'id' => $searchItem['slug']]).'">'.$num. '. ' . $searchItem['title']. '</a></p>';
                $num++;
            }



            if($key == '') {
                $value = 'Поиск не дал результатов...';
            }
        } else {
            $value = 'Поиск не дал результатов...';
        }

        return [
            'success' => true,
            'value' => '<div class="search-view">'.$value.'</div>',
        ];
    }




}

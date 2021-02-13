<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;



class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNews()
    {

        return $this->render('news');
    }


    public function actionService()
    {

        return $this->render('service');
    }


    public function actionAbout()
    {

        return $this->render('about');
    }


    public function actionTechinfo()
    {

        return $this->render('techinfo');
    }


    public function actionDesigners()
    {

        return $this->render('designers');
    }


    public function actionSearch()
    {

        return $this->render('search');
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
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




}

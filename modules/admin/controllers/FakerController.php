<?php

namespace app\modules\admin\controllers;

use app\components\KotTranslit;
use app\modules\admin\models\faker\News;
use app\modules\admin\models\faker\Project;
use yii\web\Controller;
use app\modules\admin\models\faker\Cart;
use Faker\Factory;

class FakerController extends Controller
{
    public function actionCart()
    {
        $faker = Factory::create();

        for($i=0; $i<50; $i++) {
            $cart = new Cart();
            $cart->title = $faker->text(50);
            $cart->slug = KotTranslit::rusTranslit($cart->title);
            $cart->text = $faker->text(rand(500, 1000));
            $cart->description = $faker->text(rand(200, 490));
            $cart->info = $faker->text(rand(200, 600));
            $cart->price = rand(100, 10000);
            $cart->model = $faker->text(20);
            $cart->manufacturer = rand(1,4);
            $cart->availability = rand(0,1);
            $cart->subcategory_id = rand(1,9);
            $cart->status = 1;
            $cart->time_create = time();
            $cart->time_update = time();
            $cart->user_create = 1;
            $cart->user_update = 1;
            $cart->save();
        }
        return 'yo';
    }


    public function actionNews()
    {
        $faker = Factory::create();
        $no = 40;

        for($i=0; $i<$no; $i++) {
            $news = new News();
            $news->title = $faker->text(50);
            $news->slug = KotTranslit::rusTranslit($news->title);
            $news->text = $faker->text(rand(1000, 2000));
            $news->description = $faker->text(rand(200, 400));
            $news->status = 1;
            $news->time_create = time();
            $news->time_update = time();
            $news->user_create = 1;
            $news->user_update = 1;
            $news->type_view = 9;

            $news->save();
        }
        return 'yo';
    }


    public function actionProject()
    {
        $faker = Factory::create();
        $num = 30;

        for($i=0; $i<$num; $i++) {
            $project = new Project();
            $project->title = $faker->text(50);
            $project->slug = KotTranslit::rusTranslit($project->title);
            $project->text = $faker->text(rand(1000, 2000));
            $project->description = $faker->text(rand(200, 400));
            $project->status = 1;
            $project->time_create = time();
            $project->time_update = time();
            $project->user_create = 1;
            $project->user_update = 1;
            $project->type_view = 9;

            $project->save();
        }
        return 'yo';
    }
}

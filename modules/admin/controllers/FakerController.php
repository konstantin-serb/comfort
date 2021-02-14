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

        for($i=0; $i<100; $i++) {
            $cart = new Cart();
            $cart->title = $faker->text(50);
            $cart->slug = KotTranslit::rusTranslit($cart->title);
            $cart->text = $faker->text(rand(1000, 2000));
            $cart->description = $faker->text(rand(200, 800));
            $cart->info = $faker->text(rand(200, 800));
            $cart->price = rand(100, 50000);
            $cart->model = $faker->text(20);
            $cart->manufacturer = rand(1,4);
            $cart->availability = rand(0,1);
            $cart->subcategory_id = rand(1,3);
            $cart->status = rand(0,1);
            $cart->time_create = time();
            $cart->time_update = time();
            $cart->user_create = rand(1,3);
            $cart->user_update = rand(1,3);
            $cart->save();
        }
        return 'yo';
    }


    public function actionNews()
    {
        $faker = Factory::create();

        for($i=0; $i<50; $i++) {
            $news = new News();
            $news->title = $faker->text(50);
            $news->slug = KotTranslit::rusTranslit($news->title);
            $news->text = $faker->text(rand(1000, 2000));
            $news->description = $faker->text(rand(200, 800));
            $news->status = rand(0,1);
            $news->time_create = time();
            $news->time_update = time();
            $news->user_create = rand(1,3);
            $news->user_update = rand(1,3);
            $news->type_view = rand(9,10);

            $news->save();
        }
        return 'yo';
    }


    public function actionProject()
    {
        $faker = Factory::create();

        for($i=0; $i<50; $i++) {
            $project = new Project();
            $project->title = $faker->text(50);
            $project->slug = KotTranslit::rusTranslit($project->title);
            $project->text = $faker->text(rand(1000, 2000));
            $project->description = $faker->text(rand(200, 800));
            $project->status = rand(0,1);
            $project->time_create = time();
            $project->time_update = time();
            $project->user_create = rand(1,3);
            $project->user_update = rand(1,3);
            $project->type_view = rand(9,10);

            $project->save();
        }
        return 'yo';
    }
}

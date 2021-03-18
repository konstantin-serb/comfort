<?php
/**
 * @var $site \app\models\Mysite
 * @var $item \app\models\Project
 */

use app\components\StringHelper;
use yii\helpers\Url;

$this->title = 'Comfort Heat | Головна';

$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


?>

<div class="proposition d-flex aic">
    <div>
        <h5><?= $site->title_main ?></h5>

    </div>
    <?php if($recommend):?>
        <?php foreach($recommend as $cart):?>
    <a style="max-width: 16em;" href="<?=Url::to(['/catalog/cart', 'id' => $cart->slug])?>" class="d-flex">
        <img src="<?=$cart->getMini()?>" alt="">
        <?=$cart->title?>
    </a>
<?php endforeach;?>

    <?php endif;?>
    
</div>

<section class="sect-1">
    <div class="block">
        <h1><?= $site->title_main ?></h1>
        <button>
            Стати партнером
            <img src="/images/arrow-white.svg" alt="">
        </button>
    </div>
</section>

<!------- Секция 2 ------->

<section class="sect-2">
    <div class="block d-flex jcsb">
        <div class="sect-2-left">
            <h3>
                <?= $site->title_main2 ?>
            </h3>
            <?= $site->text_main ?>
            <a href="<?=Url::to(['about'])?>">
                Більше про компанію
                <img src="/images/arrow-blue.svg" alt="">
            </a>
        </div>
        <div class="sect-2-right">
            <div class="years25"></div>
            <div class="sect-2-img"></div>
        </div>
    </div>
</section>

<!------- Секция 3 ------->

<?php if ($item): ?>
    <section class="sect-3">
        <div class="block">
            <h3>Проекти</h3>
        </div>
        <div class="block d-flex jcsb">

            <div class="sect-3-half">
                <div class="sect-3-item" <?php
                $num = 1;
                if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE && !empty($item[$num]->image)) {
                    echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                }
                ?>>
                    <?= StringHelper::getShort($item[$num]->title, $limit) ?>
                    <a href="<?=Url::to(['/one-project', 'id' => $item[$num]->slug]);?>" class="<?php
                    if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE) {
                        echo 'project-button-img';
                    } else {
                        echo 'project-button';
                    }
                    ?>">
                        Детальніше
                        <img src="/images/arrow-white.svg" alt="">
                    </a>
                </div>

                <?php $num = 3;
                if (!empty($item[$num])):?>
                    <div class="sect-3-item" <?php
                    if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <?= StringHelper::getShort($item[$num]->title, $limit) ?>
                        <a href="<?=Url::to(['/one-project', 'id' => $item[$num]->slug]);?>" class="<?php
                        if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE) {
                            echo 'project-button-img';
                        } else {
                            echo 'project-button';
                        }
                        ?>">
                            Детальніше
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sect-3-half">
                <?php $num = 2;
                if (!empty($item[$num])):?>
                    <div class="sect-3-item" <?php
                    if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <?= StringHelper::getShort($item[$num]->title, $limit) ?>
                        <a href="<?=Url::to(['/one-project', 'id' => $item[$num]->slug]);?>" class="<?php
                        if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE) {
                            echo 'project-button-img';
                        } else {
                            echo 'project-button';
                        }
                        ?>">
                            Детальніше
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                <?php endif; ?>
                <?php $num = 4;
                if (!empty($item[$num])):?>
                    <div class="sect-3-item" <?php
                    if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <?= StringHelper::getShort($item[$num]->title, $limit) ?>
                        <a href="<?=Url::to(['/one-project', 'id' => $item[$num]->slug]);?>" class="<?php
                        if ($item[$num]->type_view == \app\models\Project::WITH_IMAGE) {
                            echo 'project-button-img';
                        } else {
                            echo 'project-button';
                        }
                        ?>">
                            Детальніше
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="block">
            <a href="<?=Url::to(['/projects'])?>" class="sect-3-but">
                Більше проектів
                <img src="/images/arrow-white.svg" alt="">
            </a>
        </div>
    </section>
<?php endif; ?>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>




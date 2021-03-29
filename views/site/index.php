<?php
/**
 * @var $site \app\models\Mysite
 * @var $item \app\models\Project
 * @var $siteMain \app\models\SiteMain
 */

use app\components\StringHelper;
use app\models\Project;
use yii\helpers\Url;

$this->title = 'Comfort Heat | Головна';

$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>
<style>
    .sect-2 p {
        font-size: <?php if(!empty($siteMain->fonts)){echo $siteMain->fonts;}else{echo '1.5rem';}?>;
        color: #fff;
        white-space: normal;
    }
</style>
<?php if($recommend):?>
<div class="proposition d-flex aic">
    <div>
        <h5><?= $siteMain->title ?></h5>

    </div>

        <?php foreach($recommend as $cart):?>
    <a style="max-width: 16em;" href="<?=Url::to(['/catalog/cart', 'id' => $cart->slug])?>" class="d-flex">
        <img src="<?=$cart->getMini()?>" alt="">
        <?=$cart->title?>
    </a>
<?php endforeach;?>


    
</div>
<?php endif;?>
<section class="sect-1">
    <div class="block" style="background: url(<?php if($siteMain->image_main) {
         echo '/uploads/'.$siteMain->image_main;
        } else {
            echo '/images/hero.svg';
        }
    ?>) no-repeat center center;
            height: 100vh;">
        <?php if(!$siteMain->title == ''):?>
        <h1><?php if(!empty($siteMain->title)) {echo $siteMain->title;} ?></h1>
        <?php endif;?>
<!--        <button>-->
<!--            Стати партнером-->
<!--            <img src="/images/arrow-white.svg" alt="">-->
<!--        </button>-->
    </div>
</section>

<!------- Секция 2 ------->

<section class="sect-2">
    <div class="block d-flex jcsb">
        <div class="sect-2-left">
            <h3>
                <?= $siteMain->title2 ?>
            </h3>
                <p>
                <?= $siteMain->text ?>
                </p>

            <a href="<?=Url::to(['about'])?>">
                Більше про компанію
                <img src="/images/arrow-blue.svg" alt="">
            </a>
        </div>
        <div class="sect-2-right">
            <div class="years25" style="background: url(<?php if($siteMain->image3) {
                echo '/uploads/'.$siteMain->image3;
            } else {
                echo '/images/25.svg';
            }
            ?>) no-repeat center center;"></div>
            <div class="sect-2-img" style="background: url(<?php if($siteMain->image2) {
                echo '/uploads/'.$siteMain->image2;
            } else {
                echo '/images/img.svg';
            }
            ?>) no-repeat center center;"></div>
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
            <?php $num = 1;?>
            <div class="sect-3-half">
                <div class="news-page-item<?php
                if($item[$num]->type_view == Project::WITH_IMAGE) {
                    echo '-img';
                }
                ?>" <?php
                if ($item[$num]->type_view == Project::WITH_IMAGE && !empty($item[$num]->image)) {
                    echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                }
                ?>>
                    <h2><?= StringHelper::getShort($item[$num]->title, $limit) ?></h2>
                    <p><?=StringHelper::getShort($item[$num]->description, 200)?></p>
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
                    <div class="news-page-item<?php
                    if($item[$num]->type_view == Project::WITH_IMAGE) {
                        echo '-img';
                    }
                    ?>" <?php
                    if ($item[$num]->type_view == Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <h2><?= StringHelper::getShort($item[$num]->title, $limit) ?></h2>
                        <p><?=StringHelper::getShort($item[$num]->description, 200)?></p>
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
                    <div class="news-page-item<?php
                    if($item[$num]->type_view == Project::WITH_IMAGE) {
                        echo '-img';
                    }
                    ?>" <?php
                    if ($item[$num]->type_view == Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <h2><?= StringHelper::getShort($item[$num]->title, $limit) ?></h2>
                        <p><?=StringHelper::getShort($item[$num]->description, 200)?></p>
                        <a href="<?=Url::to(['/one-project', 'id' => $item[$num]->slug]);?>" class="<?php
                        if ($item[$num]->type_view == Project::WITH_IMAGE) {
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
                    <div class="news-page-item<?php
                    if($item[$num]->type_view == Project::WITH_IMAGE) {
                        echo '-img';
                    }
                    ?>" <?php
                    if ($item[$num]->type_view == Project::WITH_IMAGE && !empty($item[$num]->image)) {
                        echo 'style="background: url(' . $item[$num]->getMini() . ') no-repeat center center;
	background-size: cover;
	color: #fff;"';
                    }
                    ?>>
                        <h2><?= StringHelper::getShort($item[$num]->title, $limit) ?></h2>
                        <p><?=StringHelper::getShort($item[$num]->description, 200)?></p>
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




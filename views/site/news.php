<?php
/**
*@var $item \app\models\News
*/

use app\components\StringHelper;
use yii\helpers\Url;
use app\models\News;

$this->title = 'Новини';


$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/js/scripts.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>

<!------- Новости  ------->
<!-- background: url(../images/img3.svg) no-repeat center center; -->

<?php if($array[0]):?>
<section class="news">
    <div class="block">
        <h1>Новини</h1>
        <div class="owl-carousel" id="owl-carousel">
            <div class="news-page d-flex jcsb" data-dot="1">
                <div class="news-page-half">
                    <?php foreach($array[0] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="news-page-half">
                    <?php if(!empty($array[1])):?>
                    <?php foreach($array[1] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>

            <?php if(!empty($array[2])):?>
            <div class="news-page d-flex jcsb" data-dot="<span>2</span>">
                <div class="news-page-half">
                    <?php if(!empty($array[2])):?>
                    <?php foreach($array[2] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>

                    <?php endif;?>
                </div>
                <div class="news-page-half">
                    <?php if(!empty($array[3])):?>
                    <?php foreach($array[3] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
            <?php endif;?>

            <?php if(!empty($array[4])):?>
            <div class="news-page d-flex jcsb" data-dot="<span>3</span>">
                <div class="news-page-half">
                    <?php if(!empty($array[4])):?>
                    <?php foreach($array[4] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="news-page-half">
                    <?php if(!empty($array[5])):?>
                    <?php foreach($array[5] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
            <?php endif;?>

            <?php if(!empty($array[6])):?>
            <div class="news-page d-flex jcsb" data-dot="<span>4</span>">
                <div class="news-page-half">
                    <?php if(!empty($array[6])):?>
                    <?php foreach($array[6] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="news-page-half">
                    <?php if(!empty($array[7])):?>
                    <?php foreach($array[7] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
            <?php endif;?>

            <?php if(!empty($array[8])):?>
            <div class="news-page d-flex jcsb" data-dot="<span>5</span>">
                <div class="news-page-half">
                    <?php if(!empty($array[8])):?>
                    <?php foreach($array[8] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="news-page-half">
                    <?php if(!empty($array[9])):?>
                    <?php foreach($array[9] as $item):?>
                    <div class="news-page-item<?php 
                    if($item->type_view == News::WITH_IMAGE) {
                        echo '-img';
                    } 
                    ?>" <?php if($item->type_view == News::WITH_IMAGE){
                        echo 'style="background: url('.$item->getMini().') no-repeat center center; background-size: cover;"';
                    }

                    ?>>
                        <h2><?=$item->title?></h2>
                        <p><?=StringHelper::getShort($item->description, 200)?></p>
                        <a href="<?=Url::to(['/one-news', 'id'=>$item->slug])?>">
                            Читати
                            <img src="/images/arrow-white.svg" alt="">
                        </a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>



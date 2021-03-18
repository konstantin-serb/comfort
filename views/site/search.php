<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\StringHelper;
use app\models\Cart;

$this->title = 'Пошук';


$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

?>

<!------- Форма поиска ------->

<section class="search-form">
    <div class="block">
        <?php $form = ActiveForm::begin();?>
       <!--  <form action="<?=Url::to(['/site/login'])?>" method="post" > -->
            <p>Параметри пошуку</p>
            <div class="d-flex">
                <div class="d-flex fdc">
                    <input type="text" id="text1" name="textSearch">
                    <label class="checkbox">
                        <input id="descript1" type="checkbox" name="inDescript">
                        <span>Шукати в описі товару</span>
                    </label>
                </div>
                <div class="d-flex fdc">
                    <div class="arw"></div>
                    <select name="category_id" id="cat1">
                        <option value="">Усі категорії</option>
                        <?php foreach($category as $oneCat):?>
                        <option value="<?=$oneCat->id?>"><?=$oneCat->title?></option>
                        <?php endforeach;?>
                        
                    </select>
                    <label class="checkbox">
                        <input type="checkbox" name="category" id="catId">
                        <span>Шукати в підкатегоріях</span>
                    </label>
                </div>
                <div class="search-form-but">
                    <div class="img-search"></div>
                    <input type="submit" value="Шукати">
                </div>
            </div>
        <!-- </form> -->
        <?php ActiveForm::end();?>
    </div>
</section>

<!------- Секция результат поиска ------->

<?php if($result):?>
<section class="search-result">
    <div class="block">
        <p>Результат пошуку: <span> Знайдено <?php
        if($result) {
            echo count($result);    
        }

        ?> <?php if(count($result) == 1){echo ' товар';} else {echo ' товарів';}?></span></p>
       
        <div class="d-flex jcsb aic">
            <div class="d-flex">
                <button id="sort-list">
                    <img src="/images/sort-list.svg" alt="">
                </button>
                <button id="sort-table">
                    <img src="/images/sort-table.svg" alt="">
                </button>
            </div>
            <div class="d-flex">
                <div class="search-result-p">На сторінці</div>
                <div class="search-result-div">
                    <div class="img-search"></div>
                    <select name="" id="">
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="12">12</option>
                       <!--  <option value="">4</option>
                        <option value="">5</option> -->
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="block d-flex jcsb" id="search-result-block">
        <?php if($result):?>
        <?php foreach($result as $item):?>
        <a href="<?=Url::to(['/catalog/cart', 'id' => $item['slug']])?>" class="search-result-item">
            <img class="image" src="<?=Cart::getMini2($item['id'])?>" alt="">
            <div>
                <h5><?=$item['title']?></h5>
                <p><?=StringHelper::getShort($item['description'], 100)?></p>
            </div>
        </a>
    <?php endforeach;?>
    <?php endif;?>
        
    </div>
    <!-- <div class="result-stage block">Показано 4 із 4 (всього 1 сторінок)</div> -->
</section>
<?php endif;?>

<section class="search-info">
    <div class="block d-flex jcsb">
        <?php if($news):?>
            <?php foreach($news as $oneNews):?>
        <div class="search-info-item">
            <h2><?=$oneNews->title?></h2>
            <p><?=StringHelper::getShort($oneNews->description, 100)?></p>
            <a href="<?=Url::to(['one-news', 'id' => $oneNews->slug])?>" class="project-button">
                Детальніше
                <img src="/images/arrow-white.svg" alt="">
            </a>
        </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

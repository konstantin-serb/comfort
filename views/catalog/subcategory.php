<?php

use yii\helpers\Url;
use app\components\StringHelper;
use yii\widgets\LinkPager;

$this->title = 'Каталог | Подкатегория: '. $subcategory->title;

$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/js/select.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>
<div class="proposition d-flex aic">
    <div>
<!--        <h5>--><?//= $site->title_main ?><!--</h5>-->

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
 <!------- Секция page-catalog ------->


<section class="page-catalog">
    <div class="block">

        <?=$this->render('blocks/sidebar', [
            'categories' => $categories,
        ])?>
            
        </div>

        <div class="page-catalog-cont">
            <h2><?=$subcategory->title?></h2>
            <p><?=$subcategory->description?></p>
            <div class="d-flex jcsb aic page-catalog-cont-sort">
                <div>
                    <img src="/images/sort-list.svg" alt="" id="page-catalog-sort-list">
                    <img src="/images/sort-table.svg" alt=""
                         id="page-catalog-sort-table">
                </div>
                <div>
                    <div class="d-flex aic">
                        <!-- <div class="page-catalog-cont-p">На сторінці</div>
                        <div class="page-catalog-cont-div">
                            <div class="img-page-catalog"></div>
                            <select name="" id="select">
                                <option value="4">4</option>
                                <option value="6" selected>6</option>
                                <option value="8">8</option>
                                <option value="12">12</option>
                            
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="d-flex jcsb" id="page-catalog-cont-block">
            	<?php if($carts):?>

            		<?php foreach($carts as $cart):?>
                <a href="<?=Url::to(['cart', 'id' => $cart->slug])?>" class="page-catalog-cont-item">
                    <img src="<?=$cart->getMini()?>" alt="image">
                    <div>
                        <h5><?=StringHelper::getShort($cart->title, 50)?></h5>
<!--                        <h6>--><?//=$cart->price?><!-- ₴</h6>-->
                        <p><?=StringHelper::getShort($cart->description, 100)?></p>
                    </div>
                </a>
                	<?php endforeach;?>

            	<?php endif;?>
                
            </div>

            <!-- <div class="page-catalog-cont-total">Показано 8 із 8 (всього 1 сторінок)</div> -->
            <div>
                    <?php // display pagination
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
        </div>

    </div>
</section>

<!------- Секция Артикль-док ------->
<?php if($randomNews):?>
        <section class="article-doc">
            <div class="block">
                <h3>Пов’язані статті</h3>
            </div>
            <div class="block d-flex jcsb">
                
                    <?php foreach($randomNews as $oneNews):?>
                        <div class="article-doc-item">
                            <h2><?=$oneNews->title?></h2>
                            <p><?=StringHelper::getShort($oneNews->description, 100)?></p>
                            <a href="<?=Url::to(['/site/one-news', 'id' => $oneNews->slug])?>">
                                Читати
                                <img src="/images/arrow-white.svg" alt="">
                            </a>
                        </div>
                    <?php endforeach;?>
                
               
            </div>
        </section>
 <?php endif;?>


<!------- Секция 4 ------->

        <?=$this->render('/site/blocks/collaborate')?>

        <!------- Футер ------->
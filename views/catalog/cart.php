<?php

use yii\helpers\Url;
use app\components\StringHelper;

$this->title = $cart->title;


$this->registerJsFile('/owl/owl.carousel.min.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);
?>

<div class="proposition d-flex aic">
    
    <?php if(isset($recom)):?>
        <?php foreach($recom as $oneCart):?>
    <a style="max-width: 16em;" href="<?=Url::to(['/catalog/cart', 'id' => $oneCart->slug])?>" class="d-flex">
        <img src="<?=$oneCart->getMini()?>" alt="">
        <?=$oneCart->title?>
    </a>
<?php endforeach;?>

    <?php endif;?>
    
</div>







<!------- Секция catalog-cart ------->

        <section class="catalog-cart">
            <div class="block">
                <p><?=$category->title?> &nbsp;&nbsp;> &nbsp;&nbsp;<a href="<?=Url::to(['subcategory', 'id' => $subcategory->slug])?>"><?=$subcategory->title?></a> &nbsp;&nbsp;><span> &nbsp;&nbsp;<?=$cart->title?></span></p>
                <div class="catalog-cart-item d-flex">
                    <div class="catalog-cart-item-part d-flex">
                        <div class="catalog-cart-item-part-img">
                            <img src="<?=$cart->getImage()?>" alt="" id="catalog-cart-img-big">
                        </div>
                    </div>
                    <div class="catalog-cart-item-part d-flex jcsb">
                        <div class="catalog-cart-item-part-top">
                            <h2 id="catalog-cart-item-h2"><?=$cart->title?></h2>
                            <h3 id="catalog-cart-item-h3"><?=$cart->price?> ₴</h3>
                        </div>
                        <div class="catalog-cart-item-part-bottom">
                            <p id="catalog-cart-item-p1">Модель: <?=$cart->model?></p>
                            <p id="catalog-cart-item-p2">Виробник: <?=$cart->getManufacturer()?></p>
                            <p><?=$cart->checkAvailability()?></p>
                        </div>
                    </div>
                    <div class="catalog-cart-item-down d-flex">
                    	<?php if($cart->getImages()):?>
                    		<?php 
                    		$num = 1;
                    		foreach($cart->getImages() as $image):?>
                        <div class="catalog-cart-item-down-img">
                            <img src="<?=$image->getMini()?>" alt=""
                                 id="catalog-cart-img-small-<?=$num?>" data-id="<?=$image->getImage()?>">
                        </div>
                        	<?php $num++;
                        endforeach;?>
                    	<?php endif;?>
                        
                    </div>
                </div>
            </div>
        </section>

        <!------- Секция catalog-cart-info ------->

        <section class="catalog-cart-info">
            <div class="block">
                <div class="catalog-cart-info-buttons d-flex">
                    <button id="catalog-cart-info-buttons-1" class="catalog-cart-info-buttons-on" data-id="<?=$cart->text?>">Опис товару</button>
                    <button id="catalog-cart-info-buttons-2" class="catalog-cart-info-buttons-off" data-id="<?=$cart->info?>">Технічні характеристики</button>
                </div>
                <div class="catalog-cart-info-text">
                    <p id="catalog-cart-info-text-1"><?=$cart->text?></p>
                    <p id="catalog-cart-info-text-2"><?=$cart->info?></p>
                </div>
            </div>
        </section>

        <!------- Секция catalog-cart-goods ------->

        <?php if($recommend):?>
        <section class="catalog-cart-goods">
            <div class="block">
                <h3>Товари категорії</h3>
            </div>
            <div class="block d-flex jcsb">
            	<?php foreach($recommend as $item):?>
                <a href="<?=Url::to(['cart', 'id' => $item->slug])?>" class="catalog-cart-goods-item">
                    <img src="<?=$item->getMini()?>" alt="">
                    <h4><?=StringHelper::getShort($item->title, 50)?></h4>
                    <p><?=StringHelper::getShort($item->description, 100)?></p>
                </a>
            	<?php endforeach;?>
                
            </div>
        </section>
    	<?php endif;?>

        <!------- Секция 4 ------->

        <?=$this->render('/site/blocks/collaborate')?>

        <!------- Футер ------->
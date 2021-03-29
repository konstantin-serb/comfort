<?php

use yii\helpers\Url;
use app\components\StringHelper;

$this->title = $news->title;
?>

 <!------- Секция Артикль ------->

        <section class="article">
            <div class="block">
                <div>
                    <a href="<?=Url::to(['/news'])?>">Новини&nbsp;&nbsp;></a> &nbsp;&nbsp;<?=$news->title;?>
                </div>
                <h1><?=$news->title;?></h1>
<!--                	--><?php //if($news->image):?>
<!--               			<img src="--><?//=$news->getImage()?><!--" alt="">-->
<!--            		--><?php //endif;?>
                	<p><?=$news->text;?></p>
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
                            <a href="<?=Url::to(['one-news', 'id' => $oneNews->slug])?>">
                                Читати
                                <img src="/images/arrow-white.svg" alt="">
                            </a>
                        </div>
                    <?php endforeach;?>
                 
               
            </div>
        </section>
        <?php endif;?>

        <!------- Секция 4 ------->

        <?=$this->render('blocks/collaborate')?>
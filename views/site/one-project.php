<?php

use yii\helpers\Url;
use app\components\StringHelper;

$this->title = $project->title;
?>

 <!------- Секция Артикль ------->

        <section class="article">
            <div class="block">
                <div>
                    <a href="<?=Url::to(['/projects'])?>">Проекти&nbsp;&nbsp;></a> &nbsp;&nbsp;<?=$project->title;?>
                </div>
                <h1><?=$project->title;?></h1>
<!--                	--><?php //if($project->image):?>
<!--               			<img src="--><?//=$project->getImage()?><!--" alt="">-->
<!--            		--><?php //endif;?>
                	<p><?=$project->text;?></p>
            </div>
        </section>

        <!------- Секция Артикль-док ------->

        <section class="article-doc">
            <div class="block">
                <h3>Пов’язані статті</h3>
            </div>
            <div class="block d-flex jcsb">
                <?php if(isset($randomNews)):?>
                    <?php foreach($randomNews as $oneNews):?>
                        <div class="article-doc-item">
                            <h2><?=$oneNews->title?></h2>
                            <p><?=StringHelper::getShort($oneNews->description, 100)?></p>
                            <a href="<?=Url::to(['one-project', 'id' => $oneNews->slug])?>">
                                Читати
                                <img src="/images/arrow-white.svg" alt="">
                            </a>
                        </div>
                    <?php endforeach;?>
                 <?php endif;?>
               
            </div>
        </section>

        <!------- Секция 4 ------->

        <?=$this->render('blocks/collaborate')?>
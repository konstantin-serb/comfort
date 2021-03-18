<?php

use yii\helpers\Url;
use app\models\Article;


$this->title = 'Компанія';
?>
<!------- Секция компания банер ------->

<section class="company-banner">
    <div class="block">
        <h1>Компанія</h1>
        
    </div>


</section>
<hr>
<section class="content">
    <div class="block create-block" style="font-size: 1.9rem;">
       
        <?php if($article && $article->status == Article::STATUS_VISIBLE):?>
        <p><?=$article->text;?></p>
        <?php endif;?>
    </div>

    
</section>

<!------- Секция компания линкс ------->

<section class="company-links">
    <div class="block">
        <p><?=$site->text_about1?></p>
        <div class="d-flex">

            <?php if($tags):?>
                <?php foreach($tags as $tag):?>
                    <a href="<?=Url::to(['/catalog/tag', 'id' => $tag->slug])?>" class="project-button">
                        <img src="/images/check2.svg" alt="">
                        <?=$tag->title?>
                    </a>
            <?php endforeach;?>
            <?php endif;?>
           
        </div>
    </div>
</section>

<!------- Секция компания инфо ------->

<section class="company-info">
    <div class="block d-flex jcsb">
        <div class="company-info-left">
            <img src="/images/logo-head.svg" alt="">
            <img src="/images/25.svg" alt="">
        </div>
        <div class="company-info-right">
            <?=$site->text_about2?>
        </div>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>
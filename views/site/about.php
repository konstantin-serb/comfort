<?php
/**
 * @var $content \app\models\SiteCompany
 */
use yii\helpers\Url;
use app\models\Article;


$this->title = 'Компанія';
?>
<style>
    .text-content p{
        font-size: <?php if($content->fonts){
            echo $content->fonts;
        } else {
            echo '1.5rem';
        }?> !important;
    }
</style>
<!------- Секция компания банер ------->

<section class="company-banner">
    <div class="block" style="background: url(<?php if($content->image1) {
        echo '/uploads/'.$content->image1;
    } else {
        echo '/images/company.svg';
    }
    ?>) no-repeat center center;">
        <h1><?=$content->title?></h1>
        
    </div>


</section>
<hr>
<section class="content">
    <div class="block create-block text-content">
       

        <p><?=$content->text;?></p>

    </div>

    
</section>

<!------- Секция компания линкс ------->

<!--<section class="company-links">-->
<!--    <div class="block  text-content">-->
<!--        <p>--><?//=$content->text2;?><!--</p>-->
<!--        <div class="d-flex">-->
<!---->
<!--            --><?php //if($tags):?>
<!--                --><?php //foreach($tags as $tag):?>
<!--                    <a href="--><?//=Url::to(['/catalog/tag', 'id' => $tag->slug])?><!--" class="project-button">-->
<!--                        <img src="/images/check2.svg" alt="">-->
<!--                        --><?//=$tag->title?>
<!--                    </a>-->
<!--            --><?php //endforeach;?>
<!--            --><?php //endif;?>
<!--           -->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!------- Секция компания инфо ------->

<section class="company-info">
    <div class="block d-flex jcsb">
        <div class="company-info-left">
            <?php if($content->image2_visible==1):?>
            <img src="<?php if(!$content->image2==null){
                echo '/uploads/'.$content->image2;
            }else {
                echo '/images/logo-head.svg';
            }?>" alt="">
            <?php endif;?>

            <?php if($content->image3_visible==1):?>
                <img src="<?php if(!$content->image3==null){
                    echo '/uploads/'.$content->image3;
                }else {
                    echo '/images/25.svg';
                }?>" alt="">
            <?php endif;?>
        </div>
        <div class="company-info-right text-content">
            <?=$content->text3;?>
        </div>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>
<?php
/**
 * @var $content \app\models\SiteTest
 */

use app\models\Article;

$this->title = $content->title;
?>


<!------- Секция сервис ------->

<section class="service">
    <div class="block create-block">
        <h1 style="font-size: 2.9rem;"><?=$content->title?></h1>
        <br>
        <div <?php if($content->fonts){echo 'style="font-size: '.$content->fonts.'"';}
        else {echo 'style="font-size: 1.9rem"';}?>>
        <?=$content->text;?>
        </div>

    </div>
</section>
<section class="techinfo">
    <div class="block">
    <?php foreach($info as $item):?>
        <a style="font-size: <?php if($content->fonts){echo $content->fonts;}else{echo '1.5rem';}?>;" href="<?=$item->link?>" target="blank">
            <?=$item->title?>
            <?php if($item->size):?>
                (<?=$item->size?>)
            <?php endif;?>

            <?php if($item->format):?>
                .<?=$item->format?>
            <?php endif;?>
        </a>
    <?php endforeach;?>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

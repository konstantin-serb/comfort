<?php
/**
 * @var $content \app\models\SiteDesigners
 */

use app\models\Article;


$this->title = 'Дизайнерам та архітекторам';
?>

<!------- Секция дизайнерам ------->

<section class="designers">
    <div class="block create-block" >
        <h1 style="font-size: 2.9rem;"><?=$content->title?></h1>
        <div style="font-size: <?php if($content->fonts){echo $content->fonts;}else{echo '1.9rem';}?>">
        <?=$content->text;?>
        </div>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

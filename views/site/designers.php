<?php

use app\models\Article;


$this->title = 'Дизайнерам та архітекторам';
?>

<!------- Секция дизайнерам ------->

<section class="designers">
    <div class="block create-block"  style="font-size: 1.9rem;">
        <h1>Дизайнерам та архітекторам</h1>
        <br>
        <?php if($article && $article->status == Article::STATUS_VISIBLE):?>
        <?=$article->text;?>
    	<?php endif;?>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

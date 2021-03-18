<?php

use app\models\Article;

$this->title = 'Сервіс та обслуговування';
?>


<!------- Секция сервис ------->

<section class="service">
    <div class="block create-block"  style="font-size: 1.9rem;">
        <h1>Сервіс та обслуговування</h1>
        <br>
        <?php if($article && $article->status == Article::STATUS_VISIBLE):?>
        <?=$article->text;?>
    	<?php endif;?>
    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

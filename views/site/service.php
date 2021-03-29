<?php
/**
 * @var $content \app\models\SiteService
 */

use app\models\Article;

$this->title = 'Сервіс та обслуговування';
?>


<!------- Секция сервис ------->

<section class="service">
    <div class="block create-block">
        <h1 style="font-size: 2.9rem;">Сервіс та обслуговування</h1>
        <br>
        <div <?php if($content->fonts){echo 'style="font-size: '.$content->fonts.'"';}
        else {echo 'style="font-size: 1.9rem"';}?>>
        <?=$content->text;?>
        </div>

    </div>
</section>

<!------- Секция 4 ------->

<?=$this->render('blocks/collaborate')?>

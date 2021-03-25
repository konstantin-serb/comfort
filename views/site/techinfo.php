<?php

$this->title = 'Технічна інформація';

?>

<!------- Секция тех-инфо ------->

<section class="techinfo">
    <div class="block">
        <h1>Технічна інформація</h1>

        <?php foreach($info as $item):?>
        <a href="<?=$item->link?>" target="blank">
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

<!------- Футер ------->

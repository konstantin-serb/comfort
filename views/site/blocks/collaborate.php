<?php use yii\helpers\Url;

$collaborate = \app\models\SiteColaborate::findOne(1);?>

<?php if($collaborate->status==1):?>
<section class="sect-4">
    <div class="block">
        <h1><?=$collaborate->title?></h1>
        <p><?=$collaborate->description?></p>
        <a href="<?=Url::to(['/site/collaborate'])?>" class="project-button">
            Стати партнером
            <img src="/images/arrow-blue.svg" alt="">
        </a>
    </div>
</section>
<?php endif;?>
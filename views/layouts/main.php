<?php
/**
 *
 */

use yii\helpers\Html;
use app\assets\AppComfortAsset;
use yii\helpers\Url;
use app\models\Mysite;
use app\models\Category;
use app\models\Subcategory;

AppComfortAsset::register($this);

$site = \app\models\SiteMain::findOne(1);
$service = \app\models\SiteService::findOne(1);
$news = \app\models\SiteNews::findOne(1);
$tech = \app\models\SiteTech::findOne(1);
$designers = \app\models\SiteDesigners::findOne(1);
$company = \app\models\SiteCompany::findOne(1);
$test = \app\models\SiteTest::findOne(1);

$category = Category::find()->orderBy('order')->all();
$oneCategory = Category::find()->orderBy('id')->one();
$subcategory = Subcategory::find()->where(['category_id' => $oneCategory])->all();

if (empty($this->params['modal'])) {
    $this->params['modal'] = '';
}


$this->registerJsFile('/js/scripts.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/js/addSubcat.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


$this->registerJsFile('/js/search.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="<?= $site->meta_description ?>">
    <meta name="keywords" content="<?= $site->meta_keywords ?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body>

<!------- Окно каталог средний ------->
<?php if ($category): ?>
    <div class="catalog-mr" id="catalog-mr">
        <div class="d-flex jcsb aic">
            <div class="heading">
                Каталог продукції
            </div>
            <div id="catalog-close-mr" class="catalog-close-mr">
                <img src="/images/closetr.svg" alt="">
            </div>
        </div>
        <div class="d-flex catalog-mr-block">
            <div class="catalog-mr-part">

                <?php
                $count = count($category);
                $del = ceil($count / 2);
                $halfCategory = array_chunk($category, $del);

                ?>
                <?php foreach ($halfCategory[0] as $half): ?>
                    <div class="catalog-mr-item">
                        <div><?= $half->title ?></div>
                        <?php $subs = Subcategory::find()->where(['category_id' => $half->id])->orderBy('order')->all(); ?>

                        <?php foreach ($subs as $oneSub): ?>
                            <a href="<?= Url::to(['/catalog/subcategory', 'id' => $oneSub->slug]) ?>"><?= $oneSub->title ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="catalog-mr-part">
                <?php foreach ($halfCategory[1] as $half): ?>
                    <div class="catalog-mr-item">
                        <div><?= $half->title ?></div>
                        <?php $subs = Subcategory::find()->where(['category_id' => $half->id])->orderBy('order')->all(); ?>

                        <?php foreach ($subs as $oneSub): ?>
                            <a href="<?= Url::to(['/catalog/subcategory', 'id' => $oneSub->slug]) ?>"><?= $oneSub->title ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<!------- Окно бургер меню ------->

<div class="burger-menu" id="burger-menu">
    <div class="burger-menu-top d-flex jcsb aic">
        <img src="/images/logo-foot.svg" alt="">
        <button class="burger-menu-catalog" id="burger-menu-catalog">
            <img src="/images/menu-left.svg" alt="">
            Каталог продукції
        </button>
        <div id="burger-close" class="burger-close">
            <img src="/images/close.svg" alt="">
        </div>
    </div>
    <div class="burger-menu-mid d-flex">
        <div class="burger-menu-mid-serch">
            <form action="">
                <input type="text" class="burger-search-text">
                <label for="submit" class="search-img">
                    <input type="submit" id="search-submit">
                </label>
            </form>
        </div>
        <?php if ($company->status == 1): ?>
            <a href="<?= Url::to(['/about']) ?>"><?= $company->title ?></a>
        <?php endif; ?>

        <?php if ($news->status == 1): ?>
        <a href="<?= Url::to(['/news']) ?>"><?= $news->title ?>/a>
            <?php endif; ?>

            <?php if ($service->status == 1): ?>
                <a href="<?= Url::to(['/service']) ?>"><?= $service->title ?></a>
            <?php endif; ?>

            <?php if ($tech->status == 1): ?>
                <a href="<?= Url::to(['/techinfo']) ?>"><?= $tech->title ?></a>
            <?php endif; ?>

            <?php if ($designers->status == 1): ?>
                <a href="<?= Url::to(['/designers']) ?>"><?= $designers->title ?></a>
            <?php endif; ?>


            <?php if ($test->status == 1): ?>
                <a href="<?= Url::to(['/test']) ?>"><?= $test->title ?></a>
            <?php endif; ?>
            <!--            <a href="--><? //= Url::to(['/search']) ?><!--">search</a>-->
    </div>
    <div class="burger-menu-bottom">
        <div class="d-flex">
            <div class="burger-menu-bottom-links1">
                <a href="tel:<?= $site->tel1 ?>>">
                    <!--                    <img src="/images/kyivstar.svg" alt="">-->
                    <?= $site->tel1 ?>
                </a><br>
                <a href="tel:<?= $site->tel2 ?>">
                    <!--                    <img src="/images/vodafone.svg" alt="">-->
                    <?= $site->tel2 ?>
                </a>
            </div>
            <div class="burger-menu-bottom-links2">
                <a href="mailto:<?= $site->email; ?>"><?= $site->email; ?></a>
                <div>
                    <?= $site->address; ?>
                </div>
            </div>
        </div>
        <div class="burger-menu-bottom-social">
            <a href="<?= $site->fb1 ?>"><img src="/images/fb-blue.svg" alt=""></a>
            <a href="<?= $site->fb2 ?>"><img src="/images/insta-blue.svg" alt=""></a>
            <a href="<?= $site->fb3 ?>"><img src="/images/in-blue.svg" alt=""></a>
        </div>
    </div>
</div>

<!------- Модальные окна ------->

<div class="modal-bcg" id="modal-bcg">

    <!------- Окно поиск ------->

    <div class="search" id="search">

        <form>
            <input id="textsearch" type="text" class="search-text" name="text">
            <label for="submit" class="search-img">
                <input type="submit" id="search-submit">
                <a id="search-submit"><label for="submit" class="search-img"></a>
            </label>
        </form>
        <!--        <div id="catalog-close1" class="catalog-close"></div>-->
        <p id="addResult" class="">

        </p>
    </div>

    <!------- Окно каталог большой ------->
    <div class="catalog" id="catalog" style="display: block">
        <div class="d-flex">
            <div class="catalog-left">
                <?php foreach ($category as $item): ?>
                    <button id="<?= $item->id ?>">
                        <?= $item->title ?>
                        <img src="/images/arrow-orange.svg" alt="">
                    </button>
                <?php endforeach; ?>

            </div>
            <div class="catalog-right">
                <span id="subcat1">
                <?php if ($subcategory): ?>
                    <?php foreach ($subcategory as $item): ?>
                        <a href="<?= Url::to(['/catalog/subcategory', 'id' => $item->slug]) ?>">
                            <?= $item->title; ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                </span>

                <div id="catalog-close" class="catalog-close"></div>
            </div>
        </div>
    </div>


    <!------- Окно catalog-cart-slider ------->

    <?php if ($this->params['modal']): ?>

        <?= $this->params['modal'] ?>
    <?php endif; ?>

</div>

<!------- proposition ------->


<!------- Хедер ------->

<header>

    <!-- Хедер большой -->

    <div class="block header-hr">

        <div class="head-top d-flex jcsb">
            <div class="head-top-left">
                <?php if ($company->status == 1): ?>
                    <a href="<?= Url::to(['/about']) ?>"><?= $company->title ?></a>
                <?php endif; ?>

                <?php if ($news->status == 1): ?>
                    <a href="<?= Url::to(['/news']) ?>"><?= $news->title ?></a>
                <?php endif; ?>

                <?php if ($service->status == 1): ?>
                    <a href="<?= Url::to(['/service']) ?>"><?= $service->title ?></a>
                <?php endif; ?>

                <?php if ($tech->status == 1): ?>
                    <a href="<?= Url::to(['/techinfo']) ?>"><?= $tech->title ?></a>
                <?php endif; ?>

                <?php if ($designers->status == 1): ?>
                    <a href="<?= Url::to(['/designers']) ?>"><?= $designers->title ?></a>
                <?php endif; ?>

                <?php if ($test->status == 1): ?>
                    <a href="<?= Url::to(['/test']) ?>"><?= $test->title ?></a>
                <?php endif; ?>
                <!--                <a href="--><? //= Url::to(['/search']) ?><!--">search</a>-->
            </div>
            <div class="head-top-right">
                <a href="<?= $site->fb1 ?>"><img src="/images/fb-blue.svg" alt=""></a>
                <a href="<?= $site->fb2 ?>"><img src="/images/insta-blue.svg" alt=""></a>
                <a href="<?= $site->fb3 ?>"><img src="/images/in-blue.svg" alt=""></a>
            </div>
        </div>

        <div class="head-down d-flex jcsb aic">
            <div class="d-flex aic">
                <a href="<?= Url::to(['/']) ?>">
                    <div class="d-flex logo-head">
                        <div>
                            <img src="/images/logo-head.svg" alt="">
                        </div>
                        <div>
<!--                            <p>Smart</p>-->
<!--                            <p>Heating</p>-->
<!--                            <p>Solutions</p>-->
                        </div>
                    </div>
                </a>
                <div class="d-flex head-phones aic">
                    <a href="tel:<?= $site->tel1 ?>">
                        <!--                        <img src="/images/kyivstar.svg" alt="">-->
                        <?= $site->tel1 ?>
                    </a>
                    <a href="tel:<?= $site->tel2 ?>">
                        <!--                        <img src="/images/vodafone.svg" alt="">-->
                        <?= $site->tel2 ?>
                    </a>
                </div>
                <div class="d-flex head-info">
                    <a href="mailto:<?= $site->email ?>"><?= $site->email ?></a>
                    <div><?= $site->address ?></div>
                </div>
            </div>
            <div class="catalog-bu">
                <!--                <button class="search-btn" id="search-btn">-->
                <!--                    <img src="/images/search.svg" alt="">-->
                <!--                    Пошук-->
                <!--                </button>-->
                <button class="catalog-button" id="catalog-button">
                    <div class="in-button">
                        <img src="/images/menu-left.svg" alt="">
                        Каталог продукції
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Хедер средний -->

    <div class="block header-mr">
        <div class="head-mr-top d-flex">
            <a href="tel:<?= $site->tel1 ?>">
                <!--                <img src="/images/kyivstar.svg" alt="">-->
                <?= $site->tel1 ?>
            </a>
            <a href="tel:<?= $site->tel2 ?>">
                <!--                <img src="/images/vodafone.svg" alt="">-->
                <?= $site->tel2 ?>
            </a>
        </div>
        <div class="head-mr-bottom d-flex jcsb aic">
            <a href="<?= Url::to(['/']) ?>">
                <div class="d-flex logo-head">
                    <div>
                        <img src="/images/logo-head.svg" alt="">
                    </div>
                    <div>
<!--                        <p>Smart</p>-->
<!--                        <p>Heating</p>-->
<!--                        <p>Solutions</p>-->
                    </div>
                </div>
            </a>
            <button class="head-mr-bottom-search"
                    id="head-mr-search">
                <img src="/images/search.svg" alt="">
            </button>
            <button class="catalog-button-mr" id="catalog-button-mr">
                <img src="/images/menu-left.svg" alt="">
                Каталог продукції
            </button>
            <button class="head-mr-bottom-burger" id="head-mr-burger">
                <img src="/images/burger.svg" alt="">
            </button>
            <button class="head-ms-burger d-flex aic"
                    id="head-ms-burger">
                <img src="/images/burger.svg" alt="">
                Меню
            </button>
        </div>
    </div>
</header>

<!------- Секция 1 ------->

<?= $content ?>

<!------- Футер ------->

<footer>
    <div class="block d-flex">

        <div class="foot-left">
            <div class="foot-left-block">
                <div class="foot-logo">
                    <img src="/images/logo-foot.svg" alt="">
                </div>
                <h6>Контакти</h6>
                <p><?= $site->address ?></p>
                <a href="tel:<?= $site->tel1 ?>">
                    <!--                    <img src="/images/kyivstar.svg" alt="">-->
                    <?= $site->tel1 ?>
                </a>
                <a href="tel:<?= $site->tel2 ?>">
                    <!--                    <img src="/images/vodafone.svg" alt="">-->
                    <?= $site->tel2 ?>
                </a>
                <a href="tel:<?= $site->tel3 ?>">
                    <!--                    <img src="/images/lifecell.svg" alt="">-->
                    <?= $site->tel3 ?>
                </a>
                <a href="mailto:<?= $site->email ?>" class="foot-mail"><?= $site->email ?>
                </a>
                <div class="d-flex foot-social">
                    <a href="<?= $site->fb1 ?>"><img src="/images/fb-white.svg" alt=""></a>
                    <a href="<?= $site->fb2 ?>"><img src="/images/insta-white.svg" alt=""></a>
                    <a href="<?= $site->fb3 ?>"><img src="/images/in-white.svg" alt=""></a>
                </div>
                <div class="d-flex foot-links">
                    <?php if ($company->status == 1): ?>
                        <a href="<?= Url::to(['/about']) ?>"><?= $company->title ?></a>
                    <?php endif; ?>

                    <?php if ($news->status == 1): ?>
                        <a href="<?= Url::to(['/news']) ?>"><?= $news->title ?></a>
                    <?php endif; ?>

                    <?php if ($service->status == 1): ?>
                        <a href="<?= Url::to(['/service']) ?>"><?= $service->title ?></a>
                    <?php endif; ?>

                    <?php if ($tech->status == 1): ?>
                        <a href="<?= Url::to(['/techinfo']) ?>"><?= $tech->title ?></a>
                    <?php endif; ?>

                    <?php if ($designers->status == 1): ?>
                        <a href="<?= Url::to(['/designers']) ?>"><?= $designers->title ?></a>
                    <?php endif; ?>

                    <?php if ($test->status == 1): ?>
                        <a href="<?= Url::to(['/test']) ?>"><?= $test->title ?></a>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="foot-right">
            <img src="<?php if ($site->image_map) {
                echo '/uploads/' . $site->image_map;
            } else {
                echo '/images/map.svg';
            } ?>" alt="">
        </div>
    </div>
    <div class="foot-down d-flex block">
        <div>
            © Comfort Heat - офіційний дистриб'ютор
        </div>
        <div>
            <img src="/images/ingsot.svg" alt="">
            Розроблено в Ingsot
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppComfortAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;

AppComfortAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body>

<!------- Окно каталог средний ------->

<div class="catalog-mr" id="catalog-mr">
    <div class="d-flex jcsb aic">
        <div class="heading">
            Каталог продукції
        </div>
        <div id="catalog-close-mr" class="catalog-close-mr">
            <img src="images/closetr.svg" alt="">
        </div>
    </div>
    <div class="d-flex catalog-mr-block">
        <div class="catalog-mr-part">
            <div class="catalog-mr-item">
                <div>Тепла підлога</div>
                <a href="#">Під плитку</a>
                <a href="#">В стяжку</a>
                <a href="#">Під ламінат</a>
            </div>
            <div class="catalog-mr-item">
                <div>Вуличні системи</div>
                <a href="#">
                    Обігрів водостічної системи
                </a>
                <a href="#">
                    Захист труб від замерзання
                </a>
            </div>
            <div class="catalog-mr-item">
                <div>Нагрівальні мати</div>
                <a href="#">Під плитку</a>
                <a href="#">В стяжку</a>
            </div>
            <div class="catalog-mr-item">
                <div>Терморегулятори</div>
                <a href="#">
                    Сніготанення вуличних майданчиків
                </a>
                <a href="#">
                    Обігрів водостічної системи
                </a>
                <a href="#">
                    Захист труб від замерзання
                </a>
            </div>
        </div>
        <div class="catalog-mr-part">
            <div class="catalog-mr-item">
                <div>Опалення</div>
                <a href="#">
                    Сніготанення вуличних майданчиків
                </a>
                <a href="#">
                    Обігрів водостічної системи
                </a>
                <a href="#">
                    Захист труб від замерзання
                </a>
            </div>
            <div class="catalog-mr-item">
                <div>Технологічний обігрів</div>
                <a href="#">
                    В стяжку
                </a>
            </div>
            <div class="catalog-mr-item">
                <div>Нагрівальні кабелі</div>
                <a href="#">
                    Обігрів водостічної системи
                </a>
                <a href="#">
                    Захист труб від замерзання
                </a>
            </div>
            <div class="catalog-mr-item">
                <div>Додаткове обладнання</div>
                <a href="#">
                    Обігрів водостічної системи
                </a>
                <a href="#">
                    Захист труб від замерзання
                </a>
            </div>
        </div>
    </div>
</div>

<!------- Окно бургер меню ------->

<div class="burger-menu" id="burger-menu">
    <div class="burger-menu-top d-flex jcsb aic">
        <img src="images/logo-foot.svg" alt="">
        <button class="burger-menu-catalog" id="burger-menu-catalog">
            <img src="images/menu-left.svg" alt="">
            <nobr>Каталог продукції
        </button>
        <div id="burger-close" class="burger-close">
            <img src="images/close.svg" alt="">
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
        <a href="<?=Url::to(['news'])?>">Новини</a>
        <a href="service.html">Сервіс та обслуговування</a>
        <a href="techinfo.html">Технічна інформація</a>
        <a href="designers.html">Дизайнерам та архітекторам</a>
        <a href="company.html">Компанія</a>
    </div>
    <div class="burger-menu-bottom">
        <div class="d-flex">
            <div class="burger-menu-bottom-links1">
                <a href="tel:+380967246400">
                    <img src="images/kyivstar.svg" alt="">
                    +38 096 724 64 00
                </a><br>
                <a href="tel:+380997246400">
                    <img src="images/vodafone.svg" alt="">
                    +38 099 724 64 00
                </a>
            </div>
            <div class="burger-menu-bottom-links2">
                <a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a>
                <div>
                    м. Київ, вул. В. Хвойки, 10, оф. 3
                </div>
            </div>
        </div>
        <div class="burger-menu-bottom-social">
            <a href="#"><img src="images/fb-blue.svg" alt=""></a>
            <a href="#"><img src="images/insta-blue.svg" alt=""></a>
            <a href="#"><img src="images/in-blue.svg" alt=""></a>
        </div>
    </div>
</div>

<!------- Модальные окна ------->

<div class="modal-bcg" id="modal-bcg">

    <!------- Окно поиск ------->

    <div class="search" id="search">
        <form action="">
            <input type="text" class="search-text">
            <label for="submit" class="search-img">
                <input type="submit" id="search-submit">
            </label>
        </form>
    </div>

    <!------- Окно каталог большой ------->
    <div class="catalog" id="catalog">
        <div class="d-flex">
            <div class="catalog-left">
                <button>
                    Тепла підлога
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Опалення
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Вуличні системи
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Технологічний обігрів
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Нагрівальні мати
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Нагрівальні кабелі
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Терморегулятори
                    <img src="images/arrow-orange.svg" alt="">
                </button>
                <button>
                    Додаткове обладнання
                    <img src="images/arrow-orange.svg" alt="">
                </button>
            </div>
            <div class="catalog-right">
                <a href="catalog.html">
                    Сніготанення вуличних майданчиків
                </a>
                <a href="catalog.html">
                    Обігрів водостічної системи
                </a>
                <a href="catalog.html">
                    Захист труб від замерзання
                </a>
                <div id="catalog-close" class="catalog-close"></div>
            </div>
        </div>
    </div>

</div>

<!------- proposition ------->



<!------- Хедер ------->

<header>

    <!-- Хедер большой -->

    <div class="block header-hr">

        <div class="head-top d-flex jcsb">
            <div class="head-top-left">
                <a href="<?=Url::to(['news'])?>">Новини</a>
                <a href="<?=Url::to(['service'])?>">Сервіс та обслуговування</a>
                <a href="<?=Url::to(['techinfo'])?>">Технічна інформація</a>
                <a href="<?=Url::to(['designers'])?>">Дизайнерам та архітекторам</a>
                <a href="<?=Url::to(['about'])?>">Компанія</a>
                <a href="<?=Url::to(['search'])?>">search</a>
            </div>
            <div class="head-top-right">
                <a href="#"><img src="images/fb-blue.svg" alt=""></a>
                <a href="#"><img src="images/insta-blue.svg" alt=""></a>
                <a href="#"><img src="images/in-blue.svg" alt=""></a>
            </div>
        </div>

        <div class="head-down d-flex jcsb aic">
            <div class="d-flex aic">
                <a href="<?=Url::to(['/'])?>">
                    <div class="d-flex logo-head">
                        <div>
                            <img src="images/logo-head.svg" alt="">
                        </div>
                        <div>
                            <p>Smart</p>
                            <p>Heating</p>
                            <p>Solutions</p>
                        </div>
                    </div>
                </a>
                <div class="d-flex head-phones aic">
                    <a href="tel:+380967246400">
                        <img src="images/kyivstar.svg" alt="">
                        +38 096 724 64 00
                    </a>
                    <a href="tel:+380997246400">
                        <img src="images/vodafone.svg" alt="">
                        +38 099 724 64 00
                    </a>
                </div>
                <div class="d-flex head-info">
                    <a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a>
                    <div>м. Київ, вул. В. Хвойки, 10, оф. 3</div>
                </div>
            </div>
            <div class="d-flex">
                <button class="search-btn" id="search-btn">
                    <img src="images/search.svg" alt="">
                    Пошук
                </button>
                <button class="catalog-button" id="catalog-button">
                    <img src="images/menu-left.svg" alt="">
                    Каталог продукції
                </button>
            </div>
        </div>
    </div>

    <!-- Хедер средний -->

    <div class="block header-mr">
        <div class="head-mr-top d-flex">
            <a href="tel:+380967246400">
                <img src="images/kyivstar.svg" alt="">
                +38 096 724 64 00
            </a>
            <a href="tel:+380997246400">
                <img src="images/vodafone.svg" alt="">
                +38 099 724 64 00
            </a>
        </div>
        <div class="head-mr-bottom d-flex jcsb aic">
            <a href="<?=Url::to(['/'])?>">
                <div class="d-flex logo-head">
                    <div>
                        <img src="images/logo-head.svg" alt="">
                    </div>
                    <div>
                        <p>Smart</p>
                        <p>Heating</p>
                        <p>Solutions</p>
                    </div>
                </div>
            </a>
            <button class="head-mr-bottom-search"
                    id="head-mr-search">
                <img src="images/search.svg" alt="">
            </button>
            <button class="catalog-button-mr" id="catalog-button-mr">
                <img src="images/menu-left.svg" alt="">
                Каталог продукції
            </button>
            <button class="head-mr-bottom-burger" id="head-mr-burger">
                <img src="images/burger.svg" alt="">
            </button>
            <button class="head-ms-burger d-flex aic"
                    id="head-ms-burger">
                <img src="images/burger.svg" alt="">
                Меню
            </button>
        </div>
    </div>
</header>

<!------- Секция 1 ------->

<?= $content ?>

<!------- Футер ------->

<footer>
    <div class="d-flex">

        <div class="foot-left">
            <div class="foot-left-block">
                <div class="foot-logo">
                    <img src="images/logo-foot.svg" alt="">
                </div>
                <h6>Контакти</h6>
                <p>м. Київ, вул. В. Хвойки, 10, оф. 3</p>
                <a href="tel:+380967246400">
                    <img src="images/kyivstar.svg" alt="">
                    +38 096 724 64 00
                </a>
                <a href="tel:+380997246400">
                    <img src="images/vodafone.svg" alt="">
                    +38 099 724 64 00
                </a>
                <a href="tel:+380937246400">
                    <img src="images/lifecell.svg" alt="">
                    +38 093 724 64 00
                </a>
                <a href="mailto:office@comfortheat.kiev.ua" class="foot-mail">office@comfortheat.kiev.ua
                </a>
                <div class="d-flex foot-social">
                    <a href="#"><img src="images/fb-white.svg" alt=""></a>
                    <a href="#"><img src="images/insta-white.svg" alt=""></a>
                    <a href="#"><img src="images/in-white.svg" alt=""></a>
                </div>
                <div class="d-flex foot-links">
                    <a href="news.html">Новини</a>
                    <a href="service.html">Сервіс та обслуговування</a>
                    <a href="techinfo.html">Технічна інформація</a>
                    <a href="designers.html">Дизайнерам та архітекторам</a>
                    <a href="company.html">Компанія</a>
                </div>
            </div>
        </div>

        <div class="foot-right">
            <img src="images/map.svg" alt="">
        </div>
    </div>
    <div class="foot-down d-flex">
        <div>
            © Comfort Heat - офіційний дистриб'ютор
        </div>
        <div>
            <img src="images/ingsot.svg" alt="">
            Розроблено в Ingsot
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

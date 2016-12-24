<?php
use yii\helpers\Url;
?>


<section class="footer">
    <h1><b>Rubon—</b> сайт объявлений. </h1>
    <div class="container">
        <p>Бесплатные объявления на Rubon.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую, сможете разместить объявление на любую необходимую тематику легко и абсолютно бесплатно. С помощью сайта объявлений Olx Украина вы сможете купить или продать из рук в руки практически все, что угодно.</p>
        <div class="footer__left">
            <a href="/" class="logo-icon">
                <img src="/img/Logotip_RUBON.png" alt="">
            </a>

        </div>
        <div class="footer__right">
            <ul class="column-footer">
                <li><a href="<?= Url::to(['/help']) ?>">Помощь</a></li>
                <li><a href="">Топ объявления</a></li>
                <li><a href="">Магазины</a></li>
                <li><a href="">Платные услуги</a></li>
                <li><a href="">Реклама на сайте</a></li>
            </ul>
            <ul class="column-footer">
                <li><a href="">Как продавать и покупать?</a></li>
                <li><a href="">Правила безопастности</a></li>
                <li><a href="">Карта сайта</a></li>
                <li><a href="">Карта регионов</a></li>
                <li><a href="">Популярные запросы</a></li>

            </ul>
            <!-- <div class="mob-version">
                <a href="">
                    <span class="mob-icon">
                        <img src="img/mobilnik.png" alt=""></span>Мобильная версия</a>
            </div> -->
        </div>
    </div>
</section>

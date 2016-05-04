<?php
use yii\helpers\Url;
?>

<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="header__location">
                <p>город: <span>Донецк</span></p>
            </div>
            <div class="header__check">
                <?php

                if(Yii::$app->user->isGuest):
                ?>
                    <a href="#" data-toggle="modal" data-target="#loginForm" class="header__check--enter">войти</a>
                    <a href="<?= Url::toRoute('/registration')?>" class="header__check--enter">регистрация</a>
                <?php else: ?>
                    <a href="#" class="header__check--enter">личный кабинет</a>
                    <a data-method="post" href="/user/logout" class="header__check--enter">Выйти</a>
                <?php endif; ?>

                <a href="#" class="header__check--help">помощь</a>
            </div>
            <!--logo menu-->
            <div class="header__logo">
                <div class="header__logo--img">
                    <img src="/img/logo.png" alt=""/>

                </div>
                <div class="header__logo--menu">
                    <ul>
                        <li><a href="#">НОВЫЕ</a></li>
                        <li><a href="#">СРОЧНО</a></li>
                        <li><a href="#">ОТДАМ ДАРОМ</a></li>
                        <li><a href="#">куда пойти??</a></li>
                    </ul>
                </div>
            </div>
            <!--close logo menu-->
            <!--small menu-->
            <div class="header__menu">
                <!--dropdown button-->
                <div class="header__menu--dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="drop-lines"></span>
                        КАТАЛОГ ПРЕДЛОЖЕНИЙ
                        <span class="drop-arrow"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Действие</a></li>
                        <li><a href="#">Другое действие</a></li>
                        <li><a href="#">Что-то иное</a></li>
                        <li><a href="#">Отдельная ссылка</a></li>
                    </ul>
                </div>
                <!--close dropdown button-->
                <div class="header__menu--search">
                    <form action="">
                        <span class="search__submit"></span>
                        <input class="search__text" type="text" placeholder="ПОИСК">
                    </form>
                </div>
                <div class="header__menu--add">
                    <div class="header__menu--add__shop">
                        <a href="#"><img src="/img/store-i.png" alt="Магазин"/>
                            ДОБАВИТЬ МАГАЗИН</a>
                    </div>
                    <div class="header__menu--add__adv">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="/img/adv-i.png" alt="объявления"/>
                            ПОДАТЬ ОЪЯВЛЕНИЕ</a>
                    </div>
                </div>
            </div>
            <!--close small menu-->
            <!--big menu-->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">
                                    <img src="/img/services-m.png" alt="услуги">
                                    <span>услуги</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/cars-m.png" alt="авто">
                                    <span>авто</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/realty-m.png" alt="недвижимость">
                                    <span>недвижимость</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/job-m.png" alt="работа">
                                    <span>работа</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/togo-m.png" alt="куда пойти">
                                    <span>куда пойти</span></a>
                            </li>
                            <li><a href="#">
                                    <img src="/img/shops-m.png" alt="магазины">
                                    <span>магазины</span></a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!--close big menu-->
        </div>
    </div>
</header>
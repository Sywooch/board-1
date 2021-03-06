<?php
use yii\widgets\LinkPager;
?>
    <?= $this->render('@frontend/modules/adsmanager/views/adsmanager/_sort'); ?>
    <!--<div class="search-map">
        <p><span class="geo-pic"></span>Поиск объявлений на карте <span class="rect-new">new</span></p>
    </div>-->


    <div class="average-ad">
        <?php foreach($ads as $item): ?>
            <div class="average-ad-item">
                <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-item-thumb">
                    <img src="/<?= $item['ads_img'][0]->img_thumb; ?>" alt=""/>
                </a>
                <div class="average-ad-item-content">
                    <span class="average-ad-star"></span>
                    <p class="average-ad-time"><?= \common\classes\DataTime::time($item->dt_update); ?></p>
                    <?php
                    $listcat = \common\classes\AdsCategory::getListCategoryAllInfo($item->category_id, []);
                    $listcat = array_reverse($listcat);
                    $k = 1;
                    foreach($listcat as $val): ?>
                        <a href="<?= \yii\helpers\Url::toRoute(['/all-ads/' . $val->slug]); ?>" class="average-ad-category"><?= $val->name; ?></a>
                        <?= ($k == count($listcat)) ? '' : '<span class="separatorListCategory">|</span>'?>
                        <?php $k++; endforeach ?>

                    <a href="<?= \yii\helpers\Url::to(['/adsmanager/adsmanager/view','slug' => $item->slug])?>" class="average-ad-title"><?= $item->title; ?></a>
                    <p class="average-ad-geo">
                        <span class="geo-space"></span>
                        <a class="addressAds" href=""><?= $item['geobase_region'][0]->name; ?> | </a>
                        <a class="addressAds" href=""><?= $item['geobase_city']->name; ?></a>
                    </p>
                            <span class="average-ad-price"><?= $item->price; ?>
                                <span class="rubl-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 64.002 64.002">
                                          <path d="M54.628,9.375c-6.044-6.045-14.08-9.374-22.627-9.374c-8.548,0-16.583,3.329-22.627,9.374C3.329,15.419,0,23.454,0,32.001
                                            s3.329,16.582,9.374,22.626c6.044,6.045,14.079,9.374,22.627,9.374c8.547,0,16.583-3.329,22.627-9.374
                                            c6.045-6.044,9.374-14.079,9.374-22.626S60.673,15.419,54.628,9.375z M53.214,53.213c-5.666,5.667-13.2,8.788-21.213,8.788
                                            c-8.014,0-15.547-3.121-21.213-8.788C5.121,47.547,2,40.014,2,32.001s3.121-15.546,8.788-21.212
                                            c5.666-5.667,13.199-8.788,21.213-8.788c8.013,0,15.547,3.121,21.213,8.788c5.667,5.666,8.788,13.199,8.788,21.212
                                            S58.881,47.547,53.214,53.213z"/>
                                          <path d="M31.001,16.001h-6h-1H23v18h-4v2L23,36v4.001h-4v2h4v6h2v-6h7v-2h-7v-4.002l5.909-0.002
                                            c0.054,0.005,0.392,0.033,0.923,0.033c1.749,0,5.594-0.308,8.304-2.784c1.9-1.735,2.864-4.173,2.864-7.245s-0.964-5.51-2.864-7.245
                                            C36.603,15.527,31.14,15.983,31.001,16.001z M38.796,31.763c-2.875,2.633-7.655,2.248-7.795,2.238H25V18l6.091-0.003
                                            c0.047-0.005,4.806-0.403,7.696,2.235c1.469,1.341,2.213,3.283,2.213,5.769C41.001,28.483,40.259,30.422,38.796,31.763z"/>
                                      </svg>
                                </span>
                            </span>
                </div>
            </div>
        <?php endforeach; ?>


        <!-- <div class="average-ad-item">
             <a href="" class="average-ad-item-thumb">
                 <img src="img/adpic-2.png" alt=""/>
             </a>
             <div class="average-ad-item-content">
                 <span class="average-ad-star star-icon "></span>
                 <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                 <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                 <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                 <span class="average-ad-price">2 500 000 &#8381;</span>
             </div>
         </div>
         <div class="average-ad-item">
             <a href="" class="average-ad-item-thumb">
                 <img src="img/adpic-3.png" alt=""/>
             </a>
             <div class="average-ad-item-content">
                 <span class="average-ad-star star-icon "></span>
                 <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                 <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                 <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                 <span class="average-ad-price">5 500 000 &#8381;</span>
             </div>
         </div>
         <div class="average-ad-item">
             <a href="" class="average-ad-item-thumb">
                 <img src="img/adpic-2.png" alt=""/>
             </a>
             <div class="average-ad-item-content">
                 <span class="average-ad-star star-icon "></span>
                 <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                 <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                 <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                 <span class="average-ad-price">2 500 000 &#8381;</span>
             </div>
         </div>
         <div class="average-ad-item">
             <a href="" class="average-ad-item-thumb">
                 <img src="img/adpic-1.png" alt=""/>
             </a>
             <div class="average-ad-item-content">
                 <span class="average-ad-star star-icon "></span>
                 <p class="average-ad-time">Сегодня 20:00</p><a href="" class="average-ad-category">Квартиры</a><a href="" class="average-ad-category">Недвижимость</a>
                 <a href="" class="average-ad-title">2-х комнатная квартира, 63 м², 2/5 этаж</a>
                 <p class="average-ad-geo"> <span class="geo-space"></span>Речной вокзал 1.9 км, ул. Дыбенко д.16 корп.1</p>
                 <span class="average-ad-price">2 500 000 &#8381;</span>
             </div>
         </div>-->
    </div>
    <div class="vip-ad">
        <h2 class="title-vip-ad">VIP - объявления</h2>
        <div class="vip-ad-item">
            <a href="" class="vip-ad-item-thumb">
                <img src="img/vip-adpic-1.png" alt=""/>
            </a>
            <span class="vip-ad-star star-icon "></span>
            <div class="vip-ad-item-content">
                <a href="" class="vip-ad-title">3-к квартира, 65 м², 4/9 эт.</a>
                <p class="vip-ad-geo"> <span class="vip-geo-space"></span>р-н Пролетарский</p>
                <span class="vip-ad-price">2 500 000 &#8381;</span>
            </div>
        </div>
        <div class="vip-ad-item">
            <a href="" class="vip-ad-item-thumb">
                <img src="img/vip-adpic-2.png" alt=""/>
            </a>
            <span class="vip-ad-star star-icon "></span>
            <div class="vip-ad-item-content">
                <a href="" class="vip-ad-title">3-к квартира, 65 м², 4/9 эт.</a>
                <p class="vip-ad-geo"> <span class="vip-geo-space"></span>Тольятти</p>
                <span class="vip-ad-price">2 500 000 &#8381;</span>
            </div>
        </div>
        <a href="" class="whatisVIP">Что такое VIP - объявления?</a>
    </div>
    <div class="pagination">
        <?= LinkPager::widget(
            [
                'pagination' => $pagination,
                'options' => [
                    'class' => '',
                ],
                'prevPageCssClass' => 'pagination-prew',
                'nextPageCssClass' => 'pagination-next',
                'prevPageLabel' => '',
                'nextPageLabel' => '',
                'activePageCssClass' => 'active',

            ]) ?>
    </div>
    <!--<div class="pagination">
        <ul>
            <li class="pagination-prew"></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">18</a></li>
            <li class="pagination-next"></li>
        </ul>
    </div>-->
    <div class="link-category-ad">
        <div class="link-category-ad-item">
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>

        </div>
        <div class="link-category-ad-item">
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>

        </div>
        <div class="link-category-ad-item">
            <h4 class="link-category-ad-item-title">Транспорт</h4>
            <ul class="link-category-ad-item-column">
                <li><a href="">Автомобили</a></li>
                <li><a href="">Мотоциклы</a></li>
                <li><a href="">Грузовики</a></li>
                <li><a href="">Водный транспорт</a></li>
                <li><a href="">Запчасти</a></li>

            </ul>
        </div>
    </div>
    <div class="seo-text">
        <p>Бесплатные объявления России на Bixti.ru - здесь вы найдете то, что искали! Нажав на кнопку "Подать объявление", вы перейдете на форму, заполнив которую сможете разместить объявление на любую необходимую тематику абсолютно бесплатно и легко. С помощью сайта объявлений Bixti.ru вы можете купить или продать из рук в руки практически все, что угодно</p>
    </div>

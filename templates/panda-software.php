<?php
/*
Template Name: стр. panda-software
Template Post Type: page
*/
$bodyClass = 'panda-page';
$divClass = 'bg_panda-gradient';
get_header();
?>
	<section class="panda_info">
        <div class="wrapper container">
            <div class="section_title__holder"> 
                <h1>Оптимизируйте свой Google Shopping на основе ROI и данных прибыли/убытков</h1>
                <p>Panda ppc micro management помогает создать отчет с ROI и данными о Прибыльности каждого продукта</p>
            </div>
            <div class="panda_info__banner">
                <?php
                    $img = get_post_meta($post->ID, 'image', true);
                    $imgLinkFull = wp_get_attachment_image_url($img, 'full', true);
                    $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700', true);
                ?>
                <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Panda banner">
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                </a>
            </div>
            <h3 class="panda_info__formula">Google Ads + Merchant + маржинальность =<br>отчеты на уровне товаров с ROI и прибыльностью</h3>
            <div class="section_link__holder">
                <a href="https://panda4ppc.com/ru/zapros-na-demo/" class="section_link panda_info__link">Заказать демо-версию</a>
            </div>
        </div>
    </section>

  <section class="panda-features">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>Полезные функции Panda</h2>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <div class="panda-features_banner__holder">
                        <img src="<?php echo REL_ASSETS_URI ?>img/panda-software/panda_features__banner.png" alt="" class="img-responsive img-width">
                    </div>
                </div>
                <div class="col-md-7 col-lg-7">
                    <ul class="panda-features_list">
                        <li class="panda-features_item">
                            <h3>Загрузка маржинальности</h3>
                            <p>После загрузки маржи вы получаете отчет прибыли/убытка по каждому товару</p>
                        </li>
                        <li class="panda-features_item">
                            <h3><b>Автоматический</b> расчет Target CPC</h3>
                            <p>
                            	Система сама считает Target CPC на основе нормы инвестиций<br>Target CPC = цена товара * маржа * коэф.конверсий * норма инвестиций
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Учет предыдущих данных</h3>
                            <p>
                            	Раньше вы делали оптимизацию на основе ROAS? Проверьте ваши исторические данные и узнайте эффективность прошлых торговых кампаний.
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Рекомендации</h3>
                            <p>
                            	Panda дает дельные советы, что делать с каждым из товаров, учитывая вашу заинтересованность в ROI и прибыли.
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Быстрые сводки отчетов</h3>
                            <p>
                            	Дашборды помогают быстро получить информацию про текущий статус всех кампаний
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>


	<section class="panda-works">
	    <div class="wrapper container">
	        <div class="section_title__holder">
	            <h2>Как это работает?</h2>
	        </div>
	        <div class="panda-works_scheme">
	            <div class="scheme_row">
	                <div class="scheme_item scheme_item__1">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__add"></span>
	                    </div>
	                    <p class="scheme_text">
	                        Добавьте новый проект
	                    </p>
	                </div>
	                <div class="scheme_item scheme_item__2">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__link"></span>
	                    </div>
	                    <p class="scheme_text">
	                        Свяжите ваши аккаунты Ads и Merchant Centre
	                    </p>
	                </div>
	                <div class="scheme_item scheme_item__3">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__report"></span>
	                    </div>
	                    <p class="scheme_text">
	                        Выберите тип отчета
	                    </p>
	                </div>
	                <div class="scheme_row__bg_white"></div>
	            </div>
	            <div class="scheme_row">
	                <div class="scheme_item scheme_item__4">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__choose"></span>
	                    </div>
	                    <p class="scheme_text">
	                        Выберите кампанию
	                    </p>
	                </div>
	                <div class="scheme_item scheme_item__5">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__margin"></span>
	                    </div>
	                    <p class="scheme_text">
	                       Добавьте в отчет маржинальность
	                    </p>
	                </div>
	                <div class="scheme_item scheme_item__6">
	                    <div class="scheme_icon__holder">
	                        <span class="scheme_icon scheme_icon__achieve"></span>
	                    </div>
	                    <p class="scheme_text">
	                        Получите рекомендации для ставок
	                    </p>
	                </div>
	                <div class="scheme_row__bg_white"></div>
	            </div>

	        </div>
	        <div class="section_link__holder">
	            <a href="https://panda4ppc.com/ru/zapros-na-demo/" class="section_link panda-work__link">Заказать демо-версию</a>
	        </div>
	    </div>
	</section>



<?php get_footer(); ?>
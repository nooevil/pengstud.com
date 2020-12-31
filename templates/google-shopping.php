<?php
/*
Template Name: стр. google-shopping
Template Post Type: page
*/
$bodyClass = 'shopping-page shopping-page_ru';
$divClass = 'first_gradient';
get_header();
?>



  <section class="profit">
    <div class="profit_bg wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0">
    </div>
    <div class="profit_bg__mobile">
      <div class="wrapper container">
        <img src="<?php echo REL_ASSETS_URI ?>img/en/profit_banner.png" alt="" class="img-responsive img-width">
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-md-6">
          <div class="section_title__holder">
            <h1 class="title">Управление торговыми кампаниями с фокусом на ROI и прибыли</h1>
          </div>
          <div class="profit_link__holder">
              <a href="#" class="section_link profit_link" data-simple_modal="modal1">Бесплатный анализ</a>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 d-md-block d-none">
          <img src="<?php echo REL_ASSETS_URI ?>img/google-shopping/comp.png" alt="" class="example_img__mobile img-responsive img-width">
        </div>
      </div>
    </div>
    </section>
  <section class="shopping">
        <div class="shopping_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Профессиональное управление Google Shopping
                </h2>
                <h3>
                    В профессиональное управление Google Shopping от Penguin-team входит:
                </h3>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-4 d-lg-block d-none">
          <img src="<?php echo REL_ASSETS_URI ?>img/google-shopping/phon.png" alt="" class="example_img__mobile img-responsive img-width">
              </div>
                <div class="col-lg-8">
                    <ul class="shopping_list">
                        <li class="shopping_item">
                            <span class="shopping_item__num">1</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Создание и оптимизация продуктового фида:
                                </h3>
                                <p class="shopping_item__text">
                                    улучшение тайтлов, описаний и других атрибутов, чтобы реклама была более результативной.
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">2</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Создание и оптимизация торговых кампаний Google Shopping:
                                </h3>
                                <p class="shopping_item__text">
                                    создание подходящей бизнесу структуры, которая обеспечит высокий потенциал для масштабирования и управления.
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">3</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Микро-менеджмент ставок:
                                </h3>
                                <p class="shopping_item__text">
                                    сервис Panda от Penguin-team помогает РРС-специалистам управлять ставками, опираясь на ROI и прибыль.
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">4</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Оптимизация поисковых запросов и минус-слов:
                                </h3>
                                <p class="shopping_item__text">
                                    инструмент NegativeKeywords tool от  Penguin-team и скрипты Google Ads помогают более эффективно работать с запросами и минус-словами.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="section_link shopping_link" data-simple_modal="modal1">Заказать аудит</a>
                </div>
            </div>
        </div>
    </section>
  <section class="possibilities">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>Помогаем масштабировать Shopping, используя все возможности</h2>
            </div>
            <div class="possibilities_banner__holder">
                <?php
                    $img = get_post_meta($post->ID, 'image', true);
                    $imgLinkFull = wp_get_attachment_image_url($img, 'full');
                    $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700');
                ?>
                <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Possibilities banner">
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                </a>
            </div>
            <ul class="possibilities_list">
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                        <h3 class="possibilities_item__title">
                        Динамический ремаркетинг
                        </h3>
                        <p class="possibilities_item__text">(после PLA увеличивает количество транзакций в магазине)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                        <h3 class="possibilities_item__title">
                            Продуктовые поисковые кампании
                        </h3>
                        <p class="possibilities_item__text">(также могут принести больше продаж)</p>
                    </div>
                </li>
                <?php /*  ?>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                        <h3 class="possibilities_item__title">
                            Добавление рекламных кампаний Bing
                        </h3>
                        <p class="possibilities_item__text">(может дать + 10-20% к выручке в некоторых случаях)</p>
                    </div>
                </li>
                <?php */ ?>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                        <h3 class="possibilities_item__title">
                            Поведенческий ремаркетинг
                        </h3>
                        <p class="possibilities_item__text">(помогает выстроить отношения с пользователями и провести их по воронке продаж)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                        <h3 class="possibilities_item__title">
                            Добавление DSA
                        </h3>
                        <p class="possibilities_item__text">(динамических поисковых объявлений) для увеличения трафика и количества транзакций.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>
<div class="second_gradient">
  <section class="management-1">
    <div class="management_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
    <div class="wrapper container">
      <div class="section_title__holder">
        <h2 class="first_title">
          Почему это дает отличный результат нашим клиентам?
        </h2>
        <h2 class="second_title">
          Потому что мы используем <b>микро-менеджмент</b> ставок на основе ROI и прибыли
        </h2>
      </div>
      <p class="management_text">
        Мы часто видим, как рекламодатели используют ROAS в качестве основной метрики успешности торговых кампаний и управляют ставками на основе ROAS. По нашему опыту это часто приводит к малозаметным, но серьезным для бизнеса ошибкам.
      </p>
      <div class="management_example">
        <div class="row align-items-center mt-5">
          <div class="col-md-7 col-lg-8 mb-4 mb-md-0">
            <img src="<?php echo REL_ASSETS_URI ?>img/google-shopping/tablet.png" alt="" class="example_img__mobile img-responsive img-width">
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="management_example__content">
              <h3 class="management_example__title">
                К примеру:
              </h3>
              <p class="management_example__text">
                У нас есть торговая кампания для кроссовок New Balance. Она дает такие результаты:
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="management_table__holder">
        <table class="management_table">
          <tr>
            <th>Клики</th>
            <th>CPC, $</th>
            <th>Транзакции</th>
            <th>Цена, $</th>
            <th>Выручка, $</th>
            <th>ROAS</th>
          </tr>
          <tr>
            <td>79</td>
            <td>1.34</td>
            <td>5</td>
            <td>106</td>
            <td>225</td>
            <td>212%</td>
          </tr>
        </table>
      </div>
      <p class="management_text">
        На первый взгляд все отлично. Google советует увеличить ставку до 1,7$, потому что наша реклама показывает неплохой результат, а многие рекламодатели так делают.
      </p>
      <p class="management_text">
        Но если добавить к этим данным маржинальность, мы получим совершенно другую картину:
      </p>
      <div class="management_table__holder">
        <table class="management_table">
          <tr>
            <th>Клики</th>
            <th>CPC, $</th>
            <th>Транзакции</th>
            <th>Цена, $</th>
            <th>Выручка, $</th>
            <th class="th_orange">Маржа</th>
            <th>ROAS</th>
            <th class="th_orange">Прибыль, $</th>
            <th class="th_orange">ROI</th>
          </tr>
          <tr>
            <td>79</td>
            <td>1.34</td>
            <td>5</td>
            <td>106</td>
            <td>225</td>
            <td>35%</td>
            <td>212%</td>
            <td>-27.25</td>
            <td>-26%</td>
          </tr>
        </table>
      </div>
      <p class="management_text">
        Посмотрите, увеличение ставок тут принесет одни убытки! Чтобы такого не было, мы используем вот такую формулу для установки эффективных ставок:
      </p>
      <p class="management_equation">
        Для кроссовок New Balance Target CPC будет таким:
      </p>
      <p class="management_equation">
        Target CPC = 45$ * 35% * 6,3% * 75% = 0,74$
      </p>
      <p class="management_text">
        Если использовать эту ставку, результаты кампании будут вот такими:
      </p>
      <div class="management_table__holder">
        <table class="management_table">
          <tr>
            <th>Клики</th>
            <th>CPC, $</th>
            <th>Транзакции</th>
            <th>Цена, $</th>
            <th>Выручка, $</th>
            <th class="th_orange">Маржа</th>
            <th>ROAS</th>
            <th class="th_orange">Прибыль, $</th>
            <th class="th_orange">ROI</th>
          </tr>
          <tr>
            <td>79</td>
            <td>0.74</td>
            <td>5</td>
            <td>58.46</td>
            <td>225</td>
            <td>35%</td>
            <td>384%</td>
            <td>20.29</td>
            <td>34.6%</td>
          </tr>
        </table>
      </div>
      <p class="management_text">
        Имея на руках такие данные, рекламодатель может вывести ROI в плюс и получить прибыль. Полезно, правда?
      </p>
      <p class="management_text">
        Часто такая оптимизация ставок работает лучше, чем ориентир на  ROAS и советы Google.
      </p>
      <div class="management_hover__box">
        <div class="management_hover__img_holder">
            <?php
            $img = get_post_meta($post->ID, 'screen', true);
            $imgLinkFull = wp_get_attachment_image_url($img, 'full');
            $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700');
            ?>
          <!--<img src="img/management_hover_2.png" alt="" class="img-responsive img-width">-->
          <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Hover box">
            <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
          </a>
        </div>
        <div class="management_hover__content">
          <h3 class="management_hover__text">
            Этот подход требует кропотливой работы над каждым товаром и занимает тонну времени. Мы называем это микро-менеджментом в РРС. Для упрощения процесса мы разработали Panda — инструмент, который экономит время и силы и помогает каждому нашему клиенту грамотно назначать ставки.
          </h3>
        </div>
      </div>
      <div class="col-lg-12 d-flex justify-content-center">
        <a href="#" class="section_link management_link" data-simple_modal="modal1">Заказать аудит</a>
      </div>
    </div>
  </section>
  <section class="cases">
    <div class="wrapper container">
      <div class="section_title__holder">
        <h2>
          Наши кейсы
        </h2>
      </div>

        <?php
        $args = array(
            'post_type' => 'blog',
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'topic',
                    'field' => 'term_id',
                    'terms' => 4,
                )
            ),
            'meta_query'     => array(
                array(
                    'key'   => 'showCase',
                    'value' => 'on'
                )
            ),
        );
        $cases = get_posts($args);

        ?>

      <div class="cases_tab__holder">
        <div class="row align-items-center">
          <div class="col-lg-3">
            <div class="slider-nav">
                <?php foreach ($cases as $case) :?>
                  <div class="slider-nav__slide">
                    <div class="slider-nav__title">
                        <?php
                        $imgUnactive = get_post_meta($case->ID, 'icon', true);
                        $imgUnactiveLink = wp_get_attachment_image_url($imgUnactive, '50_50');
                        $imgActive = get_post_meta($case->ID, 'iconActive', true);
                        $imgActiveLink = wp_get_attachment_image_url($imgActive, '50_50');
                        ?>
                      <img src="<?php echo $imgActiveLink ?>" class="slider-nav__icon active">
                      <img src="<?php echo $imgUnactiveLink ?>" class="slider-nav__icon">
                      <p class="nav-link_text"><?php echo get_post_meta($case->ID, 'caseName', true); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="slider-for">
                <?php foreach ($cases as $caseItem) :?>
                  <div class="slider-for__slide">
                    <div class="slider-for__slide__content">
                      <h3 class="cases_tab__title">Результат</h3>
                      <table class="cases_tab__table">
                        <tr>
                          <td></td>
                          <td class="result_before">
                            <p>до нашей работы</p>
                            <span><?php echo get_post_meta($caseItem->ID, 'beforeWork', true); ?></span>
                          </td>
                          <td></td>
                          <td class="result_after">
                            <p>наша работа</p>
                            <span><?php echo get_post_meta($caseItem->ID, 'afterWork', true); ?></span>
                          </td>
                        </tr>
                        <tr>
                          <td class="tr_title"><p>ROAS</p></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'beforeROAS', true); ?></td>
                          <td><i class="icon_arrow__right"></i></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'afterROAS', true); ?></td>
                        </tr>
                        <tr>
                          <td class="tr_title"><p>Конверсии</p></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'beforeConversion', true); ?></td>
                          <td><i class="icon_arrow__right"></i></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'afterConversion', true); ?></td>
                        </tr>
                        <tr>
                          <td class="tr_title">
                            <p>
                              ROMI<br>
                              <span>(Shopping)</span>
                            </p>
                          </td>
                          <td><?php echo get_post_meta($caseItem->ID, 'beforeROMI', true); ?></td>
                          <td><i class="icon_arrow__right"></i></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'afterROMI', true); ?></td>
                        </tr>
                        <tr>
                          <td class="tr_title">
                            <p>
                              Прибыль с кампании<br>
                              <span>(Shopping)</span>
                            </p>
                          </td>
                          <td><?php echo get_post_meta($caseItem->ID, 'beforeNetProfit', true); ?></td>
                          <td><i class="icon_arrow__right"></i></td>
                          <td><?php echo get_post_meta($caseItem->ID, 'afterNetProfit', true); ?></td>
                        </tr>
                      </table>
                      <div class="cases_tab__link_holder">
                        <a href="<?php echo the_permalink($caseItem) ?>" target="_blank" class="cases_tab__link">Хочу знать больше</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>



            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!--   <section class="prices">
  	<div class="wrapper container">
  		<div class="section_title__holder">
        	<h2>
          		Стоимость услуг
        	</h2>
      	</div>
      	<div class="row justify-content-center align-items-center">
	      	<div class="col-lg-9">
	      		<table class="prices_tab__table">
	                <tr>
	                	<th>Выполняемая работа</th>
	                	<th>Малый магазин<br>(от 100 до 5 000 товаров)</th>
	                	<th>Средний магазин<br>(от 5 000 до 50 000 товаров)</th>
	                </tr>
	                <tr>
	                	<td>Аудит рекламного кабинета</td>
	                	<td>бесплатно</td>
	                	<td>бесплатно</td>
	                </tr>
	                <tr>
	                	<td>Составление стратегии и плана работ</td>
	                	<td>5 часов</td>
	                	<td>10 часов</td>
	                </tr>
	                <tr>
	                	<td>Создание/оптимизация фида</td>
	                	<td>4-6 часов</td>
	                	<td>4-10 часов</td>
	                </tr>
	                <tr>
	                	<td>Создание/оптимизация торговых кампаний</td>
	                	<td>3 часа</td>
	                	<td>6 часов</td>
	                </tr>
	                <tr>
	                	<td>Корректировка работы аккаунта в течении 1 месяца</td>
	                	<td>6 часов</td>
	                	<td>10 часов</td>
	                </tr>
	                <tr>
	                	<td>Стоимость</td>
	                	<td class="td_orange">$300</td>
	                	<td class="td_orange">$500</td>
	                </tr>                                                                                                
	            </table>
	      	</div>
      	</div>
	    <div class="col-lg-12 d-flex justify-content-center">
	        <a href="#" class="section_link management_link" data-simple_modal="modal1">Заказать аудит</a>
	    </div>	
  	</div>	
  </section> -->	
  <section class="google">
    <div class="wrapper container">
      <div class="google_content">
        <div class="row align-items-center">
          <div class="col-lg">
            <h3 class="google_info">
              Penguin-team — Premier Google Partner Agency с 2017 года. Помогаем рекламодателям получать лучшие результаты в Поиске и КМС.
            </h3>
          </div>
          <div class="col-lg-auto mt-lg-2 mt-0">
            <div class="google_logo__holder">
              <a href="<?php echo REL_ASSETS_URI ?>img/en/google_logo.jpg" data-fancybox data-caption="Google">
                <img class="img-responsive img-width" src="<?php echo REL_ASSETS_URI ?>img/en/google_logo.png" alt=""/>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="feedback mt-5 mb-5">
    <div class="wrapper container">
      <form method="post" class="feedback_form wps_form_js">
        <input type="hidden" name="form_subject"  value="Get Free Analysis Shopping">
        <input type="hidden" name="form_title"    value="Get Free Analysis Shopping">
        <input type="hidden" name="form_redirect" value="spasibo-chto-ostavili-zayavku-na-google-shopping/">
        <h3 class="feedback_form__title">Бесплатный анализ торговых кампаний Google Shopping</h3>
        <p class="feedback_form__text">
          Закажите бесплатный анализ ROI и прибыльности ваших торговых кампаний в Google Shopping. Узнай, как Penguin-team может помочь улучшить работу
          <br>Google Ads у вас.
        </p>
        <div class="feedback_form__row">
          <div class="feedback_form__input_holder">
            <input type="text" name="Name" placeholder="Имя" required>
          </div>
          <div class="feedback_form__input_holder">
            <input type="text" name="Company" placeholder="Компания" required>
          </div>
        </div>
        <div class="feedback_form__row">
          <div class="feedback_form__input_holder">
            <input type="email" name="Email" placeholder="Корпоративный E-mail" required>
          </div>
          <div class="feedback_form__input_holder">
            <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
          </div>
        </div>
        <div class="feedback_form__textarea_holder">
          <textarea name="Message" placeholder="Сообщение"></textarea>
        </div>
        <div class="feedback_form__submit_holder">
          <button class="feedback_form__submit section_link" type="submit">Заказать аудит</button>
        </div>
      </form>
    </div>
  </section>
</div>

<div class="simpleModalWindowWrap modalCrysisShopping">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow modal_crysis_container">
                <span class="simpleModalWindowClose"></span>
                <div class="modal_crysis__title">
                    <h3>Ваш аккаунт Google Ads готов к кризису? Проверим?</h3>
                    <div class="eliminator"></div>
                </div>
                <div class="modal_crysis__content">
                	<form method="post" class="crysis_form wps_form_js">
	                  <input type="hidden" name="form_subject"  value="Get Free Analysis Shopping">
	                  <input type="hidden" name="form_title"    value="Get Free Analysis Shopping">
	                  <input type="hidden" name="form_redirect" value="thanksup/">
	                  
	                  <div class="crysis_form__input_holder">
	                    <input type="text" name="Name" placeholder="Имя" required>
	                  </div>
	                  <div class="crysis_form__input_holder">
	                    <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
	                  </div>
	                  <div class="crysis_form__input_holder">
	                    <input type="email" name="Email" placeholder="E-mail" required>
	                  </div>
	                  
	                  <div class="crysis_form__submit_holder">
	                    <button class="crysis_form__submit section_link get_analysis_button" type="submit">Хочу аудит!</button>
	                  </div>
	                </form>

	                <div class="modal_crysis_offer">
	                  <div class="modal_crysis_offer_items">
	                    <div class="single_item">
	                      <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_3.png">
	                      <p>Бесплатный аудит</p>
	                    </div>
	                    <div class="single_item">
	                      <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_1.png">        
	                      <p>Маркетинговая и техническая оценка</p>
	                    </div>
	                    <div class="single_item">
	                      <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_2.png">
	                      <p>Советы для роста и оптимизации</p>
	                    </div>
	                  </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="simpleModalWindowWrap modal1">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow feedback_form_holder">
                <span class="simpleModalWindowClose"></span>
                <form method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Analysis Shopping">
                    <input type="hidden" name="form_title"    value="Get Free Analysis Shopping">
                    <input type="hidden" name="form_redirect" value="spasibo-chto-ostavili-zayavku-na-google-shopping/">
                     <p class="feedback_form__title">Бесплатный анализ торговых кампаний Google Shopping</p>
                <p class="feedback_form__text">
                    Закажите бесплатный анализ ROI и прибыльности ваших торговых кампаний в Google Shopping. Узнай, как Penguin-team может помочь улучшить работу Google Ads у вас.
                </p>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Name" placeholder="Имя" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Company" placeholder="Компания" required>
                        </div>
                    </div>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="email" name="Email" placeholder="Корпоративный E-mail" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
                        </div>
                    </div>
                    <div class="feedback_form__textarea_holder">
                        <textarea name="Message" placeholder="Сообщение"></textarea>
                    </div>
                    <div class="feedback_form__submit_holder">
                        <button class="feedback_form__submit section_link" type="submit">Заказать аудит</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		if(sessionStorage.getItem('crysis_modal') !== 'open') {
			setTimeout(() => {
				simpleModal.modalOpen( "modalCrysisShopping" );
				sessionStorage.setItem('crysis_modal', 'open');
			}, 3000)			
		}
	});
</script>

<?php get_footer(); ?>
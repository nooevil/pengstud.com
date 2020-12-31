<?php
	/*
	Template Name: Главная
	Template Post Type: page
	*/
	get_header();
?>

    <section class="home__fscren">
        <div class="wrapper_m container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="home__fscren__show_holder_2">
                        <img src="<?php echo REL_ASSETS_URI; ?>img/home/macbook.png" alt="">
                        <a  class="home__fscren__show_link_2"  data-fancybox="step1" href="<?php echo REL_ASSETS_URI; ?>img/home/panda_workspace.png" ></a>
                        <div class="home__fscren__show_image_2" style="background-image: url('<?php echo REL_ASSETS_URI; ?>img/home/panda_workspace.png')"></div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="home__fscren__text_holder">
                        <div class="home__fscren__text">
                            <h1 class="title small-h1">PPC-инструменты и сервисы.<br>Менеджмент Google Shopping</h1>
                            <p class="subtitle small-subtitle">Настраиваем и оптимизируем<br>кампании Google Ads.<br>
                                Разрабатываем инструменты для<br>
                                автоматизации контекстной рекламы.<br>
                                Создаем полезный контент
                            </p>
	                        <a href="<?php echo REL_ASSETS_URI ?>img/en/google_logo.jpg" data-fancybox data-caption="Google">
	                            <img class="img-responsive img-width partner-logo" src="<?php echo REL_ASSETS_URI ?>img/en/google_logo_cut.png" alt=""/>
	                        </a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home__content pengstud_test">
        <div class="wrapper_m container">
        	<div class="row">
                <div class="col-md-3">
                    <div class="home__content__item">
                        <a href="google-shopping-management/" class="link"></a>
                        <div class="home__content__item__header">
                            <p class="title">Google Shopping</p>
                        </div>
                        <div class="home__content__item__content">
                            <span class="home__content__item_icon home_icon__google"></span>
                            <p class="home__content__item_text">Создаем и оптимизируем торговые кампании. Помогаем с настройками in-house-специалистам</p>
                        </div>
                        <div class="home__content__item__footer">
                            <a href="/google-shopping-management/">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home__content__item">
                        <a href="ppctools/" class="link"></a>
                        <div class="home__content__item__header">
                            <p class="title">PPC-инструменты</p>
                        </div>
                        <div class="home__content__item__content">
                            <span class="home__content__item_icon home_icon__ppc"></span>
                            <p class="home__content__item_text">Разрабатываем скрипты и инструменты для автоматизации PPC-задач: сбора ключей, минус-слов и не только</p>
                        </div>
                        <div class="home__content__item__footer">
                            <a href="ppctools/">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home__content__item">
                        <a href="panda-software/" class="link"></a>
                        <div class="home__content__item__header">
                            <p class="title">Panda Software</p>
                        </div>
                        <div class="home__content__item__content">
                            <span class="home__content__item_icon home_icon__management"></span>
                            <p class="home__content__item_text">Автоматически рассчитывает прибыль и ROI по товару для оптимизации ставок в Shopping</p>
                        </div>
                        <div class="home__content__item__footer">
                            <a href="/panda-software/">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="home__content__item">
                        <a href="blog/" class="link"></a>
                        <div class="home__content__item__header">
                            <p class="title">Блог от экспертов</p>
                        </div>
                        <div class="home__content__item__content">
                            <span class="home__content__item_icon home_icon__content"></span>
                            <p class="home__content__item_text">Гайды по Ads, Analytics, Shopping, GTM, Optimize, Facebook от практикующих PPC-специалистов</p>
                        </div>
                        <div class="home__content__item__footer">
                            <a href="/topic/kontekstnaya-reklama/">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_client pengstud_test">
        <div class="wrapper_m container">
            <div class="row">
                <div class="col-md-12">
                    <div class="our_client__title__holder">
                        <h2>Наши клиенты</h2>
                    </div>
                </div>
            </div>
            	<div class="our_client__wrap">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://dnipro-centre.lexus.ua/" target="_blank">
                            		<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_04.png" alt="">
                            	</a>
                            	<div class="name">Дилер Lexus в Днепре</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://dealer.porsche.com/ukraine/porsche-center-dnipro" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_02.png" alt="">
                                </a>	
                                <div class="name">Дилер Porsche в Днепре</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://nissan-ai.com.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_03.png" alt="">
                                </a>	
                                <div class="name">Дилер Nissan в Днепре</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://www.husqvarna.com/ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_01.png" alt="">
                                </a>
                                <div class="name">Украинский дилер силового оборудования</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://imt.academy/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_07.png" alt="">
                                </a>
                                <div class="name">Школа интернет технологий</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://131.com.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_06.png" alt="">
                                </a> 
                                <div class="name">Интернет-магазин сейфов</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://anuka.com.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_05.png" alt="">
                                </a>
                                <div class="name">Интернет-магазин бытовых товаров</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://park-residence.dp.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/logo_09.png" alt="">
                                </a>
                                <div class="name">Застройщик элитного жилья</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://landrover.dp.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/land-rover-logo.png" alt="">
                                </a>
                                <div class="name">Локальный дилер LandRover</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://hyundai.org.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/hyundai-logo.png" alt="">
                                </a>
                                <div class="name">Hyundai Power products. Силовая техника Hyundai</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://generator.ua/" target="_blank">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/generator-logo.png" alt="">
                                </a>
                                <div class="name">Интернет-магазин генераторов</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="our_client__item">
                            <div class="our_client__logo dynamic_text">
                            	<a href="https://fithaus.com.ua/" target="_blank" style="background-color: #252525; width: 215px">
                                	<img src="<?php echo REL_ASSETS_URI; ?>img/home/clients/fithaus-logo-y.png" alt="">
                                </a>
                                <div class="name">Сеть фитнес-клубов</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home_contact_form__holder">
                <div class="home_contact_form_title">
                    <p class="title">Есть вопросы? <span>Напишите нам</span></p>
                </div>
                <form method="post" class="fn_subscribe__form"> <!-- class="wps_form_js" -->
                    <div class="home_contact_form">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="home_contact_form__row required">
                                    <input class="bitrix_field" type="text" name="first_name" data-name="NAME" placeholder="Имя" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="home_contact_form__row required">
                                    <input class="bitrix_field" type="email" name="email" data-name="EMAIL" placeholder="Email" required >
                                </div>
                            </div>
                        </div>

                        <div class="row mt-30">
                            <div class="col-md-12">
                                <div class="home_contact_form__row required">
                                    <textarea class="bitrix_field" name="comments" data-name="COMMENTS" placeholder="Вопрос" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-30">
                            <div class="col-md-12">
                                <div class="home_contact_form__row">
                                    <button type="submit" class="btn_style_1" >Отправить</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="home_contact_form__row">
                                    <p class="message_success">Отправлено! Ожидайте ответ.</p>
                                </div>
                            </div>
                        </div>

                        <!-- hidden input -->
                        <input class="bitrix_field" type="hidden" name="form_title" data-name="TITLE"  value="Вопрос c главной">
                        <!-- <input type="hidden" name="form_title"    value="С Главной"> -->
                        <!-- <input type="hidden" name="saved" value="yes"> -->
                    </div>
                </form>
            </div>


        </div>
    </section>

<script>
    $(document).ready(function() {
        if(sessionStorage.getItem('crysis_modal') !== 'open') {
            setTimeout(() => {
                simpleModal.modalOpen( "modalCrysis" );
                sessionStorage.setItem('crysis_modal', 'open');
            }, 3000)           
        }
    });
</script>

    
    <?php  if( is_user_logged_in() ) :  ?>

		<?php else : ?>
            <!--<section class="home__fscren">
            <div class="wrapper_m container">
            <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
            <div class="home__fscren__show_holder">
            <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/home_mac.png" alt="">
            <div class="home__fscren__show_image" style="background-image: url('<?php /*echo REL_ASSETS_URI; */?>img/fkw/step_04.gif)">
            </div>
            </div>
            </div>
            <div class="col-lg-5 col-md-6">
            <div class="home__fscren__text_holder">
            <div class="home__fscren__text">
              <h1 class="title">Tools <span>+</span> Content для<br>PPC специалистов<br>и маркетологов</h1>
              <p class="subtitle">Помогаем делать процессы<br>ppc менеджмента продуктивнее<br>и быстрее</p>
              <a href="ppctools/" class="more">Подробнее</a>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
            <section class="home__content">
            <div class="wrapper_m container">
              <div class="row">
                <div class="col-md-6">
                  <div class="home__content__item">
                    <div class="home__content__item__header">
                      <p class="title">Tools</p>
                    </div>
                    <div class="home__content__item__content">
                      <p>инструменты, которые помогут в работе с рекламными кампаниями:</p>
                      <ul>
                        <li>NegativeKeywords tool;</li>
                        <li>UTM генератор;</li>
                        <li>FindKeywords tool.</li>
                      </ul>
                    </div>
                    <div class="home__content__item__footer">
                      <a href="ppctools/">Подробнее</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="home__content__item">
                    <div class="home__content__item__header">
                      <p class="title">Content</p>
                    </div>
                    <div class="home__content__item__content">
                      <p>полезные статьи и гайды для качественных кампаний:</p>
                      <ul>
                        <li>Кейсы;</li>
                        <li>Google Shopping;</li>
                        <li>Оптимизация РК.</li>
                      </ul>
                    </div>
                    <div class="home__content__item__footer">
                      <a href="topic/kontekstnaya-reklama/">Подробнее</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </section>-->
            <!--<section class="our_client">
            <div class="wrapper_m container">
              <div class="row">
                <div class="col-md-12">
                  <div class="our_client__title__holder">
                    <h2>Наши клиенты</h2>
                  </div>
                </div>
              </div>
              <div class="our_client__wrap">
                <div class="our_client__item">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/our_client_01.png" alt="">
                </div>
                <div class="our_client__item">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/our_client_02.png" alt="">
                </div>
                <div class="our_client__item">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/our_client_03.png" alt="">
                </div>
                <div class="our_client__item">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/our_client_04.png" alt="">
                </div>
                <div class="our_client__item">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/our_client_05.png" alt="">
                </div>
              </div>


              <div class="penguin_is__b1">
              <div class="penguin_is__b1__coll penguin_is__b1__coll_l">
                <a href="https://www.google.com.ua/partners/?hl=ru#a_profile;idtf=8752491474" target="_blank">
                  <img src="<?php /*echo REL_ASSETS_URI; */?>img/korporati/decor_logo_2.png" alt="">
                </a>
              </div>
              <div class="penguin_is__b1__coll penguin_is__b1__coll_r">
                <p>За пять лет мы стали Premier Google Partners и сегодня управляем рекламным бюджетом в Google больше, чем </p>
                <p class="penguin_is__b1__num"><span>$90 000</span>/мес.</p>
              </div>
            </div>

            <div class="penguin_is__b4">
              <div class="penguin_is__b4__coll penguin_is__b4__coll_l">
                <img src="<?php /*echo REL_ASSETS_URI; */?>img/home/penguin_is_03.png" alt="">
              </div>
              <div class="penguin_is__b4__coll penguin_is__b4__coll_r">
                <p>У нас в команде 25+ сотрудников. Дизайнеры, менеджеры, маркетологи.</p>
              </div>
            </div>


            <div class="home_contact_form__holder">
              <div class="home_contact_form_title">
                <p class="title">Есть вопросы? <span>Напишите нам</span></p>
              </div>
              <form method="post" class="fn_subscribe__form">
                <div class="home_contact_form">
                  <div class="home_contact_form__row">
                    <input class="bitrix_field" type="text" name="first_name" data-name="NAME" placeholder="Имя" required>
                  </div>
                  <div class="home_contact_form__row">
                    <input class="bitrix_field" type="email" name="email" data-name="EMAIL" placeholder="Email" required >
                  </div>
                  <div class="home_contact_form__row">
                    <textarea class="bitrix_field" name="comments" data-name="COMMENTS" placeholder="Вопрос" required></textarea>
                  </div>
                  <div class="home_contact_form__row">
                    <button type="submit" class="btn_style_1" >Отправить</button>
                  </div>
                  <div class="home_contact_form__row">
                    <p class="message_success">Отправлено! Ожидайте ответ.</p>
                  </div>

                  <input class="bitrix_field" type="hidden" name="form_title" data-name="TITLE"  value="Вопрос c главной">

                </div>
              </form>
            </div>


            </div>
            </section>-->

		<?php endif; ?>

    <?php /* ?>

		<!-- main screen -->
    <section class="main_screen">
      <div class="wrapper">
        <div class="main_screen__layer-1"> 
          <div class="main_screen__video_filter"></div>
          <div class="main_screen__video_holder">
            
          </div>
        </div>
        
        <div class="main_screen__layer-2">
          <div class="table">
           <div class="table-cell">
              <div class="main_screen__title__holder">
                <!-- <img src="wp-content/themes/pengstud_v2/assets/img/korporati/team-logo.png" alt=""> -->
                	<div class="section_title main_screen__section_title">
                		<h1>PENGUIN - ЭТО ИНТЕРНЕТ-МАРКЕТИНГОВОЕ АГЕНТСТВО,<br> КОТОРОЕ ЗАНИМАЕТСЯ РАЗРАБОТКОЙ И ПРОДВИЖЕНИЕМ SUBSCRIBE-ПРОДУКТОВ</h1>
                	</div>
              </div>
            </div>
          </div>
          <div class="btn_below"></div>
        </div>
        
      </div>
    </section>
    <!-- main screen -->

    
		<section class="home1">
      <div class="wrapper">
        <div class="section_title">
          <h3>КОМПЕТЕНЦИИ PENGUIN-TEAM</h3> 
        </div>
        <div class="home1__wrap">
          <div class="home1__coll home1__coll1">
             <a href="kontekst/"><img src="<?php echo REL_ASSETS_URI; ?>img/home/decor_1_1.png" alt="">
            <p>PPC/Маркетинг</p></a>
          </div>
          <div class="home1__coll home1__coll2">
              <a href="korporativnye-sajty/"><img src="<?php echo REL_ASSETS_URI; ?>img/korporati/Group414.png" alt="">
            <p>Разработка проектов</p></a>
          </div>
          <div class="home1__coll home1__coll3">
              <a href="ppctools/"><img src="<?php echo REL_ASSETS_URI; ?>img/home/decor_1_3.png" alt="">
            <p>PPC FEATURES</p></a>
          </div>
        </div>
      </div>
    </section>
    
    <section class="kontekst__b4">
      <div class="wrapper">
        <div class="section_title">
          <h3>Принципы работы компании Penguin-team:</h3> 
        </div>
        
        <div class="kontekst__b4__wrap">
          <div class="kontekst__b4__slider" id="kontekst__b4__slider">
             <div class="kontekst__b4__slide">
               <span class="title">Партнерство</span>
               <p>Penguin-team не является классической аутсорс компанией. Мы ищем партнеров, с которыми можем выстроить долгосрочное сотрудничество.</p> 
               <p>Истинное партнерство начинается с завоевания доверия друг друга и совместной работы для решения сложных проблем с головокружительной скоростью. Мы можем начать работать с вами за комиссию или почасовую оплату, но истинная наша цель - сделать вас нашим партнером и совместно создать прекрасный продукт, который будет лидером в своей нише.</p>
             </div>
             <div class="kontekst__b4__slide">
               <span class="title">Прозрачность</span>
               <p>Работая с нашим партнером, мы открыто показываем информацию о затратах, о команде, которая будет участвовать в работе над проектом. 
               <p>С партнером мы не используем классическую схему "клиент - менеджер - тех.спецы", у клиента есть прямой доступ к любому специалисту, который работает в данный момент над проектом.  Для удобства коммуникации мы используем: Slack, Bitrix24, Trello или TeamWork. Готовы работать по WaterFall или по Scrum.</p>
             </div>
             <div class="kontekst__b4__slide">
               <span class="title">Честность</span>
               <p>Полная честность - единственный способ быстро действовать. В работе мы всегда говорим правду клиенту о его продукте, о наших результатах, этого же мы требуем от партнеров. 
               <p>Мы в интернет-маркетинге работаем уже более 5 лет, успели стать Premier Google Partner и нам крайне не интересно работать с теми, кто все знает лучше всех и ищет себе “руки” для “черновой работы”. Если мы садимся в одну лодку, то засучив рукава, усердно работаем и говорим друг другу правду.</p>
             </div>
          </div>
        </div>
        
      </div>
    </section>
     
    <!-- trust_us -->
    <section class="trust_us">
      <div class="wrapper_m">
      
        <div class="section_title">
          <h3>5 лет работали как аутсорс агентство, <br> с такими клиентами:</h3> 
        </div>
        
        <div class="trust_us__wrap">
          <div class="grid_row">
           
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/more_piva.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Море Пива</p>
                </div>
              </div>
            </div>
           
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/unnamed.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>ATB</p>
                </div>
              </div>
            </div>
            
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/grass.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>WT Grass</p>
                </div>
              </div>
            </div>
            
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/gallak.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Галлак</p>
                </div>
              </div>
            </div>
            
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/logo_touch.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Touch</p>
                </div>
              </div>
            </div>
           
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/kuhnya.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Кухня</p>
                </div>
              </div>
            </div>
           
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/tickets.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Online Tickets</p>
                </div>
              </div>
            </div>
            
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/colt.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Mr. Colt</p>
                </div>
              </div>
            </div>
            
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/imt.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>IMT</p>
                </div>
              </div>
            </div>
           
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/levelUp.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Level UP</p>
                </div>
              </div>
            </div>
             
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/scand.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Скандинавская Ходьба</p>
                </div>
              </div>
            </div>
            <div class="grid_coll grid_coll_25">
              <div class="trust_us__item">
                <span class="trust_us__item__top-b"></span>
                <span class="trust_us__item__bottom-b"></span>
                <div class="trust_us__item__ico">
                  <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/husqvarna-logo.png" alt="">
                </div>
                <div class="trust_us__item__name">
                  <p>Husqvarna</p>
                </div>
              </div>
            </div>
           
         
           
          </div>
        </div>
       
      </div>
    </section>
    <!-- end trust_us -->
    
    <!-- penguin_is -->
    <section class="penguin_is">
      <div class="wrapper_m">
        <div class="penguin_is__title_wrap">
          <h3>Что такое</h3>
          <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/team-logo.png" alt="">
          <h3>?</h3>
        </div>

        <!-- penguin_is__b1 -->
        <div class="penguin_is__b1">
          <div class="penguin_is__b1__coll penguin_is__b1__coll_l">
            <a href="https://www.google.com.ua/partners/?hl=ru#a_profile;idtf=8752491474" target="_blank">
              <img src="<?php echo REL_ASSETS_URI; ?>img/korporati/decor_logo_2.png" alt="">
            </a>
          </div>
          <div class="penguin_is__b1__coll penguin_is__b1__coll_r">
            <p>За пять лет мы стали Premier Google Partners и сегодня управляем рекламным бюджетом в Google больше, чем </p>
            <p class="penguin_is__b1__num"><span>$90 000</span>/мес.</p> 
          </div>
        </div>

        <!-- penguin_is__b2 -->
        <div class="penguin_is__b2">
          <h2>У нас два направления, в которых мы работаем:</h2>
        </div>

        <!-- penguin_is__b3 -->
        <div class="penguin_is__b3">
          <div class="penguin_is__b3__coll penguin_is__b3__coll_l">
            <div class="penguin_is__b3__title">
              <div class="penguin_is__b3__title__img">
                <img src="<?php echo REL_ASSETS_URI; ?>img/home/penguin_is_01.png" alt="">
              </div>
              <p>Продуктовый бизнес</p>
            </div>
            <p>Ищем партнеров в Украине и России для создания совместных продуктов.</p>
            <p>Намерены работать с:</p>
            <ul>
              <li>производителями товаров (поможем сделать Subscribe);</li>
              <li>с IT-продуктовыми командами (поможем сделать SaaS);</li>
            </ul>
          </div>
          <div class="penguin_is__b3__coll penguin_is__b3__coll_r">
            <div class="penguin_is__b3__title">
              <div class="penguin_is__b3__title__img">
                <img src="<?php echo REL_ASSETS_URI; ?>img/home/penguin_is_02.png" alt="">
              </div>
              <p>Аутсорс бизнес</p>
            </div>
            <p>Мы суппортим западные проекты. Это позволяет прокачивать команду и осваивать передовые технологии, которые потом мы используем в наших продуктах. Также мы немного аутсорсим “комфортные” проекты.</p>
          </div>
        </div>

        <!-- penguin_is__b4 -->
        <div class="penguin_is__b4">
          <div class="penguin_is__b4__coll penguin_is__b4__coll_l">
            <img src="<?php echo REL_ASSETS_URI; ?>img/home/penguin_is_03.png" alt="">
          </div>
          <div class="penguin_is__b4__coll penguin_is__b4__coll_r">
            <p>У нас в команде 25+ сотрудников. Дизайнеры, менеджеры, маркетологи.</p>
          </div>
        </div>

      </div>
    </section>
    <!-- end penguin_is --> 


    <?php */ ?>


<?php get_footer(); ?>

<?php
/*
Template Name: Amazon page
Template Post Type: page
*/
$bodyClass = 'amazon-page amazon-page_ru';
$divClass = 'first_gradient';
get_header();
?>

  

  <section class="profit_amazon">
    <div class="profit_amazon_bg wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0">
    </div>
    <div class="profit_amazon_bg__mobile">
      <div class="wrapper container">
        <img src="<?php echo REL_ASSETS_URI ?>img/amazon/Group.png" alt="" class="img-responsive img-width">
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-md-6 amazon_title">
          <div class="section_title__holder">
            <h1 class="title">Настройка и оптимизация рекламы на Amazon с фокусом на <span class="amazon_tools__color">ACOS</span> и <span class="amazon_tools__color">Profit</span></h1>
          </div>
          <div class="profit_amazon_link__holder">
              <a href="#" class="section_link profit_amazon_link" data-simple_modal="modal1">Заказать консультацию</a>
          </div>
        </div>
      </div>
    </div>
    </section>
  <section class="amazon_campaign">
        <div class="amazon_campaign_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Управление рекламными кампаниями в Amazon
                </h2>
                <h3>
                    В управление рекламными кампаниями входят следующие активности:
                </h3>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-4 d-lg-block d-none">
              </div>
                <div class="col-lg-8">
                    <ul class="shopping_list">
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">1</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Аудит и оптимизация листинга товаров.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">2</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Создание и реализация стратегии продвижения на Amazon.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">3</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Создание кампаний Sponsored Product + Sponsored Brands с разными настройками таргетинга.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">4</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Микро-менеджмент ставок на основе показателей ACOS и Profit рекламной кампании.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">5</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Оптимизация поисковых запросов и минус-слов.
                                </h3>
                            </div>
                        </li>
                        <li class="amazon_campaign_item">
                            <span class="amazon_campaign_item__num">6</span>
                            <div class="amazon_campaign_item__content">
                                <h3 class="amazon_campaign_item__title">
                                    Создание удобной структуры рекламной кампании SPAG (single product = ad group) <br>или SCAG (single category = ad group).
                                </h3>
                            </div>
                        </li>                                                
                    </ul>
                    <a href="#" class="section_link shopping_link" data-simple_modal="modal1">Заказать аудит</a>
                </div>
            </div>
        </div>
    </section>
  <section class="amazon-rates">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Управляем ставками на основе ACOS или ROI
                </h2>
                <h3>
                    В управление ставками специалисты Penguin-team используют 2 разных подхода.<br>Проводят тест и подбирают максимально эффективный для рекламодателя.
                </h3>
            </div>
            <div class="amazon-rates_banner__holder">
                <?php
                    $img = get_post_meta($post->ID, 'rates_banner', true);
                    $imgLinkPreview = wp_get_attachment_image_url($img, 'full');
                ?>
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                
            </div>
            <div class="approaches">
              <div class=approach>
                <h3>
                  Bidding на основе <span class="approach-title">ACOS</span>
                </h3>
                <h4>
                  TargetCPC = MaxACOS/ACOS * CPC
                </h4>
              </div> 
              <div class=approach>
                <h3>
                  Bidding на основе <span class="approach-title">ROI по товару</span>
                </h3>
                <h4>
                  TargetCPC = цена товара * маржа *<br>коэф.конверсий * норма инвестиций 
                </h4>
              </div> 
            </div>
            
        </div>
    </section>
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
</div>

  <section class="feedback mt-5 mb-5">
    <div class="wrapper container">
      <form method="post" class="feedback_form wps_form_js">
        <input type="hidden" name="form_subject"  value="Get Free Audit Amazon">
        <input type="hidden" name="form_title"    value="Get Free Audit Amazon">
        <input type="hidden" name="form_redirect" value="spasibo-chto-ostavili-zayavku-na-audit-amazon/">
        <h3 class="feedback_form__title">Бесплатная консультация по настройке/оптимизации рекламы на Amazon</h3>
        <p class="feedback_form__text">
          Закажите бесплатную консультацию по настройке и оптимизации рекламных кампаний на Amazon. Узнай, как Penguin-team может помочь улучшить работу
          <br>рекламы на Amazon у Вас.
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

<div class="simpleModalWindowWrap modal1">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow feedback_form_holder">
                <span class="simpleModalWindowClose"></span>
                <form method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Audit Amazon">
                    <input type="hidden" name="form_title"    value="Get Free Audit Amazon">
                    <input type="hidden" name="form_redirect" value="spasibo-chto-ostavili-zayavku-na-audit-amazon/">
                     <p class="feedback_form__title">Бесплатная консультация<br>по настройке/оптимизации рекламы на Amazon</p>
                <p class="feedback_form__text">
                    Закажите бесплатную консультацию по настройке и оптимизации рекламных кампаний на Amazon. Узнай, как Penguin-team может помочь улучшить работу
                    <br>рекламы на Amazon у Вас.
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

<div class="simpleModalWindowWrap modalCrysisAmazon">
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
                    <input type="hidden" name="form_subject"  value="Get Free Analysis">
                    <input type="hidden" name="form_title"    value="Get Free Analysis">
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

<script>
  $(document).ready(function() {
    if(sessionStorage.getItem('crysis_modal') !== 'open') {
      setTimeout(() => {
        simpleModal.modalOpen( "modalCrysisAmazon" );
        sessionStorage.setItem('crysis_modal', 'open');
      }, 3000)      
    }
  });
</script>

<?php get_footer(); ?>
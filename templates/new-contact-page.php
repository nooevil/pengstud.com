<?php
	/*
  Template Name: Новая Контакты
	Template Post Type: page
	*/
	get_header();
?>

<article class="new-contact">
    <!-- 1 -->
    <section class="new-contact__first-screen">
        <h1 class="new-contact__first-screen__title">Контакты</h1>
        <div class="new-contact__separator"></div>
        <div class="new-contact__first-screen__content">
          <div class="new-contact__first-screen__content__text">
            <p>Позвоните нам или оставьте заявку —<br>и мы свяжемся с вами!</p>
          </div>
          <div class="new-contact__first-screen__content__contacts">
            <div class="new-contact__first-screen__content__contacts__email">
              <div class="contact__icon">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-mail.svg" alt="">
              </div>
              <p class="contact__text">info@pengstud.com</p>
            </div>
            <div class="new-contact__first-screen__content__contacts__phone">
              <div class="contact__icon">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-phone.svg" alt="">
              </div>
              <p class="contact__text">0800 33 61 91</p>
            </div>
            <div class="new-contact__first-screen__content__contacts__socials">
              <a href="https://www.facebook.com/pengstud.dp/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-facebook.svg" alt="">
              </a>
              <a href="https://www.linkedin.com/company/10959360/admin/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-linkedin.svg" alt="">
              </a>
              <a href="https://www.slideshare.net/ssuser7f0c1f1" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-social.svg" alt="">
              </a>
              <a href="https://www.instagram.com/penguin_team_tool" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-instagram.svg" alt="">
              </a>
              <a href="https://www.pinterest.com/penguinteamdp" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-pinterest.svg" alt="">
              </a>
            </div>
          </div>
        </div>
    </section>

    <!-- 2 -->
    <section class="feedback new-contact__feedback">
        <div class="wrapper container">
            <form method="post" class="feedback_form wps_form_js"  id="testGTMGoal">
                
                <!-- hidden input -->
                <input type="hidden" name="form_subject"  value="Question from contact page">
                <input class="bitrix_field" type="hidden" name="form_title" data-name="TITLE"  value="Вопрос cо страницы контактов">
                <?php if($currLang == 'ru' ) : ?>
                <input type="hidden" name="form_redirect" value="spasibo-za-obrashhenie/">
                <?php else : ?>
                <input type="hidden" name="form_redirect" value="en/thank-you/">
                <?php endif; ?>  
              
              <div class="feedback_form__title">
                    <h3>Свяжитесь с нами!</h3>
                    <div class="new-contact__separator"></div>
                </div>
                <div class="feedback_form__container">
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Name" placeholder="Имя" required>
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
                </div>
                <div class="feedback_form__submit_holder">
                    <button class="feedback_form__submit section_link" type="submit">Заказать консультацию</button>
                </div>
            </form>
        </div>
    </section>

    <!-- 3 -->
    <section class="new-contact__services">
        <h2 class="new-contact__services__title">
            Наши услуги
        </h2>
        <div class="new-contact__separator"></div>
        <div class="new-contact__services__container">
            <div class="new-contact__services__container__card">
                <div class="card-images">
                    <img src="<?php echo REL_ASSETS_URI ?>img/new-home-page/google-ads-ico.png" alt="">
                    <img src="<?php echo REL_ASSETS_URI ?>img/new-home-page/facebook-ads.png" alt="">
                </div>
                <h4 class="card-title">Google Ads & Facebook</h4>
                <p class="card-text">
                    Запуститесь или улучшите 
                    свои результаты в Поиске, КМС, видеокампаниях, ремаркетинге, 
                    рекламе в Facebook
                </p>
                <div class="card-button">
                    <a href="https://pengstud.com/google-ads-facebook-ads/">Узнать больше</a>
                </div>
            </div>
            <div class="new-contact__services__container__card">
                <div class="card-images">
                    <img src="<?php echo REL_ASSETS_URI ?>img/new-home-page/google-shopping.png" alt="">
                </div>
                <h4 class="card-title">Google Shopping</h4>
                <p class="card-text">
                    Начните рекламироваться или прооптимизируйте 
                    свои Google Покупки с отличным товарным фидом
                </p>
                <div class="card-button">
                    <a href="https://pengstud.com/google-shopping-management/">Узнать больше</a>
                </div>
            </div>
            <div class="new-contact__services__container__card">
                <div class="card-images">
                    <img src="<?php echo REL_ASSETS_URI ?>img/new-home-page/amazon-ads.png" alt="">
                </div>
                <h4 class="card-title">Amazon Ads</h4>
                <p class="card-text">
                    Запустите свой бизнес на Amazon и добейтесь 
                    прибыльности при помощи грамотного сочетания
                    <br>SEO & PPC
                </p>
                <div class="card-button">
                    <a href="https://pengstud.com/amazon/">Узнать больше</a>
                </div>
            </div>
        </div>
    </section>

    <img class="new-contact__pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/pattern-1.svg" alt="">
    <img class="new-contact__pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/pattern-2.svg" alt="">
    <img class="new-contact__footer-pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
    <img class="new-contact__footer-pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
</article>

<!-- animations -->
<script>
    $(function() {
		$(document).ready(function(){
            $(".new-contact__first-screen").addClass("showed")
            $(".new-contact__feedback .feedback_form").addClass("showed")

            $(window).scroll(function(){
                $(".new-contact section").each(function(){
                    if($(window).scrollTop()>($(this).offset().top - $(window).height() + 50)){
                        $(this).addClass("showed")
                    }    
                })
            })
		});
		
	});
</script>

<?php get_footer(); ?>
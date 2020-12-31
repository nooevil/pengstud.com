<?php
/*
Template Name: Контакты
Template Post Type: page
*/
$currLang = pll_current_language();
if($currLang == 'ru' ) {
    get_header();
} else {
    get_header(en);
}
?>

	<?php 
	// pre_print_r($_POST);
	file_put_contents('Post.txt', print_r($_REQUEST,true), FILE_APPEND);
	?>

	<?php /*
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
                <h1 class="target__title">Контакты</h1>
              </div>
            </div>
          </div>
          <div class="btn_below"></div>
        </div>
        
      </div>
    </section>
    <!-- main screen -->
    */ ?>

    
    <section class="contact">
      <div class="wrapper_m">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="section_title">
          <h3><?php _e('Наши координаты'); ?></h3>
        </div>
        
        <div class="contact__wrap">
          <p>E-mail: <a href="mailto:info@pengstud.com">info@pengstud.com</a></p>
<?php $currLang = pll_current_language(); ?>
<?php if($currLang == 'ru' ) : ?>
          <p>FaceBook: <a href="https://www.facebook.com/pengstud.dp/">https://www.facebook.com/pengstud.dp/</a></p>
<?php else : ?>
          <p>Linkedin: <a href="https://www.linkedin.com/company/ppc-agancy-penguin-studio/about/">https://www.linkedin.com/company/ppc-agancy-penguin-studio/about/</a></p>
<?php endif; ?>
          <p><?php _e('Телефон:'); ?>  <a href="tel:<?php _e('080 033 61 91'); ?>"><?php _e('080 033 61 91'); ?></a></p>
          <!--
          <p>Телефон:  <a href="tel:+380957057322">+38 (095) 705 73 22</a></p>
        -->
          <!--
          <p>Адрес: Днепр, ул.Князя Владимира Великого (Плеханова), 18б</p>
          <p>Skype: <a href="skype:r_bakirov1?call">penguin.studio</a></p>
        -->
        </div>

        <br>


        <div class="home_contact_form__holder">
          <div class="home_contact_form_title">
            <p class="title"><?php _e('Есть вопросы?'); ?> <span><?php _e('Напишите нам'); ?></span></p>
          </div>
          <form method="post" class="fn_subscribe__form wps_form_js" id="testGTMGoal"> <!-- class="wps_form_js" -->
            <div class="home_contact_form">

              <div class="row">
                <div class="col-md-6">
                  <div class="home_contact_form__row required">
                <input class="bitrix_field" type="text" name="first_name" data-name="NAME" placeholder="<?php _e('Имя'); ?>" required>
                  </div>
                </div>
                <div class="col-md-6 mt-30 mt-md-0">
                  <div class="home_contact_form__row required">
                <input class="bitrix_field" type="email" name="email" data-name="EMAIL" placeholder="Email" required >
                  </div>
                </div>
              </div>

              <div class="row mt-30">
                <div class="col-md-12">
                  <div class="home_contact_form__row required">
                    <textarea class="bitrix_field" name="comments" data-name="COMMENTS" placeholder="<?php _e('Вопрос'); ?>" required></textarea>
                  </div>
                </div>
              </div>

              <div class="row mt-30">
                <div class="col-md-12">
                  <div class="home_contact_form__row">
                    <button type="submit" class="btn_style_1"><?php _e('Отправить'); ?></button>
                  </div>
                </div>
                <!--<div class="col-md-12">
                  <div class="home_contact_form__row">
                    <p class="message_success"><?php /*_e('Отправлено! Ожидайте ответ.'); */?></p>
                  </div>
                </div>-->
              </div>

              <!-- hidden input -->
              <input type="hidden" name="form_subject"  value="Question from contact page">
              <input class="bitrix_field" type="hidden" name="form_title" data-name="TITLE"  value="Вопрос cо страницы контактов">
            <?php if($currLang == 'ru' ) : ?>
              <input type="hidden" name="form_redirect" value="spasibo-za-obrashhenie/">
            <?php else : ?>
              <input type="hidden" name="form_redirect" value="en/thank-you/">
            <?php endif; ?>
              <!-- <input type="hidden" name="form_title"  value="С Главной"> -->
              <!-- <input type="hidden" name="saved" value="yes"> -->
            </div>
          </form>
        </div>
        
        <!--
        <div class="map__wrap">
          
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1322.6349757424034!2d35.04157870061155!3d48.47053539816603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDjCsDI4JzEzLjkiTiAzNcKwMDInMzIuMCJF!5e0!3m2!1sru!2sua!4v1514984929913" allowfullscreen></iframe>
        </div>
      -->
        
      </div>
    </section>


<?php get_footer(); ?>

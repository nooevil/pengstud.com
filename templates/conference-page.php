<?php
/*
Template Name: Конференция
Template Post Type: page
*/
$currLang = pll_current_language();
if($currLang == 'ru' ) {
    get_header();
} else {
    get_header(en);
}
?>

    
    <section class="contact">
      <div class="wrapper_m">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="section_title">
          <h3>Дополнительные материалы по Google Shopping</h3>
        </div>
        
        <div class="contact__wrap">
          <p>Конференция DNIPRO MARKETING CONFERENCE 2019</p>
        </div>

        <br>


        <div class="home_contact_form__holder">
          <div class="home_contact_form_title">
            <p class="title"><?php _e('Хотите получить материалы?'); ?></p>
          </div>
          <form class="fn__site_conference_form" >
            <div class="home_contact_form">


              <div class="row">
                <div class="col-md-12">
                  <div class="home_contact_form__row required">
                    <input class="bitrix_field" type="text" name="name" placeholder="<?php _e('Имя'); ?>" required>
                  </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-md-6">
                  <div class="select_holder">
                    <select name="company">
                      <option disabled selected>Компания</option>
                      <option value="агентство">агентство</option>
                      <option value="частный рекламодатель">частный рекламодатель</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="select_holder">
                    <select name="position">
                      <option disabled selected>Должность</option>
                      <option value="маркетолог">маркетолог</option>
                      <option value="специалист по контекстной рекламе">специалист по контекстной рекламе</option>
                      <option value="руководитель">руководитель</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row mt-30">
                <div class="col-md-12">
                  <div class="home_contact_form__row required">
                    <input class="bitrix_field" type="email" name="email" placeholder="<?php _e('Email'); ?>" required>
                  </div>
                </div>
              </div>


              <div class="row mt-30">
                <div class="col-md-12">
                  <div class="home_contact_form__row">
                    <button type="submit" class="btn_style_1"><?php _e('Получить материалы'); ?></button>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="home_contact_form__row">
                    <p class="message_success">Материалы отправлены на указанный email.</p>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
        
        
      </div>
    </section>


<?php get_footer(); ?>

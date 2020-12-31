<?php
/*
Template Name: Регистрация
*/
get_header();
?>

<section class="auth_page__unlogin_user">
    <div class="wrapper_m">

        <div class="auth_page__unlogin_user__form">
            <p class="auth_page__unlogin_user__form__title">Регистрация</p>

            <form class="fn__site_register_form" >
              <div class="fn__site_register_form__errors"></div>
              <div class="site_register__holder__row">
                <p>Укажите ФИО</p>
                <div class="site_register__holder__row__input">
                  <input type="text" name="user_fio" class="fn_only_chars" required placeholder="Введите ФИО" autocomplete="off"  >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Компания</p>
                <div class="site_register__holder__row__input">
                  <input type="text" name="user_company"  placeholder="Компания" autocomplete="off" >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Укажите e-mail</p>
                <div class="site_register__holder__row__input">
                  <input type="email" name="user_email" required placeholder="Введите e-mail" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" >
                </div> 
              </div>
              <div class="site_register__holder__row">
                <p>Укажите телефон</p>
                <div class="site_register__holder__row__input">
                  <input type="tel" name="user_phone" class="fn_only_numbers" placeholder="Введите телефон" autocomplete="off" >
                </div> 
              </div>
              <div class="site_register__holder__row">
                <p>Введите пароль</p>
                <div class="site_register__holder__row__input">
                  <input type="password" name="user_pass" required class="site_register_form__pass" placeholder="Введите пароль" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" >
                  <span class="site_register_form__pass__view"><i class="fa fa-eye" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="site_register__holder__row">
                <div class="site_register__holder__row__input">
                  <label class="site_register_form__user_root">
                    <input type="checkbox" checked class="fn__register_form__user_root__checkbox">
                    <span class="checkbox_label"></span>
                    <span class="checkbox_text">Я принимаю условия <a href="/publichnaya-oferta/" target="_blank" >публичной оферты</a></span>
                  </label>
                </div>
              </div>
              <div class="site_register__holder__row">
                <div class="site_register__holder__row__input">
                  <button type="submit" class="btn_style_1 site_register_form__submit fn__register_form__submit_btn">Зарегистрироваться</button>
                </div>
              </div>
            </form>
          <div class="user_form__more">
            <br>
            <span class="site_register__allready_has_acc">Уже есть аккаунт?</span>
          </div>

        </div>


    </div>
</section>


<?php get_footer(); ?>
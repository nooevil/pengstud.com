<?php
/*
Template Name: Восстановление пароля
*/
get_header();
UserAuth::rememberPass();
?>

<section class="members__lostpassword">
    <div class="wrapper_m">

      <div class="lostpassword__wrap">
          <?php if($_SESSION['code_send']) :?>
              <div class="lostpassword__message lostpassword__success">
                  <p>Ваш новый пароль отправлен на указанную почту.</p>
              </div>
          <?php endif;?>
          <?php if($_SESSION['wrong_email']) :?>
          <div class="lostpassword__message lostpassword__error">
              <p>ОШИБКА: Неверный e-mail.</p>
          </div>
          <?php endif; ?>
      </div>

      <div class="site_lostpassword__holder">
        <form class="fn__site_lostpassword_form" method="post">
          <div class="fn__site_lostpassword_form__errors"></div>
          <div class="site_lostpassword__holder__row">
            <p>Пожалуйста, введите ваш e-mail. Вы получите письмо с новым паролем.</p>
          </div>
          <div class="site_lostpassword__holder__row">
            <p>Укажите e-mail</p>
            <div class="site_lostpassword__holder__row__input">
              <input type="email" name="remember_email" required placeholder="Ваш e-mail" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
            </div>
          </div>
          <div class="site_lostpassword__holder__row">
            <div class="site_lostpassword__holder__row__input">
              <button type="submit" class="btn_style_1"  name="remember_pass">Восстановить</button>
            </div>
          </div>
        </form>
      </div>

    </div>
</section>

<?php get_footer(); ?>
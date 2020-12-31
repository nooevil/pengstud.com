<?php
/*
Template Name: Личный кабинет
*/
User::checkVerifyUser();
$isUserLoggedIn = User::isUserLoggedIn();

unset($_SESSION['target_lang']);
unset($_SESSION['currency']);
unset($_SESSION['country_criteria']);
unset($_SESSION['geo_criteria']);
unset($_SESSION['keywords']);
unset($_SESSION['excluded']);
unset($_SESSION['included']);
unset($_SESSION['project_keywords']);
unset($_SESSION['keywords_results']);
unset($_SESSION['title']);
unset($_SESSION['project_title']);
unset($_SESSION['project_id']);
unset($_SESSION['re_excluded']);

get_header();
?>


<?php 
    if ($isUserLoggedIn): 

    $user_id   = $_SESSION['user_id'];

    // get data
    $projects  = User::getProjects($user_id);
    $user_data = User::getUserData($user_id);
    $user_root = User::getUserRootData($user_id);
    $isUserVerify = User::isUserVerify($user_id);

    $isPeriodExpired = $user_data->period_end <= date('Y-m-d');
                     
?>

    <section class="auth_page__login_user">
        <div class="wrapper_m">

            <?php
            if ( is_user_logged_in() ){
                // pre_print_r($user_root);
            }
            ?>


            <div class="new_app">
                <p>Эта версия теперь недоступна. </p>
                <br>
                <p>Чтобы работать с новой, найдите в почте письмо «❤ Welcome to HubService ❤» с инструкцией и ссылкой на обновленный личный кабинет.</p>
                <p>Или создайте новый аккаунт по <a href="https://app.pengstud.com/login">ссылке</a></p>
            </div>



        </div>
    </section>

<?php else : ?>

    <section class="auth_page__unlogin_user">
        <div class="wrapper_m">

            <div class="auth_page__unlogin_user__form">
                <p class="auth_page__unlogin_user__form__title">Вход</p>

                <form class="fn__site_login_form">
                    <div class="fn__site_login_form__errors"></div>
                  <div class="site_login__holder__row">
                    <p>Укажите e-mail</p>
                    <div class="site_login__holder__row__input">
                      <input type="email" name="user_email" required placeholder="Ваш e-mail" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                    </div>
                  </div>

                  <div class="site_login__holder__row">
                    <p>Введите пароль</p>
                    <div class="site_login__holder__row__input">
                      <input type="password" name="user_pass" required placeholder="Ваш пароль" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                    </div>
                  </div>

                  <div class="site_login__holder__row">
                    <div class="site_login__holder__row__input">
                      <button type="submit" class="btn_style_1">Войти</button>
                    </div>
                  </div>

                  <div class="site_login__holder__row save_me_checkbox__holder">
                    <label class="save_me_checkbox">
                      <input type="checkbox" value="1" checked name="save_me">
                      <span class="checkbox"></span>
                      <span class="text">Запомнить меня</span>
                    </label>
                  </div>

                </form>

                <div class="user_form__more">
                  <br>
                    <a href="user/register/" class="site_login__go_register user_register_style">Зарегистрироваться</a>
                  <br>
                  <br>
                  <a href="lostpassword/" class="site_login__lostpassword">Забыли пароль?</a>
                  <br>
                  <!--<span class="site_login__go_register"></span>-->
                    
                </div>


            </div>

        </div>
    </section>

<?php endif; ?>


<?php get_footer(); ?>
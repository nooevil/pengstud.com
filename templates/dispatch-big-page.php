<?php
/*
Template Name: Рассылка email_2
Template Post Type: page
*/
get_header();
?>

    <section class="auth_page__unlogin_user dispatch_page">
        <div class="wrapper container">
            <div class="dispatch_page__title_holder">
                <h2>Хотите улучшить аккаунт Google Ads?</h2>
                <p>Оставьте e-mail и получите <span>7 писем</span> о том,<br>как можно улучшить свой аккаунт в Google Ads.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dispatch_page__info clearfix dispatch_page__user__desc">
                        <p>Узнайте о новых способах достижения маркетинговых и бизнес-целей с помощью Ads.</p>
                        <p>После заполнения формы в течение 7 дней вы будете получать письма с рекомендациями по
                            эффективному ppc-менеджменту в Ads.</p>
                        <p><span>Что в письмах:</span> в письмах ppc-специалисты компании Penguin-team делятся
                            опытом и знаниями, которые были получены за годы работы агентства в разных нишах и
                            рынках.</p>
                    </div>
                    <p class="dispatch_page__subtitle dispatch_page__subtitle_2">Для кого?</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="dispatch_page__user">
                                <div class="dispatch_page__user__img_holder dispatch_page__user__img_holder_2">
                                    <img src="<?php echo REL_ASSETS_URI; ?>img/dispatch/user_male.png" alt="">
                                </div>
                                <div class="dispatch_page__user__desc">
                                    <p>100% - для начинающих ppc-специалистов;</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="dispatch_page__user">
                                <div class="dispatch_page__user__img_holder dispatch_page__user__img_holder_2">
                                    <img src="<?php echo REL_ASSETS_URI; ?>img/dispatch/user_female.png" alt="">
                                </div>
                                <div class="dispatch_page__user__desc">
                                    <p>100% - для интернет-маркетологов.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dispatch_page_user__form clearfix">

                        <form class="fn__site_dispatch_form">
                            <input type="hidden" name="big_form" value="1">
                            <div class="dispatch_page__form_holder">
                                <div class="dispatch_page__holder__row">
                                    <p>Имя и фамилия</p>
                                    <div class="dispatch_page__holder__row__input">
                                        <input type="text" name="user_fio" required autocomplete="off" placeholder="Петр Иванов">
                                    </div>
                                </div>
                                <div class="dispatch_page__holder__row">
                                    <p>Компания <!--<i class="fa fa-question-circle" aria-hidden="true"></i>--></p>
                                    <select name="user_company" class="subscribe_select" required>
                                        <option disabled value="" selected hidden>Укажите компанию</option>
                                        <option value="Агентство">Агентство</option>
                                        <option value="Частный рекламодатель">Частный рекламодатель</option>
                                    </select>
                                </div>
                                <div class="dispatch_page__holder__row">
                                    <p>Должность <!--<i class="fa fa-question-circle" aria-hidden="true"></i>--></p>
                                    <select name="user_position" class="subscribe_select" required>
                                        <option disabled value="" selected hidden>Укажите должность</option>
                                        <option value="Руководитель">Руководитель</option>
                                        <option value="Маркетолог">Маркетолог</option>
                                        <option value="Специалист по контекстной рекламе">Специалист по контекстной рекламе</option>
                                        <option value="SEO-специалист">SEO-специалист</option>
                                    </select>
                                </div>
                                <!--<div class="dispatch_page__holder__row">
                                    <p>Страна</p>
                                    <select name="user_country" class="subscribe_select" required>
                                        <option disabled value="" selected hidden>Укажите страну</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Беларусь">Беларусь</option>
                                        <option value="Казахстан">Казахстан</option>
                                    </select>
                                </div>-->
                                <div class="dispatch_page__holder__row">
                                    <p>Номер телефона</p>
                                    <div class="dispatch_page__holder__row__input">
                                        <!--user_phone_mask-->
                                        <input id="phone" type="tel" name="user_phone" class="" autocomplete="off" required>
                                        <div id="valid-msg" class="hide"></div>
                                        <div id="error-msg" class="hide error_text">Введите корректно номер</div>
                                    </div>
                                </div>
                                <div class="dispatch_page__holder__row">
                                    <p>E-mail</p>
                                    <div class="dispatch_page__holder__row__input">
                                        <input type="email" name="user_email" required autocomplete="off" placeholder="mailtest@gmail.com" >
                                    </div>
                                </div>
                            </div>
                            <div class="dispatch_page__holder__row">
                                <div class="dispatch_page__holder__row__input">
                                    <button type="submit" class="btn_style_1 dispatch_page_form__submit gtm_subscribe">Да, отправить
                                        мне 7 писем
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="sendpulse_book_name" value="SENDUPULSE_BOOK_7DAYS">
                            <!-- hidden -->
                            <input type="text" name="post_name" value="Form_B" hidden>
                            <!-- hidden -->
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>


<?php get_footer(); ?>


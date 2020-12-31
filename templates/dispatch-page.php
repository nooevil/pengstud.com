<?php
/*
Template Name: Рассылка email
Template Post Type: page
*/
get_header();
?>

    <section class="dispatch_page">
        <div class="wrapper container">
            <div class="dispatch_page__title_holder">
                <h2>Хотите улучшить свой AdWords аккаунт?</h2>
                <p>Оставьте e-mail и получите <span>7 писем</span>, о том, как можно улучшить свой аккаунт в Ads.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dispatch_page__info clearfix dispatch_page__user__desc">
                        <p>Узнайте о новых способах достижения маркетинговых и бизнес целей с помощью AdWords.</p>
                        <p>После заполнения формы, в течении 7-ми дней вы будете получать письма с рекомендациями по
                            эффективному ppc-менеджменту в AdWords.</p>
                        <p><span>Что в письмах:</span> В данных письмах ppc-специалисты компании Penguin-team делятся
                            своим опытом и знаниями, которые были получены за 4 года работы агентства в разных нишах и
                            рынках.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dispatch_page_user__form clearfix">

                        <form class="fn__site_dispatch_form">
                            <div class="dispatch_page__form_holder">
                                <div class="dispatch_page__holder__row">
                                    <p>Имя и фамилия</p>
                                    <div class="dispatch_page__holder__row__input">
                                        <input type="text" name="user_fio" required autocomplete="off" placeholder="Петр Иванов">
                                    </div>
                                </div>
                                <div class="dispatch_page__holder__row">
                                    <p>Компания <!--<i class="fa fa-question-circle" aria-hidden="true"></i>--></p>
                                    <div class="dispatch_page__holder__row__input">
                                        <select name="user_company" class="subscribe_select">
                                            <option value="0" disabled="" selected>Укажите компанию</option>
                                            <option value="Агентство">Агентство</option>
                                            <option value="Частный рекламодатель">Частный рекламодатель</option>
                                        </select>
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
                            <input type="text" name="post_name" value="Form_A" hidden>
                            <!-- hidden -->
                        </form>
                    </div>
                </div>
            </div>
            <p class="dispatch_page__subtitle">Для кого?</p>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="dispatch_page__user">
                        <div class="dispatch_page__user__img_holder">
                            <img src="<?php echo REL_ASSETS_URI; ?>img/dispatch/user_male.png" alt="">
                        </div>
                        <div class="dispatch_page__user__desc">
                            <p>100% - для начинающих ppc-специалистов;</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="dispatch_page__user">
                        <div class="dispatch_page__user__img_holder">
                            <img src="<?php echo REL_ASSETS_URI; ?>img/dispatch/user_female.png" alt="">
                        </div>
                        <div class="dispatch_page__user__desc">
                            <p>100% - для интернет-маркетологов.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


<?php get_footer(); ?>



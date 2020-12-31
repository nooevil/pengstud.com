<?php
/*
Template Name: Страница оплаты
Template Post Type: page
*/
$isUserLoggedIn = User::isUserLoggedIn();

get_header();
?>


    <?php if ( false === $isUserLoggedIn ): ?>

    <section class="payment__page">
        <div class="wrapper_m">

            <p class="payment__page__no_root">Зарегистрируйтесь или авторизуйтесь в системе, <br>чтобы выполнить оплату.</p>

        </div>
    </section>

    <?php elseif ( empty($_SESSION['subscribe_term_slug']) ): ?>

    <section class="payment__page">
        <div class="wrapper_m">
            <p class="payment__page__no_root">Пожалуйста, выберите тариф.</p>

            <div class="payment__page__actions">

                <div class="payment__page__actions__back__holder" style="margin-right: 0">
                    <a class="payment__page__actions__back"  href="subscribe/"><i class="fa fa-arrow-left" aria-hidden="true"></i>Тарифы</a>
                </div>

            </div>

        </div>
    </section>


    <?php else:

    $user_data = User::getUserData($_SESSION['user_id']);
    $user_root = User::getUserRootData($_SESSION['user_id']);

    $checked_tarif = User::getTariffBySlug($_SESSION['subscribe_term_slug']);

    $merchant_data = array();
    $merchant_data['tariff_slug'] = $_SESSION['subscribe_term_slug'];
    $merchant_data['user_id'] = $_SESSION['user_id'];
    $form_inputs = Payment::getForm($checked_tarif, null, 'thanks', $merchant_data);

    ?>
    
    <!-- main screen -->
    <section class="payment__page">
        <div class="wrapper_m">
            <h1 class="payment__page__title">
                Оплата
            </h1>

            <div class="payment__page__wrap row">
                <div class="col-lg-5 col-md-6">

                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Ваш тариф:</p>
                        </div>
                        <div class="payment__page__coll_val payment__page__coll_tarif">
                            <p><?php echo $checked_tarif->tarif_name; ?></p>
                        </div>
                    </div>

                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Проектов:</p>
                        </div>
                        <div class="payment__page__coll_val">
                            <p><?php echo $checked_tarif->project_count; ?></p>
                        </div>
                    </div>

                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Срок подписки:</p>
                        </div>
                        <div class="payment__page__coll_val">
                            <?php 
                            $period_length = "";
                            if ($checked_tarif->period_length === '1'){
                                $period_length = "1 месяц";
                            } else {
                                $period_length = $checked_tarif->period_length." месяцев";
                            }
                            ?>
                            <p><?php echo $period_length; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 payment__page__arrow__holder">
                    <div class="payment__page__arrow"></div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Запросов:</p>
                        </div>
                        <div class="payment__page__coll_val">
                            <p><?php echo $checked_tarif->search_count; ?></p>
                        </div>
                    </div>

                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Цена:</p>
                        </div>
                        <div class="payment__page__coll_val">
                            <p class="payment__page__price"><span><?php echo $checked_tarif->price; ?></span><span class="currency">$</span></p>
                        </div>
                    </div>

                    <div class="payment__page__row">
                        <div class="payment__page__coll_key">
                            <p>Экономия:</p>
                        </div>
                        <div class="payment__page__coll_val">
                            <p class="payment__page__coll_saving"><span class="star">*</span><span><?php echo $checked_tarif->price_saving ? $checked_tarif->price_saving : '0'; ?></span><span class="currency">$/мес</span></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="payment__page__actions">

                <div class="payment__page__actions__back__holder">
                    <a class="payment__page__actions__back" href="subscribe/"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</a>
                </div>
                        
                <div class="payment__page__actions__pay__holder">
                    <form name="tocheckout" method="POST" action="https://api.fondy.eu/api/checkout/redirect/">
                        <?php foreach ($form_inputs as $input_key => $input_val) : ?>
                            <input type="hidden" name="<?php echo $input_key ?>" value="<?php echo $input_val ?>">
                        <?php endforeach; ?>
                        <button class="payment__page__actions__pay ga__actions__pay ga__pay" type="submit">Оплатить <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </form>
                </div>

            </div>

            <p class="payment__page__more_info"><span class="star">*</span> Экономия относительно месячной стоимости пакета с 1 месяцем.</p>

        </div>
    </section>
    <!-- main screen -->

    <?php endif; ?>

<?php get_footer(); ?>
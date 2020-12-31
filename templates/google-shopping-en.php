<?php
/*
Template Name: Google shopping en
Template Post Type: page
*/
$bodyClass = 'shopping-page';
$divClass = 'first_gradient';
get_header(en);
?>
    <section class="profit">
        <div class="profit_bg wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0">
        </div>
        <div class="profit_bg__mobile">
            <div class="wrapper container">
                <img src="<?php echo REL_ASSETS_URI ?>img/en/profit_banner.png" alt="" class="img-responsive img-width">
            </div>
        </div>
        <div class="wrapper container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section_title__holder">
                        <h1><b>ROI and Profit</b> oriented
                            Google Shopping Management</h1>
                    </div>
                    <h3 class="profit_text">
                        Request free ROI and Profit Analysis of your Google Shopping Campaigns. Will help to determine
                        how Penguin-team can improve and scale your Google Ads account.
                    </h3>
                    <div class="profit_link__holder">
                        <a href="#" class="section_link profit_link" data-simple_modal="modal1">Get Free Analysis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping">
        <div class="shopping_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Professional <b>Google Shopping</b> Management
                </h2>
                <h3>
                    Penguin-team offers to clients Professional Google Shopping Management which includes:
                </h3>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-8">
                    <ul class="shopping_list">
                        <li class="shopping_item">
                            <span class="shopping_item__num">1</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Product feed setup/optimization
                                </h3>
                                <p class="shopping_item__text">
                                    improving of titles, descriptions and other things which help show right product ads
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">2</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Google Shopping Campaigns setup/optimization
                                </h3>
                                <p class="shopping_item__text">
                                    making of right structure which represents company needs and gives high potential to
                                    scale and management
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">3</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Bids micro-management
                                </h3>
                                <p class="shopping_item__text">
                                    using own software Panda, ppc-specialists can manage bids according to their
                                    performance in ROI and Profit
                                </p>
                            </div>
                        </li>
                        <li class="shopping_item">
                            <span class="shopping_item__num">4</span>
                            <div class="shopping_item__content">
                                <h3 class="shopping_item__title">
                                    Search terms and Negative keywords optimization
                                </h3>
                                <p class="shopping_item__text">
                                    using own software “NegativeKeywords tool” and Google Ads Scripts - specialists
                                    manage search terms and negative keywords effectively
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    <a href="#" class="section_link shopping_link" data-simple_modal="modal1">Get Free Analysis</a>
                </div>
            </div>
        </div>
    </section>
    <section class="possibilities">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Also we help clients to scale their Shopping Performance using <b>all possibilities</b>
                </h2>
            </div>
            <div class="possibilities_banner__holder">
                <?php
                    $img = get_post_meta($post->ID, 'image', true);
                    $imgLinkFull = wp_get_attachment_image_url($img, 'full');
                    $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700');
                ?>
                <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Possibilities banner">
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                </a>
            </div>
            <ul class="possibilities_list">
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                      <h3 class="possibilities_item__title">
                        Dynamic Remarketing
                      </h3>
                      <p class="possibilities_item__text">(After PLA, Dynamic Remarketing drives transactions to store)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                      <h3 class="possibilities_item__title">
                        Product Search Campaigns
                      </h3>
                      <p class="possibilities_item__text">(product search ads, still can give more transactions)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                      <h3 class="possibilities_item__title">
                        Add Bing Shopping Campaigns
                      </h3>
                      <p class="possibilities_item__text">(sometimes Bing can give +10-20% to revenue)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                      <h3 class="possibilities_item__title">
                        Behavior Remarketing
                      </h3>
                      <p class="possibilities_item__text">(helps to build relations with users and push them in the buyer funnel steps of the store)</p>
                    </div>
                </li>
                <li class="possibilities_item">
                    <span class="possibilities_item__icon"></span>
                    <div class="possibilities_item__content">
                      <h3 class="possibilities_item__title">
                        Add DSA
                      </h3>
                      <p class="possibilities_item__text">(adding Dynamic Search  Ads, store can achieve more traffic and transactions)</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>

<div class="second_gradient">
    <section class="management-1">
        <div class="management_bg wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0"></div>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Why do we give great results to our clients?
                </h2>
                <h2>
                    Our main feature is ROI and Profit oriented bid <b>micro-management</b>
                </h2>
            </div>
            <p class="management_text">
                We often see that many advertisers use ROAS as a main metric to measure success of Shopping campaigns
                and manage bids according to this metric. But according to our experience, managing bids in that way can
                give non-obvious bad results.
            </p>
            <div class="management_example">
                <div class="row justify-content-end">
                    <div class="col-md-7 col-lg-8 mb-4 mb-md-0">
                        <img src="<?php echo REL_ASSETS_URI ?>img/en/management_example__banner.png" alt="" class="example_img__mobile img-responsive img-width">
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="management_example__content">
                          <h3 class="management_example__title">
                            For Example:
                          </h3>
                          <p class="management_example__text">
                            Let’s imagine a situation that we have a product (New Balance trainers) in our campaign with the following data:
                          </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="management_table__holder">
                <table class="management_table">
                    <tr>
                        <th>Clicks</th>
                        <th>CPC, $</th>
                        <th>Transactions</th>
                        <th>Cost, $</th>
                        <th>Revenue, $</th>
                        <th>ROAS</th>
                    </tr>
                    <tr>
                        <td>79</td>
                        <td>1.34</td>
                        <td>5</td>
                        <td>106</td>
                        <td>225</td>
                        <td>212%</td>
                    </tr>
                </table>
            </div>
            <p class="management_text">
                At first glance, the result doesn’t look bad and Google gives us advice to increase bid to $1.7 because our performance looks good and many advertizes do that.
            </p>
            <p class="management_text">
                But if we add product margin to this data, we get other results:
            </p>
            <div class="management_table__holder">
                <table class="management_table">
                    <tr>
                        <th>Clicks</th>
                        <th>CPC, $</th>
                        <th>Transactions</th>
                        <th>Cost, $</th>
                        <th>Revenue, $</th>
                        <th class="th_orange">Margin</th>
                        <th>ROAS</th>
                        <th class="th_orange">Profit, $</th>
                        <th class="th_orange">ROI</th>
                    </tr>
                    <tr>
                        <td>79</td>
                        <td>1.34</td>
                        <td>5</td>
                        <td>106</td>
                        <td>225</td>
                        <td>35%</td>
                        <td>212%</td>
                        <td>-27.25</td>
                        <td>-26%</td>
                    </tr>
                </table>
            </div>
            <p class="management_text">
                So if advertiser continues to increase bids, it will cost more losses. The right way to set an effective bid is to use this formula:
            </p>
            <p class="management_equation">
                Target CPC = item price * margin * conv. rate * invest. rate (% of investment which is set by advertiser
                from 1% to 100%), for New Balance shoes target cpc will be:
            </p>
            <p class="management_equation">
                Target CPC = $45 * 35% * 6.3% * 75% = $0.74
            </p>
            <p class="management_text">
                So if advertiser sets up this bid, performance will be the following:
            </p>
            <div class="management_table__holder">
                <table class="management_table">
                    <tr>
                        <th>Clicks</th>
                        <th>CPC, $</th>
                        <th>Transactions</th>
                        <th>Cost, $</th>
                        <th>Revenue, $</th>
                        <th class="th_orange">Margin</th>
                        <th>ROAS</th>
                        <th class="th_orange">Profit, $</th>
                        <th class="th_orange">ROI</th>
                    </tr>
                    <tr>
                        <td>79</td>
                        <td>0.74</td>
                        <td>5</td>
                        <td>58.46</td>
                        <td>225</td>
                        <td>35%</td>
                        <td>384%</td>
                        <td>20.29</td>
                        <td>34.6%</td>
                    </tr>
                </table>
            </div>
            <p class="management_text">
                According to new data advertiser achieves positive ROI and Profit.
            </p>
            <p class="management_text">
                In many cases bids optimization in that way gives better outcomes than doing it according to ROAS and
                Google advice.
            </p>
            <div class="management_hover__box">
                <div class="management_hover__img_holder">
                    <?php
                        $img = get_post_meta($post->ID, 'screen', true);
                        $imgLinkFull = wp_get_attachment_image_url($img, 'full');
                        $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700');
                    ?>
                    <!--<img src="img/management_hover_2.png" alt="" class="img-responsive img-width">-->
                    <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Hover box">
                        <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                    </a>
                </div>
                <div class="management_hover__content">
                    <h3 class="management_hover__text">
                        This approach requires detailed processing of each product and takes a lot of time, we call this
                        process ppc micro-management. For these needs we developed Panda tool which helps to do it
                        quicker and each our client has right bids.
                    </h3>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <a href="#" class="section_link management_link" data-simple_modal="modal1">Get Free Analysis</a>
            </div>
        </div>
    </section>
    <section class="cases">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>
                    Our <b>cases</b>
                </h2>
            </div>

            <?php
                $args = array(
                    'post_type' => 'blog',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'category' => pll_get_term(48),
                    'meta_query'     => array(
                        array(
                            'key'   => 'showCase',
                            'value' => 'on'
                        )
                    ),
                    /*'tax_query' => array(
                        array(
                            'taxonomy' => 'topic',
                            'field' => 'term_id',
                            'terms' => 48,
                        )
                    )*/
                );
                $cases = get_posts($args);
            ?>

            <div class="cases_tab__holder">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="slider-nav">
                            <?php foreach ($cases as $case) :?>
                                <div class="slider-nav__slide">
                                    <p class="slider-nav__title">
                                        <?php
                                            $imgUnactive = get_post_meta($case->ID, 'icon', true);
                                            $imgUnactiveLink = wp_get_attachment_image_url($imgUnactive, '50_50');
                                            $imgActive = get_post_meta($case->ID, 'iconActive', true);
                                            $imgActiveLink = wp_get_attachment_image_url($imgActive, '50_50');
                                        ?>
                                        <img src="<?php echo $imgActiveLink ?>" class="slider-nav__icon active">
                                        <img src="<?php echo $imgUnactiveLink ?>" class="slider-nav__icon">
                                        <span class="nav-link_text"><?php echo $case->post_title ?></span>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="slider-for">
                            <?php foreach ($cases as $caseItem) :?>
                                <div class="slider-for__slide">
                                    <div class="slider-for__slide__content">
                                        <p class="cases_tab__title">Result</p>
                                        <table class="cases_tab__table">
                                            <tr>
                                                <td></td>
                                                <td class="result_before">
                                                    before our work
                                                    <span><?php echo get_post_meta($caseItem->ID, 'beforeWork', true); ?></span>
                                                </td>
                                                <td></td>
                                                <td class="result_after">
                                                    our work
                                                    <span><?php echo get_post_meta($caseItem->ID, 'afterWork', true); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tr_title">ROAS</td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'beforeROAS', true); ?></td>
                                                <td><i class="icon_arrow__right"></i></td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'afterROAS', true); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tr_title">Conversions</td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'beforeConversion', true); ?></td>
                                                <td><i class="icon_arrow__right"></i></td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'afterConversion', true); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tr_title">
                                                    ROMI<br>
                                                    <span>(Shopping)</span>
                                                </td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'beforeROMI', true); ?></td>
                                                <td><i class="icon_arrow__right"></i></td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'afterROMI', true); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tr_title">
                                                    Net. Profit<br>
                                                    <span>(Shopping)</span>
                                                </td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'beforeNetProfit', true); ?></td>
                                                <td><i class="icon_arrow__right"></i></td>
                                                <td><?php echo get_post_meta($caseItem->ID, 'afterNetProfit', true); ?></td>
                                            </tr>
                                        </table>
                                        <div class="cases_tab__link_holder">
                                            <a href="<?php echo the_permalink($caseItem) ?>" class="cases_tab__link" target="_blank" >More info</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="google">
        <div class="wrapper container">
            <div class="google_content">
                <h3 class="google_info">
                    Since 2017, Penguin-team is a Premier Google Partner Agency which helps advertisers improve their
                    performance in Search and Display network.
                </h3>
                <div class="google_logo__holder">
                    <a href="<?php echo REL_ASSETS_URI ?>img/en/google_logo.jpg" data-fancybox data-caption="Google">
                        <img class="img-responsive img-width" src="<?php echo REL_ASSETS_URI ?>img/en/google_logo.png" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="feedback mt-5 mb-5">
        <div class="wrapper container">
            <form method="post" class="feedback_form wps_form_js">
                <input type="hidden" name="form_subject"  value="Get Free Analysis Shopping">
                <input type="hidden" name="form_title"    value="Get Free Analysis Shopping">
                <input type="hidden" name="form_redirect" value="en/thank-you/">
                <h3 class="feedback_form__title">Get <b>Free Analysis</b></h3>
                <p class="feedback_form__text">
                    Request free ROI and Profit Analysis of your Google Shopping Campaigns. Will help to determine how
                    Penguin-team can improve and scale your Google Ads account
                </p>
                <div class="feedback_form__row">
                    <div class="feedback_form__input_holder">
                        <input type="text" name="Name" placeholder="Name" required>
                    </div>
                    <div class="feedback_form__input_holder">
                        <input type="text" name="Company" placeholder="Company" required>
                    </div>
                </div>
                <div class="feedback_form__row">
                    <div class="feedback_form__input_holder">
                        <input type="email" name="Email" placeholder="Business E-mail" required>
                    </div>
                    <div class="feedback_form__input_holder">
                        <input class="user_phone" type="tel" name="Phone" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="feedback_form__textarea_holder">
                    <textarea name="Message" placeholder="Message"></textarea>
                </div>
                <div class="feedback_form__submit_holder">
                    <button class="feedback_form__submit section_link" type="submit">Send</button>
                </div>
            </form>
        </div>
    </section>
</div>

<div class="simpleModalWindowWrap modal1">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow">
                <span class="simpleModalWindowClose"></span>
                <form method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Analysis Shopping">
                    <input type="hidden" name="form_title"    value="Get Free Analysis Shopping">
                    <input type="hidden" name="form_redirect" value="en/thank-you/">
                    <p class="feedback_form__title">Get <b>Free Analysis</b></p>
                    <p class="feedback_form__text">
                        Request free ROI and Profit Analysis of your Google Shopping Campaigns. Will help to determine
                        how Penguin-team can improve and scale your Google Ads account
                    </p>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Name" placeholder="Name" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Company" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="email" name="Email" placeholder="Business E-mail" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input class="user_phone" type="tel" name="Phone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="feedback_form__textarea_holder">
                        <textarea name="Message" placeholder="Message"></textarea>
                    </div>
                    <div class="feedback_form__submit_holder">
                        <button class="feedback_form__submit section_link" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php
/*
Template Name: UTM EN
Template Post Type: page
*/
get_header(en);
?>
<section class="utm__page">
    <div class="container">
        <h1 data-aos="zoom-in" class="text-center utm_title">UTM-generator</h1>

        <div class="utm_holder">
        <a href="https://app.pengstud.com/" class="utm__page_info_btn  ppctools__info__more ga__utm" target="_blank" >Go to UTM</a>
        </div>

        <div class="utm_page_content">
            <p>UTM generator allows you to create utm links to track company activities on the web.</p>

            <p>UTM tag (Urchin Tracking Module) - these are the link parameters that transmit information to analytics services (Yandex.Metrica or Google Analytics). The module was coined by Urchin Software which was bought by Google in 2005.</p>


            <div class="page_content_bold">The tag consists of two elements  </div>
            <div class="large_content_text" data-aos="zoom-in">
                <span>utm_source=</span>
                <span class="info_text">facebook</span>
            </div>
            <div class="large_content_text_helper">
                <span>name of the parameter that is being monitored</span>
                <span>parameter value</span>
            </div>

            <div class="page_font_site" data-aos="fade-right">
                <p>In a real link there are more parameters actually, and it looks something like this:</p>
                <div class="orange_block text-center">
                    <p>www.site-name.com?utm_medium=cpc&utm_source=yandex.{source_type}&utm_campaign={campaign_id}&utm_content={ad_id}&utm_term={keyword}</p>
                </div>
                <div>
                    <p>This example is quite universal for Yandex; when it’s used, all variables will automatically pull up, it is only necessary to replace <span class="grey_text">www.site-name.com</span> with the needed option.</p>
                </div>
            </div>

            <h3 class="h3_title">UTM tag structure</h3>
            <div class="text-center">There are 3 required and 2 additional parameters</div>

            <div class="block_wrapper">
                <div class="block_item" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <div class="block_title green_modifier">Required parameters</div>
                    <div class="block_content">
                        <ul class="params_list">
                            <li class="param_list_item">
                                <span class="badge_green">utm_source</span>
                                <span class="param_text">source of traffic (Google, Yandex, Facebook, Youtube)</span>
                            </li>
                            <li class="param_list_item">
                                <span class="badge_green">utm_medium</span>
                                <span class="param_text">type of traffic (cpc, cpm, display, link, post, banner)</span>
                            </li>
                            <li class="param_list_item">
                                <span class="badge_green">utm_campaign</span>
                                <span class="param_text">advertising campaign name</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="block_item" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="200">
                    <div class="block_title blue_modifier">Optional parameters</div>
                    <div class="block_content">
                        <ul class="params_list">
                            <li class="param_list_item">
                                <span class="badge_blue">utm_term</span>
                                <span class="param_text">Keyword</span>
                            </li>
                            <li class="param_list_item">
                                <span class="badge_blue">utm_content</span>
                                <span class="param_text">Ad content</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="h3_title">Enhanced dynamic inserts in UTM tag</h3>

            <p>Apart from static parameters, you can specify dynamic, which will decipher the information in detail.</p>
            <p>Example of a link with dynamic parameters:</p>
            <div class="orange_block" data-aos="fade-right">
                <p>www.site-name.com?utm_source=yandex&utm_medium=cpc&utm_campaign=dombrus&type={source_type}&source={source}&block={position_type}&position={position}&keyword={keyword}</p>
            </div>
            <p>As a result, upon transition, the link will look like this:</p>
            <div class="orange_block" data-aos="fade-left">
                <p>www.site-name.com?utm_source=yandex&utm_medium=cpc&utm_campaign=dombrus&type={source_type}<span class="black_text">&type=search&source=none&block=premium&position=2&keyword=keyword</span></p>
            </div>
            <p>Thus, the automatic substitution of information will occur. This option should be used in large advertising campaigns with a large number of variables.</p>
        </div>
    </div>
</section>
<section class="utm_image_section">
    <h3 class="h3_title">Where you can see the data,<br>received with the help of utm-tags</h3>
    <div class="mb-4">In Google Analytics. You can see it in the channel “Other”</div>

    <div class="row align-items-center">
        <div class="col-md-12 col-sm-12 vcenter fn_utm_slider utm_slider">
            <div class="utm_slide_item">
                <img src="<?php echo ABS_ASSETS_URI; ?>/img/utm/utm_slide_1.jpg" alt="">
            </div>
            <div class="utm_slide_item">
                <img src="<?php echo ABS_ASSETS_URI; ?>/img/utm/utm_slide_2.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<section class="bottom_section">
    <div class="container">
        <h3 class="h3_title">Shorten the link with utm-tag</h3>
        <div class="utm_page_content">
            <div class="text-center mb-4">
                <p>If the link needs to be used in social networks or in messages, it’s advisable to use link shortening in order to save space for content.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" >
                    <img src="<?php echo ABS_ASSETS_URI; ?>/img/utm/bad_utm.png" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="<?php echo ABS_ASSETS_URI; ?>/img/utm/good_utm.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>

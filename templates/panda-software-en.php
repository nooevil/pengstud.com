<?php
/*
Template Name: panda-software_en
Template Post Type: page
*/
$bodyClass = 'panda-page';
$divClass = 'bg_panda-gradient';
get_header(en);
?>
    <section class="panda_info">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>Optimize your Google Shopping campaigns according to ROI and Profit/Loss data</h2>
                <p>
                    Panda ppc micro management service helps to create report with ROI and Profit data of each product.
                </p>
            </div>
            <div class="panda_info__banner">
                <?php
                    $img = get_post_meta($post->ID, 'image', true);
                    $imgLinkFull = wp_get_attachment_image_url($img, 'full', true);
                    $imgLinkPreview = wp_get_attachment_image_url($img, '1200_700', true);
                ?>
                <a href="<?php echo $imgLinkFull ?>" data-fancybox data-caption="Panda banner">
                    <img class="img-responsive img-width" src="<?php echo $imgLinkPreview ?>" alt=""/>
                </a>
            </div>
            <h3 class="panda_info__formula">
                Google Ads + Merchant + Margin =<br>
                SKU-level reporting with ROI and Profit
            </h3>
            <div class="section_link__holder">
                <a href="http://panda4ppc.com/request-demo/" class="section_link panda_info__link">Request a demo</a>
            </div>
        </div>
    </section>
    
    <section class="panda-features">
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>Useful features of Panda</h2>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <div class="panda-features_banner__holder">
                        <img src="<?php echo REL_ASSETS_URI ?>img/en/panda_features__banner.png" alt="" class="img-responsive img-width">
                    </div>
                </div>
                <div class="col-md-7 col-lg-7">
                    <ul class="panda-features_list">
                        <li class="panda-features_item">
                            <h3>Upload Margin</h3>
                            <p>Uploading margin by each product or category build Profit and Loss report</p>
                        </li>
                        <li class="panda-features_item">
                            <h3><b>Automatically</b> calculate your Target CPC</h3>
                            <p>
                              Automatically calculate your Target CPC with using your investment rate.<br>
                              Target CPC = item price * margin * conv. rate * invest. rate
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Previous Reporting</h3>
                            <p>
                              Made optimization using ROAS? Check your historical data and identify efficiency of your
                              previous Google Shopping.
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Recommendations</h3>
                            <p>
                              Panda software gives recommendations on what you need to do with each product according your
                              interests in ROI and Profit.
                            </p>
                        </li>
                        <li class="panda-features_item">
                            <h3>Quick dashboarding</h3>
                            <p>
                              Quickly get information about the current campaign status.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="panda-works">
    <div class="wrapper container">
        <div class="section_title__holder">
            <h2>How <span>does it work?</span></h2>
        </div>
        <div class="panda-works_scheme">
            <div class="scheme_row">
                <div class="scheme_item scheme_item__1">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__add"></span>
                    </div>
                    <p class="scheme_text">
                        Add a New Project
                    </p>
                </div>
                <div class="scheme_item scheme_item__2">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__link"></span>
                    </div>
                    <p class="scheme_text">
                        Link your Google Ads and Merchant Account
                    </p>
                </div>
                <div class="scheme_item scheme_item__3">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__report"></span>
                    </div>
                    <p class="scheme_text">
                        Choose Report Type
                    </p>
                </div>
                <div class="scheme_row__bg_white"></div>
            </div>
            <div class="scheme_row">
                <div class="scheme_item scheme_item__4">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__choose"></span>
                    </div>
                    <p class="scheme_text">
                        Choose Campaign
                    </p>
                </div>
                <div class="scheme_item scheme_item__5">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__margin"></span>
                    </div>
                    <p class="scheme_text">
                        Add Margin to Report
                    </p>
                </div>
                <div class="scheme_item scheme_item__6">
                    <div class="scheme_icon__holder">
                        <span class="scheme_icon scheme_icon__achieve"></span>
                    </div>
                    <p class="scheme_text">
                        Achieve bid suggestions
                    </p>
                </div>
                <div class="scheme_row__bg_white"></div>
            </div>

        </div>
        <div class="section_link__holder">
            <a href="http://panda4ppc.com/request-demo/" class="section_link panda-work__link">Request a demo</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<?php
/*
Template Name: About us
Template Post Type: page
*/
$bodyClass = 'about-us_page';
$divClass = 'bg_panda-gradient';
get_header(en);
?>

        <section class="about-us_info">
            <div class="wrapper container">
                <div class="section_title__holder">
                    <h1><span>PPC agency</span> Penguin-team</h1>
                    <h3>
                        Since 2013 we provide ppc-services for different clients. Our main focus is <a href="google-shopping-management-2/">Google
                            Shopping Management</a>. To be successful in it we develop our own software and use best world
                        practice.
                    </h3>
                </div>
                <div class="about-us__banner">
                    <?php
                        $img = get_post_meta($post->ID, 'mainScreen', true);
                        $imgLink = wp_get_attachment_image_url($img, '1200_700', true);
                    ?>
                    <a href="<?php echo $imgLink ?>" data-fancybox data-caption="Panda banner">
                        <img class="img-responsive img-width" src="<?php echo $imgLink ?>" alt=""/>
                    </a>
                </div>
                <div class="section_link__holder">
                    <a href="#" class="section_link about-us__link" data-addressee="all" data-simple_modal="ask_question">Ask
                        question</a>
                </div>
            </div>
        </section>
        <section class="about-us_advantages">
            <div class="wrapper container">
                <div class="section_title__holder">
                    <h2>Our advantages</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="advantages_item advantages_item__support">
                            <div class="advantages_item__icon_holder">
                                <span class="advantages_item__icon advantages_item__icon_support"></span>
                            </div>
                            <div class="advantages_item__content">
                                <h3 class="advantages_item__title">
                                    <b>4+ years</b> SMB support expertize
                                </h3>
                                <p class="advantages_item__text">
                                    Since 2013 Penguin-team optimize Google Ad campaigns and know challenges, restrictions,
                                    opportunities which small and medium companies face
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="advantages_item advantages_item__google">
                            <div class="advantages_item__icon_holder">
                                <span class="advantages_item__icon advantages_item__google"></span>
                            </div>
                            <div class="advantages_item__content">
                                <h3 class="advantages_item__title">
                                    Since 2017 <b>Premier Google Partner</b>
                                </h3>
                                <p class="advantages_item__text">
                                    <a   href="<?php echo REL_ASSETS_URI ?>img/en/google_logo.jpg" data-fancybox data-caption="Google" >Premier Google Partner</a> status that shows responsibility and quality of
                                    the agency
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="advantages_item advantages_item__software">
                            <div class="advantages_item__icon_holder">
                                <span class="advantages_item__icon advantages_item__software"></span>
                            </div>
                            <div class="advantages_item__content">
                                <h3 class="advantages_item__title">
                                    <b>Own SoftWare</b>
                                </h3>
                                <p class="advantages_item__text">
                                    We developed <a href="panda-software-2/">Panda ppc micro-management</a> service which helps to set up
                                    bids according to ROI and Profit by each SKU
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="advantages_item advantages_item__flexibility">
                            <div class="advantages_item__icon_holder">
                                <span class="advantages_item__icon advantages_item__flexibility"></span>
                            </div>
                            <div class="advantages_item__content">
                                <h3 class="advantages_item__title">
                                    <b>Flexibility</b> to customers
                                </h3>
                                <p class="advantages_item__text">
                                    We always try to build a working process in such a way so that will be convenient for the client
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-us_team">
            <div class="wrapper container">
                <div class="section_title__holder">
                    <h2>Our team</h2>
                </div>
                <?php
                    $team = UI_SimpleGallery::wps__get_simple_gallery('ourTeam');
                    $imgDevelopersFull = wp_get_attachment_image_url($team[1], 'full');
                    $imgDevelopersPreview = wp_get_attachment_image_url($team[1], '445_220');

                    $imgDesignersFull = wp_get_attachment_image_url($team[2], 'full');
                    $imgDesignersPreview = wp_get_attachment_image_url($team[2], '445_220');

                    $imgPpcFull = wp_get_attachment_image_url($team[3], 'full');
                    $imgPpcPreview = wp_get_attachment_image_url($team[3], '640_480');
                ?>
                <div class="about-us__team_gallery">
                    <div class="row">
                        <div class="col-md-5 d-flex flex-column justify-content-between">
                            <div class="team_gallery__item team_gallery__item_small">
                                <a href="<?php echo $imgDevelopersFull ?>" data-fancybox="gallery" data-caption="Developers">
                                    <img class="img-responsive img-width" src="<?php echo $imgDevelopersPreview ?>" alt=""/>
                                </a>
                                <span class="team_gallery__item_title">Developers</span>
                            </div>
                            <div class="team_gallery__item team_gallery__item_small">
                                <a href="<?php echo $imgDesignersFull ?>" data-fancybox="gallery" data-caption="Designers">
                                    <img class="img-responsive img-width" src="<?php echo $imgDesignersPreview ?>" alt=""/>
                                </a>
                                <span class="team_gallery__item_title">Designers</span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="team_gallery__item team_gallery__item_big">
                                <a href="<?php echo $imgPpcFull ?>" data-fancybox="gallery"
                                   data-caption="PPC - specialists">
                                    <img class="img-responsive img-width" src="<?php echo $imgPpcPreview ?>" alt=""/>
                                </a>
                                <span class="team_gallery__item_title">PPC - specialists</span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="about-us_team__info">
                    We are inspired by our colleagues and competitors - other IT and marketing companies which by their example show that it is possible and necessary to create product-oriented businesses which show by their own example, develop it and change the current situation for the better. And for our part, we are ready to make every effort to participate in these changes and contribute to a successful future!
                </p>
            </div>
        </section>
    </div>



    <section class="about-us_managers">
        <?php
            $managers = UI_Repeater::wps__get_repeater('managers');
        ?>
        <div class="wrapper container">
            <div class="section_title__holder">
                <h2>Contact <span>our managers</span></h2>
            </div>
        </div>
        <div class="about-us_managers__list">
            <?php foreach ($managers as $manager) :?>
                <div class="about-us_managers__item">
                    <div class="wrapper container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="managers_img__holder">
                                    <?php
                                        $imgLink = wp_get_attachment_image_url($manager['image'], 'full');
                                    ?>
                                    <img class="img-responsive img-width" src="<?php echo $imgLink ?>" alt="<?php echo $manager['name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h3 class="managers_name"><?php echo $manager['name'] ?></h3>
                                <h3>
                                  <a href="<?php echo $manager['link'] ?>" target="_blank" class="managers_in">
                                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                      <?php echo $manager['position'] ?>
                                  </a>
                                </h3>
                                <p class="managers_info">
                                    <?php echo $manager['about'] ?>
                                </p>
                                <a href="#" class="section_link managers_ask__link fn_ask_question" data-toperson="<?php echo $manager['name'] ?>" data-simple_modal="ask_question">Ask <?php echo $manager['name'] ?> a Question</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


<?php get_footer(); ?>
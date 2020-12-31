<?php
/*
Template Name: Статическая статья
Template Post Type: page
*/
get_header();
?>

    <section class="sigle_blog__header" style="background-image: url(<?php echo REL_ASSETS_URI?>img/pingvi_min.jpg);">
        <div class="wrapper_m">
            <div class="sigle_blog__header__footer">
                <div class="sigle_blog__header__footer__t1">
                    <h1><?php the_title(); ?></h1>
                </div>
                <!--<div class="sigle_blog__header__footer__t2">
                    <span class="author"><?php /*/*echo get_post_meta($post->ID, "author_post", true)[0]; */?></span>
                </div>-->
            </div>
            <div class="sigle_blog__header__data">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span><?php the_time('j.m.Y') ?></span>
            </div>
        </div>
    </section>

    <section class="sigle_blog">
        <div class="wrapper_m">

            <div class="sigle_blog__content">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

            <div class="sigle_blog__banners_holder" id="fn__sigle_blog__banners_holder">
                <div class="sigle_blog__banners" id="fn__sigle_blog__banners">
                    <div class="sigle_blog__banners__slider fn_sigle_blog__banners__slider">
                        <div class="sigle_blog__banners__item">
                            <div class="sigle_blog__banners__item_content">
                                <img src="<?php echo REL_ASSETS_URI; ?>img/banner1.jpg" alt="">
                                <a href="negativekeywords-tool/" target="_blank"></a>
                            </div>
                        </div>
                        <div class="sigle_blog__banners__item">
                            <div class="sigle_blog__banners__item_content">
                                <img src="<?php echo REL_ASSETS_URI; ?>img/banner2.jpg" alt="">
                                <a href="findkeywords-tool/" target="_blank"></a>
                            </div>
                        </div>
                        <div class="sigle_blog__banners__item">
                            <div class="sigle_blog__banners__item_content">
                                <img src="<?php echo REL_ASSETS_URI; ?>img/banner3.jpg" alt="">
                                <a href="utm/google" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<?php get_footer(); ?>
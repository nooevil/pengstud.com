<?php
/*
Template Name: Шаблон статьи (Шапка на всю высоту)
Template Post Type: blog
*/
get_header();
?>

    <section class="sigle_blog__header sigle_blog__header__tmp_1">

        <div class="image__holder">
            <img src="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '1600_800')[0]; ?>" alt="">
        </div>

        <div class="wrapper_m">
            <div class="sigle_blog__header__footer">
                <div class="sigle_blog__header__footer__t1">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="sigle_blog__header__footer__t2">
                    <span class="author"><?php echo get_post_meta($post->ID, "author_post", true)[0]; ?></span>
                </div>
            </div>
            <div class="sigle_blog__header__data">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span><?php the_time('j.m.Y') ?></span>
            </div>
        </div>
    </section>

    <section class="sigle_blog">
        <div class="wrapper_m">
            <div class="sigle_blog__actions__wrap" id="fn__sigle_blog__actions__wrap">
                <div class="sigle_blog__actions" id="fn__sigle_blog__actions">
                    <button class="sigle_blog__actions__item sigle_blog__actions__heart fn__wps__likes_holder <?php WPS_Likes::renderActiveLikes($post->ID); ?>"
                            title="Понравилась статья?" data-post_id="<?php echo $post->ID; ?>">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <span class="fn__wps__likes_holder__count"><?php echo WPS_Likes::getCountLikesPost($post->ID); ?></span>
                    </button>
                    <?php /*
                    <div class="sigle_blog__actions__item sigle_blog__actions__comment">
                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                        <span>0</span>
                    </div>
                    */ ?>

                    <div class="sigle_blog__actions__item sigle_blog__actions__views">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span><?php echo get_post_meta($post->ID, "wps_post_views_count", true); ?></span>
                    </div>

            		<div class="sigle_blog__actions__item">
		                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
		                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		                </div>
            		</div>

            		<div class="sigle_blog__actions__item">
		                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
		                    <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		                </div>
            		</div>

                </div>
            </div>
            <div class="sigle_blog__content">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

                <div class="sigle_blog__banners_holder" id="fn__sigle_blog__banners_holder">

                    <!--
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
                    -->
                    <div class="sigle_blog__banners" id="fn__sigle_blog__banners">
                        <div class="sigle_blog__banners__slider fn_sigle_blog__banners__slider">
                            <div class="sigle_blog__banners__item">
                                <div class="sigle_blog__banners__item_content">
                                    <img src="<?php echo REL_ASSETS_URI; ?>img/banner4.jpg" alt="">
                                    <a href="ppc-oprosnik/" target="_blank"></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

        </div>
    </section>



    <?php
        $post_terms = wp_get_object_terms($post->ID, 'topic');
        if(is_array($post_terms) && !empty($post_terms)) {
            $tax_ids = array();
            foreach ($post_terms as $post_term) {
                $tax_ids[] = $post_term->term_id;
            }

            $tax_ids_str = implode(',',$tax_ids);

            $args = array(
                'numberposts' => 5,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'topic',
                        'field' => 'id',
                        'terms' => $tax_ids_str,
                    )
                ),
                'orderby'     => 'date',
                'order'       => 'DESC',
                'exclude'     => $post->ID,
                'post_type'   => 'blog',
                'suppress_filters' => true,
            );

            $related_posts = get_posts( $args );
        }
    ?>


    <?php if(is_array($related_posts) && !empty($related_posts)) :?>
    <section class="blog__related">
        <div class="wrapper_m">
        <h2 class="blog__related_title">Популярные статьи</h2>
            <div class="blog_archive__wrap slider_posts fn_related_blog_slider">
                <?php foreach ($related_posts as $post) :?>
                    <?php setup_postdata($post); ?>
                    <div class="related_blog_slider__item">
                        <div class="blog_archive__item"
                             style="background-image: url(<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '600_350')[0]; ?>)">
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <div class="blog_archive__item__actions">
                                    <div class="blog_archive__item__actions__item blog_archive__item__actions__item__views">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span><?php echo get_post_meta($post->ID, "wps_post_views_count", true); ?></span>
                                    </div>
                                    <div class="blog_archive__item__actions__item blog_archive__item__actions__item__likes">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <span><?php echo WPS_Likes::getCountLikesPost($post->ID); ?></span>
                                    </div>
                                </div>
                                <span class="blog_archive__item__title">
                                    <h2><?php the_title(); ?></h2>
                                </span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="slider_nav">
                <span class="works__footer__slider__prev" id="works__footer__slider__prev__js"></span>
                <span class="works__footer__slider__next" id="works__footer__slider__next__js"></span>
            </div>

        </div>
    </section>
        <?php endif; ?>

    <!--<section class="ngkw_subscribe">
        <div class="wrapper_m">
            <div class="row justify-content-center">
                <h2 class="ngkw_subscribe__title">Получить 7 писем о том,<br>как улучшить свой AdWords аккаунт +PPC статьи и tools</h2>
            </div>
            <div class="ngkw_subscribe__form">
                <form class="fn__site_subscribe_form">
                    <div class="ngkw_subscribe__form__row">
                        <p>Email:</p>
                        <input type="email" name="user_email" required autocomplete="off">
                    </div>
                    <div class="ngkw_subscribe__form__row">
                        <button type="submit" class="ngkw_relize__load ga_subscribe" >Подписаться</button>
                    </div>
                    <p class="fn__site_subscribe_form_message">Подписка оформлена!</p>
                </form>
            </div>
        </div>
    </section>-->



    <section class="sigle_blog__subscr">
        <div class="wrapper_m">
            <div class="sigle_blog__subscr__holder">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col-md-7">
                        <div class="sigle_blog__subscr__text">
                            <p class="title">Получить 7 писем о том,<br>как улучшить аккаунт Google Ads<br>+ статьи про РРС</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sigle_blog__subscr__form">
                            <form class="fn__site_dispatch_form" >

                                <div class="sigle_blog__subscr__form__row">
                                    <span class="title" >Имя</span>
                                    <input type="text" name="user_fio" placeholder="Петр Иванов">
                                </div>

                                <div class="sigle_blog__subscr__form__row">
                                    <span class="title">e-mail</span>
                                    <input type="email" name="user_email" required placeholder="mailtest@gmail.com">
                                </div>

                                <div class="sigle_blog__subscr__form__row">
                                    <button type="submit">Подписаться</button>
                                </div>

                                <!-- hidden -->
                                <input type="text" name="post_name" value="Form_С" hidden>
                                <!-- hidden -->

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="sigle_blog__comments">
        <div class="wrapper_m">


			<?php /*


            <div class="sigle_blog__comments__actions">
                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                </div>
                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
                    <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i
                                class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            </div>

            */ ?>


            <div class="sigle_blog__comments__wrap">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        </div>
    </section>

    <div class="float_sbscr_form fn__float_sbscr_form">
        <div class="float_sbscr_form__head">
            <span class="title">Улучшить Ads</span>
        </div>
        <div class="float_sbscr_form__content">
            <p class="title">Улучшить свой Ads</p>
            <p class="text">Получите 7 писем, о том, как можно улучшить свой аккаунт в Ads</p>
            <a class="btn" href="https://pengstud.com/subscribe-email">Подписаться</a>
        </div>
    </div>

<?php get_footer(); ?>

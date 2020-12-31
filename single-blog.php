<?php
$currLang= pll_current_language();

if($currLang == 'ru' ) {
    get_header();
} else {
    get_header(en);
}
?>

<?php  if( is_user_logged_in() ) :  ?>
    <article class="single-blog-v3">
        <section class="single-blog-v3__control-panel">
            <a class="single-blog-v3__control-panel__list-link" >
                <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="26" height="2" fill="#009AD4"/>
                    <rect y="7" width="26" height="2" fill="#009AD4"/>
                    <rect y="14" width="26" height="2" fill="#009AD4"/>
                </svg>
                <span>Содержание</span>
            </a>
            <div class="single-blog-v3__control-panel__info">
                 <!-- views -->
                <p class="single-blog-v3__control-panel__info__text">
                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12.6364C6.02097 12.6364 2.59893 10.2463 
                        1.08357 6.81818C2.59893 3.39005 6.02097 1 10 1C13.979 1 17.4011 3.39005 18.9164 6.81818C17.4011 
                        10.2463 13.979 12.6364 10 12.6364ZM10 13.6364C14.5455 13.6364 18.4273 10.8091 20 6.81818C18.4273 
                        2.82727 14.5455 0 10 0C5.45455 0 1.57273 2.82727 0 6.81818C1.57273 10.8091 5.45455 13.6364 10 
                        13.6364ZM7 7C7 5.34784 8.34784 4 10 4C11.6522 4 13 5.34784 13 7C13 8.65216 11.6522 10 10 10C8.34784 
                        10 7 8.65216 7 7ZM10 3C7.79556 3 6 4.79556 6 7C6 9.20444 7.79556 11 10 11C12.2044 11 14 9.20444 
                        14 7C14 4.79556 12.2044 3 10 3Z" fill="#848484"/>
                    </svg>
                    <?php echo get_post_meta( $post->ID, "wps_post_views_count", true ); ?>
                </p>
                <!-- likes -->
                <button 
                    class="single-blog-v3__control-panel__info__likes fn__wps__likes_holder <?php WPS_Likes::renderActiveLikes($post->ID); ?>"
                    title="Понравилась статья?" 
                    data-post_id="<?php echo $post->ID; ?>">
                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.61932 1.99617L8 2.4432L8.38068 1.99617C9.16088 1.07997 10.3594 0.5 11.6 0.5C13.7879 
                        0.5 15.5 2.21214 15.5 4.4C15.5 5.74776 14.8984 7.00974 13.738 8.42844C12.5718 9.85416 10.8942 
                        11.3765 8.82413 13.2536L8.82341 13.2543L7.99872 14.005L7.17626 13.262L7.17519 13.261L7.17159 
                        13.2577C5.10356 11.3784 3.42752 9.85534 2.26213 8.42957C1.10162 7.00977 0.5 5.74776 0.5 4.4C0.5 
                        2.21214 2.21214 0.5 4.4 0.5C5.64061 0.5 6.83912 1.07997 7.61932 1.99617Z" stroke="#848484"/>
                    </svg>
                    <span class="fn__wps__likes_holder__count"><?php echo WPS_Likes::getCountLikesPost($post->ID); ?></span>
                </button>
                <!-- share -->
                <div class="single-blog-v3__control-panel__info__icons">
                  <a title="facebook" class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/facebook-logo-gray.svg" alt="">
                  </a>
                  <a title="twitter" class="twitter" href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/twitter-logo-gray.svg" alt="">
                  </a>
                  <a title="pocket" class="pocket" href="https://getpocket.com/save?url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/pocket-logo-gray.svg" alt="">
                  </a>
                </div>
            </div>
        </section>

        <section class="single-blog-v3__banner">

        </section>

        <section class="single-blog-v3__header">
            <div class="single-blog-v3__header__text-wrap">
                <h1 class="single-blog-v3__header__text-wrap__title"><?php the_title(); ?></h1>
                <div class="single-blog-v3__header__text-wrap__separator"></div>
                <div class="single-blog-v3__header__text-wrap__info">
                    <!-- date -->
                    <p class="single-blog-v3__header__text-wrap__info__text">
                      <?php the_time('j.m.Y') ?>
                    </p>
                    <!-- read time -->
                    <?php
                      $article_time = get_post_meta($post->ID, "read_time", true);
                      if ($article_time !== '') : ?>
                        <p class="single-blog-v3__header__text-wrap__info__text">
                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8C15 11.866 11.866 15 8 15C4.13401 15 1 
                            11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8ZM16 8C16 12.4183 12.4183 16 8 
                            16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM8.5 
                            7.75V4H7.5V8.25L11.7 11.4L12.3 10.6L8.5 7.75Z" fill="#848484"/>
                          </svg>
                          <?php echo $article_time; ?>
                        </p>
                    <!-- level -->
                    <?php
                        $article_level = get_post_meta($post->ID, "complexity_post", true);
                        if ($article_level == '1') : ?>
                            <p class="single-blog-v3__header__text-wrap__info__text">
                                <img 
                                    src="<?php echo REL_ASSETS_URI ?>img/blog/easy icon.svg">
                                easy
                            </p>
                        <?php endif; ?>
                        <?php if ($article_level == '2') : ?>
                            <p class="single-blog-v3__header__text-wrap__info__text">
                                <img 
                                    src="<?php echo REL_ASSETS_URI ?>img/blog/middle icon.svg">
                                middle
                            </p>
                        <?php endif; ?>
                        <?php if ($article_level == '3') : ?>
                            <p class="single-blog-v3__header__text-wrap__info__text">
                                <img 
                                    src="<?php echo REL_ASSETS_URI ?>img/blog/hard icon.svg">
                                hard
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="single-blog-v3__header__text-wrap__author">
                    <?php
                        $post_author_ID = get_post_meta($post->ID, 'author_post__cart', true)[0];
                        if (!empty($post_author_ID)) :
                    ?>
                        <div class="single-blog-v3__header__text-wrap__author__photo">
                            <?php echo wp_get_attachment_image( get_post_meta($post_author_ID, "photo", true), '300_300'); ?>
                        </div>
                        <p class="single-blog-v3__header__text-wrap__author__name"><?php echo get_the_title($post_author_ID); ?></p>
                        <p class="single-blog-v3__header__text-wrap__author__subtitle"><?php echo get_post_meta($post_author_ID, "position", true) ?></p>
                        <?php the_permalink($post_author_ID) ?>
                        
                        <a href="<?php echo get_page_link( $post_author_ID ); ?>"></a>
                    <?php endif; ?>                
                </div>
            </div>
            <div class="single-blog-v3__header__img-container">
                <img src="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '1600_800')[0]; ?>" alt="">
            </div>
        </section>

        <section class="single-blog-v3__main-wrap">

            <div class="single-blog-v3__main-wrap__sidebar">
                <div class="single-blog-v3__main-wrap__sidebar__list">
                    <h3 class="single-blog-v3__main-wrap__sidebar__list__title">Содержание</h3>
                    <div class="single-blog-v3__main-wrap__sidebar__list__separator"></div>
                    
                </div>
                            
                <div class="blog-archive-v3__content__sidebar__top-articles">
                    <h3 class="blog-archive-v3__content__sidebar__top-articles__title">
                        Топовые статьи
                    </h3>
                    <div class="blog-archive-v3__content__sidebar__top-articles__separator"></div>
                    <div class="blog-archive-v3__content__sidebar__top-articles__buttons">
                        <button id="allTime">За все время</button>
                        <button id="month">За месяц</button>
                    </div>
                    <div class="blog-archive-v3__content__sidebar__top-articles__list all-time-list">
                        <?php
                        $cur_cat_obj = get_queried_object();
                        $args_loop = array(
                            'post_type'      => 'blog',
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'wps_post_views_count'
                        );
                        $custom_loop = new WP_Query( $args_loop );
                        while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>

                            <a target="_blank" href="<?php the_permalink(); ?>" class="blog-archive-v3__content__sidebar__top-articles__list__item">
                            <h4 class="blog-archive-v3__content__sidebar__top-articles__list__item__title">
                                <?php the_title(); ?>
                            </h4>

                            <div class="blog-archive-v3__content__sidebar__top-articles__list__item__info">
                                <!-- views -->
                                <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12.6364C6.02097 12.6364 2.59893 10.2463 
                                    1.08357 6.81818C2.59893 3.39005 6.02097 1 10 1C13.979 1 17.4011 3.39005 18.9164 6.81818C17.4011 
                                    10.2463 13.979 12.6364 10 12.6364ZM10 13.6364C14.5455 13.6364 18.4273 10.8091 20 6.81818C18.4273 
                                    2.82727 14.5455 0 10 0C5.45455 0 1.57273 2.82727 0 6.81818C1.57273 10.8091 5.45455 13.6364 10 
                                    13.6364ZM7 7C7 5.34784 8.34784 4 10 4C11.6522 4 13 5.34784 13 7C13 8.65216 11.6522 10 10 10C8.34784 
                                    10 7 8.65216 7 7ZM10 3C7.79556 3 6 4.79556 6 7C6 9.20444 7.79556 11 10 11C12.2044 11 14 9.20444 
                                    14 7C14 4.79556 12.2044 3 10 3Z" fill="#848484"/>
                                </svg>
                                <?php echo get_post_meta( $post->ID, "wps_post_views_count", true ); ?>
                                </p>
                                <!-- likes -->
                                <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.61932 1.99617L8 2.4432L8.38068 1.99617C9.16088 1.07997 10.3594 0.5 11.6 0.5C13.7879 
                                    0.5 15.5 2.21214 15.5 4.4C15.5 5.74776 14.8984 7.00974 13.738 8.42844C12.5718 9.85416 10.8942 
                                    11.3765 8.82413 13.2536L8.82341 13.2543L7.99872 14.005L7.17626 13.262L7.17519 13.261L7.17159 
                                    13.2577C5.10356 11.3784 3.42752 9.85534 2.26213 8.42957C1.10162 7.00977 0.5 5.74776 0.5 4.4C0.5 
                                    2.21214 2.21214 0.5 4.4 0.5C5.64061 0.5 6.83912 1.07997 7.61932 1.99617Z" stroke="#848484"/>
                                </svg>
                                <?php echo WPS_Likes::getCountLikesPost($post->ID); ?>
                                </p>
                                <!-- read time -->
                                <?php
                                $article_time = get_post_meta($post->ID, "read_time", true);
                                if ($article_time !== '') : ?>
                                    <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8C15 11.866 11.866 15 8 15C4.13401 15 1 
                                        11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8ZM16 8C16 12.4183 12.4183 16 8 
                                        16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM8.5 
                                        7.75V4H7.5V8.25L11.7 11.4L12.3 10.6L8.5 7.75Z" fill="#848484"/>
                                    </svg>
                                    <?php echo $article_time; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- month -->
                    <div class="blog-archive-v3__content__sidebar__top-articles__list month-list">
                        <?php
                        function filter_where( $where = '' ) {
                            // за последние 30 дней
                            $where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
                            return $where;
                        }
                        
                        $month = date('m');
                        $year = date('Y');
                        $args_loop = array(
                            'post_type'      => 'blog',
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'wps_post_views_count',
                        );
                        add_filter( 'posts_where', 'filter_where' );
                        $custom_loop = new WP_Query( $args_loop );
                        remove_filter( 'posts_where', 'filter_where' );
                        while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>

                            <a target="_blank" href="<?php the_permalink(); ?>" class="blog-archive-v3__content__sidebar__top-articles__list__item">
                            <h4 class="blog-archive-v3__content__sidebar__top-articles__list__item__title">
                                <?php the_title(); ?>
                            </h4>

                            <div class="blog-archive-v3__content__sidebar__top-articles__list__item__info">
                                <!-- views -->
                                <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12.6364C6.02097 12.6364 2.59893 10.2463 
                                    1.08357 6.81818C2.59893 3.39005 6.02097 1 10 1C13.979 1 17.4011 3.39005 18.9164 6.81818C17.4011 
                                    10.2463 13.979 12.6364 10 12.6364ZM10 13.6364C14.5455 13.6364 18.4273 10.8091 20 6.81818C18.4273 
                                    2.82727 14.5455 0 10 0C5.45455 0 1.57273 2.82727 0 6.81818C1.57273 10.8091 5.45455 13.6364 10 
                                    13.6364ZM7 7C7 5.34784 8.34784 4 10 4C11.6522 4 13 5.34784 13 7C13 8.65216 11.6522 10 10 10C8.34784 
                                    10 7 8.65216 7 7ZM10 3C7.79556 3 6 4.79556 6 7C6 9.20444 7.79556 11 10 11C12.2044 11 14 9.20444 
                                    14 7C14 4.79556 12.2044 3 10 3Z" fill="#848484"/>
                                </svg>
                                <?php echo get_post_meta( $post->ID, "wps_post_views_count", true ); ?>
                                </p>
                                <!-- likes -->
                                <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.61932 1.99617L8 2.4432L8.38068 1.99617C9.16088 1.07997 10.3594 0.5 11.6 0.5C13.7879 
                                    0.5 15.5 2.21214 15.5 4.4C15.5 5.74776 14.8984 7.00974 13.738 8.42844C12.5718 9.85416 10.8942 
                                    11.3765 8.82413 13.2536L8.82341 13.2543L7.99872 14.005L7.17626 13.262L7.17519 13.261L7.17159 
                                    13.2577C5.10356 11.3784 3.42752 9.85534 2.26213 8.42957C1.10162 7.00977 0.5 5.74776 0.5 4.4C0.5 
                                    2.21214 2.21214 0.5 4.4 0.5C5.64061 0.5 6.83912 1.07997 7.61932 1.99617Z" stroke="#848484"/>
                                </svg>
                                <?php echo WPS_Likes::getCountLikesPost($post->ID); ?>
                                </p>
                                <!-- read time -->
                                <?php
                                $article_time = get_post_meta($post->ID, "read_time", true);
                                if ($article_time !== '') : ?>
                                    <p class="blog-archive-v3__content__sidebar__top-articles__list__item__info__text">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8C15 11.866 11.866 15 8 15C4.13401 15 1 
                                        11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8ZM16 8C16 12.4183 12.4183 16 8 
                                        16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM8.5 
                                        7.75V4H7.5V8.25L11.7 11.4L12.3 10.6L8.5 7.75Z" fill="#848484"/>
                                    </svg>
                                    <?php echo $article_time; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                </div>
                <div class="blog-archive-v3__content__sidebar__links">
                    <a title="www.facebook.com/pengstud.dp" href="https://www.facebook.com/pengstud.dp/" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-facebook.svg" alt="">
                    </a>
                    <a title="www.linkedin.com/company/ppc-agency-penguin-team/" href="https://www.linkedin.com/company/ppc-agency-penguin-team/" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-linkedin.svg" alt="">
                    </a>
                    <a title="www.slideshare.net/ssuser7f0c1f1" href="https://www.slideshare.net/ssuser7f0c1f1" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-social.svg" alt="">
                    </a>
                    <a title="www.instagram.com/penguin_team_tool" href="https://www.instagram.com/penguin_team_tool" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-instagram.svg" alt="">
                    </a>
                    <a title="www.pinterest.com/penguinteamdp" href="https://www.pinterest.com/penguinteamdp" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/icon-pinterest.svg" alt="">
                    </a>
                </div>


                <div class="single-blog-v3__main-wrap__sidebar__toogle-wrap">
                    <button class="single-blog-v3__main-wrap__sidebar__toogle-wrap__btn">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.95379 18L10 16.9484L2.0924 9L9.99998 1.05161L8.95379 9.14626e-08L1.12054e-06 
                            9L8.95379 18Z" fill="#848484"/>
                        </svg>
                    </button>
                </div>       
            </div>

            <div class="single-blog-v3__content">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <div class="post_rating__holder">
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                </div>
                <?php endwhile; ?>
            </div>
        </section>   
        
        <section class="single-blog-v3__author">
            <div class="single-blog-v3__author__wrap">
                <?php
                    $post_author_ID = get_post_meta($post->ID, 'author_post__cart', true)[0];
                    if (!empty($post_author_ID)) :
                ?>
                    <div class="single-blog-v3__author__wrap__photo">
                        <?php echo wp_get_attachment_image( get_post_meta($post_author_ID, "photo", true), '300_300'); ?>
                    </div>
                    <div class="single-blog-v3__author__wrap__content">
                        <h3 class="single-blog-v3__author__wrap__content__name">
                            <?php echo get_the_title($post_author_ID); ?>
                        </h3>
                        <p class="single-blog-v3__author__wrap__content__position">
                            <?php echo get_post_meta($post_author_ID, "position", true) ?>
                        </p>
                        <div class="single-blog-v3__author__wrap__content__separator"></div>
                        <p class="single-blog-v3__author__wrap__content__description">
                            <?php echo get_post_meta($post_author_ID, "description", true) ?>
                        </p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </section>

        <?php if($currLang == 'ru' ) : ?>
        <section class="sigle_blog__comments">
            <div class="wrapper_m">

                <?php /*
                <div class="sigle_blog__comments__actions">
                    <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
                        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                    </div>
                    <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
                        <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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
        <?php endif; ?>
        
        <!-- <img class="single-blog-v3__pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-about-us/pattern-1.svg" alt="">
        <img class="single-blog-v3__pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-about-us/pattern-2.svg" alt=""> -->
        <img class="single-blog-v3__footer-pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
        <img class="single-blog-v3__footer-pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
    </article>
   
<!-- содержание -->
<script>
  $(function() {
    $(document).ready(function(){
        $(".single-blog-v3__main-wrap")
            .attr('id', 'list-link')

        $(".single-blog-v3__control-panel__list-link").attr('href', `${window.location.origin + window.location.pathname}#list-link`);

        $(".single-blog-v3__content h2").each(function( index ) {
            const newId = `header2-${index}`;
            $(this).attr('id', newId).css({
               'padding-top': '200px',
                'margin-top': '-170px',
                '-webkit-background-clip': 'content-box',
                'background-clip': 'content-box',
            });
            $(".single-blog-v3__main-wrap__sidebar__list").append( `<a class="single-blog-v3__main-wrap__sidebar__list__item" href="${window.location.origin + window.location.pathname}#${newId}">
                            ${$( this ).text()}
                        </a>` );
        });
    })
  })
</script>      
<script>
  $(function() {
    $(document).ready(function(){
        let zIndex = 99;  
        $(".single-blog-v3__content section").each(function( index ) {
            if (zIndex > 1) {
                $(this).css({
                    'z-index': zIndex,
                })
            }    
            
            zIndex = zIndex - 1;
        });

        $(".single-blog-v3__main-wrap__sidebar__toogle-wrap__btn").click(function () {
                if ($(".single-blog-v3__main-wrap__sidebar").hasClass("min")) {
                    $(".single-blog-v3__main-wrap__sidebar").removeClass("min");
                } else {
                    $(".single-blog-v3__main-wrap__sidebar").addClass("min");
                }
                
            })
        })
  })
</script>    
<script>
  $(function() {
    $(document).ready(function(){
        

    if ($(".single-blog-v3__main-wrap__sidebar").length) {
        blog__float_bar();
    }


    // blog__float_bar
    function blog__float_bar() {
        var sigle_blog__actions__wrap = $(".single-blog-v3__main-wrap__sidebar");
        var sigle_blog__actions = $(".single-blog-v3__main-wrap__sidebar__toogle-wrap__btn");
        var eHeight = sigle_blog__actions.outerHeight();

        var eTop = sigle_blog__actions.offset().top;
        var offsetRelWin = eTop - $(window).scrollTop();

        var containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();

        set_block();

        function set_block() {
            containerBottom = $(sigle_blog__actions__wrap).offset().top - $(window).scrollTop() + $(sigle_blog__actions__wrap).outerHeight();
            offsetRelWin = eTop - $(window).scrollTop();

            if (containerBottom < eHeight + 30) {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: '30px',
                    position: 'absolute',
                });
            } else if (offsetRelWin < 110) {
                sigle_blog__actions.css({
                    top: '110px',
                    position: 'fixed'
                });
            } else {
                sigle_blog__actions.css({
                    top: 'auto',
                    bottom: 'auto',
                    position: 'absolute'
                });
            }
        }

            $(window).scroll(function () {
                set_block();
            });
        }
    });
  });
</script> 
<script>
  $(function() {
    $(document).ready(function(){
      $("#allTime").addClass("active");
      $(".all-time-list").addClass("active");
            
      $("#allTime").click(function () {
          if (!$(this).hasClass("active")) {
            $(".blog-archive-v3__content__sidebar__top-articles__list").removeClass("active")
            $(".all-time-list").addClass("active");
            $(".blog-archive-v3__content__sidebar__top-articles__buttons button").removeClass("active")
            $(this).addClass("active");
          }
      });
      $("#month").click(function () {
          if (!$(this).hasClass("active")) {
            $(".blog-archive-v3__content__sidebar__top-articles__list").removeClass("active")
            $(".month-list").addClass("active");
            $(".blog-archive-v3__content__sidebar__top-articles__buttons button").removeClass("active")
            $(this).addClass("active");
          }
          
      });
    });
  });
</script>    
<?php else : ?>

    <div class="sigle_blog__header_v2" style="background-image: url(<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '1600_800')[0]; ?>)">
        <div class="wrapper_m">
            <div class="row align-items-center sigle_blog__header_v2__title_holder">
                <div class="col-md-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="sigle_blog__info">
        <div class="wrapper_m">
            <div class="row sigle_blog__info_r1 align-items-center">
                <div class="sigle_blog__info_r1__item col-lg-3 col-6">
                    <div class="sigle_blog__info__date">
                        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('j.m.Y') ?></span>
                    </div>
                </div>

                <?php
                $post_author_ID = get_post_meta($post->ID, 'author_post__cart', true)[0];
        		if (!empty($post_author_ID)) : ?>
                <div class="sigle_blog__info_r1__item col-lg-3 col-6">
                    <div class="sigle_blog__info__author">
                        <span class="time"><i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_title($post_author_ID); ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php
                $article_time = get_post_meta($post->ID, "read_time", true);
                if ($article_time !== '') : ?>
                <div class="sigle_blog__info_r1__item col-lg-3 col-6 mt-lg-0 mt-md-2 mt-2">
                    <div class="sigle_blog__info__time">
                        <span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $article_time; ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php
                $article_level = get_post_meta($post->ID, "complexity_post", true);
                if ($article_level !== '') : ?>
                <div class="sigle_blog__info_r1__item col-lg-3 col-6 mt-lg-0 mt-md-2 mt-2">
                    <div class="sigle_blog__info__level">
                        <span class="level level_badge_<?php echo $article_level; ?>"></span>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <div class="row sigle_blog__info_r2">
                <div class="col-md-12">
                    <div class="sigle_blog__info__categories">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <?php
                        $this_cat = get_the_terms($post->ID, 'topic');
                        if(is_array($this_cat)) :
                        foreach ($this_cat as $key => $value) : ?>
                        <span><?php echo $value->name; ?><span>, </span></span>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php /*
    <section class="sigle_blog__header"
             style="background-image: url(<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '1600_800')[0]; ?>)">
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
    */ ?>

    <div class="breadcrumbs">
        <div class="wrapper_m">
            <div class="breadcrumbs__list_wrap">
              <ul class="breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="/" title="Главная" itemprop="item"><span itemprop="name">Главная</span><meta itemprop="position" content="0"></a></li>
                <li><span>></span></li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="blog/" title="Блог" itemprop="item"><span itemprop="name">Блог</span><meta itemprop="position" content="1"></a></li>
                <li><span>></span></li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="2"></a></li>
              </ul>

            </div>
        </div>
    </div>

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
                <div class="post_rating__holder">
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                </div>
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

                    <?php if($currLang == 'ru' ) : ?>
                      <div class="sigle_blog__banners" id="fn__sigle_blog__banners">
                        <div class="sigle_blog__banners__slider fn_sigle_blog__banners__slider">
                          <div class="sigle_blog__banners__item">
                            <div class="sigle_blog__banners__item_content">
                              <img src="<?php echo REL_ASSETS_URI; ?>img/baners/new_apps.jpg" alt="">
                              <a href="https://pengstud.com/ppctools/" target="_blank"></a>
                            </div>
                          </div>
                        </div>

                          <div class="sigle_blog__banners_fb">
                            <p>Будьте в курсе последних обновлений</p>
                            <a href="https://www.facebook.com/pengstud.dp/" target="_blank">Присоединиться в <i class="fa fa-facebook"
                              aria-hidden="true"></i></a>
                          </div>

                      </div>
                    <?php endif; ?>
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


    <?php
        $post_author_ID = get_post_meta($post->ID, 'author_post__cart', true)[0];
        if (!empty($post_author_ID)) :
    ?>
        <div class="blog_single__autor">
            <div class="wrapper_m">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="blog_single__autor__img">
                            <?php echo wp_get_attachment_image( get_post_meta($post_author_ID, "photo", true), '300_300'); ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="blog_single__autor__content">
                            <p class="title"><?php echo get_the_title($post_author_ID); ?></p>
                            <p class="subtitle"><?php echo get_post_meta($post_author_ID, "position", true) ?></p>
                            <div class="line_delim"></div>
                            <div class="about_author">
                                <p><?php echo get_post_meta($post_author_ID, "description", true) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if($currLang == 'ru' ) : ?>
        <?php if(is_array($related_posts) && !empty($related_posts)) :?>
            <section class="blog__related">
                <div class="wrapper_m">
                <h2 class="blog__related_title"><?php _e('Популярные статьи'); ?></h2>
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
                                            <span class="h2" ><?php the_title(); ?></span>
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


    <?php if($currLang == 'ru' ) : ?>
      <section class="sigle_blog__subscr">
        <div class="wrapper_m">
            <div class="sigle_blog__subscr__holder">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col-md-7">
                        <div class="sigle_blog__subscr__text">
                            <p class="title"><?php _e('Получить 7 писем о том,'); ?> <br><?php _e('как улучшить аккаунт Google Ads'); ?><br><?php _e('+ статьи про РРС'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sigle_blog__subscr__form">
                            <form class="fn__site_dispatch_form" >

                                <div class="sigle_blog__subscr__form__row">
                                    <span class="title" ><?php _e('Имя'); ?></span>
                                    <input type="text" name="user_fio" placeholder="<?php _e('Петр Иванов'); ?>">
                                </div>

                                <div class="sigle_blog__subscr__form__row">
                                    <span class="title">e-mail</span>
                                    <input type="email" name="user_email" required placeholder="mailtest@gmail.com">
                                </div>

                                <div class="sigle_blog__subscr__form__row">
                                    <button type="submit"><?php _e('Подписаться'); ?></button>
                                </div>
                                <input type="hidden" name="sendpulse_book_name" value="SENDUPULSE_BOOK_7DAYS">
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
    <?php endif; ?>


    <?php if($currLang == 'ru' ) : ?>
    <section class="sigle_blog__comments">
        <div class="wrapper_m">

			<?php /*
            <div class="sigle_blog__comments__actions">
                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                </div>
                <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
                    <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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
    <?php endif; ?>


    <?php if($currLang == 'ru' ) : ?>
      <div class="float_sbscr_form fn__float_sbscr_form">
        <div class="float_sbscr_form__head">
          <span class="title"><?php _e('Улучшить Ads'); ?></span>
        </div>
        <div class="float_sbscr_form__content">
          <p class="title"><?php _e('Улучшить свой Ads'); ?></p>
          <p class="text"><?php _e('Получите 7 писем о том, как можно улучшить свой аккаунт в Ads'); ?></p>
          <a class="btn" href="https://pengstud.com/subscribe-email2"><?php _e('Подписаться'); ?></a>
        </div>
      </div>
    <?php endif; ?>

<!-- Показать опросник -->
<script type="text/javascript">
  $(document).ready(function() {
     if(localStorage.getItem('user_survey_popup') !== 'open') {
       setTimeout(() => {
          $('.user_survey_popup').css('display', 'block');
          // localStorage.setItem('user_survey_popup', 'open');
        }, 2000)      
      }
   });   
</script>
<?php endif; ?>

<?php get_footer(); ?>

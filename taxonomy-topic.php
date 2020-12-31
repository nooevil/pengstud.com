<?php
$currLang = pll_current_language();
if ($currLang == 'ru') {
    get_header();
} else {
    get_header(en);
}
?>

<?php  if( is_user_logged_in() ) :  ?>

<div class="blog-archive-v3">
  <section class="blog-archive-v3__banner">
      <div class="blog-archive-v3__banner__container">
          <p class="blog-archive-v3__banner__container__text">
              Привет! Мы — Penguin-team, агентство контекстной рекламы, 
              а это — наш блог по бизнесу, маркетингу и РРС. Каждый месяц 
              мы выпускаем гайды, статьи и инструкции о том, как работать 
              с eCommerce, брендировать, настраивать Google Рекламу и 
              другие каналы трафика. 
          </p>
          <p class="blog-archive-v3__banner__container__text">
              Наш блог читают маркетологи, SEM-специалисты и предприниматели; 
              его рекомендуют на SEMConf и других конференциях.
          </p>
          <p class="blog-archive-v3__banner__container__text">
              Еще больше уникальных материалов — в рассылке 👇 
              Подписывайтесь!
          </p>
          <p class="blog-archive-v3__banner__container__text-hide">
              Получать еще больше уникальных материалов 👉🏻
          </p>
          <p class="blog-archive-v3__banner__container__text-hide-mobile">
              Получать еще больше уникальных материалов 👇
          </p>
          <form class="fn__blog_subscribe_form" >
              <input type="email" name="user_email" required placeholder="Email">
              <button type="submit">Подписаться</button>
          </form>
          <img class="blog-archive-v3__banner__container__left-photo" src="<?php echo REL_ASSETS_URI ?>img/blog/photo-1.png">
          <img class="blog-archive-v3__banner__container__right-photo" src="<?php echo REL_ASSETS_URI ?>img/blog/photo-2.png">
          <button class="blog-archive-v3__banner__container__arrow">
              <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.64682e-08 12.619L1.40215 14L12 3.56197L22.5979 14L24 12.619L12 0.8L1.64682e-08 12.619Z" 
                  fill="white"/>
              </svg>
          </button>
      </div>
  </section>

  <section class="blog-archive-v3__category">
    <div class="blog-archive-v3__category__main">
      <?php
        $cur_cat_obj = get_queried_object();
        $cur_cat_ID = $cur_cat_obj->term_id;
        $par_term_id = $cur_cat_obj->parent;

        $cat_tree_id = [];
        $cat_tree_id[] = $cur_cat_ID;
        if ($cur_cat_obj->parent) {
            $cat_tree_id[] = $cur_cat_obj->parent;
            $term = get_term($cur_cat_obj->parent, 'topic');
            if ($term->parent) {
                $cat_tree_id[] = $term->parent;
            }
        }

        $product_categories = get_taxonomy_hierarchy('topic');

        // pre_print_r($product_categories );
        $cat_levels = get_cat_tree_with_levels($product_categories, 1, $cur_cat_ID);

      ?>
      <?php
        if (is_array($cat_levels[1])) :
            foreach ($cat_levels[1] as $key => $value) :
                ?>

                <?php
                if (is_user_logged_in()) {

                    if (in_array($value['id'], $cat_tree_id)) {
                        $parentCategory = $value;
                    }

                }

                ?>
                <?php if (
                    ($value['id'] !== 177)
                    and ($value['id'] !== 181)
                    and ($value['id'] !== 183)
                    and ($value['id'] !== 185)
                    and ($value['id'] !== 187)
                    and ($value['id'] !== 189)
                    and ($value['id'] !== 191)
                    and ($value['id'] !== 193)
                    and ($value['id'] !== 254)
                    and ($value['id'] !== 256)
                    and ($value['id'] !== 258)
                    and ($value['id'] !== 260)
                ) : ?>

                  <div class="blog-archive-v3__category__main__item <?php if (in_array($value['id'], $cat_tree_id)) echo 'active' ?>">
                    <a href="<?php echo $value['link']; ?>">
                        <?php echo $value['name']; ?>
                    </a>
                  </div>

                <?php endif; ?>

            <?php
            endforeach;
        endif;
      ?>
    </div>
    <div class="blog-archive-v3__category__secondary">
      <?php
        if (is_array($cat_levels[2])) :
            foreach ($cat_levels[2] as $key => $value) :
                if (in_array($value['parent'], $cat_tree_id)) :
                    ?>
                <?php
                    if (in_array($value['id'], $cat_tree_id)) {
                        $secondCategory = $value;
                    }
                ?>
                    <div class="blog-archive-v3__category__secondary__item <?php if (in_array($value['id'], $cat_tree_id)) echo 'active' ?>">
                      <a href="<?php echo $value['link']; ?>">
                        <?php echo $value['name']; ?>
                      </a>
                    </div>

                <?php
                endif;
            endforeach;
        endif;
      ?>
    </div>
  </section>

  <section class="blog-archive-v3__content">
    <div class="blog-archive-v3__content__sidebar">
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
                  'tax_query' => [
                      [
                          'taxonomy' => $cur_cat_obj->taxonomy,
                          'operator' => 'IN',
                          'terms' => $cur_cat_obj->term_id,
                          'field' => $cur_cat_obj->slug,
                      ]
                  ],
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
      </div>

      <!-- MAIN -->
      <div class="blog-archive-v3__content__main-wrap">
        <div class="blog-archive-v3__content__main-wrap__articles">
          <?php
          while ( have_posts() ) : the_post(); ?>
            <div class="blog-archive-v3__content__main-wrap__articles__item">
              <!-- img-container -->
              <div class="blog-archive-v3__content__main-wrap__articles__item__img-wrap">
                <!-- level -->
                <?php
                  $article_level = get_post_meta($post->ID, "complexity_post", true);
                  if ($article_level == '1') : ?>
                    <img 
                      class="blog-archive-v3__content__main-wrap__articles__item__img-wrap__level" 
                      src="<?php echo REL_ASSETS_URI ?>img/blog/easy icon light.svg">
                  <?php endif; ?>
                  <?php if ($article_level == '2') : ?>
                    <img 
                      class="blog-archive-v3__content__main-wrap__articles__item__img-wrap__level" 
                      src="<?php echo REL_ASSETS_URI ?>img/blog/middle icon light.svg">
                  <?php endif; ?>
                  <?php if ($article_level == '3') : ?>
                    <img 
                      class="blog-archive-v3__content__main-wrap__articles__item__img-wrap__level" 
                      src="<?php echo REL_ASSETS_URI ?>img/blog/hard icon.svg">
                  <?php endif; ?>

                <!-- img -->
                <?php 
                  echo wp_get_attachment_image(
                    get_post_meta(
                      $post->ID, 
                      "preview_image", true
                    )); 
                ?>

                <!-- share -->
                <img 
                  data-href="<?php the_permalink(); ?>"
                  class="blog-archive-v3__content__main-wrap__articles__item__img-wrap__share" 
                  src="<?php echo REL_ASSETS_URI ?>img/blog/share icon.svg">
              </div>

              <!-- info -->
              <div class="blog-archive-v3__content__main-wrap__articles__item__info">
                <div class="blog-archive-v3__content__main-wrap__articles__item__info__row">
                  <!-- author -->
                  <?php
                      $article_author = get_post_meta($post->ID, "author_post", true)[0];
                      if ($article_author !== '') : ?>
                        <p class="blog-archive-v3__content__main-wrap__articles__item__info__row__author">
                          <?php echo $article_author; ?>
                        </p>
                    <?php endif; ?>

                  <!-- date -->
                  <p class="blog-archive-v3__content__main-wrap__articles__item__info__row__text">
                    <?php the_time('j.m.Y') ?>
                  </p>
                </div>

                <div class="blog-archive-v3__content__main-wrap__articles__item__info__row">
                  <!-- views -->
                  <p class="blog-archive-v3__content__main-wrap__articles__item__info__row__text">
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
                  <p class="blog-archive-v3__content__main-wrap__articles__item__info__row__text">
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
                      <p class="blog-archive-v3__content__main-wrap__articles__item__info__row__text">
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
              </div>

              <h2 class="blog-archive-v3__content__main-wrap__articles__item__title">
                <a href="<?php the_permalink(); ?>"
                  target="_blank">
                  <?php the_title(); ?>
                </a>
              </h2>
            </div>
          <?php endwhile;?>
        </div>

        <!-- paginator -->
        <div class="blog-archive-v3__content__main-wrap__paginator">
            <?php 
              the_posts_pagination(array(
                'prev_text' => __('<span>Предыдущая</span>'), 
                'next_text' => __('<span>Следующая</span>'),
              )); 
            ?>
        </div>
      </div>
    </section>
</div>  

<script>
  $(function() {
    $(document).ready(function(){
      
      if ($(window).width() <= 900) {
        $('.blog-archive-v3__category__main').addClass("mobile")
          $('.blog-archive-v3__category__main.mobile').slick({
          centerPadding: '10px',
          slidesToShow: 1,
          slidesToScroll: 1,
          prevArrow: `<button class="slider_arrow_prev">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.819 0L13.2 1.40215L2.76192 12L13.1999 22.5979L11.819 24L-4.86374e-05 12L11.819 0Z" fill="#666666"/>
                        </svg>
                      </button>`,
          nextArrow: `<button class="slider_arrow_next">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1.381 0L0 1.40215L10.438 12L2.45507e-05 22.5979L1.381 24L13.2 12L1.381 0Z" fill="#666666"/>
                        </svg>
                      </button>`,                   
          });
      }
      $(window).resize(function(event) {
        if (event.target.innerWidth <= 900) {
          $('.blog-archive-v3__category__main').addClass("mobile")
          $('.blog-archive-v3__category__main.mobile').slick({
          centerPadding: '10px',
          slidesToShow: 1,
          slidesToScroll: 1,
          prevArrow: `<button class="slider_arrow_prev">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.819 0L13.2 1.40215L2.76192 12L13.1999 22.5979L11.819 24L-4.86374e-05 12L11.819 0Z" fill="#666666"/>
                        </svg>
                      </button>`,
          nextArrow: `<button class="slider_arrow_next">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1.381 0L0 1.40215L10.438 12L2.45507e-05 22.5979L1.381 24L13.2 12L1.381 0Z" fill="#666666"/>
                        </svg>
                      </button>`,    
          
          });
        } else {
          $('.blog-archive-v3__category__main').removeClass("mobile");
          $('.blog-archive-v3__category__main').slick('unslick');
        }
      })
    });
  });
</script> 
<!-- modal -->
<div class="simpleModalWindowWrap shareModal">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow share-modal__container">
                <span class="simpleModalWindowClose"></span>
                <h3 class="share-modal__container__title">Отправить статью</h3>
                <div class="share-modal__container__separator"></div>
                <div class="share-modal__container__icons">
                  <a title="facebook" class="facebook" href="#" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/facebook.svg" alt="">
                  </a>
                  <a title="twitter" class="twitter" href="#" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/twittwr logo.svg" alt="">
                  </a>
                  <a title="pocket" class="pocket" href="#" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo REL_ASSETS_URI ?>img/blog/pocket logo.svg" alt="">
                  </a>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
  $(function() {
    $(document).ready(function(){
            
      $(".blog-archive-v3__banner__container__arrow").click(function () {
          if ($(".blog-archive-v3__banner__container").hasClass("hide")) {
              $(".blog-archive-v3__banner__container").removeClass("hide");
          } else {
              $(".blog-archive-v3__banner__container").addClass("hide");
          }
          
      })

      $(".blog-archive-v3__content__main-wrap__articles__item__img-wrap__share").click(function() {
        const permalink = $(this).attr('data-href')
        simpleModal.modalOpen( "shareModal" );
        $(".facebook").attr('href', `http://www.facebook.com/sharer.php?u=${permalink}`);
        $(".twitter").attr('href', `http://twitter.com/intent/tweet?text=${permalink}`);
        $(".pocket").attr('href', `https://getpocket.com/save?url=${permalink}`);
      })
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
<script>
	$(function() {
		$(document).ready(function(){
		  	$('.blog-archive-v3__category__secondary').slick({
          slidesToShow: 4,
          infinite: false,
          variableWidth: true,
          prevArrow: `<button class="slider_arrow_prev">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.819 0L13.2 1.40215L2.76192 12L13.1999 22.5979L11.819 24L-4.86374e-05 12L11.819 0Z" fill="#666666"/>
                        </svg>
                      </button>`,
          nextArrow: `<button class="slider_arrow_next">
                        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1.381 0L0 1.40215L10.438 12L2.45507e-05 22.5979L1.381 24L13.2 12L1.381 0Z" fill="#666666"/>
                        </svg>
                      </button>`,
          responsive: [
              {
                  breakpoint: 1200,
                  settings: {
                      slidesToShow: 3,
                  }
              },
              {
                  breakpoint: 900,
                  settings: {
                      slidesToShow: 2,
                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 1,
                      // arrows: false,
                      // dots: true,
                  }
              }
          ]            
    		});
		});
		
	});
</script>
<?php else : ?>
<div class="blog_archive_v2">
    <div class="wrapper_m container">

        <!-- blog_archive_v2__nav__holder -->
        <div class="blog_archive_v2__nav__holder">
            <div class="row">
                <div class="col-md-12">

                    <div class="blog_category_v2">

                        <div class="blog_category__cat_wrap">

                            <?php
                            $cur_cat_obj = get_queried_object();
                            $cur_cat_ID = $cur_cat_obj->term_id;
                            $par_term_id = $cur_cat_obj->parent;


                            $cat_tree_id = [];
                            $cat_tree_id[] = $cur_cat_ID;
                            if ($cur_cat_obj->parent) {
                                $cat_tree_id[] = $cur_cat_obj->parent;
                                $term = get_term($cur_cat_obj->parent, 'topic');
                                if ($term->parent) {
                                    $cat_tree_id[] = $term->parent;
                                }
                            }

                            $product_categories = get_taxonomy_hierarchy('topic');

                            // pre_print_r($product_categories );
                            $cat_levels = get_cat_tree_with_levels($product_categories, 1, $cur_cat_ID);

                            ?>

                            <ul class="lv_1">
                                <?php
                                if (is_array($cat_levels[1])) :
                                    foreach ($cat_levels[1] as $key => $value) :
                                        ?>

                                        <?php
                                        if (is_user_logged_in()) {

                                            if (in_array($value['id'], $cat_tree_id)) {
                                                $parentCategory = $value;
                                            }

                                        }

                                        ?>
                                        <?php if (
                                            ($value['id'] !== 177)
                                            and ($value['id'] !== 181)
                                            and ($value['id'] !== 183)
                                            and ($value['id'] !== 185)
                                            and ($value['id'] !== 187)
                                            and ($value['id'] !== 189)
                                            and ($value['id'] !== 191)
                                            and ($value['id'] !== 193)
                                            and ($value['id'] !== 254)
                                            and ($value['id'] !== 256)
                                            and ($value['id'] !== 258)
                                            and ($value['id'] !== 260)
                                        ) : ?>
                                          <li class="<?php if (in_array($value['id'], $cat_tree_id)) echo 'active' ?>">
                                            <a href="<?php echo $value['link']; ?>">
                                                <?php echo $value['name']; ?>
                                            </a>
                                          </li>
                                        <?php endif; ?>

                                    <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>

                            <ul class="lv_2">
                                <?php
                                if (is_array($cat_levels[2])) :
                                    foreach ($cat_levels[2] as $key => $value) :
                                        if (in_array($value['parent'], $cat_tree_id)) :
                                            ?>
                                        <?php
                                            if (in_array($value['id'], $cat_tree_id)) {
                                                $secondCategory = $value;
                                            }
                                        ?>

                                            <li class="<?php if (in_array($value['id'], $cat_tree_id)) echo 'active' ?>">
                                                <a href="<?php echo $value['link']; ?>">
                                                    <?php echo $value['name']; ?>
                                                </a>
                                            </li>

                                        <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </ul>

                        </div>

                        <?php if ($currLang == 'ru') : ?>
                        <div class="blog_category__search_wrap blog_category__search_wrap_test">
                          <div class="blog_category__search_content">
                              <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                              <?php if (!wp_is_mobile()) : ?>
                                <button data-simple_modal="articleCatalog" class="blog_category_post__catalog">
                                  Каталог статей
                                </button>
                              <?php endif; ?>
                          </div>
                        </div>
                        <?php else : ?>
                          <div class="blog_category__search_wrap">
                            <form method="get" action="<?php echo get_site_url(); ?>/en/" >
                              <input type="text" name="s" placeholder="Search" class="blog_category__search__input" autocomplete="off">
                              <button type="submit" class="blog_category__search__submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                          </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>


        <div class="blog_archive_v2__content_holder">
          <div class="row flex-column-reverse flex-lg-row justify-content-center">

            <div class="col-lg-9 col-md-12">
              <div class="blog_archive_v2__articles_holder">
                  <?php while (have_posts()) : the_post(); ?>
                    <div class="row blog_archive_v2__article_item">
                        <?php /*if(is_user_logged_in()) : */?><!--
                                  <pre><?php /*print_r($post); */?></pre>
                               --><?php /*endif; */?>
                      <div class="col-md-4 p-0">
                        <div class="article_item__image">
                          <a href="<?php the_permalink(); ?>" target="_blank"></a>
                            <?php echo wp_get_attachment_image(get_post_meta($post->ID, "preview_image", true), '300_300'); ?>
                          <div class="article_item__left_info">
                            <div class="blog_archive__item__actions__item blog_archive__item__actions__item__views">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              <span><?php echo get_post_meta($post->ID, "wps_post_views_count", true); ?></span>
                            </div>
                            <div class="blog_archive__item__actions__item blog_archive__item__actions__item__likes">
                              <i class="fa fa-heart" aria-hidden="true"></i>
                              <span><?php echo WPS_Likes::getCountLikesPost($post->ID); ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 p-0">
                        <div class="article_item__content">
                          <div class="article_item__content__title">
                            <h2>
                              <a href="<?php the_permalink(); ?>"
                                   target="_blank"><?php the_title(); ?>
                              </a>
                            </h2>
                          </div>

                          <div class="article_item__info_l1">
                                            <span class="date"><i class="fa fa-calendar"
                                                                  aria-hidden="true"></i> <?php the_time('j.m.Y') ?></span>

                              <?php
                              $article_author = get_post_meta($post->ID, "author_post", true)[0];
                              if ($article_author !== '') : ?>
                                <span class="time"><i class="fa fa-user"
                                                      aria-hidden="true"></i> <?php echo $article_author; ?></span>
                              <?php endif; ?>

                              <?php
                              $article_time = get_post_meta($post->ID, "read_time", true);
                              if ($article_time !== '') : ?>
                                <span class="time"><i class="fa fa-clock-o"
                                                      aria-hidden="true"></i> <?php echo $article_time; ?></span>
                              <?php endif; ?>

                              <?php
                              $article_level = get_post_meta($post->ID, "complexity_post", true);
                              if ($article_level !== '') : ?>
                                <span class="level level_badge_<?php echo $article_level; ?>"></span>
                              <?php endif; ?>
                          </div>

                          <div class="article_item__info_l2">
                            <i class="fa fa-book" aria-hidden="true"></i>
                              <?php
                              $this_cat = get_the_terms($post->ID, 'topic');
                              if (is_array($this_cat)) :
                                  foreach ($this_cat as $key => $value) : ?>
                                    <span><?php echo $value->name; ?><span>, </span></span>
                                  <?php
                                  endforeach;
                              endif;
                              ?>
                          </div>

                            <?php
                            $short_description = get_post_meta($post->ID, "short_description", true);
                            if ($short_description !== '') : ?>
                              <div class="article_item__short_text">
                                <p><?php echo $short_description; ?></p>
                              </div>
                            <?php endif; ?>

                          <div class="article_item__footer">
                            <a href="<?php the_permalink(); ?>" target="_blank"
                               class="article_more_btn"><?php _e('подробнее'); ?></a>
                          </div>

                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
              </div>
            </div>


              <?php
              if (is_array($cat_levels[3])) {
                  foreach ($cat_levels[3] as $value) {
                      if (in_array($value['parent'], $cat_tree_id)) {
                          $lev3cat[] = $value;
                      }
                  }
              }
              ?>

            <?php if ($currLang == 'ru' and !wp_is_mobile()) : ?>
            <div class="col-lg-3 col-md-12">
              <?php if (is_array($lev3cat)) : ?>
                <div class="blog_archive_v2__sidebar_holder">

                    <div class="blog_archive_v2__sidebar_tags">
                        <?php
                        foreach ($lev3cat as $value) :
                            ?>
                          <a href="<?php echo $value['link']; ?>"
                             class="item_tags"><?php echo $value['name']; ?></a>
                        <?php
                        endforeach;
                        ?>
                    </div>

                  </div>
              <?php endif; ?>

              <p class="most_popular_topic"><?php _e('Самые популярные'); ?></p>
              <?php
              $cur_cat_obj = get_queried_object();
              $args_loop = array(
                  'post_type'      => 'blog',
                  'posts_per_page' => 4,
                  'tax_query' => [
                      [
                          'taxonomy' => $cur_cat_obj->taxonomy,
                          'operator' => 'IN',
                          'terms' => $cur_cat_obj->term_id,
                          'field' => $cur_cat_obj->slug,
                      ]
                  ],
                  'order' => 'DESC',
                  'orderby' => 'meta_value_num',
                  'meta_key' => 'wps_post_views_count'
              );
              $custom_loop = new WP_Query( $args_loop );
              while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>

                  <a href="<?php the_permalink(); ?>" class="most_popular_topic__holder">
                    <h4 class="most_popular_topic__title"><?php the_title(); ?></h4>
                    <div class="most_popular_topic__info">

                      <div class="blog_archive__item__actions__item blog_archive__item__actions__item__views">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span><?php echo get_post_meta($post->ID, "wps_post_views_count", true); ?></span>
                      </div>

                      <div class="most_popular_topic__read">
                           <?php
                           $article_time = get_post_meta($post->ID, "read_time", true);
                           if ($article_time !== '') : ?>
                             <span class="time"><i class="fa fa-clock-o"
                                                   aria-hidden="true"></i> <?php echo $article_time; ?></span>
                           <?php endif; ?>
                          <?php
                          $article_level = get_post_meta($post->ID, "complexity_post", true);
                          if ($article_level !== '') : ?>
                            <span class="level level_badge_<?php echo $article_level; ?>"></span>
                          <?php endif; ?>
                      </div>
                    </div>
                  </a>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>

              <p class="most_popular_topic most_popular_topic__editors_choice"><?php _e('Выбор редакции'); ?></p>
                <?php
                $cur_cat_obj = get_queried_object();
                $args_loop = array(
                    'post_type'  => 'blog',
                    'order'      => 'DESC',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'topic',
                            'field' => 'term_id',
                            'terms' => 177,
                        )
                    )
                );
                $custom_loop = new WP_Query( $args_loop );

                while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>

                  <a href="<?php the_permalink(); ?>" class="most_popular_topic__holder">
                    <h4 class="most_popular_topic__title"><?php the_title(); ?></h4>
                    <div class="most_popular_topic__info">
                      <div class="blog_archive__item__actions__item blog_archive__item__actions__item__views">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span><?php echo get_post_meta($post->ID, "wps_post_views_count", true); ?></span>
                      </div>
                      <div class="most_popular_topic__read">
                          <?php
                          $article_time = get_post_meta($post->ID, "read_time", true);
                          if ($article_time !== '') : ?>
                            <span class="time"><i class="fa fa-clock-o"
                                                  aria-hidden="true"></i> <?php echo $article_time; ?></span>
                          <?php endif; ?>
                          <?php
                          $article_level = get_post_meta($post->ID, "complexity_post", true);
                          if ($article_level !== '') : ?>
                            <span class="level level_badge_<?php echo $article_level; ?>"></span>
                          <?php endif; ?>
                      </div>
                    </div>
                  </a>

                <?php
                endwhile;
                wp_reset_postdata();
                ?>

              <div class="sigle_blog__banners_fb">
                <p>Будьте в курсе последних обновлений</p>
                <a href="https://www.facebook.com/pengstud.dp/"
                   target="_blank">Присоединиться в
                  <i class="fa fa-facebook" aria-hidden="true"></i></a>
              </div>

            </div>
            <?php endif; ?>


          </div>
        </div>
        <!-- blog_pagination_v2 -->
        <div class="blog_pagination_v2">
            <?php the_posts_pagination(array('prev_text' => __('<i class="fa fa-caret-left" aria-hidden="true"></i>'), 'next_text' => __('<i class="fa fa-caret-right" aria-hidden="true"></i>'))); ?>
        </div>

        <?php if ($currLang == 'ru') : ?>
          <section class="sigle_blog__subscr">
            <div class="wrapper_m">
              <div class="sigle_blog__subscr__holder">
                <div class="row justify-content-md-center align-items-center">
                  <div class="col-md-7">
                    <div class="sigle_blog__subscr__text">
                      <p class="title">Подписаться на email-рассылку</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="sigle_blog__subscr__form">
                      <form class="fn__blog_subscribe_form" >

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

                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>
        <?php endif; ?>

    </div>
</div>


<?php /*



<?php get_template_part( "content/blog_term_nav" ); ?>

<section class="blog_archive">
  <div class="wrapper_m">
    <div class="blog_archive__wrap">
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="blog_archive__item" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_meta( $post->ID, "preview_image", true), '600_350' )[0]; ?>)">
        <a href="<?php the_permalink(); ?>" target="_blank">
          <div class="blog_archive__item__actions">
            <div class="blog_archive__item__actions__item blog_archive__item__actions__item__views">
              <i class="fa fa-eye" aria-hidden="true"></i>
              <span><?php echo get_post_meta( $post->ID, "wps_post_views_count", true ); ?></span>
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
      <?php endwhile;  ?>
    </div>
  </div>
</section>

<section class="blog_pagination">
  <div class="wrapper_m">
    <?php the_posts_pagination( array('prev_text' => __(''), 'next_text' => __(''))  ); ?>
  </div>
</section>


<div class="float_sbscr_form fn__float_sbscr_form">
    <div class="float_sbscr_form__head">
        <span class="title">Улучшить AdWords</span>
    </div>
    <div class="float_sbscr_form__content">
        <p class="title">Улучшить свой AdWords</p>
        <p class="text">Получите 7 писем, о том, как можно улучшить свой аккаунт в AdWords</p>
        <a class="btn" href="https://pengstud.com/subscribe-email">Подписаться</a>
    </div>
</div>

*/ ?>

<div class="simpleModalOverlay"></div>
<div class="simpleModalWindowWrap articleCatalog">
  <div class="simpleModalTable">
    <div class="simpleModalCell">
      <div class="simpleModalWindow">
        <span class="simpleModalWindowClose"></span>
        <div class="post_catalog__content">

          <?php
          $taxes = array(181, 183, 185, 187, 189, 191, 193);
          foreach($taxes as $tax) :
              $term = get_term( $tax );
              $name = $term->name;
              ?>
              <?php
                $cur_cat_obj = get_queried_object();
                $args_loop = array(
                    'post_type'  => 'blog',
                    'order'      => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'topic',
                            'field' => 'term_id',
                            'terms' =>  $tax,
                        )
                    )
                );
                $custom_loop = new WP_Query( $args_loop );
                ?>
            <p class="article_category__title"><?php echo $name ?></p>
              <ul class="article_category__list">
                  <?php while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>
                    <li class="article_catalog__item">
                      <a href="<?php the_permalink(); ?>"
                         target="_blank"><?php the_title(); ?></a>
                    </li>
                  <?php
                  endwhile;
                  wp_reset_postdata();
                  ?>

              </ul>

          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>

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

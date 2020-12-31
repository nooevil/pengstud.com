<?php
	/*
	Template Name: Чек-лист по настройке контекстной рекламы
	Template Post Type: blog
	*/
	get_header();
?>

  <link rel='stylesheet' href='<?php echo ABS_THEME_URI; ?>/templates__blog/assets/css/style.css?ver=1.0.0' type='text/css' />

	<!-- <section class="sigle_blog__header" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_meta( $post->ID, "preview_image", true), '1600_800' )[0]; ?>)" >
    <div class="wrapper_m">
      <div class="sigle_blog__header__footer">
        <div class="sigle_blog__header__footer__t1">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="sigle_blog__header__footer__t2">
          <span class="author"><?php echo get_post_meta( $post->ID, "author_post", true )[0]; ?></span>
        </div>
      </div>
      <div class="sigle_blog__header__data">
      	<i class="fa fa-calendar" aria-hidden="true"></i>
      	<span><?php the_time('j.m.Y') ?></span>
      </div>
    </div>
  </section> -->

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
      		<button class="sigle_blog__actions__item sigle_blog__actions__heart fn__wps__likes_holder <?php WPS_Likes::renderActiveLikes($post->ID); ?>" title="Понравилась статья?" data-post_id="<?php echo $post->ID; ?>">
      			<i class="fa fa-heart-o" aria-hidden="true"></i>
      			<span class="fn__wps__likes_holder__count"><?php echo WPS_Likes::getCountLikesPost($post->ID); ?></span>
      		</button>
      		<div class="sigle_blog__actions__item sigle_blog__actions__comment">
      			<i class="fa fa-comment-o" aria-hidden="true"></i>
      			<span>0</span>
      		</div>
      		<div class="sigle_blog__actions__item sigle_blog__actions__views">
      			<i class="fa fa-eye" aria-hidden="true"></i>
      			<span><?php echo get_post_meta( $post->ID, "wps_post_views_count", true ); ?></span>
      		</div>
      	</div>
      </div> 
      <div class="sigle_blog__content">
      	<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
      </div>
  </section>


  <section class="sigle_blog__comments">
    <div class="wrapper_m">
      <div class="sigle_blog__comments__actions">
        <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
          <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
        <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
          <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
      </div>
    	<div class="sigle_blog__comments__wrap">
   			<?php 
   			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; 
				?>
    	</div>
    </div>
  </section>


<?php get_footer(); ?>

<script type='text/javascript' src='<?php echo ABS_THEME_URI; ?>/templates__blog/assets/js/common.js?ver=1.0.0'></script>
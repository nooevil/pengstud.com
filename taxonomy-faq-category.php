<?php get_header(); ?>

    <section class="faq_page">
        <div class="wrapper_m">

            <h1 class="faq_page__title">Часто задаваемые вопросы</h1>

            <div class="faq__wrap__category_wrap">
                <?php

		        // cur cat
		        $cur_cat_obj   = get_queried_object();
		        $cur_term_id   = $cur_cat_obj->term_id;

                $args = array(
                    'taxonomy' => 'faq-category',
                    'hide_empty' => true,
                );
                $faq_categories = get_terms( $args );
                foreach ($faq_categories as $faq_category) {
                    // $faq_category->image = get_term_meta($faq_category->term_id,'category_image',true);
                    
                }
                ?>
                <?php foreach ($faq_categories as $faq_category) :
                	$termId = $faq_category->term_id;
                ?>
                    <div class="faq__wrap__category <?php if ( $cur_term_id == $termId ) echo 'active' ?>">
                        <a href="<?php echo get_term_link($faq_category->term_id) ?>">
                            <?php echo $faq_category->name; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="faq__wrap">
                <?php if(have_posts()) :?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="faq__wrap__item">
                        	<div class="faq__wrap__item__header fn__faq__item__header">
                        		<p><?php the_title(); ?></p>
                        	</div>
                        	<div class="faq__wrap__item__content fn__faq__item__content">
                        		<?php the_content(); ?>
                        	</div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
            </div>

        </div>
    </section>

<?php get_footer(); ?>

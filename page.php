<?php
$currLang = pll_current_language();
if($currLang == 'ru' ) {
    get_header();
} else {
    get_header(en);
}
?>
<section style="padding-top: 100px;padding-bottom: 50px">
    <div class="wrapper_m">
        <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</section>
<?php get_footer(); ?>
<?php
/*
Template Name: Карьера
Template Post Type: page
*/
$currLang = pll_current_language();
if($currLang == 'ru' ) {
    get_header();
} else {
    get_header(en);
}
?>

<!-- career_page -->
<section class="career_page" >
	<div class="container">

		<div class="row mt-5">
			<div class="col-md-12">
				<h1 class="title">Карьера в Penguin-team</h1>
				<p class="subtitle mt-4" >Мы ищем трудолюбивых и мотивированных специалистов, готовых постоянно развиваться, хорошо работать и менять мир к лучшему :)</p>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-4 mt-md-0 mt-4">
				<div class="photo_item">
					<img src="<?php echo REL_ASSETS_URI; ?>/img/career/f1.png" alt="">
					<div class="fb_link">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<a href="https://www.facebook.com/pengstud.dp/" target="_blank"></a>
					</div>
				</div>
			</div>

			<div class="col-md-4 mt-md-0 mt-4">
				<div class="photo_item">
					<img src="<?php echo REL_ASSETS_URI; ?>/img/career/f2.png" alt="">
					<div class="fb_link">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<a href="https://www.facebook.com/pengstud.dp/" target="_blank"></a>
					</div>
				</div>
			</div>

			<div class="col-md-4 mt-md-0 mt-4">
				<div class="photo_item">
					<img src="<?php echo REL_ASSETS_URI; ?>/img/career/f3.png" alt="">
					<div class="fb_link">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<a href="https://www.facebook.com/pengstud.dp/" target="_blank"></a>
					</div>
				</div>
			</div>
		</div>

		<!-- who_works -->
		<div class="who_works">
			<div class="row">
				<div class="col-md-12">
					<h2 class="title">Кто работает в Пингвин?</h2>
				</div>
			</div>

			<div class="row mt-5">

				<div class="col-md-4 mt-md-0 mt-4">
					<div class="work_item">
						<div class="image">
							<img src="<?php echo REL_ASSETS_URI; ?>/img/career/p1.png" alt="">
						</div>

						<p class="title">
							Специалисты по контекстной рекламе
						</p>

						<div class="text">
							<p>Мы предоставляем РРС-услуги на аутсорсе разным видам бизнеса и по всему миру. Специалисты по контекстной рекламе постоянно обучаются, посещают конференции, местные митапы, проходят курсы для повышения квалификации, учат английский — 50-100% затрат на обучение берет на себя компания.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 mt-md-0 mt-4">
					<div class="work_item">
						<div class="image">
							<img src="<?php echo REL_ASSETS_URI; ?>/img/career/p2.png" alt="">
						</div>

						<p class="title">
							Разработчики
						</p>

						<div class="text">
							<p>Наши разработчики не занимаются аутсорсом, зато работают над внутренними продуктами компании, нашими сервисами и сайтами. Чем больше этих продуктов, тем больше нужно заинтересованных ребят, которое любят программировать и помогать коллегам оптимизировать их рабочие процессы.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 mt-md-0 mt-4">
					<div class="work_item">
						<div class="image">
							<img src="<?php echo REL_ASSETS_URI; ?>/img/career/p3.png" alt="">
						</div>

						<p class="title">
							Сотрудники для поддержки работы компании
						</p>

						<div class="text">
							<p>Кроме РРС-специалистов и разработчиков, в нашей команде есть и другие талантливые ребята, которые помогают нам работать качественно и быть лучше с точки зрения маркетинга, финансов, организационной структуры.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- who_works -->

		<!-- vacation_archive -->
		<div class="vacation_archive">	

			<div class="row">
				<div class="col-md-12">
					<h2 class="title">Активные вакансии</h2>
				</div>
			</div>

			<div class="row mt-4">

				<?php
				  $args = array(
				    'post_type'  => 'vacancy',
				    'order'      => 'ASC',
				    'posts_per_page' => -1
				  );
				  $name = get_posts( $args );
				  foreach( $name as $post ){ setup_postdata($post);
				?>
				  
				<!-- vacation_item -->
				<div class="col-md-6 mt-4">
					<div class="vacation_item" style="border-color: #FF9404" >
						<h3 class="title" ><?php the_title(); ?></h3>
						<div class="title_border" style="background: #FF9404" ></div>
						<div class="desctiption">
							<?php echo get_post_meta($post->ID, 'short_desc', true); ?>
						</div>
						<div class="btn_holder">
							<a href="<?php the_permalink() ?>" style="background: #FF9404" >Подробнее</a>
						</div>
					</div>
				</div>

				<?php
				}
				  wp_reset_postdata();
				?>

			</div>
		</div>
		<!-- /vacation_archive -->

	</div>
</section>
<!-- /career_page -->

<?php get_footer(); ?>

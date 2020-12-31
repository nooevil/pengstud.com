<?php
if(isset($_POST['submit'])) {
    $term_slug = trim(strip_tags($_POST['tarif_slug']));
    $_SESSION['subscribe_term_slug'] = $term_slug;
    header('Location: /payment');
    exit();

}
?>
<?php
/*
Template Name: стр. Подписка
Template Post Type: page
*/
get_header();
?>

	
	<section class="subscribe__page">
		<div class="wrapper_m">
			<h1 class="title">Тарифы</h1>
			
			<div class="subscribe__tarif__holder row">

				<div class="col-md-4">
					<div class="subscribe__tarif__item subscribe__tarif__item__s fn__subscribe__tarif__item">
						<div class="subscribe__tarif__item__header ">
							<div class="subscribe__tarif__item__header__image fn__subscribe__tarif__image" data-image="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_01.png" data-gif="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_01.gif">
								<img src="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_01.png" alt="">
							</div>
							<div class="subscribe__tarif__item__header__title">
								<p>Минимальный тариф</p>
							</div>
						</div>

						<form method="post">
							<div class="subscribe__tarif__item__content">
								<p class="project_count">5 проектов</p>
								<div class="period__select__holder">
									<div class="period__select">
										<select name="tarif_slug" class="fn__period__select">
											<option value="2_1">1 месяц</option>
											<option value="2_6">6 месяцев</option>
											<option value="2_12">12 месяцев</option>
										</select>
									</div>
								</div>
								<div class="info__tarif__holder">

									<div class="info__tarif__holder__item active info__tarif__holder__item__2_1">
										<div class="info__tarif__search_count__holder">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">40</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">12</div>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__2_6">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">240</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">48</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">8</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__2_12">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">500</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">60</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">5</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>

								</div>

								<div class="subscribe__tarif__submit__holder">
									<button type="submit" name="submit" value="subscribe" class="subscribe__tarif__submit ga__tarif">Выбрать тариф</button>
								</div>

							</div>

						</form>

					</div>
				</div>


				<div class="col-md-4">
					<div class="subscribe__tarif__item subscribe__tarif__item__m fn__subscribe__tarif__item">
						<div class="subscribe__tarif__item__header ">
							<div class="subscribe__tarif__item__header__image fn__subscribe__tarif__image" data-image="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_02.png" data-gif="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_02.gif">
								<img src="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_02.png" alt="">
							</div>
							<div class="subscribe__tarif__item__header__title">
								<p>Малая студия</p>
							</div>
						</div>

						<form method="post">
							<div class="subscribe__tarif__item__content">
								<p class="project_count">15 проектов</p>
								<div class="period__select__holder">
									<div class="period__select">
										<select name="tarif_slug" class="fn__period__select">
											<option value="3_1">1 месяц</option>
											<option value="3_6">6 месяцев</option>
											<option value="3_12">12 месяцев</option>
										</select>
									</div>
								</div>
								<div class="info__tarif__holder">
									<div class="info__tarif__holder__item active info__tarif__holder__item__3_1">
										<div class="info__tarif__search_count__holder">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">100</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">15</div>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__3_6">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">600</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">72</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">12</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__3_12">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">1200</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">96</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">8</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="subscribe__tarif__submit__holder">
								<button type="submit" name="submit" value="subscribe" class="subscribe__tarif__submit ga__tarif">Выбрать тариф</button>
							</div>

						</form>

					</div>
				</div>



				<div class="col-md-4">
					<div class="subscribe__tarif__item subscribe__tarif__item__l fn__subscribe__tarif__item">
						<div class="subscribe__tarif__item__header ">
							<div class="subscribe__tarif__item__header__image fn__subscribe__tarif__image" data-image="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_03.png" data-gif="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_03.gif">
								<img src="<?php echo ABS_ASSETS_URI; ?>/img/subscribe/tarif_03.png" alt="">
							</div>
							<div class="subscribe__tarif__item__header__title">
								<p>Крупное агентство</p>
							</div>
						</div>

						<form method="post">
							<div class="subscribe__tarif__item__content">
								<p class="project_count">100 проектов</p>
								<div class="period__select__holder">
									<div class="period__select">
										<select name="tarif_slug" class="fn__period__select">
											<option value="4_1">1 месяц</option>
											<option value="4_6">6 месяцев</option>
											<option value="4_12">12 месяцев</option>
										</select>
									</div>
								</div>

								<div class="info__tarif__holder">
									<div class="info__tarif__holder__item active info__tarif__holder__item__4_1">
										<div class="info__tarif__search_count__holder">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">200</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">20</div>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__4_6">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">1000</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">102</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">17</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>

									<div class="info__tarif__holder__item info__tarif__holder__item__4_12">
										<div class="info__tarif__search_count__holder ">
											<p class="title">запросов</p>
											<div class="info__tarif__search_count">1500</div>
										</div>

										<div class="info__tarif__price__holder">
											<div class="info__tarif__price">
												<p class="title">цена</p>
												<div class="info__tarif__price__num">180</div>
											</div>
											<div class="info__tarif__price__per_month">
												<span class="price">15</span><span class="currency">$</span>
												<span class="line"></span>
												<span class="month">мес</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="subscribe__tarif__submit__holder">
								<button type="submit" name="submit" value="subscribe" class="subscribe__tarif__submit ga__tarif">Выбрать тариф</button>
							</div>

						</form>

					</div>
				</div>

			</div>
		</div>
	</section>


<?php get_footer(); ?>
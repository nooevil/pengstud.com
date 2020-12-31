<?php
	/*
	Template Name: Subscribe news en
	Template Post Type: page
	*/
	get_header();
?>

	<section class="ngkw_subscribe">
		<br>
		<div class="wrapper_m">
			<div class="row justify-content-center">
				<h2 class="ngkw_subscribe__title">Sign up to stay informed about <br>new useful tools and content on ppc</h2>
			</div>
			<div class="ngkw_subscribe__form">
				<form class="fn__site_subscribe_form">
					<div class="ngkw_subscribe__form__row">
						<p>Email:</p>
						<input type="email" name="user_email" required autocomplete="off">
					</div>
					<div class="ngkw_subscribe__form__row">
						<button type="submit" class="ngkw_relize__load ga_subscribe" >Sign up</button>
					</div>
					<p class="fn__site_subscribe_form_message">Subscription issued</p>
				</form>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
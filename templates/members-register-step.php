<?php
/*
Template Name: Завершение регистрации
*/
get_header();
?>


<section class="members__register_step">
	<div class="wrapper_m">
		<?php
			if($_GET["mail"]):
		?>
			<div class="members__register_step__message">
				<div class="members__register_step__message__ico">
					<i class="fa fa-check" aria-hidden="true"></i>	
				</div>
				<p>Регистрационное письмо было отправлено на почту <span><?php echo $_GET["mail"]; ?></span>.</p><p>Откройте его, чтобы закончить регистрацию.</p>
				<br>
				<p>Если вы не получили это письмо в вашем почтовом ящике в течении 15 минут, проверьте его наличие в папке "Спам". Если оно окажется там, пожалуйста, отметьте его как "Не спам".</p>
			</div>
		<?php
			endif;
		?>
	</div>
</section>


<?php get_footer(); ?>
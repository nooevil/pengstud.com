<?php
	/*
	Template Name: PPC Tools EN
	Template Post Type: page
	*/
	get_header(en);


	User::checkVerifyUser();
	$isUserLoggedIn = User::isUserLoggedIn();
?>

    <section class="ppctools">
    	<div class="wrapper">
            <h1 class="title" style="font-size: 30px;">Hub of ppc tools</h1>
            <br>
    	</div>
        <div class="wrapper">
            <div class="ppctools__l">
                <img src="<?php echo ABS_ASSETS_URI; ?>/img/ppcFeatures.png" alt="">
            </div>
            <div class="ppctools__r">
                <p>Increase your productivity with our PPC-tools. In the service Hub of ppc tools available:</p>
                <ul>
                    <li>NegativeKeywords tool;</li>
                    <li>FindKeywords tool;</li>
                    <li>UTM generator;</li>
                    <li>Page Speed Checker.</li>
                </ul>
                <p>With the help of contextual advertising tools you can:</p>
                <ul>
                    <li>collect key and negative keywords;</li>
                    <li>generate UTM tags.</li>
                </ul>
                <p>We try to constantly improve existing tools and work on creating new ones. Have an optimization suggestion or idea for a new service? Email us at info@pengstud.com!</p>
                <?php /* ?>
                <span class="ppctools__more" data-scroll_to_block=".ppctools__info" data-scroll_to_block_offset="70" >Log in ppc hub</span>
                <?php */ ?>
            </div>
        </div>
        <div class="wrapper">
            <a class="ppctools__more ga_hub_login" href="https://app.pengstud.com/" target="_blank"  >Log in ppc hub</a>
        </div>
    </section>


    <section class="ppctools__info">
        <div class="wrapper">
            <h2 class="ppctools__info__title">Automation and optimization tools</h2>
            <div class="ppctools__info__wrap">

                <div class="ppctools__info__row">
					<!-- ppctools__info__item -->
                    <div class="ppctools__info__item">
                        <!--<span class="ppctools__info__item__label">FREE</span>-->
                        <a href="en/negativekeywords-tool-en-new/" class="link"></a>
                        <p class="title">NegativeKeywords tool</p>
                        <p class="description">Collection of negative keywords</p>
                        <p>A tool that allows to quickly and conveniently collect negative keywords in a running AdWords account, Bing Ads, Yandex.Direct. Implemented as a Google Chrome browser extension.</p>
                        <span class="ppctools__info__more" >More</span>
                    </div>

					<!-- ppctools__info__item -->
                    <div class="ppctools__info__item">
                       <!-- <span class="ppctools__info__item__label">FREE</span>-->
                        <?php /*
                        <span class="ppctools__info__item__label beta">BETA</span>
                        */ ?>
                        <a href="en/findkeywords-tool-en/" class="link"></a>
                        <p class="title">FindKeywords tool</p>
                        <p class="description">Search of keywords</p>
                        <p>A service that collects words from Google and Yandex and formats them for easy upload to your account.</p>
                        <span class="ppctools__info__more" >More</span>
                    </div>
                </div>

                <div class="ppctools__info__row">

                    <div class="ppctools__info__item">
                        <!--<span class="ppctools__info__item__label">FREE</span>-->
                        <a href="en/utm-en/" class="link"></a>
                        <p class="title">UTM generator</p>
                        <p class="description">Generation of UTM links</p>
                        <p>Link Generator for tracking marketing activities.</p>
                      <!--  <p class="reliz">(Релиз апрель 2018)</p>-->
                        <span class="ppctools__info__more" >More</span>
                    </div>

                    <div class="ppctools__info__item">
                        <span class="ppctools__info__item__label">NEW</span>
                        <a href="en/speed-checker-en/" class="link"></a>
                        <p class="title">Page Speed Checker</p>
                        <p class="description">Check of page loading speed</p>
                        <p>Page Speed Checker allows you to conveniently check the speed of landing pages loading in Google Page Speed.</p>
                        <span class="ppctools__info__more" >More</span>
                    </div>

					<!--
                    <div class="ppctools__info__item">
                        <p>И еще несколько инструментов, о которых будет объявлено позже.</p>
                        <br>
                        <p class="ps">Специалисты компании Penguin-team будут благодарны за фидбек и расшаривание данных инструментов в соц.сетях :)</p>
                        <div class="ppctools__info__item__social">
                            <a target="blanc" href="https://www.facebook.com/pengstud.dp/" class="footer__socials__facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                    </div>
                -->



                </div>

            </div>
        </div>
    </section>


<?php get_footer(); ?>

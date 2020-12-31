<?php
$isUserLoggedIn = User::isUserLoggedIn();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <?php if(is_page_template( 'templates/dispatch-page.php' ) || is_page_template( 'templates/dispatch-big-page.php' )) :?>
    <!-- Google Analytics Content Experiment code -->
    <!--<script>function utmx_section(){}function utmx(){}(function(){var
            k='117836132-1',d=document,l=d.location,c=d.cookie;
            if(l.search.indexOf('utm_expid='+k)>0)return;
            function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
            indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
                length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
                '<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
                '://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
                '&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
                valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
                '" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
    </script><script>utmx('url','A/B');</script>-->
    <!-- End of Google Analytics Content Experiment code -->
    <?php endif; ?>

    <?php
      global $bodyClass;
      global $divClass;
      global $headerClass;
      global $currLang;
      $currLang= pll_current_language();
    ?>

    

    <meta name="google-site-verification" content="i_kOrk_Ib-Q34h7LFVvDilh4ozKu8_cLlpgY_CN9_Jc" />


    <?php
    if(stristr($_SERVER['REQUEST_URI'], '/user/')) { ?>
        <meta name='robots' content='noindex,nofollow' />

    <?php }?>

    <script type="text/javascript">
    window._mfq = window._mfq || [];
   (function() {
       var mf = document.createElement("script");
       mf.type = "text/javascript"; mf.async = true;
       mf.src = "//cdn.mouseflow.com/projects/d9fbcd3f-21b0-4d3f-b9a0-5dd9d12d5b81.js";
       document.getElementsByTagName("head")[0].appendChild(mf);
   })();
</script>

    <?php wp_head(); ?>

   
    <!-- OpenGraph -->
    <?php if (is_singular("blog")) : ?>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:locale" content='ru_RU'/>
        <meta property="og:description"
              content='<?php echo strip_tags(get_post_meta($post->ID, "short_description", true)); ?>'/>
        <meta property="og:image"
              content="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '480_340')[0]; ?>"/>
        <meta name="twitter:image"
              content="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '480_340')[0]; ?>">
        <!-- twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:description"
              content="<?php echo strip_tags(get_post_meta($post->ID, "short_description", true)); ?>">
        <meta name="twitter:image"
              content="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '480_340')[0]; ?>">
    <?php else:
        global $wp;
        ?>
        <meta property="og:url" content="<?php echo home_url($wp->request); ?>"/> 
        <meta property="og:title" content="<?php echo wp_get_document_title(); ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="<?php echo ABS_ASSETS_URI; ?>/img/common/team-logo.png"/>
        <meta property="og:site_name" content="<?php echo get_bloginfo("name"); ?>"/>
        <link rel="image_src" href="<?php echo ABS_ASSETS_URI; ?>/img/common/team-logo.png"/>
        <!-- twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?php echo wp_get_document_title(); ?>">
        <meta name="twitter:image" content="<?php echo ABS_ASSETS_URI; ?>/img/common/team-logo.png">
    <?php endif; ?>
    <!-- end OpenGraph -->


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K24QLNR');</script>

	<?php /*
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-74639732-2', 'auto');
        ga('send', 'pageview');
    </script>
    */ ?>

    <meta name="google-site-verification" content="GZJLZHiA1t1KdBVEbc3NL7rtsfMjmBzSjKB9kiKdIQs" />
    <meta name="yandex-verification" content="a2901e0cb843bfa0" />
    <?php
    if(stristr($_SERVER['REQUEST_URI'], '/google-shopping-management/')) { ?>
        <script src="https://bot.jaicp.com/chatwidget/cCmNijKB:9e84b1acda900ec89f6d792479aa890eede0a709/justwidget.js" async></script>
    <?php }?>
</head>
<body <?php body_class($bodyClass); ?> itemscope itemtype="http://schema.org/WebPage">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K24QLNR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
  (function(d, w, s) {
    var widgetHash = '7qcmbmakrj8i9sqc6zi1', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;
    ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';
    var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);
  })(document, window, 'script');
</script> 


<?php if (is_singular("blog")) : ?>
    <script type="application/ld+json">
    { 
      "@context": "http://schema.org",
     "@type": "Article",
     "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://google.com/article"
      },
     "headline": "<?php the_title(); ?>",
     "alternativeHeadline": "<?php the_title(); ?>",
     "image": "<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, "preview_image", true), '480_340')[0]; ?>",
     "author": "Pengstud",
     "wordcount": "<?php echo str_word_count(strip_tags(get_post_meta($post->ID, "short_description", true))); ?>",
     "publisher" : {
        "@type" : "Organization",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo ABS_ASSETS_URI; ?>/img/common/team-logo.png",
          "width": 100,
          "height": 40
        },
        "name" : "Pengstud"
        },
     "url": "<?php the_permalink(); ?>",
     "datePublished": "<?php the_time('Y-m-d') ?>",
     "dateCreated": "<?php the_time('Y-m-d') ?>",
     "dateModified": "<?php the_time('Y-m-d') ?>",
     "description": "<?php echo strip_tags(get_post_meta($post->ID, "short_description", true)); ?>"
   }

    </script>
<?php endif; ?>

<div class="<?php echo $divClass ?>">
    <header>
        <div class="wrapper">
        	<?php /* ?>
        	<div class="header_allert">
        		<p>Всем привет!</p>
        		<p>Вчера 06.05.19 мы запустили "hub of ppc tools" по ссылке https://app.pengstud.com/. К сожалению, один из ip нашего сервера был забанен на территории РФ, сегодня 07.05 мы сделаем перенос на новый ip. Из-за этого в течении дня сервисы Hub и NegativeKeywords будут работать со сбоями.</p>
        		<p>Надеемся на ваше понимание. Спасибо!</p>
        	</div>
        	<?php */ ?>
            <div class="header__logo__wrap">
                <a href="" class="header__logo"></a>
            </div>
            <div class="header__logo__text">
                <p>PPC Agency <span class="orange">|</span> Tools <span class="orange">|</span> Content </p>
            </div>

            <div class="header__right__wrap" id="header__nav_wrap">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'container' => 'nav',
                    'container_class' => 'header__nav'
                ));
                ?>
<!--                 <?php
                // wp_nav_menu(array(
                //     'theme_location' => 'main_menu_mobile',
                //     'container' => 'nav',
                //     'container_class' => 'header__nav'
                // ));
                ?> -->
                <div class="header__members_actions">
                    <div class="header__members__preview fn__members__preview">
                        <?php if ($isUserLoggedIn): ?>
                            <img src="<?php echo REL_ASSETS_URI; ?>img/subscribe/tarif_01.png" alt="">
                        <?php else: ?>
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?php endif; ?>
                        <span class="arrow"></span>
                    </div>

                    <div class="header__members__dropdown fn__members__dropdown">
                        <?php if ($isUserLoggedIn): ?>
                            <div class="header__members__dropdown__row">
                                <a href="user/" class="dropdown__nav_link" >Ваш профиль</a>
                            </div>
                            <div class="header__members__dropdown__row">
                                <div class="dropdown__nav_line"></div>
                            </div>
                            <div class="header__members__dropdown__row">
                                <form method="post">
                                    <button type="submit" class="dropdown__nav_link" name="logout" >Выход</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="header__members__dropdown__row">
                                <a href="https://app.pengstud.com/" class="dropdown__nav_link" >Вход</a>
                            </div>
                            <?php /* ?>
                            <div class="header__members__dropdown__row">
                                <a href="user/register" class="dropdown__nav_link">Регистрация</a>
                            </div>
                            <?php */ ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
              <div class="header__right__wrap mobile-menu" id="header__nav_wrap_mobile">
                <?php
                wp_nav_menu(array(
                    'menu' => 'Mobile menu',
                    'container' => 'nav',
                    'container_class' => 'header__nav'
                ));
                ?>

                <div class="header__members_actions">
                    <div class="header__members__preview fn__members__preview">
                        <?php if ($isUserLoggedIn): ?>
                            <img src="<?php echo REL_ASSETS_URI; ?>img/subscribe/tarif_01.png" alt="">
                        <?php else: ?>
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?php endif; ?>
                        <span class="arrow"></span>
                    </div>

                    <div class="header__members__dropdown fn__members__dropdown">
                        <?php if ($isUserLoggedIn): ?>
                            <div class="header__members__dropdown__row">
                                <a href="user/" class="dropdown__nav_link" >Ваш профиль</a>
                            </div>
                            <div class="header__members__dropdown__row">
                                <div class="dropdown__nav_line"></div>
                            </div>
                            <div class="header__members__dropdown__row">
                                <form method="post">
                                    <button type="submit" class="dropdown__nav_link" name="logout" >Выход</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="header__members__dropdown__row">
                                <a href="https://app.pengstud.com/" class="dropdown__nav_link" >Вход</a>
                            </div>
                            <?php /* ?>
                            <div class="header__members__dropdown__row">
                                <a href="user/register" class="dropdown__nav_link">Регистрация</a>
                            </div>
                            <?php */ ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="header__nav_btn" id="header__nav_btn_mobile">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!--<div class="alert_message">
                <p>Мы запустились на Product Hunt!</p>
                <a class="alert_message__button" href="https://www.producthunt.com/posts/komondor-s-pagespeed-checker-2" target="_blank">Поддержать нас</a>
            </div>-->


        </div>
                    </div>
        </div>
        <?php if (is_singular("blog")): ?>
            <div class="progress_bar"><span></span></div>
        <?php endif; ?>
    </header>
    
<?php  if( is_user_logged_in() ) :  ?>
<!-- header -->

<!-- end header -->
<?php else : ?>
<!--<div class="<?php /*echo $divClass */?>">
  <header>
    <div class="wrapper">
        <div class="header__logo__wrap">
            <a href="" class="header__logo"></a>
        </div>
        <div class="header__logo__text">
          <img src="<?php /*echo REL_ASSETS_URI; */?>img/logo_text.png" alt="">
        </div>

        <div class="header__right__wrap" id="header__nav_wrap">
            <?php
/*            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'container' => 'nav',
                'container_class' => 'header__nav'
            ));
            */?>
            <div class="header__members_actions">
                  <div class="header__members__preview fn__members__preview">
                    <?php /*if ($isUserLoggedIn): */?>
                    <img src="<?php /*echo REL_ASSETS_URI; */?>img/subscribe/tarif_01.png" alt="">
                    <?php /*else: */?>
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <?php /*endif; */?>
                    <span class="arrow"></span>
                  </div>

                  <div class="header__members__dropdown fn__members__dropdown">
                    <?php /*if ($isUserLoggedIn): */?>
                        <div class="header__members__dropdown__row">
                          <a href="user/" class="dropdown__nav_link" >Ваш профиль</a>
                        </div>
                        <div class="header__members__dropdown__row">
                          <div class="dropdown__nav_line"></div>
                        </div>
                        <div class="header__members__dropdown__row">
                          <form method="post">
                              <button type="submit" class="dropdown__nav_link" name="logout" >Выход</button>
                          </form>
                        </div>
                    <?php /*else: */?>
                        <div class="header__members__dropdown__row">
                          <span data-simple_modal="site_login" class="dropdown__nav_link">Вход</span>
                        </div>
                        <div class="header__members__dropdown__row">
                          <a href="user/register" class="dropdown__nav_link">Регистрация</a>
                        </div>
                    <?php /*endif; */?>
                  </div>
            </div>
        </div>
        <div class="header__nav_btn" id="header__nav_btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <?php /*if (is_singular("blog")): */?>
        <div class="progress_bar"><span></span></div>
    <?php /*endif; */?>
</header>-->

<?php endif; ?>


<!-- main_wrapper site -->
<div class="main_wrapper" id="main_wrapper_js">
</div>
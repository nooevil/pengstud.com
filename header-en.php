<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  

  <?php wp_head(); ?>

    <!-- OpenGraph -->
    <?php if (is_singular("blog")) : ?>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:locale" content='en_US'/>
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

    <meta name="google-site-verification" content="GZJLZHiA1t1KdBVEbc3NL7rtsfMjmBzSjKB9kiKdIQs" />
    <meta name="yandex-verification" content="a2901e0cb843bfa0" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M6H2CJ2');</script>
    <!-- End Google Tag Manager -->

</head>
<?php
global $bodyClass;
global $headerClass;
global $bodyImage;
global $divClass;
global $currLang;
$currLang= pll_current_language();

?>
<body <?php body_class($bodyClass); ?> itemscope itemtype="http://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M6H2CJ2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- header -->
<div class="<?php echo $divClass ?>">
    <header>
        <div class="wrapper">

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

            </div>
            <div class="header__right__wrap mobile-menu" id="header__nav_wrap_mobile">
                <?php
                wp_nav_menu(array(
                    'menu' => 'Mobile menu en',
                    'container' => 'nav',
                    'container_class' => 'header__nav'
                ));
                ?>
            </div>
            <div class="header__nav_btn" id="header__nav_btn_mobile">
                <span></span>
                <span></span>
                <span></span>
            </div>

          </div>
          </div>
        </div>
        <?php if (is_singular("blog")): ?>
            <div class="progress_bar"><span></span></div>
        <?php endif; ?>
    </header>
    <!-- end header -->
</div>
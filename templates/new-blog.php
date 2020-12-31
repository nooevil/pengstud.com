<?php
	/*
	Template Name: new blog
	Template Post Type: page
	*/
$currLang = pll_current_language();
if ($currLang == 'ru') {
    get_header();
} else {
    get_header(en);
}
?>

<div class="blog-archive-v3">
    <section class="blog-archive-v3__banner">
        <div class="blog-archive-v3__banner__container">
            <p class="blog-archive-v3__banner__container__text">
                Привет! Мы — Penguin-team, агентство контекстной рекламы, 
                а это — наш блог по бизнесу, маркетингу и РРС. Каждый месяц 
                мы выпускаем гайды, статьи и инструкции о том, как работать 
                с eCommerce, брендировать, настраивать Google Рекламу и 
                другие каналы трафика. 
            </p>
            <p class="blog-archive-v3__banner__container__text">
                Наш блог читают маркетологи, SEM-специалисты и предприниматели; 
                его рекомендуют на SEMConf и других конференциях.
            </p>
            <p class="blog-archive-v3__banner__container__text">
                Еще больше уникальных материалов — в рассылке 👇 
                Подписывайтесь!
            </p>
            <p class="blog-archive-v3__banner__container__text-hide">
                Получать еще больше уникальных материалов 👉🏻
            </p>
            <p class="blog-archive-v3__banner__container__text-hide-mobile">
                Получать еще больше уникальных материалов 👇
            </p>
            <form class="fn__blog_subscribe_form" >
                <input type="email" name="user_email" required placeholder="Email">
                <button type="submit">Подписаться</button>
            </form>
            <img class="blog-archive-v3__banner__container__left-photo" src="<?php echo REL_ASSETS_URI ?>img/blog/photo-1.png">
            <img class="blog-archive-v3__banner__container__right-photo" src="<?php echo REL_ASSETS_URI ?>img/blog/photo-2.png">
            <button class="blog-archive-v3__banner__container__arrow">
                <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.64682e-08 12.619L1.40215 14L12 3.56197L22.5979 14L24 12.619L12 0.8L1.64682e-08 12.619Z" 
                    fill="white"/>
                </svg>
            </button>
        </div>
    </section>
</div>


<script>
    $(function() {
		$(document).ready(function(){
            
            $(".blog-archive-v3__banner__container__arrow").click(function () {
                if ($(".blog-archive-v3__banner__container").hasClass("hide")) {
                    $(".blog-archive-v3__banner__container").removeClass("hide");
                } else {
                    $(".blog-archive-v3__banner__container").addClass("hide");
                }
                
            })
		});
		
	});
</script>
<!-- animations -->
<script>
    $(function() {
		$(document).ready(function(){
            // $(".new-home__first-screen").addClass("showed")

            // setTimeout(function () {  
            //     $(".navigator__big-circle").css({opacity: 1, visibility: "visible"});
            // }, 550);
            // setTimeout(function () {  
            //     $(".navigator__middle-circle").css({opacity: 1, visibility: "visible"});
            //     $(".navigator__img-container").css({opacity: 1, visibility: "visible"});
            // }, 650);
            // setTimeout(function () {  
            //     $(".navigator__menu.menu-1").css({opacity: 1, visibility: "visible"});
            //     $(".submenu-item-2").css({opacity: 1});
            // }, 750);
            // setTimeout(function () {   
            //     $(".submenu-item-3").css({opacity: 1});             
            // }, 850);
            // setTimeout(function () {  
            //     $(".submenu-item-4").css({opacity: 1});   
            //     $("li.navigator__menu__submenu__item").css({opacity: 1});             
            // }, 950);
            // setTimeout(function () {  
            //     $(".submenu-item-4").css({opacity: 1});  
            //     $(".navigator__menu").css({opacity: 1, visibility: "visible"}); 
            //     $("li.navigator__menu__submenu__item").css({opacity: 1});             
            // }, 1100);

            // $(window).scroll(function(){
            //     if($(window).scrollTop()>($(".new-home__first-screen-mobile").offset().top - $(window).height())){
            //         setTimeout(function () {  
            //             $(".navigator-mobile__big-circle").css({opacity: 1, visibility: "visible"});
            //         }, 550);
            //         setTimeout(function () {  
            //             $(".navigator-mobile__middle-circle").css({opacity: 1, visibility: "visible"});
            //             $(".navigator-mobile__img-container").css({opacity: 1, visibility: "visible"});
            //         }, 650);
            //         setTimeout(function () {  
            //             $(".navigator-mobile__menu.menu-mobile-1").css({opacity: 1, visibility: "visible"});
            //         }, 750);
            //         setTimeout(function () {   
            //             $(".navigator-mobile__menu").css({opacity: 1, visibility: "visible"});           
            //         }, 850);
            //     }   
            //     $(".new-home section").each(function(){
            //         if($(window).scrollTop()>($(this).offset().top - $(window).height() + 50)){
            //             $(this).addClass("showed")
            //         }    
            //     })

            //     if($(window).scrollTop()>($(".new-home__methodology__content__image__container").offset().top - $(window).height() + 300)){
            //         if (!$("#animation1").hasClass("showed")) {
            //             document.getElementById("animation1").beginElement();
            //         }
            //         $("#animation1").addClass("showed");
            //     }    
            //     if($(window).scrollTop()>($(".new-home__map").offset().top - $(window).height())){
            //         $(".new-home__map__image").addClass("showed")
            //     }
            //     if($(window).scrollTop()>($(".new-home__numbers__single-number").offset().top - $(window).height() + 50)){
            //         $(".circle").addClass("showed");
            //         $(".first-line").addClass("showed");
            //         $(".second-line").addClass("showed");
            //     }
            //     if($(window).scrollTop()>($(".new-home__formula").offset().top - $(window).height() + 100)){
            //         let i = 0

            //         let cardArr = Array.from($(".new-home__formula__decription"));

            //         function myLoop () {           
            //             setTimeout(function () {   
            //                 $(`.new-home__formula__decription.card-${i + 1}`).addClass("showed")  
            //                 $(`.new-home__formula__lines.line-${i + 1}`).addClass("showed")         
            //                 i++;
            //                 if (i < cardArr.length) {   
            //                     myLoop();             
            //                 } else {
            //                     $(`.new-home__formula__lines.line-5`).addClass("showed")
            //                     $(`.new-home__formula__lines.line-6`).addClass("showed")
            //                 }                    
            //             }, 200)
            //         }

            //         myLoop();
            //     }
            //     if($(window).scrollTop()>($(".new-home__niches__content__container__text").offset().top - $(window).height())){
            //         let i = 0

            //         let imgArr = Array.from($(".new-home__niches__images__row__img"));

            //         function myLoop () {           
            //             setTimeout(function () {   
            //                 imgArr[i].classList.add("showed");          
            //                 i++;
            //                 if (i < imgArr.length) {   
            //                     myLoop();             
            //                 }                     
            //             }, 50)
            //         }

            //         myLoop();
            //     }
            //     if($(window).scrollTop()>($(".new-home__our-team__galery__photo.photo-1").offset().top - $(window).height() + 100)){
            //         $(".new-home__our-team__galery__text.text-1").addClass("showed")
            //     }
            //     if($(window).scrollTop()>($(".new-home__our-team__galery__photo.photo-8").offset().top - $(window).height() + 200)){
            //         $(".new-home__our-team__galery__text.text-2").addClass("showed")
            //     }
                
            //     if($(window).scrollTop()>($(".new-home__feedback").offset().top - $(window).height() + 100)){
            //         $(".new-home__feedback .feedback_form").addClass("showed")
            //     }
            // })
		});
		
	});
</script>

<?php get_footer(); ?>

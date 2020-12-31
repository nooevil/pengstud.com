<?php
	/*
  Template Name: Новая Вакансии
	Template Post Type: page
	*/
	get_header();
?>

<article class="new-career">
    <!-- 1 -->
    <section class="new-career__first-screen">
        <h1 class="new-career__first-screen__title">Присоединяйтесь к команде Penguin-team</h1>
        <div class="new-career__separator"></div>
        <p class="new-career__first-screen__description">
          Ищем влюбленных в РРС пингвинов!
        </p>
    </section>

    <!-- 2 -->
    <section class="new-career__performances">
      <div class="new-career__performances__content">
        <h2 class="new-career__performances__content__title">
          Пингвины — это команда и, кажется, в ней не хватает именно тебя!
        </h2>
        <div class="new-career__separator"></div>
        <p class="new-career__performances__content__text">
          Penguin-team — агентство с более чем 50% ежегодным ростом. Мы настраиваем и оптимизируем 
          рекламу в Google, Bing, Amazon и на других платформах; выступаем на конференциях и митапах; 
          пишем инструкции и гайды по контекстной рекламе и бизнесу; устраиваем обучающие встречи и 
          интенсивы внутри компании. Хочешь быть частью активной и любящей свое дело команды? 
          Скорее смотри открытые вакансии!
        </p>
      </div>
      <div class="new-career__performances__images">
        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-1.jpg">
        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-2.jpg">
        <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-3.jpg">
      </div>

      <div class="new-career__performances__images-mobile">
        <div class="new-career__performances__images-mobile__card">
          <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-1.jpg">
        </div>
        <div class="new-career__performances__images-mobile__card">
          <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-2.jpg">
        </div>
        <div class="new-career__performances__images-mobile__card">
          <img src="<?php echo REL_ASSETS_URI ?>img/new-contact-page/team-3.jpg">
        </div>
      </div>
    </section>

    <!-- 3 -->
    <section class="new-career__mission">
      <div class="new-career__mission__content">
      <div class="new-career__mission__content__block">
          <h2 class="new-career__mission__content__block__title">Наша миссия</h2>
          <div class="new-career__separator"></div>
          <p class="new-career__mission__content__block__text">
              Наша миссия — помочь каждому нашему клиенту развивать свой бизнес и делать его успешным на рынке
          </p>
      </div>
      <div class="new-career__mission__content__block">
          <h2 class="new-career__mission__content__block__title">Наши ценности</h2>
          <div class="new-career__separator"></div>
          <ul class="new-career__mission__content__block__list">
              <li class="new-career__mission__content__block__list__item">Мы за честный и полезный бизнес, а потому работаем только со «здоровыми» темами.</li>
              <li class="new-career__mission__content__block__list__item">Мы за независимость от чужой воли и мнения. Воля, которая движет наши процессы, исходит изнутри, а не снаружи.</li>
              <li class="new-career__mission__content__block__list__item">Мы за максимизацию эффективности. За то, чтобы добиваться максимума, оптимизируя прилагаемые усилия.</li>
              <li class="new-career__mission__content__block__list__item">Мы за честность. Мы хотим строить открытые отношения путем обмена информацией.</li>
              <li class="new-career__mission__content__block__list__item">Мы за оптимизм. Нам важно сохранять позитивный взгляд и не впадать в уныние.</li>
              <li class="new-career__mission__content__block__list__item">Мы за уважение и заботу: к коллегам, к клиентам, к компании, к другим взглядам.</li>
          </ul>
      </div>
      <div class="new-career__mission__content__block">
          <h2 class="new-career__mission__content__block__title">Наше вдохновение</h2>
          <div class="new-career__separator"></div>
          <p class="new-career__mission__content__block__text">
              Мы вдохновляемся коллегами и конкурентами — другими украинскими IT и маркетинговыми компаниями,
              которые своим примером показывают, что у нас в стране можно и нужно создавать успешные продуктовые
              бизнесы, развиваться, приносить пользу и менять текущую ситуацию в лучшую сторону. 
              И со своей стороны мы готовы приложить все усилия, чтобы участвовать в этих изменениях и 
              вносить свой вклад в успешное будущее!
          </p>
      </div>
      </div>
      
      <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/background-1.svg" alt="" class="new-career__mission__background-img background-img-1">
      <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/background-2.svg" alt="" class="new-career__mission__background-img background-img-2">
      <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/background-3.svg" alt="" class="new-career__mission__background-img background-img-3">
    </section>

    <!-- 4 -->
    <section class="new-career__advantages">
      <h2 class="new-career__advantages__title">Преимущества</h2>
      <div class="new-career__separator"></div>
      <ul class="new-career__advantages__list">
        <li class="new-career__advantages__list__item">
          <div class="new-career__advantages__list__item__number">1</div>
          <p class="new-career__advantages__list__item__text">
            Официальное оформление и оплачиваемый отпуск
          </p>
        </li>
        <li class="new-career__advantages__list__item">
          <div class="new-career__advantages__list__item__number">2</div>
          <p class="new-career__advantages__list__item__text">
            Зарплата на уровне выше рыночного
          </p>
        </li>
        <li class="new-career__advantages__list__item">
          <div class="new-career__advantages__list__item__number">3</div>
          <p class="new-career__advantages__list__item__text">
            Полная или частичная оплата курсов и тренингов
          </p>
        </li>
        <li class="new-career__advantages__list__item">
          <div class="new-career__advantages__list__item__number">4</div>
          <p class="new-career__advantages__list__item__text">
            Компенсация расходов на изучение английского языка
          </p>
        </li>
        <li class="new-career__advantages__list__item">
          <div class="new-career__advantages__list__item__number">5</div>
          <p class="new-career__advantages__list__item__text">
            Комфортный офис в отдельном здании
          </p>
        </li>
      </ul>
    </section>

    <!-- 5 -->
    <section class="new-career__vacancies">
      <h2 class="new-career__vacancies__title">Вакансии</h2>
      <div class="new-career__separator"></div>
      <div class="new-career__vacancies__content">
        <?php
				  $args = array(
				    'post_type'  => 'vacancy',
				    'order'      => 'ASC',
				    'posts_per_page' => -1
				  );
				  $name = get_posts( $args );
				  foreach( $name as $post ){ setup_postdata($post);
        ?>
        
        <div class="new-career__vacancies__content__card">
          <h4 class="new-career__vacancies__content__card__title"><?php the_title(); ?></h4>
          <p class="new-career__vacancies__content__card__text"><?php echo get_post_meta($post->ID, 'short_desc', true); ?></p>
          <a href="<?php the_permalink() ?>" class="new-career__vacancies__content__link">Подробнее</a>
        </div>

        <?php
				}
				  wp_reset_postdata();
        ?>

      </div>
    </section>

    <!-- 6 -->
    <section class="new-career__our-team">
        <h2  class="new-career__our-team__title">Присоединяйтесь к команде!</h2>
        <div class="new-career__separator"></div>
        <div class="new-career__our-team__galery">
            <img class="new-career__our-team__galery__photo photo-1" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-1.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-2" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-2.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-3" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-3.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-4" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-4.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-5" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-5.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-6" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-6.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-7" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-7.jpg" alt="">
            <img class="new-career__our-team__galery__photo photo-8" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-8.jpg" alt="">
            <!-- <div class="new-career__our-team__galery__text text-1">Пингвины — частые гости конференций.<br> И как спикеры, и как участники</div>
            <div class="new-career__our-team__galery__text text-2">Участвуем в благотворительных<br> марафонах с 2017 года</div> -->
        </div>
    </section>

    <!-- 6.1 -->
    <section class="new-career__our-team-mobile">
        <div class="new-career__our-team-mobile__head">
            <h2 class="new-career__our-team-mobile__head__title">Присоединяйтесь к команде!</h2>
            <div class="new-career__separator"></div>
        </div>
        <div class="new-career__our-team-mobile__galery">
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-1" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-1.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-2" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-2.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-3" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-3.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-4" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-4.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-5" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-5.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-6" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-6.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-7" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-7.jpg" alt="">
            </div>
            <div class="new-career__our-team-mobile__galery__photo-card">
                <img class="new-career__our-team-mobile__galery__photo photo-8" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/team-photo-8.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- 7 -->
    <section class="new-career__links">
        <div class="new-career__links__container">
            <div class="new-career__links__container__stripe"></div>
            <div class="new-career__links__container__card">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/links-icon-1.svg" alt="" class="new-career__links__container__card__img">
                <h3 class="new-career__links__container__card__title">Наша команда</h3>
                <p class="new-career__links__container__card__text">
                    Познакомьтесь с РРС-пингвинами!
                </p>
                <a 
                    class="new-career__links__container__card__link" 
                    href="https://pengstud.com/team/" 
                    target="_blank" 
                    rel="noopener noreferrer">
                    Читать
                </a>
            </div>
        </div>
        <div class="new-career__links__container">
            <div class="new-career__links__container__stripe"></div>
            <div class="new-career__links__container__card">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/links-icon-2.svg" alt="" class="new-career__links__container__card__img">
                <h3 class="new-career__links__container__card__title">Наша история</h3>
                <p class="new-career__links__container__card__text">
                    Наш путь с 2013 до наших дней
                </p>
                <a 
                    class="new-career__links__container__card__link" 
                    href="https://pengstud.com/ourstory/" 
                    target="_blank" 
                    rel="noopener noreferrer">
                    Читать
                </a>
            </div>
        </div>
        <div class="new-career__links__container">
            <div class="new-career__links__container__stripe"></div>
            <div class="new-career__links__container__card">
                <img src="<?php echo REL_ASSETS_URI ?>img/new-about-us/links-icon-3.svg" alt="" class="new-career__links__container__card__img">
                <h3 class="new-career__links__container__card__title">Карьера</h3>
                <p class="new-career__links__container__card__text">
                    Присоединяйтесь к нам! 
                </p>
                <a 
                    class="new-career__links__container__card__link" 
                    href="https://pengstud.com/career/" 
                    target="_blank" 
                    rel="noopener noreferrer">
                    Читать
                </a>
            </div>
        </div>
    </section>

    <img class="new-career__pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-about-us/pattern-1.svg" alt="">
    <img class="new-career__pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-about-us/pattern-2.svg" alt="">
    <img class="new-career__footer-pattern pattern-1" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
    <img class="new-career__footer-pattern pattern-2" src="<?php echo REL_ASSETS_URI ?>img/new-home-page/footer-pattern.png" alt="">
</article>

<!-- animations -->
<script>
    $(function() {
		$(document).ready(function(){
        $(".new-career__first-screen").addClass("showed");

        let i = 0;
        let imgArr = Array.from($(".new-career__performances__images img"));

        function myLoop () {           
            setTimeout(function () {   
                imgArr[i].classList.add("showed");          
                i++;
                if (i < imgArr.length) {   
                    myLoop();             
                }                     
            }, 50)
        }

        myLoop();
		});
		
	});
</script>
<script>
    $(function() {
		$(document).ready(function(){
            $(window).scroll(function(){
                $(".new-career section").each(function(){
                    if($(window).scrollTop()>($(this).offset().top - $(window).height() + 50)){
                        $(this).addClass("showed")
                    }    
                })
                
                $(".new-career__mission__content__block").each(function(){
                    if($(window).scrollTop()>($(this).offset().top - $(window).height() + 150)){
                        $(this).addClass("showed")
                        let imgArr = Array.from($(".new-career__mission__content__block"));

                        imgArr.forEach((elem, idx) => {
                        elem.classList.forEach((elem) => {
                            if (elem === "showed") {
                                $(`.background-img-${idx + 1}`).addClass("showed")
                            }

                          
                          })    
                      })
                    }    
                })
                if($(window).scrollTop()>($(".new-career__our-team__galery").offset().top - $(window).height())){
                    let i = 0

                    let imgArr = Array.from($(".new-career__our-team__galery__photo"));

                    function myLoop () {           
                        setTimeout(function () {   
                            imgArr[i].classList.add("showed");          
                            i++;
                            if (i < imgArr.length) {   
                                myLoop();             
                            }                     
                        }, 100)
                    }

                    myLoop();
                }
                if($(window).scrollTop()>($(".new-career__vacancies__content").offset().top - $(window).height())){
                    let i = 0

                    let imgArr = Array.from($(".new-career__vacancies__content__card"));

                    function myLoop () {           
                        setTimeout(function () {   
                            imgArr[i].classList.add("showed");          
                            i++;
                            if (i < imgArr.length) {   
                                myLoop();             
                            }                     
                        }, 150)
                    }

                    myLoop();
                }
            })
		});
		
	});
</script>
<script>
	$(function() {
		$(document).ready(function(){
		  	$('.new-career__our-team-mobile__galery').slick({
                autoplay: true,
                autoplaySpeed: 5000, 
                arrows: false,
                // dots: true,
    		});
		});
		
	});
</script>
<script>
	$(function() {
		$(document).ready(function(){
		  	$('.new-career__performances__images-mobile').slick({
                autoplay: true,
                autoplaySpeed: 5000, 
                arrows: false,
                // dots: true,
    		});
		});
		
	});
</script>

<?php get_footer(); ?>
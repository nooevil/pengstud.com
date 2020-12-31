<?php
	/*
	Template Name: PPC FindKeywords page EN
	Template Post Type: page
	*/
	get_headeren();

	User::checkVerifyUser();
	$isUserLoggedIn = User::isUserLoggedIn();
?>


      <section class="ngkw">
        <div class="wrapper_m">
          <div class="ngkw__title__holder">

            <h1 class="ngkw__title" data-aos="zoom-in">FindKeywords tool 2.0 <span class="version" data-simple_modal="what_new_find" >Big update!</span></h1>
              <?php /*
                <div class="ngkw__title__holder__beta">(beta)
                    <div class="ngkw__title__holder__info">На данный момент работает beta версия сервиса. Тестируют ppc-специалисты разных направлений, как только все вопросы будут решены, данный инструмент будет доступен для всех желающих
                    </div>
                </div>
                */ ?>
          </div>
          <p class="ngkw__subtitle" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="400">(The tool to collect negative keywords)</p>


				<span class="ngkw__what_new ppctools__info__more" data-simple_modal="what_new_find_en" >What’s new?</span>

          <?php /* ?>

          <ol class="fkt-new_list" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500">
            <li class="fkt-new_list__item">
              2 modes of keywords search result:
              <ul class="fkt-new_sub-list">
                <li>quick search result -  is similar to  one of Google Planner , but the results found include every word of the phrase entered in the search;
                </li>
                <li>full search result - extended search result that includes search on additional relevant phrases, but the results found also include every word of the phrase entered in the search.</li>
              </ul>
            </li>
            <li class="fkt-new_list__item">
              Updated Exces Keyword Upload File:
              <ul class="fkt-new_sub-list">
                <li>Uploading of locations in a convenient format for uploading to Editor;</li>
                <li>updated template for creating ads.</li>
              </ul>
            </li>
            <li class="fkt-new_list__item">Full list of locations.</li>
            <li class="fkt-new_list__item">Grouping of reports on the projects.</li>
            <li class="fkt-new_list__item">Fixed an error with a delay of 30 seconds.</li>
            <li class="fkt-new_list__item">New filters for getting relevant search results.</li>
            <li class="fkt-new_list__item">Copying of negative keywords.</li>
          </ol>

          <?php */ ?>


        </div>
      </section>


      <section class="fkwt__compare">
        <div class="wrapper_m">
          <div class="row justify-content-center">
            <h2 class="fkwt__compare__title">Comparison of different keyword search services:</h2>
          </div>

          <div class="row fkwt__compare__holder">
            <table>
              <thead>
              <th>Feature</th>
              <th>FindKeywords</th>
              <th>Google Planner</th>
              </thead>
              <tbody>
              <tr>
                <td>Current Google database</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Expanded Google database</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-minus-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Full compliance of search results to entered keys</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-minus-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Template for uploading to Editor</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td>(partially)</td>
              </tr>
              <tr>
                <td>Adding negative words</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-minus-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Competition data/cpc/cpc</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Saving of project parsing</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
              </tr>
              <tr>
                <td>Uploading of target locations</td>
                <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                <td><i class="fa fa-minus-circle" aria-hidden="true"></i></td>
              </tr>
              </tbody>
            </table>
          </div>

          <div class="ngkw_relize__load_holder">
          <a href="https://app.pengstud.com/" target="_blank" class="ngkw_relize__load ga__find" >Search of keywords</a>
          </div>


        </div>
      </section>




      <section class="ngkw_forwho">
        <div class="wrapper_m">
          <h2 class="ngkw_forwho__title">For whom this tool:</h2>
          <div class="row justify-content-md-center ngkw_forwho__users">
            <div class="col-md-3">
              <img src="<?php echo ABS_ASSETS_URI; ?>/img/nkwd/user_male.png" alt="">
              <p>For ppc specialists in different agencies (100%)</p>
            </div>
            <div class="col-md-3">
              <img src="<?php echo ABS_ASSETS_URI; ?>/img/nkwd/user_freelance.png" alt="">
              <p>For ppc freelance specialists (100%)</p>
            </div>
            <div class="col-md-3">
              <img src="<?php echo ABS_ASSETS_URI; ?>/img/nkwd/user_female.png" alt="">
              <p>For internet marketers (10%)</p>
            </div>
            <div class="col-md-3">
              <img src="<?php echo ABS_ASSETS_URI; ?>/img/nkwd/user_ppc.png" alt="">
              <p>For ppc specialists in office (30%)</p>
            </div>
          </div>
          <!--
          <div class="ngkw_forwho__text">
              <p>В среднем, около 10% эффективного рабочего времени ppc-специалист тратит на анализ поисковых запросов и добавление минус-слов в рекламную кампанию, данный инструмент позволяет ускорить этот процесс. Используя данное расширение, можно как минимум в 2 раза быстрее делать работу по добавлению минус-слов в аккаунт AdWords и Директ. Если учесть, что в среднем в месяц 120 часов эффективного рабочего времени, то данное приложение может сэкономить:</p>
              <p>(Рабочее время * % затрат проработки минус слов) * (% ускорения работы).<br>(120*10%)*50% = 6 часов.</p>
              <p>Профит для ppc специалиста 6 часов в месяц.</p>
          </div>
          -->
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row justify-content-center">
            <h2 class="ngkw_instruct__title">Instruction on how to use:</h2>
          </div>
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_1.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_1.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>1. Create a project.</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>2. Create the first report within the project.</p>
              </div>
            </div>
            <div class="col-md-7" data-aos="zoom-in-left">
              <a data-fancybox="step2" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_2.gif"><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_2.gif" alt=""></a>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_3.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_3.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>3. Enter keywords (words or phrases via “Enter”).</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>4. Add negative words (words or phrases via “Enter”) - optional.</p>
              </div>
            </div>
            <div class="col-md-7" data-aos="zoom-in-left">
              <a data-fancybox="step2" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_4.gif"><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_4.gif" alt=""></a>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_5.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_5.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>5. Specify the needed location, language, currency - optional</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>6. Select the search result option (quick or full) and start the search.</p>
              </div>
            </div>
            <div class="col-md-7" data-aos="zoom-in-left">
              <a data-fancybox="step2" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_6.gif"><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_6.gif" alt=""></a>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-12 mb-5">
              <h3 class="text-center">Start the work with search results you've got:</h3>
            </div>
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_7.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_7.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>7. Add negative keywords (LeftClick adds a word);</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>8. Add negative keywords (Alt + LeftClick - phrase);</p>
              </div>
            </div>
            <div class="col-md-7" data-aos="zoom-in-left">
              <a data-fancybox="step2" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_8.gif"><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_8.gif" alt=""></a>
            </div>
          </div>
        </div>
      </section>

      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_9.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_9.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>9. Update the search result, removing unnecessary words;</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>10. Make a search on new-added words;</p>
              </div>
            </div>
            <div class="col-md-7" data-aos="zoom-in-left">
              <a data-fancybox="step2" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_10.gif"><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_10.gif" alt=""></a>
            </div>
          </div>
        </div>
      </section>

      <section class="ngkw_instruct">
        <div class="wrapper_m">
          <div class="row ngkw_instruct__holder align-items-center">
            <div class="col-md-7" data-aos="zoom-in-right">
              <a data-fancybox="step1" href="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_11.gif" ><img src="<?php echo ABS_ASSETS_URI; ?>/img/fkw/step_11.gif" alt=""></a>
            </div>
            <div class="col-md-5">
              <div class="ngkw_instruct__text">
                <p>11. Upload an Excel file with key and minus words, ad templates and locations ready for downloading in Adwords Editor.</p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="ngkw_subscribe">
        <div class="wrapper_m">
          <p class="fkwt_subscribe__text">Unlike many analogs, this tool was developed primarily taking into account the interests of contextual advertising specialists. The parsing logic, interface, upload file will be convenient for those who daily search for keywords for their projects and actively work in Google Ads Editor
          </p>
          <p class="fkwt_subscribe__text">In our agency FindKeywords saves from 20% to 50% of the working time for collecting and structuring keywords.
          </p>
          <br>
          <br>
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
            </form>
          </div>
          <!--
          <div class="ngkw_subscribe__video__holder">
              <div class="ngkw_subscribe__video">
                  <iframe src="https://www.youtube.com/embed/1Ktl2IruSac?rel=0&amp;showinfo=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
          </div>
          -->
        </div>
      </section>



      <section class="sigle_blog__comments">
        <div class="wrapper_m">

          <div class="row justify-content-center">
            <h2 class="ngkw_subscribe__title">Leave your comments and suggestions below:</h2>
          </div>
          <br>
          <br>
          <div class="sigle_blog__comments__actions">
            <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__fb">
              <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <div class="sigle_blog__comments__actions__item sigle_blog__comments__actions__item__tv">
              <a href="http://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="sigle_blog__comments__wrap">
              <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                  comments_template();
              endif;
              ?>
          </div>
        </div>
      </section>




<?php get_footer(); ?>

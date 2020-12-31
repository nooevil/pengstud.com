<?php if (!isset($_COOKIE['allow_penguin_cookies']) ) : ?>
		<div class="coockie_message__holder fn__coockie_message__holder">
			<div class="wrapper_m">
				<div class="row align-items-center">
					<div class="col-md-8">
						<p class="text"><?php _e('Наш сайт использует файлы cookie, чтобы улучшить работу и предоставить максимальное удобство пользователям.') ?></p>
					</div>
					<div class="col-md-4">
						<button class="fn__allow_penguin_cookies allow_penguin_cookies__btn" data-status="true" ><?php _e('Принять') ?></button>
						<button class="fn__allow_penguin_cookies allow_penguin_cookies__btn" data-status="false" ><?php _e('Отклонить') ?></button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

    <?php /*
    <!-- contact_us -->
    <section class="contact_us">
      <div class="wrapper_m">

        <div class="section_title">
          <h3>Заполните форму ниже и мы обсудим ваши задачи:</h3>
        </div>

        <div class="contact_us__form_wrap" id="contact_us__form__wrap__js">
          <form id="contact_us__form">
            <div class="contact_us__form">
              <div class="contact_us__slide contact_us__slide_1 active">
                <div class="form_row">
                  <span class="title">Исходные данные:</span>
                </div>
                <div class="form_row">
                  <p class="form_row__name">Сфера деятельности</p>
                  <textarea class="textarea_form" placeholder="Например: строительство домов из бруса"></textarea>
                </div>
                <div class="form_row">
                  <p class="form_row__name">Цель создания сайта</p>
                  <textarea class="textarea_form" placeholder="Например: продвижение бизнеса"></textarea>
                </div>
              </div>

              <div class="contact_us__slide contact_us__slide_2">
                <div class="form_row">
                  <span class="title">Целевая аудитория: </span>
                </div>
                <div class="form_row">
                   <p class="form_row__name">Опишите вашу целевую аудиторию</p>
                  <textarea class="textarea_form" placeholder="Например: "></textarea>
                </div>
              </div>

              <div class="contact_us__slide contact_us__slide_3">
                <div class="form_row">
                  <span class="title">Ваши контакты:</span>
                </div>
                <div class="form_row">
                  <p class="form_row__name">Ваше имя</p>
                  <input type="text" class="input_text" placeholder="Имя" required>
                </div>
                <div class="form_row">
                  <p class="form_row__name">Ваш телефон</p>
                  <input type="tel" class="input_text user_phone_mask" placeholder="Телефон" required>
                </div>
                <div class="form_row">
                  <button type="submit" class="btn_style_1 input_submit" id="contact_us__form__btn" >Получить прогноз</button>
                </div>
              </div>
            </div>
          </form>
          <ul class="contact_us__form__nav" id="contact_us__form__nav">
            <li data-step="1" class="active"><span></span></li>
            <li data-step="2"><span></span></li>
            <li data-step="3"><span></span></li>
          </ul>
        </div>

      </div>
    </section>
    <!-- end contact_us -->
    */ ?>


    <?php if ( is_user_logged_in() ) : ?>


    <div class="subscribe_float_form__holder">
      <p class="title">Улучшить свой AdWords <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></p>
    </div>


    <?php endif; ?>


    <?php /*
    <!-- footer -->
    <footer>
      <div class="wrapper_m">
        <div class="grid_row">
           <div class="grid_coll grid_coll_33 footer__map__wrap">
              <div class="footer__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1322.6387714650914!2d35.04091265829442!3d48.470389773136965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe2ef1662430f%3A0xfc2bf70f9eb850c2!2z0YPQu9C40YbQsCDQmtC90Y_Qt9GPINCS0LvQsNC00LjQvNC40YDQsCDQktC10LvQuNC60L7Qs9C-LCAxOCwg0JTQvdC40L_RgNC-LCDQlNC90LXQv9GA0L7Qv9C10YLRgNC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwg0KPQutGA0LDQuNC90LAsIDQ5MDAw!5e0!3m2!1sru!2sru!4v1516094772187"></iframe>
              </div>
           </div>
           <div class="grid_coll grid_coll_33 footer__info__holder">
             <div class="footer__info__wrap">
               <div class="footer__info">
                 <i class="fa fa-map-marker" aria-hidden="true"></i><span>Днепр, ул.Князя Владимира Великого (Плеханова), 18б</span>
               </div>
               <div class="footer__info">
                <!--
                 <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+380956959449">+38 (095) 69 59 449</a>
                 -->
                 <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+380957057322">+38 (095) 705 73 22</a>
               </div>
               <div class="footer__info">
                 <!--<i class="fa fa-map" aria-hidden="true"></i><a href="" class="footer__site_map_link">Карта сайта</a> -->
               </div>
             </div>
           </div>
           <div class="grid_coll grid_coll_33">
             <ul class="footer__socials">
               <!-- <li><a href="" class="footer__socials__vk"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
               <li><a href="" class="footer__socials_twit"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
               <li><a href="" class="footer__socials__google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> -->
               <li><a target="blanc" href="https://www.facebook.com/pengstud.dp/" class="footer__socials__facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
             </ul>
             <div class="footer__search">
               <form method="get" action="<?php echo home_url(); ?>" >
                  <div class="footer__search__input-holder">
                    <input type="text" name="s" placeholder="Поиск" class="footer__search__input" autocomplete="off">
                    <button type="submit" class="footer__search__submit"></button>
                  </div>
               </form>
             </div>
           </div>

        </div>
      </div>
    </footer>
    <!-- end footer -->
    */ ?>

    <!-- footer -->
    <footer>
      <div class="wrapper_m">
          <?php $currLang= pll_current_language(); ?>
          <?php if($currLang == 'ru' ) : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php else : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php endif; ?>


          <?php $currLang= pll_current_language(); ?>
          <?php if($currLang == 'ru' ) : ?>
            <p class="title">Инструменты</p>
            <div class="footer_n__row">
              <a href="utm/google/"><?php _e('UTM-генератор'); ?></a>
            </div>
            <div class="footer_n__row">
              <a href="negativekeywords-tool/">NegativeKeywords tool</a>
            </div>
            <div class="footer_n__row">
              <a href="findkeywords-tool/">FindKeywords tool</a>
            </div>
            <div class="footer_n__row">
              <a href="google-ads-skripts/">Google Ads Scripts</a>
            </div>
            <div class="footer_n__row">
              <a href="speed-checker/">Page Speed Checker</a>
            </div>
            <div class="footer_n__row">
                <a href="keyword-processor-tool/">Keyword Processor Tool</a>
            </div>
            <div class="footer_n__row">
                <a href="keywordgrouping-tool/">Keyword Grouping Tool</a>
            </div>
            <div class="footer_n__row">
                <a class="orange_badge" href="panda-software/">Panda Software</a>
            </div>
          <?php else : ?>
            <p class="title">Tools</p>
            <div class="footer_n__row">
              <a href="en/negativekeywords-tool-en-new/">NegativeKeywords tool</a>
            </div>
            <div class="footer_n__row">
              <a href="en/findkeywords-tool-en/">FindKeywords tool</a>
            </div>
            <div class="footer_n__row">
              <a href="en/utm-en/">UTM-generator</a>
            </div>
            <div class="footer_n__row">
              <a href="en/speed-checker-en/">Page Speed Checker</a>
            </div>
            <div class="footer_n__row">
              <a class="orange_badge" href="en/panda-software-2/">Panda Software</a>
            </div>
          <?php endif; ?>

        </div>

        <?php $currLang= pll_current_language(); ?>
        <?php if($currLang == 'ru' ) : ?>
          <div class="footer_n__coll footer_n_4__coll">

            <p class="title">Услуги</p>
            <div class="footer_n__row">
              <a href="google-shopping-management/">Google Shopping</a>
            </div>
            <div class="footer_n__row">
              <a href="amazon/">Реклама на Amazon</a>
            </div>
            <div class="footer_n__row">
              <a href="google-ads-facebook-ads/">Google Ads и Facebook Ads</a>
            </div>

          </div>
        <?php else : ?>
          <div class="footer_n__coll footer_n_4__coll">

            <p class="title">Services</p>
            <div class="footer_n__row">
              <a href="en/google-shopping-management-2/">Google Shopping</a>
            </div>
            <div class="footer_n__row">
              <a href="en/amazon-en/">Amazon</a>
            </div>
            <div class="footer_n__row">
              <a href="en/google-ads-facebook-ads-2/">Google Ads & Facebook Ads</a>
            </div>

          </div>
        <?php endif; ?>

          <?php $currLang= pll_current_language(); ?>
          <?php if($currLang == 'ru' ) : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php else : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php endif; ?>

            <?php if($currLang == 'ru' ) : ?>
              <p class="title">Контент</p>
                <div class="footer_n__row">
                    <a href="blog/optimizatsiya-reklamnyh-kampanij-pokazatel-kachestva/">
                        <?php _e('Оптимизация рекламных кампаний в Google AdWords'); ?>
                    </a>
                </div>
                <div class="footer_n__row">
                    <a href="blog/kak-sozdat-fid-dlya-google-merchant/">
                        <?php _e('Как создать фид для Google Merchant'); ?>
                    </a>
                </div>

                <div class="footer_n__row">
                    <a href="blog/effektivnye-strategii-google-shopping/">
                        <?php _e('Стратегии в Google Shopping'); ?>
                    </a>
                </div>
                <div class="footer_n__row">
                    <a href="blog/how-to-google-shopping/">
                        <?php _e('Гайд по созданию Shopping кампаний'); ?>
                    </a>
                </div>
            <?php else: ?>
              <p class="title">Content</p>
                <div class="footer_n__row">
                    <a href="/en/blog/google-shopping-1/">
                        <?php _e('How to make money with Google Shopping in 2019'); ?>
                    </a>
                </div>
            <?php endif; ?>


        </div>

          <?php $currLang= pll_current_language(); ?>
          <?php if($currLang == 'ru' ) : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php else : ?>
            <div class="footer_n__coll footer_n_4__coll">
          <?php endif; ?>
          <p class="title"><?php _e('Контакты'); ?></p>

          <div class="footer_n__row">
             <ul class="footer__socials">
             <?php $currLang = pll_current_language(); ?>
             <?php if($currLang == 'ru' ) : ?>
               <li><a target="blanc" href="https://www.facebook.com/pengstud.dp/" class="footer__socials__facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
             <?php endif; ?>
             <?php /* ?>
               <li><a target="blanc" href="https://www.behance.net/penguinl" class="footer__socials__facebook"><i class="fa fa-behance-square" aria-hidden="true"></i></a></li>
              <?php */ ?>
               <li><a target="blanc" href="https://www.linkedin.com/company/ppc-agancy-penguin-studio/about/" class="footer__socials__facebook"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
             </ul>
          </div>

          <div class="footer_n__row">
            <a href="tel:<?php _e('080 033 61 91'); ?>"><?php _e('080 033 61 91'); ?></a>
          </div>

          <div class="footer_n__row">
            <a href="mailto:info@pengstud.com">info@pengstud.com</a>
          </div>

          <div class="footer_n__row">
            <a href="publichnaya-oferta/"><?php _e('Публичная оферта'); ?></a>
          </div>


          <div class="footer_n__row">

              <?php $currLang = pll_current_language(); ?>
              <?php if($currLang == 'ru' ) : ?>
                <a href="politika-konfidencialnosti/">
                  <?php _e('Политика конфиденциальности'); ?>
                </a>
              <?php else : ?>
                <a href="en/privacy-police/">
                    <?php _e('Политика конфиденциальности'); ?>
                </a>
              <?php endif; ?>

          </div>

          <?php if($currLang == 'ru' ) : ?>
          <div class="footer_n__row">
            <a href="career/"><?php _e('Карьера'); ?></a>
          </div>
          <?php endif; ?>

          <div class="footer_n__row">
            <p>© 2013 - 2020 Penguin-team</p>
          </div>

          <div class="footer_n__row">
            <?php
//            $args = array(
//                'dropdown'               => 0, // displays a list if set to 0, a dropdown list if set to 1 (default: 0)
//                'show_names'             => 1, // displays language names if set to 1 (default: 1)
//                'hide_current'           => 1, // hides the current language if set to 1 (default: 0)
//            );
            $args = array(
                'dropdown'               => 0, // displays a list if set to 0, a dropdown list if set to 1 (default: 0)
                'show_names'             => 1, // displays language names if set to 1 (default: 1)
                'hide_current'           => 1, // hides the current language if set to 1 (default: 0)
                'echo'                   => false,
                'raw'                    => 1
            );
            $langs = pll_the_languages($args);
            ?>
            <ul class="langSwitchers">
                <?php
                    foreach ($langs as $key => $lang) {
                        if ($key != "ua") {
                           echo "<li class='lang-item lang-item-" . $lang['id'] . "lang-item-" . $lang['slug'] . "'><a lang='" . $lang['slug'] . "' hreflang='" . $lang['slug'] . "' href='" . $lang['url'] ."'>" . $lang['name'] ."</a></li>";
                        }
                    }
                ?>
            </ul>
          </div>

        </div>
      </div>
    </footer>
    <!-- end footer -->

  </div>
  <!-- main_wrapper site end -->

  <!-- Overlay -->
  <div class="simpleModalOverlay"></div>

  <!-- modals -->
  <div class="simpleModalWindowWrap site_login">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          <!-- site_login__holder -->
          <div class="site_login__holder">
            <form class="fn__site_login_form">
            	<div class="fn__site_login_form__errors"></div>
              <div class="site_login__holder__row">
                <p><?php _e('Укажите e-mail'); ?></p>
                <div class="site_login__holder__row__input">
                  <input type="email" name="user_email" required placeholder="<?php _e('Ваш e-mail'); ?>" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                </div>
              </div>

              <div class="site_login__holder__row">
                <p><?php _e('Введите пароль'); ?></p>
                <div class="site_login__holder__row__input">
                  <input type="password" name="user_pass" required placeholder="<?php _e('Ваш пароль'); ?>" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                </div>
              </div>

              <div class="site_login__holder__row">
                <div class="site_login__holder__row__input">
                  <button type="submit" class="btn_style_1"><?php _e('Войти'); ?></button>
                </div>
              </div>

              <div class="site_login__holder__row save_me_checkbox__holder">
                <label class="save_me_checkbox">
                  <input type="checkbox" value="1" checked name="save_me">
                  <span class="checkbox"></span>
                  <span class="text"><?php _e('Запомнить меня'); ?></span>
                </label>
              </div>

            </form>
          </div>
          <!-- site_login__holder end -->
         <div class="user_form__more">
            <br>
           <a href="lostpassword/" class="site_login__lostpassword"><?php _e('Забыли пароль?'); ?></a>
           <br>
           <br>
           <a href="user/register/" class="site_login__go_register"><?php _e('Зарегистрироваться'); ?></a>
         </div>
        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap what_new">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="what_new__holder">

            <p class="what_new__title">В версии 3.0.0</p>

            <ul>
              <li>новые сервисы: Ubersuggest (NeilPatel), Spyfu и другие;</li>
              <li>автосохранение списка минус-слов в рабочей области;</li>
              <li>авторизация для хранения данных в аккаунте;</li>
              <li>списки типовых минус-слов;</li>
              <li>возможность хранить пользовательские списки минус-слова в расширении для дальнейшего применения в аккаунте;</li>
              <li>англоязычный и русскоязычный интерфейс.</li>
            </ul>
            <br>


            <p class="what_new__title">Основные комбинации</p>
            <ul>
              <li><span>LeftMouseClick</span> для добавления слова, повторное нажатие - для удаления</li>
              <li><span>LeftALT + LeftMouseClick</span> - для сбора фраз</li>
              <li><span>LeftALT + S</span> - для поиска слов</li>
            </ul>

          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap what_new_en">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="what_new__holder">

            <p class="what_new__title">In version 3.0.0</p>

            <ul>
              <li>new services: Ubersuggest (NeilPatel), Spyfu and others;</li>
              <li>autosave of a negative keywords list in the workspace;</li>
              <li>authorization for storing data in the account;</li>
              <li>generic negative keyword lists;</li>
              <li>the ability to store custom lists of negative keywords in the extension for further use in your account;</li>
              <li>English and Russian interface.</li>
            </ul>
            <br>


            <p class="what_new__title">Key combinations</p>
            <ul>
              <li><span>LeftMouseClick</span>  to add a word, press again - to delete</li>
              <li><span>LeftALT + LeftMouseClick</span> - to collect phrases</li>
              <li><span>LeftALT + S</span> - for words searching</li>
            </ul>

          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="simpleModalWindowWrap what_new_find">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="what_new__holder">

            <p class="what_new__title">В версии 2.0</p>

            <ul>
              <li>2 режима выдачи ключевых слов:</li>
              <li>быстрая выдача - аналогична выдаче Google Planner, но найденные результаты включают каждое слово из введенной в поиск фразы;</li>
              <li>полная выдача - расширенная выдача, которая включает поиск по дополнительным релевантным фразам, но найденные результаты также включают каждое слово из введенной в поиск фразы.</li>
              <li>Обновленный файл выгрузки ключевых слов Excel:</li>
              <li>выгрузка локаций в удобном формате для загрузки в Editor;</li>
              <li>обновленный шаблон для создания объявлений.</li>
              <li>Полный список локаций.</li>
              <li>Группировка отчетов по проектам.</li>
              <li>Устранена ошибка с задержкой в 30 секунд.</li>
              <li>Новые фильтры для получения релевантной выдачи.</li>
              <li>Копирование минус-слов.</li>
            </ul>
            <br>


          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap what_new_find_en">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="what_new__holder">

            <p class="what_new__title">In version 2.0:</p>

            <ul>
              <li>2 modes of keywords search result:</li>
              <li>quick search result -  is similar to  one of Google Planner , but the results found include every word of the phrase entered in the search;</li>
              <li>full search result - extended search result that includes search on additional relevant phrases, but the results found also include every word of the phrase entered in the search.</li>
              <li>Updated Exces Keyword Upload File:</li>
              <li>uploading of locations in a convenient format for uploading to Editor;</li>
              <li>updated template for creating ads.</li>
              <li>Full list of locations.</li>
              <li>Grouping of reports on the projects.</li>
              <li>Fixed an error with a delay of 30 seconds.</li>
              <li>New filters for getting relevant search results.</li>
              <li>Copying of negative keywords.</li>
            </ul>
            <br>


          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap ask_question">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          <form method="post" class="feedback_form wps_form_js">
            <input class="fn_person" name="Person Asked" type="hidden" value="">

            <input type="hidden" name="form_subject"  value="Ask question">
            <input type="hidden" name="form_title"    value="Ask question">
            <input type="hidden" name="form_redirect" value="thank-you/">

            <p class="feedback_form__title">Ask question</p>
            <div class="feedback_form__row">
              <div class="feedback_form__input_holder">
                <input type="text" name="Name" placeholder="Name" required>
              </div>
              <div class="feedback_form__input_holder">
                <input type="email" name="Email" placeholder="Business E-mail" required>
              </div>
            </div>
            <div class="feedback_form__textarea_holder">
              <textarea name="Question" placeholder="Your question..."></textarea>
            </div>
            <div class="feedback_form__submit_holder">
              <button class="feedback_form__submit section_link" type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap vacancy_popup">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="vacancy_popup_holder">
            <p class="title">Несколько шагов до работы в Penguin-team</p>
            <div class="vacancy_popup__separator"></div>
            <form class="mt-4 wps_form_js">
              <h3 class="row-title"><span class="row-title__number">1</span> Заполните форму</h3>
              <div class="row">
                    
                <div class="col-md-6 mt-3">
                  <div class="input_holder required">
                    <input type="text" placeholder="Имя" name="name" required>
                  </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="input_holder required">
                      <input type="text" placeholder="Фамилия" name="surname" required>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="input_holder required">
                      <input type="text" placeholder="E-mail" name="email" required>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="input_holder required">
                      <input type="text" placeholder="Номер телефона" name="phone" required>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                  <div class="input_holder">
                    <input type="text" name="facebook" placeholder="www.facebook.com/your account" required>
                  </div>
                </div>

                <div class="col-md-12 mt-3">
                  <h3 class="row-title"><span class="row-title__number">2</span>Прикрепите резюме</h3>
                </div>
                
                <div class="col-md-12 mt-3 mb-3">
	                <div class="file_holder">
            				<!-- <div class="file_holder_text">Выберете файл:</div> -->
	                  <input type="file" name="file" required>
	                </div>
                </div>

              </div>

              <!-- question_item -->
              <h3 class="row-title"><span class="row-title__number">3</span>Пройдите тест</h3>
              <div class="question_item mt-4">
                <div class="title"><span>1.</span>Кликов 259, показов 3 515. Чему равен CTR?</div>

                <div class="answers_holder row justify-content-between">

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_1" value="13,57%" required>
                        <span class="radio"></span>
                        <span class="text">13,57%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_1" value="4,83%" required>
                        <span class="radio"></span>
                        <span class="text">4,83%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_1" value="7,36%" required>
                        <span class="radio"></span>
                        <span class="text">7,36%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_1" value="8,39%" required>
                        <span class="radio"></span>
                        <span class="text">8,39%</span>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

              <!-- question_item -->
              <div class="question_item mt-4">
                <div class="title"><span>2.</span>Заходов на сайт 874, конверсий 16. Чему равен коэффициент конверсии?</div>

                <div class="answers_holder row justify-content-between">

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_2" value="8,23%" required>
                        <span class="radio"></span>
                        <span class="text">8,23%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_2" value="54,62%" required>
                        <span class="radio"></span>
                        <span class="text">54,62%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_2" value="2,03%" required>
                        <span class="radio"></span>
                        <span class="text">2,03%</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_2" value="1,83%" required>
                        <span class="radio"></span>
                        <span class="text">1,83%</span>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

              <!-- question_item -->
              <div class="question_item mt-4">
                <div class="title"><span>3.</span>Что такое СРА?</div>

                <div class="answers_holder row justify-content-between">

                  <div class="col-md-6">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_3" value="цена за клик" required>
                        <span class="radio"></span>
                        <span class="text">цена за клик</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_3" value="цена за просмотр" required>
                        <span class="radio"></span>
                        <span class="text">цена за просмотр</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-md-6 mt-2">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_3" value="цена за конверсию" required>
                        <span class="radio"></span>
                        <span class="text">цена за конверсию</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-md-6 mt-2">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_3" value="цена за показ объявления" required>
                        <span class="radio"></span>
                        <span class="text">цена за показ объявления</span>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

              <!-- question_item -->
              <div class="question_item mt-4">
                <div class="title"><span>4.</span>CTR 4,03%, кликов 240. Чему равно число показов объявления?</div>

                <div class="answers_holder row justify-content-between">

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_4" value="5955" required>
                        <span class="radio"></span>
                        <span class="text">5955</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_4" value="967" required>
                        <span class="radio"></span>
                        <span class="text">967</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_4" value="16021" required>
                        <span class="radio"></span>
                        <span class="text">16021</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_4" value="8912" required>
                        <span class="radio"></span>
                        <span class="text">8912</span>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

              <!-- question_item -->
              <div class="question_item mt-4">
                <div class="title"><span>5.</span>Затрат 20 158, конверсий 63. Чему равна стоимость конверсии? </div>

                <div class="answers_holder row justify-content-between">

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_5" value="320" required>
                        <span class="radio"></span>
                        <span class="text">320</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_5" value="0,003" required>
                        <span class="radio"></span>
                        <span class="text">0,003</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_5" value="1223" required>
                        <span class="radio"></span>
                        <span class="text">1223</span>
                      </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="radio_holder">
                      <label>
                        <input type="radio" name="question_5" value="442" required>
                        <span class="radio"></span>
                        <span class="text">442</span>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row mt-5">
                <div class="col-12">
                  <div class="button_holder">
                    <button type="submit" >Отправить</button>
                  </div>
                </div>
              </div>


              <!-- hidden input -->
              <input type="hidden" name="form_subject"  value="Стажировка">
              <input type="hidden" name="form_title"    value="Стажировка">
              <input type="hidden" name="form_redirect" value="vacancysuccesfull/">
              <!-- hidden input -->

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="simpleModalWindowWrap send_resume_popup">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>

          <div class="vacancy_popup_holder">
            <p class="title">Несколько шагов до работы в Penguin</p>
            <p class="subtitle">Заполните  форму</p>

						<form class="mt-4 wps_form_js">
						  <div class="row">

						    <div class="col-md-6 mt-3">
						      <div class="input_holder required">
						        <input type="text" placeholder="Имя" name="name" required>
						      </div>
						    </div>

						    <div class="col-md-6 mt-3">
						        <div class="input_holder required">
						          <input type="text" placeholder="Фамилия" name="surname" required>
						        </div>
						    </div>

						    <div class="col-md-6 mt-3">
						        <div class="input_holder required">
						          <input type="text" placeholder="E-mail" name="email" required>
						        </div>
						    </div>

						    <div class="col-md-6 mt-3">
						        <div class="input_holder required">
						          <input type="text" placeholder="Номер телефона" name="phone" required>
						        </div>
						    </div>

						    <div class="col-md-12 mt-3">
						      <div class="input_holder">
						        <input type="text" name="facebook" placeholder="www.facebook.com/your account">
						      </div>
						    </div>

						    <div class="col-md-12 mt-3">
						      <div class="file_holder">
										<div class="file_holder_text">Прикрепите резюме:</div>
						        <input type="file" name="file">
						      </div>
						    </div>

						  </div>

						  <div class="row mt-5">
						    <div class="col-12">
						      <div class="button_holder">
						        <button type="submit" >Отправить</button>
						      </div>
						    </div>
						  </div>

						  <!-- hidden input -->
						  <input type="hidden" name="form_subject"  value="Резюме">
						  <input type="hidden" name="form_title"    value="Резюме">
						  <input type="hidden" name="form_redirect" value="vacancysuccesfull/">
						  <!-- hidden input -->
						</form>

          </div>

        </div>
      </div>
    </div>
  </div>

<div class="simpleModalWindowWrap modalCrysis">
    <div class="simpleModalTable">
        <div class="simpleModalCell">
            <div class="simpleModalWindow modal_crysis_container">
                <span class="simpleModalWindowClose"></span>
                <div class="modal_crysis__title">
                    <h3>Ваш аккаунт Google Ads готов к кризису? Проверим?</h3>
                    <div class="eliminator"></div>
                </div>
                <div class="modal_crysis__content">
                  <form method="post" class="crysis_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Analysis">
                    <input type="hidden" name="form_title"    value="Get Free Analysis">
                    <input type="hidden" name="form_redirect" value="thanksup/">

                    <div class="crysis_form__input_holder">
                      <input type="text" name="Name" placeholder="Имя" required>
                    </div>
                    <div class="crysis_form__input_holder">
                      <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
                    </div>
                    <div class="crysis_form__input_holder">
                      <input type="email" name="Email" placeholder="E-mail" required>
                    </div>

                    <div class="crysis_form__submit_holder">
                      <button class="crysis_form__submit section_link get_analysis_button" type="submit">Хочу аудит!</button>
                    </div>
                  </form>

                  <div class="modal_crysis_offer">
                    <div class="modal_crysis_offer_items">
                      <div class="single_item">
                        <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_3.png">
                        <p>Бесплатный аудит</p>
                      </div>
                      <div class="single_item">
                        <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_1.png">
                        <p>Маркетинговая и техническая оценка</p>
                      </div>
                      <div class="single_item">
                        <img src="<?php echo REL_ASSETS_URI ?>img/google_facebook_ads/icons/offer_icon_2.png">
                        <p>Советы для роста и оптимизации</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="simpleModalWindowWrap getAnalysisModalBlog widget-modal-form" style="transition: none 0s ease 0s !important; top: 96px !important;">
      <div class="simpleModalTable">
          <div class="simpleModalCell">
              <div class="simpleModalWindow feedback_form_holder">
                  <span class="simpleModalWindowClose"></span>
                  <form id="widget_form_modal" method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject" value="Get Free Analysis">
                    <input type="hidden" name="form_title" value="<?php echo get_page_uri()?>">
                      <p class="feedback_form__title">Узнайте, как улучшить свой Ads с Penguin-team!</p>
                      <p class="feedback_form__text">
                          Закажите бесплатный анализ ROI и прибыльности ваших торговых кампаний в Google Shopping
                      </p>
                      <div class="feedback_form__row">
                          <div class="feedback_form__input_holder">
                              <input type="text" name="Name" placeholder="Имя" required="">
                          </div>
                          <div class="feedback_form__input_holder">
                              <input type="email" name="Email" placeholder="E-mail" required="">
                          </div>
                      </div>
                      <div class="feedback_form__row">

                          <div class="feedback_form__input_holder">
                              <input class="" type="tel" name="Phone" placeholder="Номер телефона" required="">
                          </div>
                      </div>
                     <div class="message_success_form">
                         <span>Ваш запрос отправлен</span>
                     </div>

                      <div class="feedback_form__submit_holder">
                          <button class="feedback_form__submit section_link" type="submit">Заказать аудит</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>


  <?php /*
  <div class="simpleModalWindowWrap site_register">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          <!-- site_register__holder -->
          <div class="site_register__holder">
            <form class="fn__site_register_form" >
              <div class="fn__site_register_form__errors"></div>
              <div class="site_register__holder__row">
                <p>Укажите ФИО</p>
                <div class="site_register__holder__row__input">
                  <input type="text" name="user_fio" class="fn_only_chars" required placeholder="Введите ФИО" autocomplete="off"  >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Компания</p>
                <div class="site_register__holder__row__input">
                  <input type="text" name="user_company"  placeholder="Компания" autocomplete="off" >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Укажите e-mail</p>
                <div class="site_register__holder__row__input">
                  <input type="email" name="user_email" required placeholder="Введите e-mail" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Укажите телефон</p>
                <div class="site_register__holder__row__input">
                  <input type="tel" name="user_phone" class="fn_only_numbers" placeholder="Введите телефон" autocomplete="off" >
                </div>
              </div>
              <div class="site_register__holder__row">
                <p>Введите пароль</p>
                <div class="site_register__holder__row__input">
                  <input type="password" name="user_pass" required class="site_register_form__pass" placeholder="Введите пароль" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" >
                  <span class="site_register_form__pass__view"><i class="fa fa-eye" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="site_register__holder__row">
                <div class="site_register__holder__row__input">
                  <label class="site_register_form__user_root">
                    <input type="checkbox" checked class="fn__register_form__user_root__checkbox">
                    <span class="checkbox_label"></span>
                    <span class="checkbox_text">Я принимаю условия <a href="/publichnaya-oferta/" target="_blank" >публичной оферты</a></span>
                  </label>
                </div>
              </div>
              <div class="site_register__holder__row">
                <div class="site_register__holder__row__input">
                  <button type="submit" class="btn_style_1 site_register_form__submit fn__register_form__submit_btn ga__site_register">Зарегистрироваться</button>
                </div>
              </div>
            </form>
          </div>
          <!-- site_register__holder end -->
        <div class="user_form__more">
          <br>
          <span class="site_register__allready_has_acc">Уже есть аккаунт?</span>
        </div>
        </div>
      </div>
    </div>
  </div>
  */ ?>


  <?php /*
  <div class="simpleModalWindowWrap contact_form">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          <div class="contact_form__holder">
            <form class="wps_form_js">
              <div class="contact_form__row">
                <input type="text" name="Имя" placeholder="Имя" required>
              </div>
              <div class="contact_form__row">
                <input type="tel" name="Телефон" class="fn_only_numbers" placeholder="Телефон" required>
              </div>
              <div class="contact_form__row">
                <textarea name="Вопрос" placeholder="Вопрос" ></textarea>
              </div>

              <!-- hidden input -->
              <input type="hidden" name="form_subject"  value="Обратная связь">
              <input type="hidden" name="form_title"    value="Разработка">
              <input type="hidden" name="form_redirect" value="spasibo-za-obrashhenie/">
              <!-- hidden input -->

              <div class="contact_form__row">
                <button type="submit" class="btn_style_1" >Отправить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="simpleModalWindowWrap get_beta">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          <div class="contact_form__holder">
            <form class="wps_form_js">
              <div class="contact_form__row">
                <input type="text" name="Имя" placeholder="Имя" required>
              </div>
              <div class="contact_form__row">
                <input type="tel" name="Способ связи" placeholder="Телефон или e-mail" required>
              </div>
              <div class="contact_form__row">
                <input type="tel" name="Способ связи 2" placeholder="Skype или facebook" required>
              </div>

              <!-- hidden input -->
              <input type="hidden" name="form_subject"  value="Запрос на бета версию">
              <input type="hidden" name="form_title"    value="FindKeywords">
              <input type="hidden" name="form_redirect" value="spasibo-za-obrashhenie/">
              <!-- hidden input -->

              <div class="contact_form__row">
                <button type="submit" class="btn_style_1" >Отправить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  */ ?>

  <span class="go_top_btn" id="goTop">
    <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1.64682e-08 11.8192L1.40215 13.2002L12 2.76217L22.5979 13.2002L24 11.8192L12 
      0.000195646L1.64682e-08 11.8192Z" fill="#FF9404"/>
    </svg>
  </span>

    <?php $currLang = pll_current_language(); ?>
    <?php if($currLang == 'ru' ) : ?>
        <script>
            var disqus_config = function () {
                this.language = "ru";
            };
        </script>
    <?php else :?>
        <script>
            var disqus_config = function () {
                this.language = "en";
            };
        </script>
    <?php endif; ?>

  <!-- script -->
  <?php wp_footer(); ?>
  <!-- end script -->



    <!-- Yandex.Metrika counter -->
    <script type="text/javascript"> (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter35827940 = new Ya.Metrika({
                        id: 35827940,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                n.parentNode.insertBefore(s, n);
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://d31j93rd8oukbv.cloudfront.net/metrika/watch_ua.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks"); </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/35827940" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript> <!-- /Yandex.Metrika counter -->






<!--<div class="user_survey_popup">
  <div class="user_survey_popup_head">
    <span id="user_survey_popup_close"></span>
    <img src="<?php echo REL_ASSETS_URI ?>img/about_us/personnel/Oksana.jpg">
    <div>
      <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 37 38" fill="none">
          <path d="M36.2 27.9L35.5 27C35.2 26.6 35.1 26.1 35.2 25.6C35.5 24.5 35.8 22.3 34.8 20.3C34.6 19.9 34.4 19.4 34.3 18.9C33.7 15.6 35.4 11 35.5 10.9C36.1 9.00005 36.3 8.30005 34.9 7.60005C33.3 6.90005 32 7.70005 31.2 9.20005C31.1 9.40005 29.5 12.4 29.1 16.3C26.7 13.1 21 5.40005 19.1 2.80005C18.4 1.80005 17.1 1.60005 16 2.20005C14.8 2.90005 14.6 4.40005 15.4 5.50005L14.2 3.90005C13.5 3.00005 12 2.80005 11 3.50005C10 4.20005 9.7 5.70005 10.5 6.70005C11.9 8.50005 11.6 8.10005 11.7 8.30005C10.9 7.30005 9.4 7.10005 8.4 8.00005C7.5 8.80005 7.4 10.2 8.1 11.1L10.3 14.1C9.5 13 8 12.9 6.9 13.8C6 14.6 5.9 15.9 6.6 16.9C7 17.3 17 30.8 17.5 31.5C18.6 33 20.2 34.1 21.9 34.6C23.5 35.1 24.2 36.3 24.3 36.5L24.4 36.6C25 37.5 26.3 37.6 27.1 37L35.7 30.6C36.7 30 36.8 28.8 36.2 27.9Z" fill="#FFCF5D"/>
          <path d="M28.3999 6.19995C27.4999 4.19995 26.0999 2.39995 24.4999 0.899951C24.2999 0.699951 24.2999 0.299951 24.4999 0.0999512C24.6999 -0.100049 25.0999 -0.100049 25.2999 0.0999512C26.9999 1.69995 28.4999 3.59995 29.4999 5.69995C29.5999 5.99995 29.4999 6.29995 29.1999 6.39995C28.8999 6.59995 28.4999 6.49995 28.3999 6.19995Z" fill="#EAE9E8"/>
          <path d="M25.2999 7.1C24.5999 5.9 23.7999 4.7 22.7999 3.7C22.5999 3.5 22.5999 3.1 22.7999 2.9C22.9999 2.7 23.3999 2.7 23.5999 2.9C24.6999 4 25.5999 5.2 26.2999 6.6C26.3999 6.9 26.2999 7.2 26.0999 7.4C25.7999 7.5 25.3999 7.4 25.2999 7.1Z" fill="#EAE9E8"/>
          <path d="M4.1999 24.4999C2.4999 22.8999 0.999902 20.9999 -9.76548e-05 18.8999C-0.100098 18.5999 -9.76622e-05 18.2999 0.299902 18.1999C0.599902 18.0999 0.899902 18.1999 0.999902 18.4999C1.8999 20.4999 3.2999 22.2999 4.8999 23.7999C5.0999 23.9999 5.0999 24.3999 4.8999 24.5999C4.7999 24.6999 4.3999 24.6999 4.1999 24.4999Z" fill="#EAE9E8"/>
          <path d="M5.89988 21.6999C4.79988 20.5999 3.89987 19.3999 3.19988 17.9999C3.09988 17.6999 3.19988 17.3999 3.39988 17.1999C3.69988 17.0999 3.99987 17.1999 4.19987 17.3999C4.89987 18.6999 5.69987 19.7999 6.69987 20.7999C6.89987 20.9999 6.89987 21.3999 6.69987 21.5999C6.49987 21.8999 6.09988 21.8999 5.89988 21.6999Z" fill="#EAE9E8"/>
          <path d="M10.6 6.79991C11.4 7.89991 18.1 16.8999 17.9 16.5999C18.3 17.0999 19 17.1999 19.4 16.7999C19.8 16.3999 19.9 15.7999 19.6 15.3999L13.7 7.39991L12.5 5.89991C11.9 5.09991 11.9 3.99991 12.5 3.19991C10.6 2.99991 9.19996 4.99991 10.6 6.79991Z" fill="#FCC353"/>
          <path d="M14.5998 19.9C14.9998 20.4 15.7998 20.5 16.1998 20C16.5998 19.6 16.5998 19.1 16.2998 18.7C15.4998 17.7 10.5998 11 9.99978 10.2C9.39978 9.40002 9.39978 8.20002 9.99978 7.40002C8.09978 7.30002 6.89978 9.50002 8.09978 11.1C10.9998 15.1 11.4998 15.8 14.5998 19.9Z" fill="#FCC353"/>
          <path d="M26.3999 35.7L26.2999 35.6C26.0999 35.4 25.4999 34.1 23.8999 33.7C22.1999 33.2 20.5999 32.2 19.4999 30.6C18.8999 29.8 8.99988 16.4 8.59988 15.9C7.99988 15.1 7.99988 13.9 8.59988 13.1C6.69988 13 5.49988 15.2 6.69988 16.8C6.99988 17.3 16.9999 30.8 17.4999 31.5C18.5999 33 20.1999 34.1 21.8999 34.6C23.4999 35.1 24.1999 36.3 24.2999 36.5L24.3999 36.6C24.9999 37.5 26.2999 37.6 27.0999 37L27.7999 36.5C27.2999 36.5 26.7999 36.2 26.3999 35.7Z" fill="#FCC353"/>
          <path d="M17.2998 4.7C16.6998 3.9 16.6998 2.8 17.2998 2C16.8998 2 16.4998 2.1 16.0998 2.2C15.8998 2.3 15.6998 2.4 15.5998 2.6C14.7998 3.4 14.6998 4.6 15.2998 5.5L15.3998 5.6L21.9998 14.5C22.3998 15 23.0998 15.1 23.5998 14.6C23.9998 14.2 24.0998 13.5 23.6998 13L17.2998 4.7Z" fill="#FCC353"/>
          <path d="M31.1999 9.29989C31.0999 9.39989 30.4999 10.5999 29.8999 12.4999C29.5999 13.5999 29.1999 14.9999 29.0999 16.3999C29.6999 17.1999 30.9999 16.7999 31.0999 15.7999V15.4999C31.4999 11.5999 33.0999 8.59989 33.1999 8.39989C33.3999 7.99989 33.5999 7.69989 33.8999 7.49989C32.7999 7.39989 31.7999 8.19989 31.1999 9.29989Z" fill="#FCC353"/>
        </svg>
      </h3>
      <p>Бабич Оксана </br>редактор и автор </p>
    </div>
  </div>
  <div class="user_survey_popup_content">
    <p class="user_survey_popup_content_question">О чем вы хотите читать больше всего?</p>
    <form id="user_survey_form">
      <div class="user_survey_popup_content_checkbox_continer">
        <p>
          <input type="radio" id="user_survey_option1" name="user_survey" value="PPC">
          <label for="user_survey_option1">PPC</label>
        </p>
        <p>
          <input type="radio" id="user_survey_option2" name="user_survey" value="Маркетинг">
          <label for="user_survey_option2">Маркетинг</label>
        </p>
        <p>
          <input type="radio" id="user_survey_option3" name="user_survey" value="Как делать бизнес">
          <label for="user_survey_option3">Как делать бизнес</label>
        </p>
        <p>
          <input type="radio" id="user_survey_option4" name="user_survey" value="Аналитика">
          <label for="user_survey_option4">Аналитика</label>
        </p>
        <div class="custom_option" id="user_survey_custom_option">
          <p class="custom_option_container">
            <input type="radio" id="user_survey_option5" name="user_survey" value="Мой вариант">
            <label for="user_survey_option5">Мой вариант:</label>
          </p>
          <input id="custom_option_text_input" type="text" maxlength="512" disabled>
        </div>
      </div>
      <div class="user_survey_invalid_message">
          <p>Выберите один из вариантов</p>
      </div>
      <button type="submit">Ответить</button>
    </form>
  </div>

  <div class="user_survey_popup_thanks" style="display: none">
    <h3>Спасибо!</h3>
    <p>Познакомиться с нами<br>можно тут
      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 26 39" fill="none">
        <path d="M0 23C0 24.1 0.900002 25.1 2.1 25.1C3.2 25.1 4.2 24.2 4.2 23V23.9C4.2 25 5.1 26 6.3 26C7.4 26 8.4 25.1 8.4 23.9V24.7C8.4 25.8 9.3 26.8 10.5 26.8C11.6 26.8 12.6 25.9 12.6 24.7V36.7C12.6 37.9 13.6 38.8 14.8 38.8C15.9 38.7 16.7 37.8 16.7 36.7C16.7 34.1 16.7 24.5 16.7 20.8C19.1 23.4 21.9 24.7 22.1 24.8C23.5 25.4 24.9 25.3 25.7 23.9C26.4 22.6 25.8 22.2 24.4 21.2C24.3 21.1 20.9 18.9 19.4 16.3C18.7 15 19.1 14.5 18.1 12.9C17.2 11.3 15.9 10.6 15.7 10.4V1.89995C15.7 0.899952 14.9 0.199951 14 0.199951H4.3C3.3 0.199951 2.5 0.99995 2.5 1.99995C2.5 2.19995 2.5 9.79995 2.5 9.39995C2.5 10.2 2.2 11 1.7 11.7C0.800001 12.9 0.300001 14.4 0.200001 15.9C7.59959e-07 15.9 0 15.5 0 23Z" fill="#FFCF5D"/>
        <path d="M2.0001 23C2.0001 15.4 2.0001 15.9 2.0001 15.7C2.1001 14.1 2.6001 12.7 3.5001 11.5C4.0001 10.8 4.30009 10.1 4.30009 9.2C4.30009 8.8 4.30009 2 4.30009 1.8C4.30009 0.800001 5.1001 0 6.1001 0H4.2001C3.2001 0 2.4001 0.800001 2.4001 1.8C2.4001 2 2.4001 8.8 2.4001 9.2C2.4001 10 2.1001 10.8 1.6001 11.5C0.700098 12.7 0.200098 14.2 0.100098 15.7C0.100098 15.9 0.100098 15.4 0.100098 23C0.100098 24.6 1.8001 25.5 3.1001 24.8C2.4001 24.5 2.0001 23.8 2.0001 23Z" fill="#FCC353"/>
        <path d="M14.3999 36.7001C14.3999 36.6 14.3999 21.2 14.3999 21.8C14.3999 21.2 13.8999 20.8 13.3999 20.8C12.7999 20.8 12.3999 21.3 12.3999 21.8V23.7V36.7001C12.3999 37.8001 13.1999 38.7 14.1999 38.8H14.2999H14.3999H14.4999H14.5999C14.5999 38.8 14.5999 38.8 14.6999 38.8C14.6999 38.8 14.6999 38.8 14.7999 38.8C14.9999 38.8 15.1999 38.7 15.3999 38.6C14.7999 38.2 14.3999 37.5 14.3999 36.7001Z" fill="#FCC353"/>
        <path d="M11.3003 26.6C10.7003 26.2 10.3003 25.6 10.3003 24.8V21.8C10.3003 21.2 9.80029 20.8 9.30029 20.8C8.80029 20.8 8.30029 21.2 8.30029 21.8V24.1C8.30029 24 8.30029 24 8.30029 23.9V24.7C8.30029 26.3 9.90029 27.3 11.3003 26.6Z" fill="#FCC353"/>
        <path d="M6.2002 24.1V21.7C6.2002 21.2 5.8002 20.7 5.2002 20.7C4.6002 20.7 4.2002 21.2 4.2002 21.7V23V22.9V23.9C4.2002 25 5.10019 26 6.30019 26C6.30019 26 6.8002 26 7.2002 25.8C6.6002 25.4 6.2002 24.8 6.2002 24.1Z" fill="#FCC353"/>
      </svg>
    </p>
    <a href="https://www.facebook.com/pengstud.dp/" target="_blank" rel="noopener">
      <img src="<?php echo ABS_ASSETS_URI; ?>/img/baners/facebook_logo.png" alt="facebook">
    </a>
  </div>-->

  <script type="text/javascript">
      $(function(){

        $('#user_survey_popup_close').click(function() {
          $('.user_survey_popup').css('display', 'none');
        })

        $('#user_survey_form').change(function(){
          if($('#user_survey_option5')[0].checked){
            $('#custom_option_text_input').prop('disabled', false);
            $('#custom_option_text_input').focus();
          } else {
            $('#custom_option_text_input').prop('disabled', true);
            $('#custom_option_text_input').val('');
          };
        })

        $('#user_survey_custom_option').click(function(){
          $('#user_survey_option5')[0].checked = true;
          $('#custom_option_text_input').prop('disabled', false);
          $('#custom_option_text_input').focus();
        })

        $('#user_survey_form').submit(function(event){
            var $user_answer = '';

            if($('#user_survey_option5')[0].checked) {
              $user_answer = $('#custom_option_text_input').val();
            } else {
              $('input[name="user_survey"]').each(function() {
                if($(this)[0].checked) {
                  $user_answer = $(this).val();
                }
              });
            }
            console.log($user_answer);

            // Если данные есть, то отправляем
            if($user_answer) {
              $.ajax({
                url:"/wp-admin/admin-ajax.php",
                type:'POST',
                data:'action=users_poll_action&text=' + $user_answer,

                 success:function(results)
                  {
                    $(".user_survey_popup_content").css('display', 'none');
                    $(".user_survey_popup_thanks").css('display', 'flex');
                    localStorage.setItem('user_survey_popup', 'open');
                  }
              });
            } else {
              $(".user_survey_invalid_message").css('display', 'block')
              setTimeout(() => {
                $(".user_survey_invalid_message").css('display', 'none')
              }, 5000)
            }

          return false;
        });

      });
    </script>
</div>

<div style="display: none" class="banner-new-year">
  <p class="banner-new-year__text"></p>
  <h2 class="banner-new-year__title"></h2>
  <button class="banner-new-year__button">
    Получить
  </button>
</div>


  </body>
</html>
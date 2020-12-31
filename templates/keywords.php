<?php
/*
Template Name: Утилита кейвордс
Template Post Type: page
*/
$isUserLoggedIn = User::isUserLoggedIn();

get_header();
?>

<?php
/* Проверка доступа к странице */

$user_root = User::getUserRootID($_SESSION['user_id']);
$user_data = User::getUserData($_SESSION['user_id']);
$user_access = User::checkАccessUser($user_root, array('999', '998', '1', '2_1', '2_6', '2_12', '3_1', '3_6', '3_12', '4_1', '4_6', '4_12'));

$USER_ID = $_SESSION['user_id'];
$PROJECT_ID = intval(trim(strip_tags($_GET['id'])));

$post_data = array(
    'post_title' => wp_strip_all_tags(rand()),
    'post_status' => 'publish',
    'post_type' => 'project'
);
$project_data = User::getProject($PROJECT_ID);

/*$_SESSION['project_id'] = wp_insert_post($post_data);
update_post_meta($_SESSION['project_id'],'keywords_table',json_encode($_SESSION['keywords_results']['res']));*/
//file_put_contents("user_result_".$_SESSION['user_id']."_json.json",json_encode($_SESSION['keywords_results']['res']),LOCK_EX);


if (false === $isUserLoggedIn): ?>

    <section class="no_roots">
        <div class="wrapper_m">
            <h1>У вас недостаточно прав для доступа к этому сервису.</h1>
            <a href="/user/register/" class="fkw__actions__btn_orange">Регистрация</a>
        </div>
    </section>

<?php elseif (false === $user_access): ?>

    <section class="no_roots">
        <div class="wrapper_m">
            <h1>У вас недостаточно прав для доступа к этому сервису.</h1>
            <a href="/user/subscribe/" class="fkw__actions__btn_orange">Выбрать тариф</a>
        </div>
    </section>

<?php elseif (false === $project_data): ?>

    <section class="no_roots">
        <div class="wrapper_m">
            <h1>Ошибка! Проект не существует.</h1>
            <a href="/user/" class="fkw__actions__btn_orange">Личный кабинет</a>
        </div>
    </section>

<?php else: ?>

    <!--<section class="no_roots">
        <div class="wrapper_m">
            <h1 style="color: red"> с 10.00 до 18.00 на сервисе ведутся технически работы. Возможны сбои.</h1>
        </div>
    </section>-->

    <?php
    /* Получение языков для выборки */
    $langs = json_decode(file_get_contents(CHILD_DIR . '/lib/google/config/languages.json'));

    /* Получение валюты для выборки */
    $currencies = json_decode(file_get_contents(CHILD_DIR . '/lib/google/config/currency.json'));
    /* Если запрос уже был, достаем заново города, что бы отобразить пользователю его запрос */

    if (isset($PROJECT_ID) && !empty($PROJECT_ID)) {
        $filter['new_exc'] = null;
        if (isset($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['re_excluded'])) {
            $filter['new_exc'] = $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['re_excluded'];
        }

        $project_data = User::getProject($PROJECT_ID, $filter);
        $groups_data = User::getGroups($PROJECT_ID);
        if (is_user_logged_in()) {
            //print_r($groups_data);
        }

        if (isset($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['country_criteria'])) {
            $country_regions = GetGeo($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['country_criteria']);
        }

        $cnt_res = 0;
        if ($project_data['res']) {
            foreach ($project_data['res'] as $temp_item) {
                if ($temp_item->visible) {
                    $cnt_res += 1;
                }
            }
        }
    }
    /* Получение всех стран */
    global $wpdb;
    $countries = $wpdb->get_results("SELECT id, criteria_id, yandex_id,name FROM wp_criteries WHERE target_type = 'Country' ORDER BY name ASC ");
    ?>


    <?php if (isset($PROJECT_ID)): ?>

        <section class="fkw__actions">
            <div class="wrapper_m">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fkw__actions__header">
                            <h1 class="fkw__actions__title">FindKeywords tool</h1>
                            <h2 class="fkw__actions__subtitle">Инструмент поиска ключевых слов для контекстной
                                рекламы</h2>
                        </div>
                    </div>
                    <div class="col-md-12 fkw__actions__coll">
                        <a class="user_project_list_btn" href="/user/?tab=findkeywordstool">перейти к списку проектов</a>
                    </div>
                </div>

                <!--
                <div class="auth_page__login_user__projects_content__message">
                    <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Для избежания ошибок, одновременно работайте в одном проекте в одной вкладке.</p>
                </div>
            -->

                <form class="fn_project_table" method="post" name="project_data">

                    <!-- fkw__actions__holder -->
                    <div class="fkw__actions__holder">


                        <!-- fkw__actions__row -->
                        <div class="fkw__actions__row">
                            <div class="row fkw__actions__row_title__holder">
                                <p class="col-12 fkw__actions__row_title">Название проекта:</p>
                            </div>
                            <div class="row fkw__actions__row__content">
                                <div class="col-md-6 fkw__actions__coll">
                                    <input class="fkw__project_title fn_project_title" readonly autocomplete="off"
                                           name="project_title"
                                           value="<?php echo $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['title'] ?>"
                                           placeholder="Название проекта" data-old="<?php echo $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['title'] ?>">
                                    <span class="title_edit fn_title_edit">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <span class="title_save fn_title_save">
                                        <i class="fa fa-floppy-o"></i>
                                    </span>
                                    <span class="title_cancel fn_title_cancel">
                                        <i class="fa fa-remove"></i>
                                    </span>
                                </div>

                                <div class="col-md-6 fkw__actions__coll text-right">
                                    <button class="fn_create_new_project create_new_project" type="button" >Создать новый проект с текущими настройками</button>
                                </div>
                                <!--<div class="col-md-3 fkw__actions__coll">
                            <?php /*if ( $user_data->limit != 0 ) :*/ ?>
                                <button type="submit" name="save_project" class="fkw__actions__project_btn" value="1">Сохранить проект</button>
                            <?php /*endif; */ ?>
                        </div>-->
                            </div>
                        </div>


                        <!-- fkw__actions__row -->
                        <div class="fkw__actions__row">

                            <div class="row fkw__actions__row_title__holder">
                                <p class="col-12 fkw__actions__row_title">Параметры подбора:</p>
                            </div>

                            <div class="row fkw__actions__row__content">

                                <div class="col-md-3 fkw__actions__coll">
                                    <p class="coll__title">Язык*</p>
                                    <div class="fkw__select__wrap">
                                        <select name="target_lang" class="fn_target_lang  fn_select" required>
                                            <option disabled selected>Укажите язык выборки</option>
                                            <?php foreach ($langs as $lang) : ?>
                                                <option value="<?php echo $lang->CriteriaId ?>" <?php if ($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['target_lang'] == $lang->CriteriaId) {
                                                    echo 'selected';
                                                } ?> ><?php echo $lang->LanguageName ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="fn_target_lang_error fn_display_error fkw__actions__error">Укажите язык
                                        выборки
                                    </div>
                                </div>
                                <div class="col-md-3 fkw__actions__coll">
                                    <p class="coll__title">Валюта*</p>
                                    <div class="fkw__select__wrap">
                                        <select name="CurrencyCode" class="fn_currency  fn_select">
                                            <option value="0" disabled selected>Укажите валюту</option>
                                            <?php foreach ($currencies as $currency) : ?>
                                                <option value="<?php echo $currency->CurrencyCode ?>" <?php if ($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['currency'] == $currency->CurrencyCode) {
                                                    echo 'selected';
                                                } ?>><?php echo $currency->CurrencyCode, " ($currency->CurrencyName)" ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="fn_currency_error fn_display_error fkw__actions__error">Укажите валюту
                                        выборки
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- fkw__actions__row -->
                        <div class="fkw__actions__row">
                            <div class="row fkw__actions__row_title__holder">
                                <p class="col-12 fkw__actions__row_title">Укажите геотаргетинг:</p>
                            </div>
                            <div class="row fkw__actions__row__content">
                                <div class="col-md-3 fkw__actions__coll">
                                    <p class="coll__title">Страна*</p>
                                    <div class="fkw__select__wrap">
                                        <select name="criteria_country" class="fn_country_criteria   fn_select">
                                            <option value="0" disabled selected>Укажите страну</option>
                                            <?php foreach ($countries as $country) : ?>
                                                <option value="<?php echo $country->criteria_id ?>" <?php if ($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['country_criteria'] == $country->criteria_id) {
                                                    echo 'selected';
                                                } ?>
                                                        data-yandex_id="<?php echo $country->yandex_id ?>"><?php echo $country->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="fn_country_criteria_error fn_display_error fkw__actions__error">Укажите
                                        страну выборки
                                    </div>
                                </div>

                                <div class="col-md-3 fkw__actions__coll">
                                    <p class="coll__title">Города</p>

                                    <div class="criteria_country__button fn__criteria_country__button"
                                         id="fn__criteria_country__btn">
                                        <span class="choose">Выберите города <i class="fa fa-long-arrow-right"
                                                                                aria-hidden="true"></i></span>
                                        <span class="close">Закрыть <i class="fa fa-times"
                                                                       aria-hidden="true"></i></span>
                                    </div>

                                    <div class="criteria_country__holder fn__criteria_country__holder"
                                         id="fn__criteria_country__holder"> <!--class="fkw__select__wrap"-->
                                        <p class="description">Для данного региона выбор городов недоступен.</p>
                                        <select id="fn_multijs" name="criteria_country" class="fn_geo_criteria"
                                                multiple>
                                            <?php if (!empty($country_regions) && is_array($country_regions)) : ?>
                                                <?php foreach ($country_regions as $country_region) : ?>
                                                    <option value="<?php echo $country_region->criteria_id ?>"
                                                            data-yandex_id="<?php echo $country_region->yandex_id ?>" <?php if (isset($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['geo_criteria']) && is_array($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['geo_criteria']) && in_array($country_region->criteria_id, $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['geo_criteria'])) {
                                                        echo 'selected';
                                                    } ?>><?php echo $country_region->canonical_name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="fkw__actions__row">
                            <div class="row fkw__actions__row_title__holder">
                                <p class="col-12 fkw__actions__row_title">Поисковая система:</p>
                            </div>

                            <div class="fkw__actions__row__content row">
                                <div class="col-md-2 col-sm-12 fkw__actions__coll">
                                    <input id="google_1" class="fn_search_system radio_item" type="radio"
                                           name="search_system" value="1" disabled >
                                    <label for="google_1" class="fwk__system_search_item">
                                        Только Google
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-12 fkw__actions__coll">
                                    <input id="yandex_2" class="fn_search_system radio_item" type="radio"
                                           name="search_system" checked value="2">
                                    <label for="yandex_2" class="fwk__system_search_item">
                                        Только Yandex
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-12 fkw__actions__coll">
                                    <input id="all_3" class="fn_search_system radio_item" type="radio"
                                           name="search_system" value="3" disabled >
                                    <label for="all_3" class="fwk__system_search_item">
                                        Обе системы
                                    </label>
                                </div>
                            </div>
                        </div>

	                	<div class="message_warn">
	                   		<p>Уважаемые пользователи!</p>
	                   		<p>На данный момент получение данных из Google не возможно в связи с переходом на новую версию Google Adwords API.</p>
	                   		<p>В ближайшем времени станет доступна новая версия FindKeywords Tool с расширенным функционалом и актуальной версией Google Adwords API.</p>
	                   	</div>


                        <div class="row">
                            <div class="col-md-6 fkw__actions__row">
                                <div class="fkw__actions__row_title__holder">
                                    <p class="fkw__actions__row_title">Ключевые слова*</p>
                                    <p class="fkw__actions__row_subtitle">Каждое словосочетание с новой строки (до
                                        20)</p>
                                </div>
                                <div class="fkw__actions__row__content">
                                    <div class="fkw__textarea__wrap fkw__textarea__user_keywords">
                                        <textarea name="user_keywords" class="fn_user_keywords"
                                                  data-max="20"><?php echo $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['keywords'] ?></textarea>
                                        <span class="fn_keywords_count fkw_textarea_count"></span>
                                        <div class="fkw__textarea__user_keywords__footer">
                                            <div class="strong_search__holder fn_search_hidden" style="display: none">
                                                <label>
                                                    <div class="text">
                                                        <p>Строгий поиск</p>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="fn_strong_search"
                                                               name="strong_search" value="1" checked>
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    </div>
                                                </label>
                                                <div class="more_info">
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                    <div class="more_info__holder">
                                                        <p>Отключение данной функции добавляет околотематические
                                                            запросы</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fn_user_keywords_error fn_display_error fkw__actions__error">Введите
                                        ключевые слова
                                    </div>
                                </div>


                                <br>
                                <br>
                                <button class="load_more_js fkw__actions__btn_orange">Искать <i class="fa fa-search"
                                                                                                aria-hidden="true"></i>
                                </button>
                                <p style="display: inline-block; vertical-align: middle; margin-left: 15px; font-size: 18px;">
                                    Результат поиска: <span class="fn_count_data"><?php echo $cnt_res ?></span></p>

                                <div class="fn_api_errors fkw_api_errors">
                                    <!--GOOGLE ERRORS-->
                                    <div class="fn_google_errors" style="display: none"></div>
                                    <div class="fn_1" style="display: none">
                                        Превышен лимит обращений к сервису Google. Повторите запрос через <span
                                                class="fn_error_timer">30</span> секунд
                                    </div>
                                    <div class="fn_2" style="display: none">
                                        В ключевых словах встречаются дубли. Удалите пожалуйста
                                    </div>
                                    <div class="fn_3" style="display: none">
                                        Слишком много ключевых слов, введите меньше
                                    </div>
                                    <div class="fn_4" style="display: none">
                                        Повторите запрос!
                                    </div>
                                    <div class="fn_666" style="display: none">
                                        Произошла ошибка сервиса, повторите ваш запрос через 30 секунд.
                                    </div>

                                    <!--YANDEX ERRORS-->
                                    <div class="fn_yandex_errors" style="display: none"></div>
                                </div>
                            </div>
                            <div class="col-md-6 fkw__actions__row">
                                <div class="fkw__actions__row_title__holder">
                                    <p class="fkw__actions__row_title">Минус слова</p>
                                    <p class="fkw__actions__row_subtitle">Каждое словосочетание с новой строки</p>
                                </div>
                                <div class="fkw__actions__row__content">
                                    <div class="fkw__textarea__wrap">
                                        <?php
                                        $fn_user_excluded = "";
                                        if (isset($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['re_excluded'])) {
                                            $fn_user_excluded = $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['re_excluded'];
                                        } else {
                                            $fn_user_excluded = $_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['excluded'];
                                        }
                                        ?>
                                        <textarea name="excluded"
                                                  class="fn_user_excluded"><?php echo $fn_user_excluded ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="fkw__actions__clear_local_list__holder">
                                    <button class="fn_resort fkw__actions__clear_local_list__btn fkw__actions__btn_blue">
                                        Отминусовать <i class="fa fa-filter" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <!--<div class="col-md-4 fkw__actions__row">
                        <div class="fkw__actions__row_title__holder">
                            <p class="fkw__actions__row_title">Введите слова-включения:</p>
                            <p class="fkw__actions__row_subtitle">Каждое словосочетание отдельно</p>
                        </div>
                        <div class="fkw__actions__row__content">
                            <div class="fkw__textarea__wrap">
                                <textarea name="included" class="fn_user_included form-control"><?php /*echo $_SESSION['included']*/ ?></textarea>
                            </div>
                        </div>
                    </div>-->
                        </div>

                        <div class="row fkw__actions__row">

                            <div class="col-md-6">
                                <div class="fkw__actions__row_title__holder">
                                    <p class="fkw__actions__row_subtitle">Мои группы:</p>
                                </div>

                                <div class="fkw__actions__row__content">
                                    <div class="fkw__actions__coll">
                                        <div class="fkw__actions__add_new_group">
                                            <div class="fkw__actions__add_new_group__button__holder">
                                                <span class="fkw__actions__add_new_group__button fkw__actions__btn_blue fn__actions__add_new_group__button"
                                                      data-project_id="<?php echo $PROJECT_ID ?>">Добавить</span>
                                            </div>
                                            <div class="fkw__actions__add_new_group__input__holder">
                                                <input class="fkw__actions__add_new_group__input fn__actions__add_new_group__input"
                                                       placeholder="Название группы" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fkw__actions__row__content">
                                    <div class="fkw__actions__coll">
                                        <?php if (is_array($groups_data)) : ?>

                                            <div class="fkw__actions__sort_group__btn_all_holder">
                                                <span class="fn__user_groups__list__all fkw__actions__sort_group__btn_all fkw__actions__btn_blue">Все</span>
                                            </div>

                                            <div class="fkw__select__wrap fkw__actions__sort_group__list_group">
                                                <div class="fkw__actions__sort_group__list_group__name_edit__holder fn__user_groups__edit_name_holder">
                                                    <input type="text" class="fn__user_groups__edit_name">
                                                </div>

                                                <!--<select name="user_groups" class="fn_select fn__user_groups__list">
                                                    <option value="0" disabled selected>Выберите группу</option>
                                                    <option value="all">Без группы</option>
                                                    <?php /*foreach ($groups_data['groups'] as $group) : */?>
                                                        <option value="<?php /*echo $group->id */?>"><?php /*echo $group->title */?></option>
                                                    <?php /*endforeach; */?>
                                                </select>-->
                                                <select name="user_groups" class="fn_select fn_user_group_change">
                                                    <option value="0" disabled selected>Выберите группу</option>
                                                    <option value="all">Без группы</option>
                                                    <?php foreach ($groups_data['groups'] as $group) : ?>
                                                        <option value="<?php echo $group->id ?>"><?php echo $group->title ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="fkw__actions__sort_group__actions_holder">
                                                <span class="sort_group__edit_btn fn__user_groups__edit_btn fkw__actions__btn_blue"><i
                                                            class="fa fa-pencil" style="margin-left: 0;"
                                                            aria-hidden="true"></i></span>
                                                <span class="sort_group__save_btn fn__user_groups__save_btn fkw__actions__btn_blue"><i
                                                            class="fa fa-check-circle-o" style="margin-left: 0;"
                                                            aria-hidden="true"></i></span>
                                                <span class="sort_group__remove_btn fn__user_groups__remove_btn fkw__actions__btn_blue"><i
                                                            class="fa fa-trash-o" style="margin-left: 0;"
                                                            aria-hidden="true"></i></span>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fkw__actions__row_title__holder">
                                    <p class="fkw__actions__row_subtitle">Выгрузка проекта в файл:</p>
                                </div>
                                <div class="fkw__actions__row__content">
                                    <div class="fkw__actions__coll">
                                        <div class="fkw__actions__download_words__holder">
                                            <span class="fkw__actions__download_words__btn fkw__actions__btn_blue"
                                                  data-simple_modal="load_file">Скачать <i class="fa fa-download"
                                                                                           aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>

            </div>
        </section>

    <?php endif; ?>


    <section class="fkw__result">
        <div class="wrapper_m">
            <div class="fkw__result__table_holder">
                <div class="fn_result_table">
                    <?php
                    if (isset($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['keywords_results']) && !empty($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['keywords_results']) && !$_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['project_id']) {
                        extract($_SESSION['user_' . $USER_ID]['project_' . $PROJECT_ID]['keywords_results']);
                        trailingslashit(require_once(trailingslashit(CHILD_DIR) . 'parts/keywords_table.php'));
                    } elseif (!empty($project_data)) {
                        extract($project_data);
                        trailingslashit(require_once(trailingslashit(CHILD_DIR) . 'parts/keywords_table.php'));
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- fkw__result__add_group__overlay -->
    <div class="fkw__result__add_group__overlay"></div>
    <div class="fkw__result__add_group__holder">
        <p class="fkw__result__add_group__title">Добавить в группу:</p>
        <div class="fkw__result__add_group__select">

            <select class="fn_user_groups fn_select">
                <option value="0" disabled selected>Укажите группу</option>
                <option value="all">Без группы</option>
                <?php foreach ($groups_data['groups'] as $group) : ?>
                    <option value="<?php echo $group->id ?>"><?php echo $group->title ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <p class="fkw__result__add_group__title">Создать новую группу:</p>
        <div class="fkw__result__add_group__input_holder">
            <input class="fn_group_name" value="" data-keyword_id="" data-new_word=""
                   data-project_id="<?php echo $PROJECT_ID ?>" style="border: 1px solid">
            <span class="fn_action_group add_group_btn"><i class="fa fa-plus" aria-hidden="true"></i></span>
        </div>
    </div>


    <!-- modals -->
    <div class="simpleModalWindowWrap fkw_chart_modal">
        <div class="simpleModalTable">
            <div class="simpleModalCell">
                <div class="simpleModalWindow">
                    <span class="simpleModalWindowClose"></span>
                    <div id="chart_container"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="simpleModalWindowWrap load_file">
        <div class="simpleModalTable">
            <div class="simpleModalCell">
                <div class="simpleModalWindow">
                    <span class="simpleModalWindowClose"></span>

                    <!-- fkw__actions__row -->
                    <div class="load_file__holder">
                        <p class="load_file__title">Скачать проект:</p>

                        <div class="load_file__content">

                            <input type="radio" class="fn_tab_export tab_export_input" name="type_export" id="google"
                                   value="google" checked="checked"/>
                            <label for="google" class="tab_header">Google</label>

                            <input type="radio" class="fn_tab_export tab_export_input" name="type_export" id="yandex"
                                   value="yandex"/>
                            <label for="yandex" class="tab_header">Yandex</label>


                            <div class="load_file__tab_content google">
                                <h3 class="load_file__tab_title">Укажите модификаторы соответствия (если нужно)
                                    Google</h3>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_native">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">Слова в широком соответствии</p>
                                    </label>
                                </div>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_wide">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">Модификатор широкого соответствия</p>
                                    </label>
                                </div>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_phrase">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">Фразовое соответствие</p>
                                    </label>
                                </div>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_exactly">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">Точное соответствие</p>
                                    </label>
                                </div>
                            </div>


                            <div class="load_file__tab_content yandex">
                                <h3 class="load_file__tab_title">Укажите модификаторы соответствия (если нужно)
                                    Yandex</h3>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_none_params">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">Без операторов</p>
                                    </label>
                                </div>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_phrase">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">оператор ""</p>
                                    </label>
                                </div>

                                <div class="load_file__tab_content__row">
                                    <label>
                                        <input type="checkbox" class="fn_export_params load_file__checkbox"
                                               name="export_params" value="groups_exactly">
                                        <span class="load_file__checkbox_label"><i class="fa fa-check"
                                                                                   aria-hidden="true"></i></span>
                                        <p class="load_file__checkbox_text">оператор []</p>
                                    </label>
                                </div>
                            </div>

                            <div class="load_file__content__row">
                                <div class="load_file__content__count">
                                    <p>Количество объявлений в группе </p>
                                    <input type="number" class="fn_export_repeat" max="10" value="1" placeholder="1">
                                </div>
                            </div>

                            <div class="load_file__content__row">
                                <button type="button" class="fn_ajax_export fkw__actions__btn_blue">Сгенерировать файл
                                </button>
                                <div>
                                    <a class="fn_export_link fkw__actions__btn_blue" style="color: #fff;display: none;"
                                       href=""></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


<?php endif; ?>


    <div class="fkw__preloader fn_preloader">
        <div class="fkw__preloader__text" id="edited_text">
            <p>Уже работаем, надо немного подождать...</p>
            <?php
            $html = '';
            for ($i = 1; $i < 100; $i++) {
                $html .= "<p> $i Миссисипи...</p>";
            }
            echo $html;
            ?>
        </div>
    </div>

<?php get_footer(); ?>
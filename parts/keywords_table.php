<?php 
$user_root = User::getUserRootID($_SESSION['user_id']);


if(is_array($res) && !empty($res) && !is_null($res)) :?>
    <?php
    $USER_ID = $_SESSION['user_id'];
    $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));
    $input_keywords = explode("\n",$_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords']);
    foreach ($input_keywords as $id => $kw_search) {
        if (empty($kw_search)) {
            unset($input_keywords[$id]);
        }
    }
?>



    <!-- start fkw__result_table -->
    <div id="fkw__result_table" >

    <div class="row">
        <div class="col-md-12">
            <div class="row fkw__result__table_holder__header">
                <div class="col-md-6 px-0">
                    <div class="fkw__result__table_holder__header__search">
                        <input class="search" placeholder="Поиск:" />
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="fkw__result__table_holder__header__count">
                        <p>Результат: <span class="fn_count_data"><?php echo $cnt_res; ?></span></p>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table class="fkw__result__table">
                <thead>
                    <!--<th class="fkw__result__table__col_num sort" data-sort="sort_num">№ <i class="fa fa-arrow-down" aria-hidden="true"></i></th>-->
                    <th class="fkw__result__table__col_words sort" data-sort="sort_words" >Ключевое слово<i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th class="fkw__result__table__col_volume sort" data-sort="sort_volume" >Search volume <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th class="fkw__result__table__col_cpc sort" data-sort="sort_cpc" >Av. CPC <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th class="fkw__result__table__col_competitions sort" data-sort="sort_competitions">competitions <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th class="fkw__result__table__col_sourse">Source</th>
                    <th class="fkw__result__table__col_actions">
                        <div class="fkw__result__table__col_actions__checkbox_holder">
                            <label>
                                <input type="checkbox" class="word_item__checkbox fn_select_box" value="">
                                <span></span>
                            </label>
                        </div>
                        <div class="fkw__result__table__col_actions__add_holder">
                        </div>
                    </th>
                </thead>
                <tbody class="list">
                <?php
                $i = 1;
                foreach ($res as $keyword) :
                    $class_hide = "";
                    if ( $i > 50 ) $class_hide = "hide"; // remove
                  /*  if ( $i === 21 && $user_root[0] === '1') break; */
                    ?>
                    <?php if($keyword->visible) :?>
                    <?php
                    $class = 'penguin_all';
                    if(isset($groups_data['groups_keywords'][$keyword->keyword])) {
                        $class = 'penguin_'.$groups_data['groups_keywords'][$keyword->keyword];
                    }
                    ?>
                    <tr class="fkw__result__table__row fn_row <?php echo $class; ?> <?php echo $class_hide; ?>" data-keyword_id ="<?php echo isset($keyword->id) ? $keyword->id : ''?>" >
                        <!--<td class="fkw__result__table__col_num sort_num"><?php /*echo $i++ */?></td>-->

                        <td class="fkw__result__table__col_words <?php if(in_array($keyword->keyword,$input_keywords)): echo "fkw__result__table__include_keyword"; endif; ?>" data-origin_text="<?php echo $keyword->keyword; ?>"  >
                            <?php  echo "<span>".str_replace(" ", "</span> <span>", $keyword->keyword)."</span>"; ?>
                            <div style="display: none" class="sort_words" ><?php echo $keyword->keyword ?></div>
                        </td>

                        <td class="fkw__result__table__col_volume" >
                            <span class="sort_volume"><?php echo $keyword->search_volume ?></span>
                            <?php if( isset($keyword->year_stats_stock['x']) && is_array($keyword->year_stats_stock['x'])) :?>
                                <div class="fkw__result__table__col_volume__btn fn_chart_parent">
                                <span class="fkw__result__table__col_volume__btn__link fn_chart_render" data-word="<?php echo $keyword->keyword ?>" >
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                    <input type="hidden" name="" disabled class="fn_chart_x" value="<?php echo implode(';',$keyword->year_stats_stock['x'])?>">
                                    <input type="hidden" name="" disabled class="fn_chart_y" value="<?php echo implode(';',$keyword->year_stats_stock['y'])?>">
                                </div>
                            <?php endif; ?>
                        </td>


                        <?php
                        /* CPC */
                        $result_cpc = "";
                        $sort_cpc = 0;
                        if ($keyword->source == "google"){
                            $result_cpc = $keyword->average_CPC;
                            $sort_cpc   = $keyword->average_CPC;
                        } else {
                            $result_cpc = "&mdash;";
                        }
                        ?>
                        <td class="fkw__result__table__col_cpc" >
                            <div style="display: none" class="sort_cpc"><?php echo $sort_cpc; ?></div>
                            <?php echo $result_cpc; ?>
                        </td>

                        <td class="fkw__result__table__col_competitions">
                            <?php
                            /* competitions */
                            $sort_competitions = 0;
                            if ($keyword->source == "google") {
                                $sort_competitions = $keyword->competition;
                                if ( $keyword->competition >= 0 && $keyword->competition <= 0.5 ){
                                    echo '<span class="low"></span> низкая ('.$keyword->competition.')';
                                } else if ( $keyword->competition > 0.5 && $keyword->competition <= 0.7 ){
                                    echo '<span class="middle"></span> средняя ('.$keyword->competition.')';
                                } else {
                                    echo '<span class="high"></span> высокая ('.$keyword->competition.')';
                                }
                            } else {
                                echo '&mdash;';
                            }
                            ?>
                            <div style="display: none" class="sort_competitions"><?php echo $sort_competitions; ?></div>
                        </td>

                        <td class="fkw__result__table__col_sourse">
                            <span class="icon-<?php echo $keyword->source ?>"></span>
                        </td>

                        <td class="fkw__result__table__col_actions">
                            <div class="fkw__result__table__col_actions__checkbox_holder">
                                <label>
                                    <input type="checkbox" class="fn_word_item__checkbox word_item__checkbox" value="<?php echo $keyword->id?>" data-keyword="<?php echo $keyword->keyword ?>">
                                    <span></span>
                                </label>
                            </div>
                            <div class="fkw__result__table__col_actions__remove_holder">
                                <button class="fn_word_action remove_item" type="button" data-action="delete" data-word_id="<?php echo $keyword->id?>" data-word="<?php echo $keyword->keyword?>" >
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="fkw__result__table__col_actions__add_holder">
                            </div>
                        </td>

                    </tr>
                <?php endif; ?>

                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
   <!-- <?php /*if ($user_root[0] === '1'): */?>
        <div class="fkw__result__table__more_res">
            <p>Показаны первые результаты (до 20). <br>Чтобы посмотреть больше воспользуйтесь <a href="/subscribe/" target="_blank">платной версией</a>.</p>
        </div>
    --><?php /*endif; */?>


    <?php else: ?>

        <div class="no_results_text">По вашему запросу результатов не найдено</div>

    <?php endif; ?>

</div>

    <!-- end fkw__result_table -->
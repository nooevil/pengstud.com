
    var preloaderInterval;

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function hide_preloader(){
        $(".fn_preloader").hide();
        $("html, body").removeClass('no-scroll');
        clearInterval(preloaderInterval);
    }

    function show_preloader(){
        $(".fn_preloader").show();
        $("html, body").addClass('no-scroll');
        edited_text();
    }

    function edited_text(){
        var block  = $("#edited_text");
        var elem   = block.find("p");
        var length = elem.length;
        elem.removeClass("active").eq(0).addClass("active");
        var current = 1;
        preloaderInterval = setInterval(
            function(){
                if ( current == length+1 ) current = 0;
                elem.removeClass("active");
                elem.eq(current).addClass("active");
                current++;
            }, 4000
        );
    }

    app = {};

    /*
     * Глобальные настройки уведомлений. Положение, время, прогресс и т.д
     * */
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };



    app.sendRequest = function (user_data, count) {
        //user_data.count = count;
        var result_elem = $(".fn_result_table");
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: user_data,
            beforeSend: function(){
                show_preloader();
                $(".fn_count_data").text();
            },
            success: function (data) {
                if (data.success) {
                    result_elem.html(data.data);
                } else {
                    if(data.error_code == 100) {
                        toastr.warning('Лимит операций исчерпан.');
                    }
                }
                if (typeof data.google != "undefined") {
                    load_more_btn__disable_on();
                    console.log("30 sek");
                    /* отображаем блок ошибок */
                    //$(".fn_google_errors").show();
                    //$(".fn_google_errors").html(data.google.error_message);
                    /* отображаем системное сообщение */
                    $(".fn_" + data.google.error_code).show();
                    /* отображаем понятную ошибку */
                    /* запускаем таймер на 30 секунд */
                    startTimer(30, $(".fn_error_timer") );
                    //$(".fn_google_errors").hide();
                }
                if (typeof data.yandex != "undefined") {
                    load_more_btn__disable_on();
                    //$(".fn_yandex_errors").show();
                    //$(".fn_yandex_errors").html(data.yandex.error_message);
                    $(".fn_" + data.yandex.error_code).show();
                    startTimer(30, $(".fn_error_timer") );
                }
                if(data.count_results == 0) {
                    toastr.warning('Упс... Результатов не найдено');
                } else {
                    toastr.success('Успешный запрос!');
                }
                $(".fn_count_data").html(data.count_results);
                sortMethods.go_sort();
                hide_preloader();
            },
            error: function (data) {
                console.log('request error', data);
                result_elem.html(data.data);
                toastr.error('Error');
                hide_preloader();
            }
        });
    };

    app.GetGeo = function (user_data) {
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: user_data, 
            beforeSend: function(){
                show_preloader();
                //$(".multi-wrapper").remove();
            },
            success: function (data) {
                if (data.success) {
                    $.each(data.data, function (key, value) {
                        $(".fn_geo_criteria").append('<option value=' + '"' + value.criteria_id + '"' + ' data-yandex_id=' + value.yandex_id + '>' + value.canonical_name + '</option>');
                    });
                    toastr.success('Success');
                } else {
                    console.log(data);
                }
                $("#fn_multijs").multi({
                    'enable_search': true,
                    'search_placeholder': 'Поиск...',
                    'non_selected_header': 'Города',
                    'selected_header': 'Выбранные города'
                });
                hide_preloader();

                //$('#fn_multijs').addClass('test');
            },
            error: function (data) {
                toastr.error('Error');
                console.log('error');
                console.log(data);
                hide_preloader();
            }
        });


        //$(".search-input").val(' ').trigger('keyup');
        //$(".fn_geo_criteria").select2();
    };



    app.exportKey = function (export_data) {
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: export_data,
            beforeSend: function () {
                $(".fn_ajax_export").hide();
            },
            success: function (data) {
                if(data.success) {
                    toastr.success('Success');
                    if(data.link) {
                        $(".fn_export_link").show();
                        $(".fn_export_link").attr('href',data.link);
                        $(".fn_export_link").text('Скачать файл');
                        //$(".fn_export_link").trigger("click");

                    }
                } else {
                    toastr.error('Error');
                }
            },
            error: function (data) {
                console.log('error');
                console.log(data);
                toastr.error('Error');
                hide_preloader();
            }
        });
    };

    /* удаление слова */
    app.removeKey = function (remove_data) {
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: remove_data,
            success: function (data) {
                if(data.success) {
                    toastr.success('Слово исключено из списка');
                } else {
                    toastr.error('Произошла ошибка');
                }
                hide_preloader();
            },
            error: function (data) {
                toastr.error('Error');
                hide_preloader();
            }
        });
    };


    /* доп фильтрация списка по новым ключевым словам */
    app.resortList = function (resort_data) {
        var result_elem = $(".fn_result_table");
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: resort_data,
            beforeSend: function(){
                show_preloader();
            },
            success: function (data) {
                if(data.success) {
                    groupMethods.reset_group_list();
                    result_elem.html(data.data);
                    $(".fn_count_data").html(data.count_results);
                    toastr.success('Успешно отсортировано');
                } else {
                    toastr.error('Ошибка при отсортировке');
                }
                sortMethods.go_sort();
                hide_preloader();
            },
            error: function (data) {
                //console.log(data);
                toastr.error('Error');
                hide_preloader();
            }
        });
    };


    /* пересортировка списка */
    $(document).on("click",".fn_resort",function () {
        // validate
        var word_obj = wordAPI.get_list_from_textarea(".fn_user_excluded");
        wordAPI.set_list_on_textarea(".fn_user_excluded", word_obj);
        // resort
        var excluded = $(".fn_user_excluded").val();
        var project_title = $(".project_title").val();
        resort_data = {};
        resort_data.action = 'reSort';
        resort_data.excluded = excluded;
        resort_data.project_title = project_title;
        app.resortList(resort_data);
        return false;
    });


    /* видимость кнопки при заполнении поля с ключевыми словами */
    $(".fn_user_keywords").bind("change keyup", function () {
        var words = $(this).val().match(/\S+/g);
        if (words != null) {
            if (words.length) {
                $(".fn_user_keywords_error").hide();
                load_more_btn__disable_off();
            }
        } else {
            $(".fn_user_keywords_error").show();
            load_more_btn__disable_on();
        }
    });

    function load_more_btn__disable_on(){
        $(".load_more_js").prop('disabled', true);
    }

    function load_more_btn__disable_off(){
        $(".load_more_js").prop('disabled', false);
    }


    $(document).on("click", ".load_more_js", function () {
        // validate negative keywords
        var word_obj_excluded = wordAPI.get_list_from_textarea(".fn_user_excluded");
        wordAPI.set_list_on_textarea(".fn_user_excluded", word_obj_excluded);
        // validate keywords
        var word_obj_keywords = wordAPI.get_list_from_textarea(".fn_user_keywords");
        wordAPI.set_list_on_textarea(".fn_user_keywords", word_obj_keywords);
        // validate duplicates in excluded
        var clear__excluded = wordAPI.remove_duplicates(word_obj_excluded, word_obj_keywords);
        wordAPI.set_list_on_textarea(".fn_user_excluded", clear__excluded);
        // errors
        $(".fn_display_error").hide(); 
        $(".fn_result_table").html('');
        $(".fn_api_errors div").hide();
        var error_triger = false;

        if ($(".fn_country_criteria").val() == null) {
            $(".fn_country_criteria_error").show();
            error_triger = true;
        }
        if ($(".fn_target_lang").val() == null) {
            $(".fn_target_lang_error").show();
            error_triger = true;
        }
        if ($(".fn_currency").val() == null && !$(".fn_currency").is(':disabled')) {
            $(".fn_currency_error").show();
            error_triger = true;
        }

        if (error_triger) {
            $("html, body").animate({
                scrollTop: 0
            }, "fast");
            return false;
        }

        var strong_search = $(".fn_strong_search").prop('checked');
        var project_title = $(".fn_project_title").val();
        var keywords = $(".fn_user_keywords").val();
        var country_criteria = $(".fn_country_criteria").val();
        var target_lang = $(".fn_target_lang").val();
        var excluded = $(".fn_user_excluded").val();
        var included = $(".fn_user_included").val();
        var currency = $(".fn_currency").val();
        var geo_criteria = $(".fn_geo_criteria").val();
        var selected_options = $(".fn_geo_criteria").find('option:selected');
        var yandex_geo = new Array();
        var system_search = $(".fn_search_system:checked").val();

        if(strong_search) {
            included = keywords;
        }
        $.each(selected_options, function () {
            if ($(this).data('yandex_id') !== undefined && $(this).data('yandex_id') != 0) {
                yandex_geo.push(parseInt($(this).data('yandex_id')));
            }
        });
        if (yandex_geo.length === 0) {
            yandex_geo.push($(".fn_country_criteria").find('option:selected').data('yandex_id'));
        }

        var data = {
            'action': 'loadmore',
            'keywords': keywords,
            'country_criteria': country_criteria,
            'geo_criteria': geo_criteria,
            'yandex_geo': yandex_geo,
            'target_lang': target_lang,
            'excluded': excluded,
            'included': included,
            'currency': currency,
            'project_title': project_title,
            'strong_search': strong_search,
            'system_search': system_search
        };

        app.sendRequest(data);
        return false;
    });


    /*получение пунктов страны (области, города, штаты)*/
    $(document).on("change", '.fn_country_criteria', function () {
        $(".fn_geo_criteria").find('option').remove();
        if($(".multi-wrapper").length) {
            $(".multi-wrapper").remove();
            $("#fn_multijs").removeAttr('data-multijs');
        }
        var criteria_id = $(this).val();
        if(criteria_id == '2804' || criteria_id == '2643' || criteria_id == '2826' || criteria_id == '2840') {
            var data = {
                'action': 'GetGeo',
                'criteria_id': criteria_id
            };
            app.GetGeo(data);

        }
    });


    /* активация всех select2 */
    $(document).ready(function () {
        $(".fn_select").select2();

        if($("#fn_multijs").length) {
            $("#fn_multijs").multi({
                'enable_search': true,
                'search_placeholder': 'Поиск...',
                'non_selected_header': 'Города',
                'selected_header': 'Выбранные города'
            });
        }
    });


    /* таймер */
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var timerFunc = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            //display.textContent = minutes + ":" + seconds;
            display.html(minutes + ":" + seconds);
            if (--timer < 0) {
                clearInterval(timerFunc);
                load_more_btn__disable_off();
                $(".fn_4").show();
            }
        }, 1000);
        return true;
    }


    /* скрытие строки и добавление фразы в список минус слов */
    $(document).on("click", ".fn_word_action", function (e) {
        var elem = $(this);
        var parent = elem.closest('.fn_row');
        var action = elem.data('action');
        var _word  = elem.data('word');

        switch (action) {
            case 'add' :
                groupMethods.window_groups_show_window(e);
                $(".fn_group_name").data('keyword_id', parent.data('keyword_id'));
                $(".fn_group_name").data('word', _word);
            break;
            case 'delete' :
                parent.remove();
                var data_key = {};
                data_key.keyword_id = $(this).data('word_id');
                var type = $('.fn_user_group_change').val();
                var entity = '';
                if (type > 0) {
                    entity = 'group';
                } else {
                    entity = 'search';
                }

                data_key.type = entity
                data_key.action = 'removeKey';
                app.removeKey(data_key);
                // add word
               // wordAPI.add_word_to_textarea(".fn_user_excluded", _word);
                //toastr.success("'"+_word+"' добавлено в список минус-слов.");
            break;
        }
        return false;
    });


    /* экспорт в файл */
    $(document).on('click',".fn_ajax_export", function() {
        $(".fn_export_link").text('');
        $(".fn_export_link").attr('href','');

        //var export_type = $(".fn_type_export:checked").val();
        var export_params = [];
        var export_repeat = $(".fn_export_repeat").val();
        var export_type = $(".fn_tab_export:checked").val();

        $(".fn_export_params:checked").each(function(){
            export_params.push($(this).val());
        });
        var data = {};
        data.action = 'keywordExport';
        //data.export_type = export_type;
        data.export_params = export_params;
        data.export_repeat = export_repeat;
        data.export_type = export_type;

        app.exportKey(data);
    });

    $(".fn_export_link").on('click',function () {
        $(this).hide();
        $(".fn_ajax_export").show();
    });


    /* chart */
    $(document).on("click",".fn_chart_render",function () {
        var elem = $(this);
        var x_data_raw = elem.closest(".fn_chart_parent").find(".fn_chart_x").val();
        var y_data_raw = elem.closest(".fn_chart_parent").find(".fn_chart_y").val();
        var keyword = elem.data("word");

        var x_data = x_data_raw.split(';');
        //var y_data = y_data_raw.split(';');
        var y_data = y_data_raw.split(';').map(function(item) {
            return parseInt(item);
        });
        chart_data = {};
        chart_data.x = x_data;
        chart_data.y = y_data;
        chart_data.keyword = keyword;

        renderChart(chart_data);

        simpleModal.modalOpen( "fkw_chart_modal" );
    });

    function renderChart(data) {
        Highcharts.chart('chart_container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Статистика за год'
            },
            subtitle: {
                text: 'источник: google.com'
            },
            xAxis: {
                categories: data.x,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Кол-во запросов'
                }
            },
            tooltip: {
                headerFormat: '<div style="font-size:12px;color:#fff;text-align: center">{point.key}</div><table>',
                pointFormat: '<div style="color:#fff;padding:0;text-align: center">{series.name}: {point.y}</div>',

                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: data.keyword,
                data: data.y
            }]
        });
    }


    /* group methods */
    var groupMethods = {
        window_groups_overlay: ".fkw__result__add_group__overlay",
        window_groups: ".fkw__result__add_group__holder",
        table_row: ".fkw__result__table__row",
        main_list: ".fn_user_group_change",
        main_list_group: ".fn__user_groups__list",
        hiden_list: ".fn_user_groups",
        edit_btn: ".fn__user_groups__edit_btn",
        edit_name_holder: ".fn__user_groups__edit_name_holder",
        edit_name: ".fn__user_groups__edit_name",
        save_btn: ".fn__user_groups__save_btn",
        remove_btn: ".fn__user_groups__remove_btn",
        group_all_btn: ".fn__user_groups__list__all",
        new_group_input: ".fn_group_name",
        word_item__checkbox: ".fn_word_item__checkbox",
        add_new_group__button: '.fn__actions__add_new_group__button',

        reset_group_list: function(){
            this.edit_mode_off();
            $(this.main_list).val('0').trigger('change.select2');
            $(this.table_row).removeClass("hide");
            $(this.edit_btn).removeClass("active");
            loadMethods.show_first_100();
        },

        set_group: function( _this ){
            var group_id = _this.val();
            $(this.table_row).addClass("hide");
            $(".penguin_"+group_id).removeClass("hide");
            $(this.remove_btn).removeClass("active");
            $(this.save_btn).removeClass("active");
            $(this.edit_btn).addClass("active");
        },

        edit_mode_on: function(){
            $(this.save_btn).addClass("active");
            $(this.edit_name_holder).addClass("active");
            $(this.remove_btn).addClass("active");
            $(this.edit_btn).removeClass("active");
            $(this.edit_name).val( $(this.main_list).find(":selected").text() ).focus();
        },

        edit_mode_off: function(){
            $(this.save_btn).removeClass("active");
            $(this.remove_btn).removeClass("active");
            $(this.edit_name_holder).removeClass("active");
            $(this.edit_btn).addClass("active");
            $(this.edit_name).val("");
        },

        remove_group: function( ){
            var remove_data = {};
            remove_data.action = 'removeGroup';
            remove_data.group_id = $(this.main_list).find(":selected").val();
            if(confirm('Вы уверены что хотите удалить группу?')) {
                this.remove_group_from_bd(remove_data);
            }
        },

        remove_group_from_bd: function (remove_data) {
            $.ajax({
                url: theme_ajax.url+'?id='+getParameterByName('id'),
                type: 'POST',
                dataType: "json",
                data: remove_data,
                success: function (data) {
                    if(data.success) {
                        groupMethods.reset_group_list();
                        // other
                        $(groupMethods.hiden_list).find('option[value='+remove_data.group_id+']').remove();
                        $(groupMethods.main_list).find('option[value='+remove_data.group_id+']').remove();
                        $(groupMethods.main_list).find('option[value='+remove_data.group_id+']').remove();

                        toastr.success('Группа успешно удалена');
                    } else {
                        toastr.error('Ошибка при удалении группы');
                    }
                },
                error: function (data) {
                    toastr.error('Error group');
                    hide_preloader();
                }
            });
        },

        editGroup: function (group_data) {
            $.ajax({
                url: theme_ajax.url+'?id='+getParameterByName('id'),
                type: 'POST',
                dataType: "json",
                data: group_data,
                success: function (data) {
                    if (data.success) {
                        /*Убираем предыдущий класс при смене группы*/
                        for (key of group_data.keywords_ids) {
                            $(".fn_row[data-keyword_id="+ key +"]").attr('class',
                                function(i, c){
                                    return c.replace(/penguin_([a-z0-9]+)?/gi, '');
                                });
                            /*добвляем класс новой группы*/
                            $(".fn_row[data-keyword_id="+ key +"]").addClass("hide penguin_"+data.group_id);
                        }
                        $(".fn_word_item__checkbox").prop('checked',false);


                        toastr.success('Слово перенесено в другую группу.');

                        if(data.new) {
                            var newOption = new Option(group_data.title, data.group_id, false, false);
                            $(groupMethods.main_list).append(newOption);

                            var newOption = new Option(group_data.title, data.group_id, false, false);
                            $(groupMethods.hiden_list).append(newOption);
                            toastr.success('Новая группа успешно создана: '+group_data.title);
                        }
                    } else {
                        console.log(data);
                        toastr.error('Ошибка! Группа не создана');
                    }
                    hide_preloader();
                },
                error: function (data) {
                    console.log('error');
                    console.log(data);
                    toastr.error('Error');
                    hide_preloader();
                }
            });
        },

        pre_edit_group: function(_this){
            var data = {};
            data.action     = 'addGroup';
            data.project_id = $(this.new_group_input).data('project_id');
            if ( $(this.new_group_input).val() != ""){
                data.title = $(this.new_group_input).val();
            }
            data.keywords   = $(this.new_group_input).data('word');
            data.keyword_id = $(this.new_group_input).data('keyword_id');
            data.group_id   = _this.val() ? _this.val() : 0;

            if($(".fn_word_item__checkbox").length) {
                var keywords_ids = new Array();
                var keywords = new Array();
                $('.fn_word_item__checkbox:checked').each(function(){
                    keywords_ids.push($(this).val());
                    keywords.push($(this).data('keyword'));
                });
                data.keywords_ids = keywords_ids;
                data.keywords = keywords;
                //console.log(keywords_ids)
            }

            groupMethods.editGroup(data);
            // close window
            groupMethods.window_groups_hide_window();
            groupMethods.add_group_btn_remove();
        },

        changeGroup: function (change_data) {
            $.ajax({
                url: theme_ajax.url+'?id='+getParameterByName('id'),
                type: 'POST',
                dataType: "json",
                data: change_data,
                success: function (data) {
                    if(data.success) {
                        console.log(change_data);
                        $(groupMethods.hiden_list).find('option[value='+change_data.group_id+']').text(change_data.new_name);
                        $(groupMethods.hiden_list).select2();
                        $(groupMethods.main_list).find('option[value='+change_data.group_id+']').text(change_data.new_name);
                        $(groupMethods.main_list).select2();
                        groupMethods.edit_mode_off();
                        toastr.success('Изменения группы успешно сохранены.');
                    } else {
                        toastr.error('Ошибка изменения группы');
                    }
                },
                error: function (data) {
                    console.log('error');
                    console.log(data);
                    toastr.error('Error');
                    hide_preloader();
                }
            });
        },

        pre_change_group: function(){
            var new_name = $(this.edit_name).val();
            var cur_name = $(this.main_list).find(":selected").text();
            var group_id = $(this.main_list).find(":selected").val();
            if ( new_name == "" ){
                toastr.error('Введите имя группы!');
            } else if ( new_name == cur_name ){
                this.edit_mode_off();
            } else {
                var data = {};
                data.action = "changeGroup";
                data.new_name = new_name;
                data.group_id = group_id;
                groupMethods.changeGroup(data);
            }
        },

        window_groups_hide_window: function (){
            $(this.window_groups_overlay).hide();
            $(this.window_groups).hide();
            $("html, body").removeClass('no-scroll');
            $(".fn_group_name").val("");
            $(this.window_groups).removeClass("bottom").removeClass("top");
        }, 

        window_groups_show_window: function (e){
            $(this.window_groups_overlay).show();
            $("html, body").addClass('no-scroll');

            var offset_bottom =  $(window).height() - e.clientY;
            if (offset_bottom < 220){
                $(this.window_groups).addClass("bottom");
                $(this.window_groups).css({
                    "top": e.clientY - 240,
                    "left": e.clientX - 260, 
                    "display": "block"
                });
            } else {
                $(this.window_groups).addClass("top");
                $(this.window_groups).css({
                    "top": e.clientY,
                    "left": e.clientX - 260, 
                    "display": "block"
                });
            }
            $(this.hiden_list).val('0').trigger('change.select2');
        },

        word_item__checkbox__update: function(_this, e){
            var checked_length = $('.fn_word_item__checkbox:checked').length;
            this.add_group_btn_remove();
            if (checked_length > 0){
                var html = '<span class="fn_word_action fkw__result__table_edit_group_btn" type="button" data-action="add" >добавить ('+checked_length+')</span>';
                var this_item = _this.closest(".fkw__result__table__col_actions");
                this_item.find(".fkw__result__table__col_actions__add_holder").append(html);
            }
        },

        add_group_btn_remove: function(){
            $(".fkw__result__table_edit_group_btn").remove();
        },

        add_new_group: function(_this){
            var input = $(".fn__actions__add_new_group__input");
            var text = input.val();
            var data = {};
            data.action     = 'addGroup';
            data.project_id = _this.attr('data-project_id');
            data.title      = input.val();
            data.keywords   = [];
            data.keyword_id = [];
            data.keywords_ids = [];
            data.group_id   = 0;
            groupMethods.editGroup(data);
            input.val('');
        }

    }

    // когда выбрали просмотр всех групп
    $(document).on("click", groupMethods.group_all_btn, function(){
        groupMethods.reset_group_list();
    });
    // когда выбрали группу
    $(document).on("change", groupMethods.main_list, function(){
        groupMethods.set_group($(this));
    });
    // когда нажали редактировать
    $(document).on("click", groupMethods.edit_btn, function(){
        groupMethods.edit_mode_on();
    });
    // когда нажали удалить группу
    $(document).on("click", groupMethods.remove_btn, function () {
        groupMethods.remove_group();
    });
    // когда выбрали группу в окне работы с группой слова
    $(document).on("change", groupMethods.hiden_list, function () {
        groupMethods.pre_edit_group($(this));
    });
    // когда добавили группу в окне работы с группой слова
    $(document).on("click", ".fn_action_group", function () {
        groupMethods.pre_edit_group($(this));
    });
    // когда нажали сохранить в редактировании группы
    $(document).on("click", groupMethods.save_btn, function () {
        groupMethods.pre_change_group();
    });
    // когда нажимаем по области за пределами окна редактирования групп
    $(document).on("click", groupMethods.window_groups_overlay, function () {
        groupMethods.window_groups_hide_window();
    });
    // когда нажимаем по области за пределами окна редактирования групп
    $(document).on("click", groupMethods.word_item__checkbox, function (e) {
        groupMethods.word_item__checkbox__update($(this), e);
    });
    // когда нажимаем по области за пределами окна редактирования групп
    $(document).on("click", groupMethods.add_new_group__button, function (e) {
        groupMethods.add_new_group($(this));
    });



    

    /* sort methods */
    var sortMethods = {
        table_row: ".fkw__result__table__row",

        go_sort: function(){
            if ( $("#fkw__result_table").length ){
                var options = {
                    valueNames: ['sort_num', 'sort_words', 'sort_volume', 'sort_cpc', 'sort_competitions'] 
                };
                new List('fkw__result_table', options);  
                console.log("go sort");
            }
        },
    }

    $(document).ready(function () {
        sortMethods.go_sort();
    });

    $("body").on("click", ".sort", function(){
        loadMethods.show_first_100();
    });



    /* load more */
    var loadMethods = {
        table_row: ".fn_row",

        show_first_100: function(){
            // запускать только если выбран фильтр "все"
            var status = $(groupMethods.main_list).val();
            if ( status === null || status === undefined ){
                $(this.table_row).addClass("hide");
                $(this.table_row).first().removeClass("hide").nextAll().slice(0,100).removeClass("hide");
            }
        },

        load_more_rows: function(){
            // запускать только если выбран фильтр "все"
            //console.log( $(groupMethods.main_list).val() );
            var status = $(groupMethods.main_list).val();
            if ( status === null || status === undefined ){
                if( $(document).scrollTop() > ($(document).height() - 2500)){
                    $(".fn_row:not(.hide)").last().nextAll().slice(0,75).removeClass("hide");
                    // console.log("load more rows");
                }
            }
        }
    }

    $(window).scroll(function(){
        loadMethods.load_more_rows();
    });




    /* word methods */
    var wordAPI = {

        tmp_phrase: {},
        altIsPressed: false,
        phrase_add: "phrase_add",
        phrase_added: "phrase_is_added",

        add_word: function(words_obj, word){
            words_obj[word] = 1;
            return words_obj;
        },

        pre_add_word: function(_this){  
            if (this.altIsPressed){
                this.tpm_phrase(_this);
            } else {
                if ( $(_this).hasClass("added") ){
                    var word = $(_this).text();
                    wordAPI.remove_word_from_textarea(".fn_user_excluded", word);
                    wordAPI.demark_all_words(word);
                    toastr.success("Слово '"+word+"' удалено из списка минус-слов.");
                } else {
                    var word = $(_this).text();
                    wordAPI.add_word_to_textarea(".fn_user_excluded", word);
                    wordAPI.mark_all_words(word);
                    toastr.success("Слово '"+word+"' добавлено в список минус-слов.");
                }
            }
        },

        remove_word: function(words_obj, word){
            delete words_obj[word];
            return words_obj;
        },

        mark_all_words_from_textarea: function(class_textarea){
            var words_obj = this.get_list_from_textarea(class_textarea);
            for(var word in words_obj){
                this.mark_all_words(word);
            }
        },

        mark_all_words: function(word){
            $(".fkw__result__table__col_words span").each(function(){
                if ( word === $(this).text() ){
                    $(this).addClass("added");
                }
            });
        },

        demark_all_words: function(word){
            $(".fkw__result__table__col_words span").each(function(){
                if ( word === $(this).text() ){
                    $(this).removeClass("added");
                }
            });
        },

        add_word_to_textarea: function(class_textarea, word){
            var words_obj     = this.get_list_from_textarea(class_textarea);
            var new_words_obj = this.add_word(words_obj, word);
            this.set_list_on_textarea(class_textarea, new_words_obj);
        },

        remove_word_from_textarea: function(class_textarea, word){
            var words_obj     = this.get_list_from_textarea(class_textarea);
            var new_words_obj = this.remove_word(words_obj, word);
            this.set_list_on_textarea(class_textarea, new_words_obj);
        },

        remove_duplicates: function(word_obj_excluded, word_obj_keywords){
            var tmp = word_obj_excluded;
            for( var i in word_obj_keywords ){
                if ( tmp[i] != undefined){
                    delete tmp[i];
                }
            }
            return tmp;
        },

        get_list_from_textarea: function(class_textarea){
            var result = {};
            var wordsObj = $(class_textarea).val().split("\n");
            for( var i in wordsObj ){
                if (wordsObj[i].trim() != ""){
                    result[wordsObj[i].trim()] = 1;
                }
            }
            return result;
        },

        set_list_on_textarea: function(class_textarea, words_obj){
            var wordsList = "";
            var first = true;
            for(var word in words_obj){
                if (first){
                    wordsList += word;
                    first = false;
                } else {
                    wordsList += "\n" + word;
                }
            }
            $(class_textarea).val(wordsList);
        },

        get_textarea_rows_count: function(class_textarea){
            var words_obj = this.get_list_from_textarea(class_textarea);
            return Object.keys(words_obj).length;
        },

        get_tmp_phrase: function(){
            if (Object.keys(this.tmp_phrase).length > 1) {
                var phraseStr = "";
                var first = true;
                for (var word in this.tmp_phrase) {
                    if (first) {
                        phraseStr += word;
                        first = false;
                    } else {
                        phraseStr += " " + word;
                    }
                }
                return phraseStr;
            } else {
                return "";
            }
        },


        clear_tmp_phrase: function(){
            $("."+this.phrase_add).removeClass(this.phrase_add);
            this.tmp_phrase = {};
        }, 

        add_phrase_to_textarea: function(phrase){
            wordAPI.add_word_to_textarea(".fn_user_excluded", phrase);
            toastr.success(phrase+"' добавлено в список минус-слов.");
        },

        tpm_phrase: function(_this) {
            var word = $(_this).text().trim();
            if (_this.hasClass(this.phrase_add)) {
                this.remove_word_from_tpm_phrase(_this, word);
            } else {
                this.add_word_to_tpm_phrase(_this, word);
            }
        },


        add_word_to_tpm_phrase: function(_this, word) {
            if (word != "") {
                var this_index = $(_this).index();
                if (Object.keys(this.tmp_phrase).length === 0) {
                    $(_this).addClass(this.phrase_add);
                    this.tmp_phrase[word] = 1;
                    this.parent = $(_this).parent();
                    this.cur_index = this_index;
                } else if (this.parent.has(_this).length && this_index === this.cur_index + 1) {
                    $(_this).addClass(this.phrase_add);
                    this.tmp_phrase[word] = 1;
                    this.cur_index = this_index;
                }
            }
        },

        remove_word_from_tpm_phrase: function(_this, word) {
            var this_index = $(_this).index();
            if ( this_index === this.cur_index){
                $(_this).removeClass(this.phrase_add);
                delete this.tmp_phrase[word];
                this.cur_index = this_index-1;
            }
        },

        markPhrase: function(mark_phrase) {
            // bad magic
            $(".fkw__result__table__col_words").filter(function() {
                var _this = $(this);
                var text = _this.attr("data-origin_text");
                if (text){
                    var index_phrase = text.indexOf(mark_phrase);
                    if (index_phrase !== -1) {
                        var strSplit = mark_phrase.split(' ');
                        var phrase_length = strSplit.length;
                        var word_index = 0;
                        var word_eq    = 0;
                        // search word
                        _this.find("span").each(function(){
                            if (index_phrase === word_index){
                                word_eq = $(this).index();
                                return false;
                            } else {
                                word_index += $(this).text().length + 1;
                            }
                        });

                        //console.log( text, index_phrase, phrase_length, word_index, word_eq );

                        // mark phrase
                        for (var i = 1; i <= phrase_length; i++) {
                            _this.find("span").eq(word_eq).addClass("phrase_is_added");
                            word_eq++;
                        }
                    }
                }
            });
        },


    }

    $(document).keydown(function(event){
        var event = handle(event);
        if ( event.keyCode == 18 && event.which == 18 ){
            wordAPI.altIsPressed = true;
        }
    });
    
    $(document).keyup(function(event){
        var event = handle(event);
        if ( event.keyCode == 18 && event.which == 18 ){
            wordAPI.altIsPressed = false;
            var phrase = wordAPI.get_tmp_phrase();
            if (phrase != "") {
                wordAPI.markPhrase(phrase);
                wordAPI.add_phrase_to_textarea(phrase);
            }
            wordAPI.clear_tmp_phrase();
        }
    });

    $(document).on("click",".fkw__result__table__col_words span", function () {
        wordAPI.pre_add_word( $(this) );
    });

    $(document).ready(function () {
        wordAPI.mark_all_words_from_textarea(".fn_user_excluded");
    });

    function handle(e) {
        return {
            type: e.type,
            keyCode: e.keyCode,
            which: e.which
        }
    }

    function check_keywords(element) {
        var result_cnt = $(".fn_keywords_count");
        var text = element.val();
        var lines = text.split("\n");
        var limit = element.data('max');
        //var currentLine = element.value.substr(0, element.selectionStart).split("\n").length;
        //result_cnt.text(lines.length);
        var percent = lines.length*5;
        //console.log(percent);
        result_cnt.css({
            width: percent+'%'
        })
        //console.log(lines.length);
        //console.log(currentLine);
        if (lines.length >= element.data('max')) {
            return false;
        } else {
            return true;
        }
    }

    $('.fn_user_keywords').bind('blur keypress keyup',function(){
        if(!check_keywords($(this))) {
            return false;
        }
    });


    $(document).on('blur', ".fn_user_keywords", function(){
        var text = $(this).val();
        var lines = text.split("\n");

        if (lines.length >= 20 ){
            console.log('5');
            var str = lines.splice(0, 20);
            var new_str = str.join("\n");
            $(this).val(new_str);
            return false;
        }
    });



    $(".fn_tab_export").on("change",function () {
        $(".fn_export_params").prop('checked', false);
    })

    /* criteria_country window */
    $(".fn__criteria_country__button").click(function(){
        $(".fn__criteria_country__holder").toggleClass("active");
        $(this).toggleClass("active");
    });
    $(document.body).on("mousedown", function(evt) {
    	if(evt.target.id == "fn__criteria_country__holder" || evt.target.id == "fn__criteria_country__btn" )
          return;
      	if($(evt.target).closest('#fn__criteria_country__holder').length || $(evt.target).closest('#fn__criteria_country__btn').length)
          return;   
    	if ( $(".fn__criteria_country__holder").hasClass("active") ){
    		$(".fn__criteria_country__holder").toggleClass("active");
    		$(".fn__criteria_country__button").toggleClass("active");
    	}
    })



    // scrollToTop 2.0
    $.fn.scrollToTop = function () {
        if ($(window).scrollTop() != "0") {
            $(this).addClass("show");
        }
        var scrollDiv = $(this);
        $(window).scroll(function () {
            if ($(window).scrollTop() == "0") {
                $(scrollDiv).removeClass("show");
            } else {
                $(scrollDiv).addClass("show");
            }
        });
        $(this).click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, "fast");
        });
    };
    $("#goTop").scrollToTop();

    $(document).on('change','.fn_search_system',function () {
        var elem = $(this);
        /*
        * 1 - google
        * 2 - yandex
        * 3 - all
        *
        * */


        if(elem.val() == 2) {
            $(".fn_currency").attr('disabled',true);
            $(".fn_search_hidden").hide();
        } else {
            $(".fn_currency").removeAttr('disabled');
            $(".fn_search_hidden").show();
        }
        if(!$(".fn_currency").is(':disabled')) {
            //console.log('adasdsad');
        }
    });

    /* Правки от 9.08.18 */
    /* при смене группы подгружаем слова из нее из БД, а не скрываем как раньше */
    $(document).on('change', '.fn_user_group_change', function () {
        var result_elem = $(".fn_result_table");
        var user_data = {
            'action': 'groupKeywords',
            'group_id': $(this).val(),

        };
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: user_data,
            beforeSend: function(){
                show_preloader();
                $(".fn_count_data").text();
            },
            success: function (data) {
                if (data.success) {
                    result_elem.html(data.data);
                }
                toastr.success('Успешный запрос!');
                $(".fn_count_data").html(data.count_results);
                hide_preloader();
            },
            error: function (data) {
                console.log('request error', data);

                //result_elem.html(data.data);
                toastr.error('Error');
                hide_preloader();
            }
        });
    });

    $(document).on('click', '.fn_title_edit', function () {
        if ($('.fn_project_title').hasClass('edit_mode')) {
            $('.fn_project_title').attr('readonly', true);
            $('.fn_project_title').removeClass('edit_mode');
            $('.fn_project_title').val($('.fn_project_title').data('old'));

            $('.fn_title_save').css("right", "0");
            $('.fn_title_cancel').css("right", "0");
        } else {
            $('.fn_project_title').addClass('edit_mode');
            $('.fn_project_title').removeAttr('readonly');

            $('.fn_title_save').css("right", "50px");
            $('.fn_title_cancel').css("right", "-50px");
        }
    });

    $(document).on('click', '.fn_title_cancel', function () {
        $('.fn_title_edit').trigger('click');
    });

    $(document).on('click', '.fn_title_save', function () {
        var user_data = {
            'action': 'renameProject',
            'title': $('.fn_project_title ').val(),

        };
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: user_data,
            beforeSend: function(){
                //show_preloader();
                //$(".fn_count_data").text();
            },
            success: function (data) {
                console.log(data);
                if (data.success) {
                    $('.fn_title_save').css("right", "0");
                    $('.fn_title_cancel').css("right", "0");
                    toastr.success('Успешный запрос!');
                } else {
                    toastr.error('Такое имя уже есть');
                }


            },
            error: function (data) {
                console.log('request error', data);
                toastr.error('Error');
            }
        });
    });


    $(document).on('change', '.fn_select_box', function (e) {
        $(".fn_word_item__checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        groupMethods.word_item__checkbox__update($(this), e);
    });

    $(document).on('click', '.fn_create_new_project', function () {
        var user_data = {
            'action': 'createNewProject',
        };
        $.ajax({
            url: theme_ajax.url+'?id='+getParameterByName('id'),
            type: 'POST',
            dataType: "json",
            data: user_data,
            beforeSend: function() {
                show_preloader();
                //$(".fn_count_data").text();
            },
            success: function (data) {
                console.log(data);
                if (data.success) {
                    toastr.success('Успешный запрос!');
                    window.location.href = 'keywords-tool/?id='+data.project_id

                } else {
                    hide_preloader();
                    toastr.error('Error');
                }


            },
            error: function (data) {
                console.log('request error', data);
                toastr.error('Error');
                hide_preloader();
            }
        });
    });

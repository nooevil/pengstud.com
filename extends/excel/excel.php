<?php

function keywordExport()
{
    ini_set('display_errors',true);
    error_reporting(E_ALL);
    global $wpdb;
    require_once(trailingslashit(CHILD_DIR)."/libs/phpexcel/PHPExcel.php");
    require_once(trailingslashit(CHILD_DIR)."/libs/phpexcel/PHPExcel/Calculation.php");
    require_once(trailingslashit(CHILD_DIR)."/libs/phpexcel/PHPExcel/Cell.php");

    $json_result = array();
    $json_result['success'] = false;
    $export_data = array();
    $export_params = null;
    $repeat = 1;
    $export_type = 'google';
    $export_type = $_POST['export_type'];
    $groups = array();

    $USER_ID = $_SESSION['user_id'];
    $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));

    /* Формируем настройки выгрузки */
    $project_id = $PROJECT_ID;
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['export_params'])) {
        $export_params = $_POST['export_params'];
    }
    if(isset($_POST['export_repeat']) && !empty($_POST['export_repeat'])) {
        $repeat = intval(strip_tags($_POST['export_repeat']));
        /* защита от дурака, не больше 10 повторений каждой группы */
        if($repeat > 10) {
            $repeat = 10;
        }
    }
    /* Формируем настройки выгрузки */

    /* Выбираем все группы в данном проекте */
    $query = "SELECT pg.title as group_name, pgk.keywords 
                FROM project_groups_keywords pgk 
                JOIN project_groups pg ON pgk.group_id = pg.id 
                AND pgk.project_id = $project_id 
                ORDER BY pg.title ASC";
    $raw_export_data = $wpdb->get_results($query);


    /* применим модификаторы к словам,е сли нужно */
    if(!empty($raw_export_data)) {
        foreach ($raw_export_data as $e_data) {
            addModifier(wp_unslash($e_data),$export_params,$export_data);
            $groups[$e_data->group_name] = $e_data->group_name;
        }
    }

    /* Выбираем все данные для общего листа с инфой */
    $q = "SELECT pg.title, pk.keyword, pk.search_volume, pk.average_cpc, pk.competition, pk.source
                FROM project_keywords pk
                LEFT JOIN project_groups_keywords pgk ON pgk.keywords = pk.keyword
                LEFT JOIN project_groups pg ON pgk.group_id = pg.id AND pgk.project_id = $project_id
                WHERE pk.project_id = $project_id
                AND pk.visible = 1
                ORDER BY pg.title DESC";
    $raw_all_data = $wpdb->get_results($q);
    /* После цикла массив $export_data готов к выгрузке в excel */

    /* Выбираем все минус слова проекта для экспорта */
    $q = "SELECT p.title, p.keywords, p.excluded, p.included FROM projects p WHERE id = $project_id LIMIT 1 ";
    $raw_project_settings = $wpdb->get_results($q);

    /* Начинаем работу с Excel */
    try {
        $start = 2;
        $objPHPExcel = new PHPExcel();


        if($export_type == 'google') {
            /* Файл для гугла */

            $sheet = $objPHPExcel->getActiveSheet()->setTitle('KeyWords');
            $sheet->getDefaultStyle()->getFont()->setName('Calibri');
            $sheet->getDefaultStyle()->getFont()->setSize(12);
            /* Применяем стили для ячеек */
            $sheet = ExcelStyle($sheet);
            /*
             * Функция печати в Excel
             * $sheet - экземпляр документа
             * $export_data - данные для печати
             * $start - позиция с которой нужно начать печать (с учетом заголовка)
             * */
            /* первый лист, простой формат */
            printExcelData($sheet,$export_data,$start,'simple');


            /* Второй лист, расширенный формат */

            $extendSheet = $objPHPExcel->createSheet(1)->setTitle('Ads');
            $extendSheet->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet = ExcelStyle($extendSheet,'extend');
            printExcelData($extendSheet,$groups,$start,'extend',$repeat);

            /* Третий лист, все данные + статистика */

            $extendSheet_all = $objPHPExcel->createSheet(2)->setTitle('AllData');
            $extendSheet_all->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet_all->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet_all = ExcelStyle($extendSheet_all,'all');

            printExcelData($extendSheet_all,$raw_all_data,$start,'all');


            /*  Четвертый лист с инфой о проекте */

            $extendSheet_project = $objPHPExcel->createSheet(3)->setTitle('Project');
            $extendSheet_project->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet_project->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet_project = ExcelStyle($extendSheet_project,'project');

            printExcelData($extendSheet_project,$raw_project_settings,$start,'project');


            $extendSheet_penguin = $objPHPExcel->createSheet(4)->setTitle('Penguin');
            $extendSheet_penguin = penguinFeature($extendSheet_penguin);

            $filename = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_title'].'-'.date('d-m-Y H:i:s').'-google'.'.xlsx';
        } elseif ($export_type == 'yandex') {
            /* Файл для яндекса */
            $sheet = $objPHPExcel->getActiveSheet()->setTitle('Ключи');
            $sheet->getDefaultStyle()->getFont()->setName('Calibri');
            $sheet->getDefaultStyle()->getFont()->setSize(12);
            /* Применяем стили для ячеек */
            $sheet = ExcelStyle($sheet,'yandex_key');
            /*
             * Функция печати в Excel
             * $sheet - экземпляр документа
             * $export_data - данные для печати
             * $start - позиция с которой нужно начать печать (с учетом заголовка)
             * */
            /* первый лист, простой формат */
            printExcelData($sheet,$export_data,$start,'yandex_key');

            /* Второй лист, расширенный формат */

            $extendSheet = $objPHPExcel->createSheet(1)->setTitle('Объявления');
            $extendSheet->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet = ExcelStyle($extendSheet,'yandex_extend');

            printExcelData($extendSheet,$groups,$start,'yandex_extend',$repeat);


            /* Третий лист, все данные + статистика */

            $extendSheet_all = $objPHPExcel->createSheet(2)->setTitle('AllData');
            $extendSheet_all->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet_all->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet_all = ExcelStyle($extendSheet_all,'all');

            printExcelData($extendSheet_all,$raw_all_data,$start,'all');


            /*  Четвертый лист с инфой о проекте */

            $extendSheet_project = $objPHPExcel->createSheet(3)->setTitle('Project');
            $extendSheet_project->getDefaultStyle()->getFont()->setName('Calibri');
            $extendSheet_project->getDefaultStyle()->getFont()->setSize(12);
            $extendSheet_project = ExcelStyle($extendSheet_project,'project');

            printExcelData($extendSheet_project,$raw_project_settings,$start,'project');


            $extendSheet_penguin = $objPHPExcel->createSheet(4)->setTitle('Penguin');
            $extendSheet_penguin = penguinFeature($extendSheet_penguin);

            $filename = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_title'].'-'.date('d-m-Y H:i:s').'-yandex'.'.xlsx';
        }





        /* Сохраняем все в файл на диске */
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objPHPExcel->setActiveSheetIndex(0);


        $objWriter->setPreCalculateFormulas();
        $objWriter->save(get_stylesheet_directory().'/users_file/'.$filename);
        $json_result['success'] = true;
        $json_result['link'] = get_stylesheet_directory_uri().'/users_file/'.$filename;
    } catch (Exception $exception) {
        $json_result['error'] = $exception->getMessage();
    }

    print json_encode($json_result);
    exit();
}


function printExcelData($sheet, $data, $i,$type = 'simple',$repeat = 1)
{

    $style_header = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'b8cce4')
        )
    );

    $border = array(
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );

    if($type == 'simple') {
        $header_items = array(
            'A1' => 'Campaign',
            'B1' => 'AdGroup',
            'C1' => 'KeyWord'
        );
    } elseif ($type == 'extend') {
        $header_items = array(
            'A1' => 'Campaign',
            'B1' => 'AdGroup',
            'C1' => 'Длина H1',
            'D1' => 'Headline 1',
            'E1' => 'Длина H2',
            'F1' => 'Headline 2',
            'G1' => 'Длина D',
            'H1' => 'Description',
            'I1' => 'Final Url',
            'J1' => 'Длина P1',
            'K1' => 'Path 1',
            'L1' => 'Длина P2',
            'M1' => 'Path 2',
        );
    } elseif ($type == 'yandex_extend') {
        $header_items = array(
            'A1' => 'Название кампании',
            'B1' => 'Название группы',
            'C1' => 'Номер группы',
            'D1' => 'Фраза',
            /*'E1' => 'Оставшееся количество символов для отображения двух заголовков',*/
            'E1' => '',
           /* 'F1' => 'Оставшееся количество символов (Заголовок 1)',*/
            'F1' => '',
            'G1' => 'Заголовок 1',
           /* 'H1' => 'Оставшееся количество символов (Заголовок 2)',*/
            'H1' => '',
            'I1' => 'Заголовок 2',
          /*  'J1' => 'Оставшееся количество символов (Текст)',*/
            'J1' => '',
            'K1' => 'Текст',
            'L1' => 'Ссылка',
            /*'M1' => 'Оставшееся количество символов (Отображаемая ссылка)',*/
            'M1' => '',
            'N1' => 'Отображаемая ссылка',
            'O1' => 'Регион',
            'P1' => 'Ставка',
            'Q1' => 'Заголовки быстрых ссылок',
            'R1' => 'Адреса быстрых ссылок',
            'S1' => 'Изображение',
            'T1' => 'Уточнения',
        );
    } elseif ($type == 'all') {
        $header_items = array(
            'A1' => 'Campaign',
            'B1' => 'AdGroup',
            'C1' => 'KeyWord',
            'D1' => 'SearchVolume',
            'E1' => 'Av.CPC',
            'F1' => 'Competitions',
            'G1' => 'Source'
        );
    } elseif ($type == 'project') {
        $header_items = array(
            'A3' => 'Входные слова',
            'B3' => 'Минус слова',
            'C3' => 'Слова включения',
        );
    } elseif ($type == 'yandex_key') {
        $header_items = array(
            'A1' => 'Название кампании',
            'B1' => 'Название группы',
            'C1' => 'Номер группы',
            'D1' => 'Фраза',
        );
    }

    /* Шапка для упрощенного варианта экспорта */
    foreach ($header_items as $index => $h_item) {
        $sheet->setCellValue($index, $h_item);
        $sheet->getStyle($index)->applyFromArray($style_header);
        $sheet->getStyle($index)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($index)->getFont()->setSize(12);
        $sheet->getStyle($index)->getFont()->setBold(false);
        $sheet->getStyle($index)->getAlignment()->setWrapText(false);

    }

    if($type == 'simple') {
        foreach ($data as $item ) {
            $sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('B' . $i)->getFont()->setSize(12);
            $sheet->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('C' . $i)->getFont()->setSize(12);

            $sheet->setCellValue('B' . $i, strval($item->group_name));
            $sheet->setCellValue('C' . $i, strval($item->keywords));
            $i++;
        }
    } elseif ($type == 'extend') {
        foreach ($data as $item ) {
            for ($cc=1;$cc<=$repeat;$cc++) {
                $sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('B' . $i)->getFont()->setSize(12);
                $sheet->setCellValue('B' . $i, strval($item));
                /* Вносим формулы в нужные ячейки */
                $sheet->setCellValue('C' . $i,"=30-LEN(D$i)");
                $sheet->setCellValue('E' . $i,"=30-LEN(F$i)");
                $sheet->setCellValue('G' . $i,"=80-LEN(H$i)");
                $sheet->setCellValue('J' . $i,"=15-LEN(K$i)");
                $sheet->setCellValue('L' . $i,"=15-LEN(M$i)");
                /* Вносим формулы в нужные ячейки */
                $i++;
            }
        }
    } elseif ($type == 'yandex_extend') {
        foreach ($data as $item ) {
            for ($cc=1;$cc<=$repeat;$cc++) {
                $sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('B' . $i)->getFont()->setSize(12);
                $sheet->setCellValue('B' . $i, strval($item));

                /* Вносим формулы в нужные ячейки */
                $sheet->setCellValue('E' . $i,"=53-LEN(G$i)-LEN(I$i)");
                $sheet->setCellValue('F' . $i,"=35-LEN(G$i)");
                $sheet->setCellValue('H' . $i,"=35-LEN(I$i)");
                $sheet->setCellValue('J' . $i,"=81-LEN(K$i)");
                $sheet->setCellValue('M' . $i,"=20-LEN(N$i)");
                /* Вносим формулы в нужные ячейки */
                $i++;
            }
        }
    }

    elseif ($type == 'all') {
        foreach ($data as $item ) {
            $sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('B' . $i)->getFont()->setSize(12);
            $sheet->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('C' . $i)->getFont()->setSize(12);

            $sheet->setCellValue('B' . $i, strval($item->title));
            $sheet->setCellValue('C' . $i, strval($item->keyword));
            $sheet->setCellValue('D' . $i, strval($item->search_volume));
            $sheet->setCellValue('E' . $i, strval($item->average_cpc));
            $sheet->setCellValue('F' . $i, strval($item->competition));
            $sheet->setCellValue('G' . $i, strval($item->source));
            $i++;
        }
    } elseif ($type == 'project') {
        $excel_data = reset($data);

        $keyword_to_exluded = explode("\n", $excel_data->excluded);
        foreach ($keyword_to_exluded as $id => $kw_ex) {
            if (empty($kw_ex)) {
                unset($keyword_to_exluded[$id]);
            }
        }

        $keywords = explode("\n", $excel_data->keywords);
        foreach ($keywords as $id => $kw) {
            if (empty($kw)) {
                unset($keywords[$id]);
            }
        }

        $included = explode("\n", $excel_data->included);
        foreach ($included as $id => $kw) {
            if (empty($kw)) {
                unset($included[$id]);
            }
        }


        $sheet->mergeCells('A1:C1');
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);
        $sheet->getStyle('A1:C1')->applyFromArray($style_header);
        $sheet->setCellValue('A1', strval($excel_data->title));

        $index = 4;


        function makeModifier($data) {
            return  preg_replace('/(^.+$)/','"$0"',$data);
        }

        if($_POST['export_type'] == 'google') {
            $keyword_to_exc = array_map("makeModifier",$keyword_to_exluded);
        } else {
            $keyword_to_exc = $keyword_to_exluded;
        }


        printData($sheet,'A',$index,$keywords);
        printData($sheet,'B',$index, $keyword_to_exc);
        printData($sheet,'C',$index,$included);

    } elseif ($type == 'yandex_key') {
        foreach ($data as $item ) {
            $sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

            $sheet->setCellValue('B' . $i, strval($item->group_name));
            $sheet->setCellValue('D' . $i, strval($item->keywords));
            $i++;
        }
    }
}
function printData($sheet,$cell,$index, $data)
{
    foreach ($data as $item) {
        $sheet->setCellValue($cell.$index, strval($item));
        $index++;
    }
}

function addModifier ($object, $modifiers,&$results)
{
    $original_word = $object->keywords;
    if(!is_null($modifiers)) {
        foreach ($modifiers as $modifier) {
            $new_part = new stdClass();
            $new_part->group_name = $object->group_name;
            switch ($modifier) {
                /* просто оригинальное слово */
                case 'groups_native':
                    $new_part->keywords = $original_word;
                    $results[] = $new_part;
                    break;
                /* модификатор широкого соответствие */
                case 'groups_wide':
                    $new_part->keywords = preg_replace('/([а-яa-z0-9\']+)/iu','+$0',$original_word);
                    $results[] = $new_part;
                    break;
                /* Фразовое соответствие */
                case 'groups_phrase':
                    $new_part->keywords = preg_replace('/(^.+$)/','"$0"',$original_word);
                    $results[] = $new_part;
                    break;
                /*Точное соответствие*/
                case 'groups_exactly':
                    $new_part->keywords = preg_replace('/(^.+$)/','[$0]',$original_word);
                    $results[] = $new_part;
                    break;
                    /* без параметров для яндекса */
                case 'groups_none_params':
                    /*
                     * перед каждым предлогом поставить +. Список предлогов: Без, в, для, за, из, к, на, над, о, об, от, по, под, пред, при, про, с, у, через)
                     * */
                    /*
                     * (?<!\S)(?:это|как|так|и|в|над|к|до|не|на|но|за|то|с|ли|а|во|от|со|для|о|же|ну|вы|бы|что|кто|он|она)(?!\S)
                     *
                     * */
                    //$new_part->keywords = preg_replace('/(^.+$)/','[$0]',$original_word);
                    $new_part->keywords = preg_replace('/(?<!\S)(?:без|в|для|за|из|к|на|над|о|об|от|по|под|пред|при|про|с|у|через)(?!\S)/iu','+$0',$original_word);
                    $results[] = $new_part;
                    break;
                default:
                    $results[] = $object;
                    break;
            }
        }
    } else {
        $results[] = $object;
    }
}
function ExcelStyle ($sheet,$type = 'simple')
{
    if($type == 'simple') {
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(9);
        $sheet->getColumnDimension('C')->setWidth(24);
        $sheet->getColumnDimension('D')->setWidth(9);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);
        $sheet->getStyle('E')->getAlignment()->setWrapText(true);
    } elseif ($type == 'extend') {
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(30);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(10);
        $sheet->getColumnDimension('L')->setWidth(10);
        $sheet->getColumnDimension('M')->setWidth(10);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);
        $sheet->getStyle('E')->getAlignment()->setWrapText(true); 


        $sheet->getComment('C1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('C1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('C1')->getText()->createTextRun("Это длина заголовка 1");
        $sheet->getComment('C1')->setHeight (100); // height set to 300
        $sheet->getComment('C1')->setWidth (200); // width set to 400

        $sheet->getComment('E1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('E1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('E1')->getText()->createTextRun("Это длина заголовка 2");
        $sheet->getComment('E1')->setHeight (100); // height set to 300
        $sheet->getComment('E1')->setWidth (200); // width set to 400

        $sheet->getComment('G1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('G1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('G1')->getText()->createTextRun("Это длина описания");
        $sheet->getComment('G1')->setHeight (100); // height set to 300
        $sheet->getComment('G1')->setWidth (200); // width set to 400

        $sheet->getComment('J1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('J1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('J1')->getText()->createTextRun("Это длина ссылки 1");
        $sheet->getComment('J1')->setHeight (100); // height set to 300
        $sheet->getComment('J1')->setWidth (200); // width set to 400

        $sheet->getComment('L1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('L1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('L1')->getText()->createTextRun("Это длина ссылки 1");
        $sheet->getComment('L1')->setHeight (100); // height set to 300
        $sheet->getComment('L1')->setWidth (200); // width set to 400

    } elseif ($type == 'yandex_extend') {

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(5);
        $sheet->getColumnDimension('F')->setWidth(5);
        $sheet->getColumnDimension('G')->setWidth(40);
        $sheet->getColumnDimension('H')->setWidth(5);
        $sheet->getColumnDimension('I')->setWidth(40);
        $sheet->getColumnDimension('J')->setWidth(5);
        $sheet->getColumnDimension('K')->setWidth(50);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(5);
        $sheet->getColumnDimension('O')->setWidth(20);
        $sheet->getColumnDimension('P')->setWidth(20);
        $sheet->getColumnDimension('Q')->setWidth(20);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);

        $sheet->getStyle('A1:T1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A1:T1')->getAlignment()->setWrapText(true);




        $sheet->getComment('E1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('E1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('E1')->getText()->createTextRun("Оставшееся количество символов для отображения двух заголовков");
        $sheet->getComment('E1')->setHeight (100); // height set to 300
        $sheet->getComment('E1')->setWidth (200); // width set to 400

        $sheet->getComment('F1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('F1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('F1')->getText()->createTextRun("Оставшееся количество символов Заголовок 1");
        $sheet->getComment('F1')->setHeight (100); // height set to 300
        $sheet->getComment('F1')->setWidth (200); // width set to 400

        $sheet->getComment('H1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('H1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('H1')->getText()->createTextRun("Оставшееся количество символов Заголовок 2");
        $sheet->getComment('H1')->setHeight (100); // height set to 300
        $sheet->getComment('H1')->setWidth (200); // width set to 400

        $sheet->getComment('J1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('J1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('J1')->getText()->createTextRun("Оставшееся количество символов Текст");
        $sheet->getComment('J1')->setHeight (100); // height set to 300
        $sheet->getComment('J1')->setWidth (200); // width set to 400

        $sheet->getComment('M1')->setAuthor('Пингвин');
        $objCommentRichText = $sheet->getComment('M1')->getText()->createTextRun("Пингвин говорит:\r\n");
        $objCommentRichText->getFont()->setBold(true);
        $sheet->getComment('M1')->getText()->createTextRun("Оставшееся количество символов Отображаемая ссылка");
        $sheet->getComment('M1')->setHeight (100); // height set to 300
        $sheet->getComment('M1')->setWidth (200); // width set to 400

    } elseif ($type == 'all') {
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(50);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);
        $sheet->getStyle('E')->getAlignment()->setWrapText(true);
    } elseif ($type == 'project') {
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);

        $sheet->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('B')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);

    } elseif ($type == 'yandex_key') {
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(40);
        $sheet->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('B')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);
    }
    return $sheet;
}

function penguinFeature($sheet)
{
    //$sheet->getColumnDimension('A')->setWidth(10);



    $black = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '000000')
        )
    );
    $yellow = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'f2f208')
        )
    );
    $red = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'fa2803')
        )
    );

    /* Установим размер колонок */
    $sheet->getColumnDimension('A')->setWidth(4);
    $sheet->getColumnDimension('B')->setWidth(4);
    $sheet->getColumnDimension('C')->setWidth(4);
    $sheet->getColumnDimension('D')->setWidth(4);
    $sheet->getColumnDimension('E')->setWidth(4);
    $sheet->getColumnDimension('F')->setWidth(4);
    $sheet->getColumnDimension('G')->setWidth(4);
    $sheet->getColumnDimension('H')->setWidth(4);
    $sheet->getColumnDimension('I')->setWidth(4);
    $sheet->getColumnDimension('J')->setWidth(4);
    $sheet->getColumnDimension('K')->setWidth(4);
    $sheet->getColumnDimension('L')->setWidth(4);
    $sheet->getColumnDimension('M')->setWidth(4);
    $sheet->getColumnDimension('N')->setWidth(4);
    $sheet->getColumnDimension('O')->setWidth(4);
    $sheet->getColumnDimension('P')->setWidth(4);
    $sheet->getColumnDimension('Q')->setWidth(4);
    $sheet->getColumnDimension('R')->setWidth(4);
    $sheet->getColumnDimension('S')->setWidth(4);
    $sheet->getColumnDimension('T')->setWidth(4);
    $sheet->getColumnDimension('U')->setWidth(4);
    $sheet->getColumnDimension('V')->setWidth(4);
    $sheet->getColumnDimension('W')->setWidth(4);
    $sheet->getColumnDimension('X')->setWidth(4);
    $sheet->getColumnDimension('Y')->setWidth(4);
    $sheet->getColumnDimension('Z')->setWidth(4);
    $sheet->getColumnDimension('AA')->setWidth(4);
    $sheet->getColumnDimension('AB')->setWidth(4);
    $sheet->getColumnDimension('AC')->setWidth(4);
    $sheet->getColumnDimension('AD')->setWidth(4);
    $sheet->getColumnDimension('AE')->setWidth(4);
    $sheet->getColumnDimension('AF')->setWidth(4);
    $sheet->getColumnDimension('AG')->setWidth(4);
    $sheet->getColumnDimension('AH')->setWidth(4);


    /* рисуем все черное */
    $sheet->getStyle('E2')->applyFromArray($black);
    $sheet->getStyle('F2')->applyFromArray($black);
    $sheet->getStyle('G2')->applyFromArray($black);
    $sheet->getStyle('H2')->applyFromArray($black);
    $sheet->getStyle('I2')->applyFromArray($black);
    $sheet->getStyle('J2')->applyFromArray($black);
    $sheet->getStyle('K2')->applyFromArray($black);
    $sheet->getStyle('L2')->applyFromArray($black);

    $sheet->getStyle('D3')->applyFromArray($black);
    $sheet->getStyle('E3')->applyFromArray($black);
    $sheet->getStyle('F3')->applyFromArray($black);
    $sheet->getStyle('G3')->applyFromArray($black);
    $sheet->getStyle('H3')->applyFromArray($black);
    $sheet->getStyle('I3')->applyFromArray($black);
    $sheet->getStyle('J3')->applyFromArray($black);
    $sheet->getStyle('K3')->applyFromArray($black);
    $sheet->getStyle('L3')->applyFromArray($black);
    $sheet->getStyle('M3')->applyFromArray($black);


    $sheet->getStyle('C4')->applyFromArray($black);
    $sheet->getStyle('D4')->applyFromArray($black);
    $sheet->getStyle('E4')->applyFromArray($black);
    $sheet->getStyle('F4')->applyFromArray($black);
    $sheet->getStyle('G4')->applyFromArray($black);
    $sheet->getStyle('H4')->applyFromArray($black);
    $sheet->getStyle('I4')->applyFromArray($black);
    $sheet->getStyle('J4')->applyFromArray($black);
    $sheet->getStyle('K4')->applyFromArray($black);
    $sheet->getStyle('L4')->applyFromArray($black);
    $sheet->getStyle('M4')->applyFromArray($black);
    $sheet->getStyle('N4')->applyFromArray($black);

    $sheet->getStyle('C5')->applyFromArray($black);
    $sheet->getStyle('D5')->applyFromArray($black);
    $sheet->getStyle('E5')->applyFromArray($black);
    $sheet->getStyle('F5')->applyFromArray($black);
    $sheet->getStyle('G5')->applyFromArray($black);
    $sheet->getStyle('N5')->applyFromArray($black);
    $sheet->getStyle('O5')->applyFromArray($black);

    $sheet->getStyle('C6')->applyFromArray($black);
    $sheet->getStyle('D6')->applyFromArray($black);
    $sheet->getStyle('E6')->applyFromArray($black);
    $sheet->getStyle('F6')->applyFromArray($black);
    $sheet->getStyle('G6')->applyFromArray($black);
    $sheet->getStyle('O6')->applyFromArray($black);

    $sheet->getStyle('C7')->applyFromArray($black);
    $sheet->getStyle('D7')->applyFromArray($black);
    $sheet->getStyle('E7')->applyFromArray($black);
    $sheet->getStyle('F7')->applyFromArray($black);
    $sheet->getStyle('O7')->applyFromArray($black);

    $sheet->getStyle('C8')->applyFromArray($black);
    $sheet->getStyle('D8')->applyFromArray($black);
    $sheet->getStyle('E8')->applyFromArray($black);
    $sheet->getStyle('C9')->applyFromArray($black);
    $sheet->getStyle('D9')->applyFromArray($black);
    $sheet->getStyle('E9')->applyFromArray($black);
    $sheet->getStyle('C10')->applyFromArray($black);
    $sheet->getStyle('D10')->applyFromArray($black);
    $sheet->getStyle('E10')->applyFromArray($black);
    $sheet->getStyle('C11')->applyFromArray($black);
    $sheet->getStyle('D11')->applyFromArray($black);
    $sheet->getStyle('E11')->applyFromArray($black);
    $sheet->getStyle('C12')->applyFromArray($black);
    $sheet->getStyle('D12')->applyFromArray($black);
    $sheet->getStyle('E12')->applyFromArray($black);
    $sheet->getStyle('E13')->applyFromArray($black);
    $sheet->getStyle('C13')->applyFromArray($black);
    $sheet->getStyle('D13')->applyFromArray($black);
    $sheet->getStyle('E14')->applyFromArray($black);
    $sheet->getStyle('C14')->applyFromArray($black);
    $sheet->getStyle('D14')->applyFromArray($black);
    $sheet->getStyle('E14')->applyFromArray($black);
    $sheet->getStyle('C15')->applyFromArray($black);
    $sheet->getStyle('D15')->applyFromArray($black);
    $sheet->getStyle('E15')->applyFromArray($black);
    $sheet->getStyle('C16')->applyFromArray($black);
    $sheet->getStyle('D16')->applyFromArray($black);
    $sheet->getStyle('E16')->applyFromArray($black);
    $sheet->getStyle('C17')->applyFromArray($black);
    $sheet->getStyle('D17')->applyFromArray($black);
    $sheet->getStyle('E17')->applyFromArray($black);
    $sheet->getStyle('C18')->applyFromArray($black);
    $sheet->getStyle('D18')->applyFromArray($black);
    $sheet->getStyle('E18')->applyFromArray($black);
    $sheet->getStyle('C19')->applyFromArray($black);
    $sheet->getStyle('D19')->applyFromArray($black);
    $sheet->getStyle('E19')->applyFromArray($black);
    $sheet->getStyle('C20')->applyFromArray($black);
    $sheet->getStyle('D20')->applyFromArray($black);
    $sheet->getStyle('E20')->applyFromArray($black);
    $sheet->getStyle('C21')->applyFromArray($black);
    $sheet->getStyle('D21')->applyFromArray($black);
    $sheet->getStyle('E21')->applyFromArray($black);
    $sheet->getStyle('C22')->applyFromArray($black);
    $sheet->getStyle('D22')->applyFromArray($black);
    $sheet->getStyle('E22')->applyFromArray($black);
    $sheet->getStyle('C23')->applyFromArray($black);
    $sheet->getStyle('D23')->applyFromArray($black);
    $sheet->getStyle('E23')->applyFromArray($black);
    $sheet->getStyle('C24')->applyFromArray($black);
    $sheet->getStyle('D24')->applyFromArray($black);
    $sheet->getStyle('E24')->applyFromArray($black);
    $sheet->getStyle('C25')->applyFromArray($black);
    $sheet->getStyle('D25')->applyFromArray($black);
    $sheet->getStyle('E25')->applyFromArray($black);
    $sheet->getStyle('C26')->applyFromArray($black);
    $sheet->getStyle('D26')->applyFromArray($black);
    $sheet->getStyle('E26')->applyFromArray($black);
    $sheet->getStyle('C27')->applyFromArray($black);
    $sheet->getStyle('D27')->applyFromArray($black);
    $sheet->getStyle('E27')->applyFromArray($black);
    $sheet->getStyle('C28')->applyFromArray($black);
    $sheet->getStyle('D28')->applyFromArray($black);
    $sheet->getStyle('E28')->applyFromArray($black);
    $sheet->getStyle('C29')->applyFromArray($black);
    $sheet->getStyle('D29')->applyFromArray($black);
    $sheet->getStyle('E29')->applyFromArray($black);
    $sheet->getStyle('C30')->applyFromArray($black);
    $sheet->getStyle('D30')->applyFromArray($black);
    $sheet->getStyle('E30')->applyFromArray($black);
    $sheet->getStyle('C31')->applyFromArray($black);
    $sheet->getStyle('D31')->applyFromArray($black);
    $sheet->getStyle('E31')->applyFromArray($black);

    $sheet->getStyle('C32')->applyFromArray($black);
    $sheet->getStyle('D32')->applyFromArray($black);
    $sheet->getStyle('C33')->applyFromArray($black);
    $sheet->getStyle('D33')->applyFromArray($black);

    $sheet->getStyle('C34')->applyFromArray($black);
    $sheet->getStyle('D35')->applyFromArray($black);

    $sheet->getStyle('E36')->applyFromArray($black);
    $sheet->getStyle('F36')->applyFromArray($black);
    $sheet->getStyle('G36')->applyFromArray($black);
    $sheet->getStyle('H36')->applyFromArray($black);
    $sheet->getStyle('I36')->applyFromArray($black);
    $sheet->getStyle('J36')->applyFromArray($black);
    $sheet->getStyle('K36')->applyFromArray($black);
    $sheet->getStyle('L36')->applyFromArray($black);
    $sheet->getStyle('M36')->applyFromArray($black);

    $sheet->getStyle('N35')->applyFromArray($black);

    $sheet->getStyle('O8')->applyFromArray($black);
    $sheet->getStyle('O9')->applyFromArray($black);
    $sheet->getStyle('O10')->applyFromArray($black);
    $sheet->getStyle('O12')->applyFromArray($black);
    $sheet->getStyle('O13')->applyFromArray($black);
    $sheet->getStyle('O14')->applyFromArray($black);
    $sheet->getStyle('O15')->applyFromArray($black);
    $sheet->getStyle('O16')->applyFromArray($black);
    $sheet->getStyle('O20')->applyFromArray($black);
    $sheet->getStyle('O21')->applyFromArray($black);
    $sheet->getStyle('O22')->applyFromArray($black);
    $sheet->getStyle('O23')->applyFromArray($black);
    $sheet->getStyle('O24')->applyFromArray($black);
    $sheet->getStyle('O25')->applyFromArray($black);
    $sheet->getStyle('O26')->applyFromArray($black);
    $sheet->getStyle('O27')->applyFromArray($black);
    $sheet->getStyle('O28')->applyFromArray($black);
    $sheet->getStyle('O29')->applyFromArray($black);
    $sheet->getStyle('O30')->applyFromArray($black);
    $sheet->getStyle('O31')->applyFromArray($black);
    $sheet->getStyle('O32')->applyFromArray($black);
    $sheet->getStyle('O33')->applyFromArray($black);
    $sheet->getStyle('O34')->applyFromArray($black);

    /* Рисуем глаза */
    $sheet->getStyle('H12')->applyFromArray($black);
    $sheet->getStyle('I12')->applyFromArray($black);
    $sheet->getStyle('G13')->applyFromArray($black);
    $sheet->getStyle('H13')->applyFromArray($black);
    $sheet->getStyle('G14')->applyFromArray($black);
    $sheet->getStyle('H14')->applyFromArray($black);
    $sheet->getStyle('H15')->applyFromArray($black);
    $sheet->getStyle('H16')->applyFromArray($black);
    $sheet->getStyle('I15')->applyFromArray($black);
    $sheet->getStyle('J13')->applyFromArray($black);
    $sheet->getStyle('J14')->applyFromArray($black);
    $sheet->getStyle('J15')->applyFromArray($black);

    $sheet->getStyle('N13')->applyFromArray($black);
    $sheet->getStyle('N14')->applyFromArray($black);
    $sheet->getStyle('P11')->applyFromArray($black);
    $sheet->getStyle('P12')->applyFromArray($black);
    $sheet->getStyle('P15')->applyFromArray($black);
    $sheet->getStyle('P16')->applyFromArray($black);
    $sheet->getStyle('Q13')->applyFromArray($black);
    $sheet->getStyle('Q14')->applyFromArray($black);
    $sheet->getStyle('Q15')->applyFromArray($black);

    /* але в мене лапки */
    $sheet->getStyle('F20')->applyFromArray($black);
    $sheet->getStyle('F21')->applyFromArray($black);
    $sheet->getStyle('F22')->applyFromArray($black);
    $sheet->getStyle('F23')->applyFromArray($black);
    $sheet->getStyle('G21')->applyFromArray($black);
    $sheet->getStyle('G24')->applyFromArray($black);
    $sheet->getStyle('H22')->applyFromArray($black);
    $sheet->getStyle('H25')->applyFromArray($black);
    $sheet->getStyle('I23')->applyFromArray($black);
    $sheet->getStyle('I25')->applyFromArray($black);
    $sheet->getStyle('J23')->applyFromArray($black);
    $sheet->getStyle('J25')->applyFromArray($black);
    $sheet->getStyle('K24')->applyFromArray($black);

    $sheet->getStyle('P21')->applyFromArray($black);
    $sheet->getStyle('P24')->applyFromArray($black);
    $sheet->getStyle('Q22')->applyFromArray($black);
    $sheet->getStyle('Q25')->applyFromArray($black);
    $sheet->getStyle('R23')->applyFromArray($black);
    $sheet->getStyle('R25')->applyFromArray($black);
    $sheet->getStyle('S23')->applyFromArray($black);
    $sheet->getStyle('S25')->applyFromArray($black);
    $sheet->getStyle('T24')->applyFromArray($black);

    /* рисуем клюв */
    $sheet->getStyle('M15')->applyFromArray($yellow);
    $sheet->getStyle('N15')->applyFromArray($yellow);
    $sheet->getStyle('M16')->applyFromArray($yellow);
    $sheet->getStyle('N16')->applyFromArray($yellow);
    $sheet->getStyle('M17')->applyFromArray($yellow);
    $sheet->getStyle('N17')->applyFromArray($yellow);
    $sheet->getStyle('L16')->applyFromArray($yellow);
    $sheet->getStyle('O17')->applyFromArray($yellow);
    $sheet->getStyle('P17')->applyFromArray($yellow);
    $sheet->getStyle('Q17')->applyFromArray($yellow);
    $sheet->getStyle('O18')->applyFromArray($yellow);
    $sheet->getStyle('P18')->applyFromArray($yellow);
    $sheet->getStyle('Q18')->applyFromArray($yellow);
    $sheet->getStyle('R18')->applyFromArray($yellow);

    /* Рисуем сердце */
    $sheet->getStyle('V17')->applyFromArray($red);
    $sheet->getStyle('V18')->applyFromArray($red);
    $sheet->getStyle('V19')->applyFromArray($red);
    $sheet->getStyle('V20')->applyFromArray($red);
    $sheet->getStyle('V21')->applyFromArray($red);
    $sheet->getStyle('W16')->applyFromArray($red);
    $sheet->getStyle('W17')->applyFromArray($red);
    $sheet->getStyle('W22')->applyFromArray($red);
    $sheet->getStyle('W23')->applyFromArray($red);
    $sheet->getStyle('X16')->applyFromArray($red);
    $sheet->getStyle('X23')->applyFromArray($red);
    $sheet->getStyle('X24')->applyFromArray($red);
    $sheet->getStyle('Y16')->applyFromArray($red);
    $sheet->getStyle('Y24')->applyFromArray($red);
    $sheet->getStyle('Y25')->applyFromArray($red);
    $sheet->getStyle('Z17')->applyFromArray($red);
    $sheet->getStyle('Z25')->applyFromArray($red);
    $sheet->getStyle('Z26')->applyFromArray($red);

    $sheet->getStyle('AA18')->applyFromArray($red);
    $sheet->getStyle('AB18')->applyFromArray($red);
    $sheet->getStyle('AA26')->applyFromArray($red);
    $sheet->getStyle('AB26')->applyFromArray($red);
    $sheet->getStyle('AA27')->applyFromArray($red);
    $sheet->getStyle('AB27')->applyFromArray($red);

    $sheet->getStyle('AG17')->applyFromArray($red);
    $sheet->getStyle('AG18')->applyFromArray($red);
    $sheet->getStyle('AG19')->applyFromArray($red);
    $sheet->getStyle('AG20')->applyFromArray($red);
    $sheet->getStyle('AG21')->applyFromArray($red);
    $sheet->getStyle('AF16')->applyFromArray($red);
    $sheet->getStyle('AF22')->applyFromArray($red);
    $sheet->getStyle('AF23')->applyFromArray($red);
    $sheet->getStyle('AE16')->applyFromArray($red);
    $sheet->getStyle('AE23')->applyFromArray($red);
    $sheet->getStyle('AE24')->applyFromArray($red);
    $sheet->getStyle('AD16')->applyFromArray($red);
    $sheet->getStyle('AD24')->applyFromArray($red);
    $sheet->getStyle('AD25')->applyFromArray($red);
    $sheet->getStyle('AC17')->applyFromArray($red);
    $sheet->getStyle('AC25')->applyFromArray($red);
    $sheet->getStyle('AC26')->applyFromArray($red);


    $sheet->getStyle('W17')->applyFromArray($red);
    $sheet->getStyle('AF17')->applyFromArray($red);

    return $sheet;
}
<?php


new WPS_OptionPage(
  array(
    // menu_setting
    'menu_setting' => array(
      'page_title' => 'Пример страницы',
      'menu_title' => 'Статистика',
      'capability' => 'administrator',
      'menu_slug'  => 'wps_theme_settings_test',
      'icon'       => 'dashicons-tagcloud'
    ),
    // menu_setting
    'fields'    => array(
		// FIELDS
		array(
		  'field_type'   => 'message',
		  'type_message' => 'info', 
		  'message'      => 'Укажите дату и время, сохраните, нажмите "Получить"',
		),
		array(
		  'field_type'   => 'input',
		  'field_name'   => 'date_on',
		  'title'        => 'Дата начала:',
		  'add_class'    => 'fn_date_schedule',
		  'required'     => true,
		),
		array(
		  'field_type'   => 'input',
		  'field_name'   => 'time_on',
		  'title'        => 'Время от:',
		  'type_input'   => 'time',
		  'required'     => true,
		),
		array(
		  'field_type'   => 'input',
		  'field_name'   => 'date_off',
		  'title'        => 'Дата окончания (включительно):',
		  'add_class'    => 'fn_date_schedule',
		  'required'     => true,
		),
		array(
		  'field_type'   => 'input',
		  'field_name'   => 'time_off',
		  'title'        => 'Время до (включительно):',
		  'type_input'   => 'time',
		  'required'     => true,
		),
		array(
		  'field_type'  => 'button',
		  'btn_value'   => 'Получить',
		  'title'       => 'Отчет по пользователям',
		  'description' => '',
		  'confirm'     => "",
		  // if need ajax
		  'ajax'        => true,
		  'ajax_action' => 'user_logs__btn',
		  'set_timeout' => 55000
		),
		array(
		  'field_type'  => 'button',
		  'btn_value'   => 'Получить',
		  'title'       => 'График по дням',
		  'description' => '',
		  'confirm'     => "",
		  // if need ajax
		  'ajax'        => true,
		  'ajax_action' => 'user_logs_graph__btn',
		  'set_timeout' => 80000
		),
		array(
		  'field_type'  => 'button',
		  'btn_value'   => 'Постоянные пользователи',
		  'title'       => '',
		  'description' => '',
		  'confirm'     => "",
		  // if need ajax
		  'ajax'        => true,
		  'ajax_action' => 'user_logs_regular_users',
		  'set_timeout' => 80000
		),
    )
  )
);


/*
new WPS_OptionPage(
  array(
    // submenu_setting 
    'submenu_setting' => array(
      'submenupos' => "wps_theme_settings_test",
      // если нужно добавить в меню типа записей - 'submenupos' => "edit.php?post_type=custom_post2",
      'page_title' => 'UTM',
      'menu_title' => 'UTM',
      'capability' => 'administrator',
      'menu_slug'  => 'wps_theme_settings_utm',
    ),
    // submenu_setting 
    'fields'    => array(
      // FIELDS
		array(
		  'field_type'   => 'input',
		  'field_name'   => 'click_count',
		  'title'        => 'Кол-во',
		  'description'  => 'Кол-во нажатий на "Сгенерировать" от 30.05.18',
		),

    )
  )
);
*/



add_action( 'wp_ajax_user_logs_graph__btn', 'user_logs_graph__btn' );

function user_logs_graph__btn(){

	$option_data = get_option('wps_theme_settings_test');

	$date_on  = $option_data['date_on'];
	$time_on  = $option_data['time_on'];
	$date_off = $option_data['date_off'];
	$time_off = $option_data['time_off'];

	$datetime_on = $date_on." ".$time_on;
	$datetime_off = $date_off." ".$time_off;

	echo "Данные за период: ".$datetime_on." --- ".$datetime_off;

	global $wpdb;

	// prepare query
	$query = "SELECT
	user_id,
	date_log
	FROM user_logs 
	WHERE type_actions = 'search' AND date_log >= '$datetime_on' and date_log <= '$datetime_off'
	ORDER BY date_log";

	$search_logs = $wpdb->get_results($query);

	$search_roma = 0;
	$search_other = 0;

	$date_arr = array();
	$user_arr = array();

	foreach ($search_logs as $key => $value) {

		if($value->user_id === '4838'){
			$search_roma++;
		} else {
			$search_other++;
			$date = substr($value->date_log, 0, 10);
			$date_arr[$date] += 1;
			$user_arr[$date][$value->user_id] += 1;
		}
	}

	echo "<br><br>";
	echo "Кол-во поисков: ".$search_other;


	$date_str  = "";
	$count_str = "";
	$user_str  = "";

	foreach ($date_arr as $key => $value) {
		$date_str .= $key . ";";
		$count_str .= $value . ";";
	}

	foreach ($user_arr as $key => $value) {
		$user_str  .= count($value) . ";";
	}

 
	// pre_print_r( $user_str );

	echo "<br><br>";

	echo "<input type='hidden' class='fn_chart_x_date' value='{$date_str}'>";
	echo "<input type='hidden' class='fn_chart_x_count' value='{$count_str}'>";
	echo "<input type='hidden' class='fn_chart_x_users' value='{$user_str}'>";
	echo "<div class='fn_chart_x_button' style='cursor:pointer;'>Показать график</div>";
	echo "<div class='chart_container' id='chart_container'></div>";

	exit();
}
























add_action( 'wp_ajax_user_logs__btn', 'get_user_logs' );


function get_user_logs() {
	$option_data = get_option('wps_theme_settings_test');

	$date_on  = $option_data['date_on'];
	$time_on  = $option_data['time_on'];
	$date_off = $option_data['date_off'];
	$time_off = $option_data['time_off'];

	$datetime_on = $date_on." ".$time_on;
	$datetime_off = $date_off." ".$time_off;

	echo "Данные за период: ".$datetime_on." --- ".$datetime_off;

	global $wpdb;

	// prepare query
	$query = "SELECT
	user_id,
	keywords,
	negative_keywords,
	response,
	result_count,
	strong_search
	FROM user_logs 
	WHERE type_actions = 'search' AND date_log >= '$datetime_on' and date_log <= '$datetime_off'
	ORDER BY date_log DESC";

	$search_logs = $wpdb->get_results($query);

	// get data
	$user_id_array = array();
	$search_roma = 0;
	$other_search = 0;
	$response_success_count = 0;
	$response_error_count = 0;

	foreach ($search_logs as $key => $value) {

		if($value->user_id === '4838'){
			$search_roma++;
		} else {
			$other_search++;
			$user_id_array[$value->user_id] += 1;

			if (strripos($value->response, 'success: 1') !== false){
				$response_success_count++;
			}

			if (strripos($value->response, 'retryAfterSeconds=30') !== false){
				$response_error_count++;
			}
		}
	}

	$count_users  = count($user_id_array);

	echo "<br>";
	echo "<br>";
	echo "Кол-во поисков: ".$other_search." (Рома: ".$search_roma.")";

	echo "<br>";
	echo "Кол-во пользователей: ".$count_users;

	echo "<br>";
	echo "Кол-во успешных ответов: ".($other_search - $response_error_count);

	echo "<br>";
	echo "Кол-во ошибок (30 сек): ".$response_error_count;

	echo "<br>";
	echo "Процент ошибок (30 сек): ".round( ($response_error_count / $other_search) * 100 ) ."%";

	echo "<br>";
	echo "<br>";
	echo "Пользователи: ";
	$html = '<ul>';
	foreach ($user_id_array as $key => $value) {
	    $user_name = get_post_meta($key, 'user_fio',true);
	    if(!empty($user_name)) {
            $html .= "<li>id: <a target='_blank' href='post.php?post=".$key."&action=edit'>".$user_name."</a> : ".$value."</li>";
        }
	}
	$html .= '</ul>';
	echo $html;

	//pre_print_r($user_id_array);


	exit();
}



// user logs

add_action( 'wp_ajax_get_user_search_logs', 'UserLogs::get_user_search_logs' );

class UserLogs {

	public static function getUserSearches($user_id) {

	}

	public static function updateUserSearches($user_id, $search_data) {

	}

	public static function addSearchLog($data) {
		if ( !is_array($data) ) return;

		global $wpdb;

		// prepare data
		$user_id    = isset($data['user_id']) ? $data['user_id'] : "";

		if ( $user_id === "" ){
			return;
		}

		$project_id = isset($data['project_id']) ? $data['project_id'] : 0;

		// param
		$language = isset($data['language']) ? $data['language'] : '';
		$currency = isset($data['currency']) ? $data['currency'] : '';

		// geo
		$country  = isset($data['country']) ? $data['country'] : '';
		$cities   = isset($data['cities']) ? implode(", ", $data['cities'])  : '';

		// search
		$keywords  = isset($data['keywords']) ? str_replace("\n", ', ', $data['keywords'])  : '';
		$negative_keywords = isset($data['negative_keywords']) ? str_replace("\n", ', ', $data['negative_keywords']) : '';

		// result
		$response = isset($data['response']) ? implode("; ", $data['response']) : '';
		$result_count = isset($data['result_count']) ? $data['result_count'] : '';

		// other
		$strong_search = isset($data['strong_search']) ? $data['strong_search'] : '-';
		$search_system = isset($data['search_system']) ? $data['search_system'] : '';


		// prepare query
		$query_data = array(
			'user_id'       => $user_id,
			'project_id'    => $project_id,
			'type_actions'  => "search",
			'language'      => $language,
			'currency'      => $currency,
			'country'       => $country,
			'cities'        => $cities,
			'search_system' => $search_system,
			'keywords'      => $keywords,
			'negative_keywords' => $negative_keywords,
			'response'      => $response,
			'result_count'  => $result_count,
			'strong_search' => $strong_search
		);
		
		// fields format
		$format = array( '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s' );

		// insert data
		$wpdb->insert('user_logs', $query_data, $format);
    }

    public static function clearUserSearches($user_id){

    }

	public static function get_user_search_logs(){
		global $wpdb;

		$user_id = $_POST['post_id'];
		if (!$user_id) return;

		// prepare query
		$query = "SELECT 
		date_log,
		project_id,
		language,
		currency,
		country,
		cities,
		keywords,
		negative_keywords,
		response,
		result_count,
		search_system,
		strong_search
		FROM user_logs 
		WHERE user_id = $user_id AND type_actions = 'search'
		ORDER BY date_log DESC";

		$search_logs = $wpdb->get_results($query);

		// prepare html
		$table_holder_start = '<div class="admin__user_log__table__holder">';

		$table_holder_end   = "</div>";

		$table_start = '<table class="admin__user_log__table" cellspacing="0" border="1" bgcolor="#F8F8F8" cellpadding="0" >';

		$table_end   = "</table>";

		$table_head = "<thead>
			<th style='width: 100px;'>Дата</th>
			<th style='width: 50px;'>Проект</th>
			<th style='width: 50px;'>Язык</th>
			<th style='width: 50px;'>Валюта</th>
			<th style='width: 50px;'>Страна</th>
			<th style='width: 50px;'>Города</th>
			<th style='width: 50px;'>Поисковая система</th>
			<th style='width: 100px;'>Ключевые слова</th>
			<th style='width: 100px;'>Нег. слова</th>
			<th style='width: 100px;'>Ответ</th>
			<th style='width: 50px;'>Результат</th>
			<th style='width: 50px;'>Строгий п.</th>
		</thead>";

		$table_body = "<tbody>";

		// language code
		$language_str = array(
			'1031' => 'Russian',
			'1036' => 'Ukrainian',
		);

		$country_str = array(
			'2804' => 'Ukraine',
			'2643' => 'Russia'
		);

		$search_system_str = array(
			'1' => 'G',
			'2' => 'Y',
			'3' => 'G + Y'
		);

		if ( is_array($search_logs) ){
			foreach ($search_logs as $key => $value) {

				$language = isset($language_str[$value->language]) ? $language_str[$value->language] : $value->language;
				$country  = isset($country_str[$value->country]) ? $country_str[$value->country] : $value->country;
				$search_system  = isset($search_system_str[$value->search_system]) ? $search_system_str[$value->search_system] : $value->search_system;

				$tr = "<tr>";
				$tr .= "<td style='width: 100px;'>{$value->date_log}</td>";
				$tr .= "<td style='width: 50px;'>{$value->project_id}</td>";
				$tr .= "<td style='width: 50px;'>{$language}</td>";
				$tr .= "<td style='width: 50px;'>{$value->currency}</td>";
				$tr .= "<td style='width: 50px;'>{$country}</td>";
				$tr .= "<td style='width: 50px;'><textarea style='width: 100%; font-size: 12px; height: 60px; min-height: 60px;'>{$value->cities}</textarea></td>";
				$tr .= "<td style='width: 50px;'>{$search_system}</td>";
				$tr .= "<td style='width: 100px;'><textarea style='width: 100%; font-size: 12px; height: 60px; min-height: 60px;'>{$value->keywords}</textarea></td>";
				$tr .= "<td style='width: 100px;'><textarea style='width: 100%; font-size: 12px; height: 60px; min-height: 60px;'>{$value->negative_keywords}</textarea></td>";
				$tr .= "<td style='width: 100px;'>{$value->response}</td>";
				$tr .= "<td style='width: 50px;'>{$value->result_count}</td>";
				$tr .= "<td style='width: 50px;'>{$value->strong_search}</td>";
				$tr .= "</tr>";
				$table_body .= $tr;
			}
		}

		$table_body .= "</tbody>";

		//pre_print_r($search_logs);

		echo $table_start.$table_head.$table_end;

		echo $table_holder_start.$table_start.$table_body.$table_end.$table_holder_end;

	  	exit();
	}

}







/* UTM */
/*
add_action('wp_ajax_nopriv_add_utm_click', 'add_utm_click');
add_action('wp_ajax_add_utm_click', 'add_utm_click');


function add_utm_click(){

	$cur_data = get_option("wps_theme_settings_utm");

	if ( isset($cur_data['click_count']) ){
		$cur_data['click_count']++;
	} else {
		$cur_data['click_count'] = 0;
	}

    update_option( "wps_theme_settings_utm", $cur_data  );

	exit();
}
*/



/* user_logs_regular_users */
add_action( 'wp_ajax_user_logs_regular_users', 'user_logs_regular_users' );

function user_logs_regular_users(){

	global $wpdb;


	$query = "SELECT
	user_id,
	date_log
	FROM user_logs 
	WHERE type_actions = 'search'
	ORDER BY date_log DESC";

	$search_logs = $wpdb->get_results($query);

	// 0 get data
	$user_id_array = array();
	foreach ($search_logs as $key => $value) {
		$user_id_array[$value->user_id]['count'] += 1;
		$user_id_array[$value->user_id]['data'][] = $value->date_log;
	}

	// 1 этап отсеиваем тех у кого меньше 5 операций
	function filterByCount($item) {
		return $item['count'] > 5;
	}
	$user_array_filter_count = array_filter($user_id_array, 'filterByCount');



	// 2 этап получение последней даты и сравнение (меньше чем 30 дней назад)
	function filterByLastDate($item) {
		$today = new DateTime();
		$lastData = $item['data'][0];
		return date_diff($today, new DateTime($lastData))->days < 30;
	}
	$user_array_filter_last_data = array_filter($user_array_filter_count, 'filterByLastDate');

	// 3
	function filterByFirstOnLastDay($item) {
		$firstData = $item['data'][0];
		$lastData = array_pop($item['data']);
		return date_diff(new DateTime($firstData), new DateTime($lastData))->days > 15;
	}
	$user_array_filter_first_last_data = array_filter($user_array_filter_last_data, 'filterByFirstOnLastDay');

	$count_users = count($user_array_filter_first_last_data);

	echo "Постоянные пользователи: ".$count_users;
	echo "<br>";
	$html = '<ul>';
	foreach ($user_array_filter_first_last_data as $key => $value) {
	    $user_name = get_post_meta($key, 'user_fio',true);
	    if(!empty($user_name)) {
            $html .= "<li><a target='_blank' href='post.php?post=".$key."&action=edit'>".$user_name."</a> (".$value['count'].")</li>";
        }
	}
	$html .= '</ul>';
	echo $html;

	// pre_print_r($user_array_filter_first_last_data);

	exit();
}
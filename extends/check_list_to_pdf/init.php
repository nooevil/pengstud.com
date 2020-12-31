<?php

function checkListToPDF($POST){
  header("Content-type: text/css; charset: UTF-8");
  // start
  $result = array();
  // get html
  $form_html = $POST["form_html"];

  // config
  define ( 'ROOT_DIR', dirname( __FILE__ ) );
  $file_name = date("H.i.s") . "_PPC_audit_PenguinTeam.pdf";
  $full_path = ROOT_DIR . "/list/" . $file_name;
  $full_link = trailingslashit(get_stylesheet_directory_uri()) . "extends/check_list_to_pdf/list/" . $file_name;

  // get lib
  require_once(trailingslashit(CHILD_DIR) . 'libs/dompdf/dompdf_config.inc.php'); 

  // prepare html
  $html =
  '<html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="https://pengstud.com/wp-content/themes/pengstud_v2/templates__blog/assets/css/style.css"/>
    </head>
  <body class="check_list_pdf" >
    '.$form_html.'
  </body>
  </html>';

  $dompdf = new Dompdf();
  $dompdf->load_html(stripcslashes($html));
  $dompdf->render();
  $data = $dompdf->output();

  // Сохраняем PDF файл
  file_put_contents($full_path, $data);

  //print_r( $data );

  $result["full_path"] = $full_path;
  $result["full_link"] = $full_link;
  $result["file_name"] = $file_name;
  // send result and exit
  print json_encode($result);
  exit();
}


function checkListToPDF__removeFile($POST){
  // start
  $result = array();
  // get html
  $full_path = $POST["full_path"];

  unlink($full_path);
 
  // send result and exit
  print json_encode($result);
  exit();
}
<?php

/* for AJAX */
add_action( 'wp_ajax_nopriv_wps__ajax_action', 'wps__ajax_action' );
add_action( 'wp_ajax_wps__ajax_action', 'wps__ajax_action' );

function wps__ajax_action(){
  $whatdo = htmlspecialchars($_POST["whatdo"]);
  if ( $whatdo ){
    unset(
      $_POST["action"],
      $_POST["whatdo"]
    );
    $whatdo( $_POST );
  } else {
    echo "actions not found";
  }
  exit();
} 
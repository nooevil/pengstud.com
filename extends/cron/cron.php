<?php
require_once '../../../../../wp-load.php';

if(isset($_GET['key']) && $_GET['key'] == '2fe1325b714edf60f11648e0aa8bbdda' ) {

    if (file_exists(CHILD_DIR.'/users_file')) {
        foreach (glob(CHILD_DIR.'/users_file/*') as $file) {
            unlink($file);
        }
    }
}
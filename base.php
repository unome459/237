<?php

require("filerecordmanager.php");
require("record.php");
require("HTMLPage.php");
require("databasemoviemanager.php");
require("datasource.php");
require("Alert.php");
require("FileOpenException.php");
require("FileWriteException.php");
require("FileCloseException.php");

//$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
 * A real nice print array
 * @param array $array
 */
function printArray(array $array) {
    echo '<pre>' . print_r($array, true) . '</pre>';
}


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
require("comicsearch.php");

//$alert = '<div class="alert alert-%s" role="alert">%s</div>';

$secret = '2b979e4b203eb7680b32d7bf9e63392c49494357';
$apiKey = '92d0c22bf53153f6c082f74ef81573dd';

/**
 * A real nice print array
 * @param array $array
 */
function printArray(array $array) {
    echo '<pre>' . print_r($array, true) . '</pre>';
}


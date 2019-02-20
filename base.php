<?php

$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
 * A real nice print array
 * @param array $array
 */
function printArray(array $array) {
    echo '<pre>' . print_r($array, true) . '</pre>';
}

/**
 * Write to a file
 * @param $file - path to file
 * @param $content - string to write to file
 * @return bool
 */
function writeToFile($file, $content) {
    $fp = fopen($file, 'ab');
    if (!$fp) {
        return false;
    }
    if (!fwrite($fp, $content)) {
        return false;
    }
    if (!fclose($fp)) {
        return false;
    }
    return true;
}
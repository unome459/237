<?php

require ("recordmanagerinterface.php");

class FileRecordManager implements RecordManagerInterface {

    private $path = '';


    function __construct($path) {
        $this->path = $path;
    }

    function create(Record $record) {
        $fp = fopen($this->path, 'ab');
        if (!$fp) {
            return false;
        }
        $content = "$record->movie,$record->director,$record->artist,$record->genre,$record->rating\n";
        if (!fwrite($fp, $content)) {
            return false;
        }
        if (!fclose($fp)) {
            return false;
        }
        return true;
    }
    function read() {
        return file_get_contents($this->path);
    }
    function update() {

    }
    function delete() {

    } //deletes all records

}
$path = "entries.txt";
$FileRecordManager = new FileRecordManager($path);
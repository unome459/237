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
            throw new FileOpenException();
        }
        $content = "$record->movie,$record->director,$record->artist,$record->genre,$record->rating\n";
        if (!fwrite($fp, $content)) {
            throw new FileWriteException();
        }
        if (!fclose($fp)) {
            throw new FileCloseException();
        }
        return true;
    }
    function read() {
        if (($list = file_get_contents($this->path)) == false) {
            throw new FileOpenException();
        }
        return $list;
    }
    function readOneById($id) {
        $list = $this->read();
        $movies = explode("\n", trim($list));
        $movie = explode(',', trim($movies[$id]));
        return new Record($movie[0], $movie[1], $movie[2], $movie[3], $movie[4]);
    }
    function update($id, Record $record) {
        $list = $this->read();
        $movies = explode("\n", trim($list));
        $movies[$id] = "$record->movie,$record->director,$record->artist,$record->genre,$record->rating";
        $content = implode("\n", $movies);
        $content .= "\n";
        $fp = fopen($this->path, 'w');
        fwrite($fp, $content);
        fclose($fp);
        return true;
    }
    function delete() {

    } //deletes all records

}

$path = "entries.txt";
$fileRecordManager = new FileRecordManager($path);
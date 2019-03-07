<?php

interface RecordManagerInterface {
    function create(Record $record);
    function read();
    function update();
    function delete(); //deletes all records
}
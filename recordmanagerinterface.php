<?php

interface RecordManagerInterface {
    function create(Record $movie);
    function read();

    function readOneById($id);

    function update($id, Record $movie);
    function delete(); //deletes all records
}
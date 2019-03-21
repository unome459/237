<?php

class DatabaseMovieManager implements RecordManagerInterface {

    private $connection = null;
    private $host = '';
    private $username = '';
    private $password = '';
    private $dbname = '';

    function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            echo 'Error connecting to' . $this->dbname . '. ' .  $this->connection->connect_errno . ': ' . $this->connection->connect_error;
            exit;
        }
    }

    private function disconnect() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    function testConnect() {
        $this->connect();
        echo "Yes! I am connected to the database $this->dbname!";
        $this->disconnect();
    }

    function create(Record $record) {
        $this->connect();
        $query = "INSERT INTO movie (movie, director, artist, genre, rating) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $movie = $record->movie;
        $director = $record->director;
        $artist = $record->artist;
        $genre = $record->genre;
        $rating = $record->rating;
        $statement->bind_param('ssssi', $movie, $director, $artist, $genre, $rating);
        $statement->execute();
        $this->disconnect();
        if ($statement->affected_rows > 0) {
            return true;
        }
        return false;
    }
    function read(){
        $this->connect();
        $query = "SELECT * FROM movie";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $statement->bind_result($id, $movie, $director, $artist, $genre, $rating);
        $returnString = '';
        while($statement->fetch()) {
            $returnString = "$movie, $director, $artist, $genre, $rating, $id\n";
        }
        $this->disconnect();
        return $returnString;
    }

    function readOneById($id) {

    }

    function update($id, Record $record) {

    }
    function delete() {

    }

}
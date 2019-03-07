<?php

class Record {

    private $movie = '';
    private $director = '';
    private $artist = '';
    private $genre = '';
    private $rating = '';

    function __construct($movie, $director, $artist, $genre, $rating) {
        $this->setMovie($movie);
        $this->setDirector($director);
        $this->setArtist($artist);
        $this->setGenre($genre);
        $this->setRating($rating);
    }

    function __get($attr_name) {
        return $this->$attr_name;
    }

    function __set($attr_name, $value) {
        $attr_name = ucwords($attr_name);
        $function = "set$attr_name";
        $this->$function($value);
        var_dump($function);
    }

    function setMovie($movie) {
        $this->movie = ucwords(trim($movie));
    }
    function setDirector($director) {
        $this->director = ucwords(trim($director));
    }
    function setArtist($artist) {
        $this->artist = ucwords(trim($artist));
    }
    function setGenre($genre) {
        $this->genre = (trim($genre));
    }
    function setRating($rating) {
        $this->rating = ucwords(trim($rating));
    }

}
<?php

class Comic {

    private $nameStartsWith = '';

    function __construct($nameStartsWith) {
        $this->setNameStartsWith($nameStartsWith);
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

    function setNameStartsWith($nameStartsWith) {
        $this->nameStartsWith = $nameStartsWith;
    }

    function __toString()
{
    return Comic::class;
}
}
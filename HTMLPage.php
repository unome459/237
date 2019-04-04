<?php

class HTMLPage {

    private $head = <<<EOT
    <head>
        <meta charset="UTF-8">
        <title>Movies</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="webpage.css">
    </head>
EOT;
    private $body = '';
    private $nav = <<<EOT
    <div class="header">
        <h1>Movie List</h1>
    </div>
    <div class="topnav">
        <a href="index.php">Add Movies</a>
        <a href="movieslist.php">Movies Watched</a>
        <a href="comiccharacters.php">Comic Characters</a>
    </div>
EOT;

    function setHead($head) {
        $this->head= $head;
    }

    function setNav($nav) {
        $this->nav = $nav;
    }

    function setBody($body) {
        $this->body = <<<EOT
        <body class="layered-image">
            $this->nav
            $body
        </body>
EOT;
    }

    function printPage() {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
        $this->head
        $this->body
        </html>
EOT;
    }

}

$htmlPage = new HTMLPage();
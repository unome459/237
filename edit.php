<?php

require("base.php");

$id = null;

if (isset($_GET) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $record = $dataSource->getMovieManager()->readOneById($id);
}

if (isset($_POST) && !empty($_POST)) {
    extract($_POST);
    $record = new Record($movie, $director, $artist, $genre, $rating);
    if ($dataSource->getMovieManager()->update($id, $record)) {
        header('Location: movieslist.php');
    }
}

$body = <<<EOT
<div class="container">
    <div class="row">
        <div class="input">
            <h1 class="text-center">Edit Movie</h1>
            
            <form action="" method="POST" class="form-horizontal">
                <div class="form-group required">
                    <label class="col-md-2 control-label">Movie name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="movie" value="$record->movie" required="">
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-md-2 control-label">Director's name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="director" value="$record->director" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Artist</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="artist" value="$record->artist">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Genres</label>
                    <div class="col-md-10">
                        <select class="form-control" name="genre" value="$record->genre">
                            <option value="none"></option>
                            <option value="Thriller">Thriller</option>
                            <option value="Drama">Drama</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Romance">Romance</option>
                            <option value="Horror">Horror</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Science Fiction">Science Fiction</option>
                            <option value="Action">Action</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Rating</label>
                    <div class="col-md-10">
                        <input type="radio" name="rating" value="one" checked="">1
                        <input type="radio" name="rating" value="two">2
                        <input type="radio" name="rating" value="three">3
                        <input type="radio" name="rating" value="four">4
                        <input type="radio" name="rating" value="five">5
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
EOT;


$htmlPage->setBody($body);
$htmlPage->printPage();
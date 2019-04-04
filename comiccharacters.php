<?php

require("base.php");

extract($_POST);

if (!empty($nameStartsWith)) {
    $ts = rand(1, 1000);
    $comic = new Comic($nameStartsWith);
    $hash = md5($ts . $comic . $secret . $apiKey);
    $url = 'https://gateway.marvel.com/v1/public/characters?ts=' . $ts . 'nameStartsWith=' . $comic . '&apikey=' . $apiKey . '$hash=' . $hash;
} else {
    $ts = rand(1, 1000);
    $hash = md5($ts . $secret . $apiKey);
    $url = 'https://gateway.marvel.com/v1/public/characters?ts=' . $ts . '&apikey=' . $apiKey . '&hash=' . $hash;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

$jsonObject = json_decode($result);

$entry = '';
foreach($jsonObject->data->results as $character) {
    $image = $character->thumbnail->path . '.' . $character->thumbnail->extension;
    $description = $character->description;
    $entry .= <<<EOT
    <li class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="$image" alt="$character->name" style="width: 100px;">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">$character->name</h4>
            $description
        </div>
    </li>
EOT;
}

$body = <<<EOT
<div class="container">
    <div class="input">
        <form action="comiccharacters.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="col-md-10">
                    <input class="form-control" type="text" name="nameStartsWith">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <ul class="media-list">
        $entry
        </ul>
    </div>
</div>
EOT;
$nav = <<<EOT
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="comic-characters.php">
                Comic Characters
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Back to the Movie Log</a></li>
        </ul>
    </div>
</nav>
EOT;
$htmlPage->setNav($nav);
$htmlPage->setBody($body);
$htmlPage->printPage();
<?php

require("base.php");

extract($_POST);

if (!empty($movie) && !empty($director)) {
    $record = new Record($movie, $director, $artist, $genre, $rating);

    try {
        @$dataSource->getMovieManager()->create($record);
        $alert = new Alert("$movie was saved to the " . $dataSource->getSource() . "!", 'success');
        $message = $alert->show();
    } catch (FileOpenException $e) {
        $message = $e;
    } catch (FileWriteException $e) {
        $message = $e;
    } catch (FileCloseException $e) {
        $message = $e;
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
} else {
    $alert = new Alert('Movie name and Director are required.', 'danger');
    $message = $alert->show();
}

$body = <<<EOT
<div class="container">
    <div class="row">
        $message
    </div>
</div>
EOT;

$htmlPage->setBody($body);
$htmlPage->printPage();
<?php

require("base.php");

extract($_POST);

if (!empty($movie) && !empty($director)) {
    $record = new Record($movie, $director, $artist, $genre, $rating);

    if (!$FileRecordManager->create($record)) {
        $message = sprintf("$alert", 'danger', "File could not be written to.");
    } else {
        $message = sprintf("$alert", 'success', "$movie was saved to log!");
    }
} else {
    $message = sprintf("$alert", 'danger', "Movie name and Director are required.");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("head.php") ?>
<body>
<?php require("navbar.php") ?>
<div class="container">
    <div class="row">
        <?php echo $message; ?>
    </div>
</div>
</body>
</html>
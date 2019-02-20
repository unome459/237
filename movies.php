<?php

require("base.php");

extract($_POST);

if (!empty($movie) && !empty($director)) {
    $movie = ucwords(trim($movie));
    $director = ucwords(trim($director));
    $artist = ucwords(trim($artist));
    $genre = (trim($genre));
    $rating = ucwords(trim($rating));
    $content = "$movie,$director,$artist,$genre,$rating\n";

    if (!writeToFile("entries.txt", $content)) {
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
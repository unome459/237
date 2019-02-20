<?php

require("base.php");
/**
 * Chose POST as it seemed like the safer option in terms of data security.
 * It appears that POST is also the more popular choice in the general public because of the above reason.
 */
extract($_POST);

if (!empty($movie) && (!empty($director))) {
    $movie = ucwords(trim($movie));
    $director = ucwords(trim($director));
    $artist = ucwords(trim($artist));
    $genre = trim($genre);
    $rating = ucwords(trim($rating));
    $content = "$movie,$director,$artist,$genre,$rating\n";

    if (!writeToFile('entries.txt', $content)) {
        $message = sprintf("$alert", 'danger', "File could not be written to.");
    } else {
        $message = sprintf("$alert", 'success', "$movie got saved in the log!");
    }
} else {
    $message = sprintf("$alert", 'danger', "Required fields must be filled.");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("head.php") ?>
<body>
<?php require("navbar.php") ?>
<?php echo $message; ?>
</body>
</html>

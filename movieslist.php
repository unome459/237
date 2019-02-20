<?php

require("base.php");

$list = file_get_contents("entries.txt");
$movie_log = explode("\n", trim($list));
$table_body = '';

foreach ($movie_log as $entry) {
    $movie = explode(',', trim($entry));
    $table_body .= '<tr>';
    $table_body .= '<td>' . $movie[0] . '</td>';
    $table_body .= '<td>' . $movie[1] . '</td>';
    $table_body .= '<td>' . $movie[2] . '</td>';
    $table_body .= '<td>' . $movie[3] . '</td>';
    $table_body .= '<td>' . $movie[4] . '</td>';
    $table_body .= '</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require("head.php") ?>
<body>
<?php require("navbar.php") ?>

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Movie Name</th>
                <th>Director Name</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Rating (Out of 5)</th>
            </tr>
            </thead>
            <tbody>
                <?php echo $table_body; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

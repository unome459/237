<?php

require ("base.php");

$dataSourceStatus = $dataSource->getStatus();
$buttons = $dataSource->buttons();

try {
    $data = @$dataSource->getMovieManager()->read();
    $table_body = $dataSource->list1($data);
} catch (FileOpenException $e) {
    $table_body = $e;
} catch (Exception $e) {
    $table_body = $e->getMessage();
}
$body = <<<EOT
<div class="container">
    <div class="row">
    <p class="bg-info">$dataSourceStatus</p>
    $buttons
        <table class="table">
            <thead>
            <tr>
                <th>Movie Name</th>
                <th>Director Name</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Rating (Out of 5)</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
                $table_body
            </tbody>
        </table>
    </div>
</div>
EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();

?>


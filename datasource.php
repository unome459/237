<?php

class DataSource {

    public function getSource() {
        if (isset($_GET['source'])) {
            return $_GET['source'];
        } else {
            return 'file';
        }
    }

    public function getStatus() {
        $source = $this->getSource();
        return "Currently connected to the $source!";
    }

    public function getMovieManager() {
        $manager = null;
        if ($this->getSource() == 'file') {
            $path = "entries.txt";
            $manager = new FileRecordManager($path);
        } else if ($this->getSource() == 'database') {
            $manager = new DatabaseMovieManager('localhost', 'uw', '', 'movie_log');
        }
        return $manager;
    }

    public function buttons() {
        $buttons = <<<EOT
        <a class="btn-default btn-xs" href="?source=file" role="button">File</a>
        <a class="btn-default btn-xs" href="?source=database" role="button">Database</a>
EOT;
        return $buttons;
    }

    public function list1($data) {
        $source = $this->getSource();
        $function = "listFrom$source";
        return $this->$function($data);
    }

    private function listFromFile($data) {
        $movies = explode("\n", trim($data));
        $table_body = '';

        foreach ($movies as $key => $entry) {
            $movie = explode(',', trim($entry));
            $table_body .= '<tr>';
            $table_body .= '<td>' . $movie[0] . '</td>';
            $table_body .= '<td>' . $movie[1] . '</td>';
            $table_body .= '<td>' . $movie[2] . '</td>';
            $table_body .= '<td>' . $movie[3] . '</td>';
            $table_body .= '<td>' . $movie[4] . '</td>';
            $table_body .= '<td><a href="edit.php?id=' . $key . '&source=' . $this->getSource() . '" class="btn btn-info btn-sn">Edit</a></td>';
            $table_body .= '</tr>';
        }
        return $table_body;
    }

    private function listFromDatabase($data) {
        $movies = explode("\n", trim($data));
        $table_body = '';

        foreach ($movies as $key => $entry) {
            $movie = explode(',', trim($entry));
            $table_body .= '<tr>';
            $table_body .= '<td>' . $movie[0] . '</td>';
            $table_body .= '<td>' . $movie[1] . '</td>';
            $table_body .= '<td>' . $movie[2] . '</td>';
            $table_body .= '<td>' . $movie[3] . '</td>';
            $table_body .= '<td>' . $movie[4] . '</td>';
            $table_body .= '<td><a href="edit.php?id=' . trim($movie[5]) . '&source=' . $this->getSource() . '" class="btn btn-info btn-sn">Edit</a></td>';
            $table_body .= '</tr>';
        }
        return $table_body;
    }

}

$dataSource = new DataSource();
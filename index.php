<?php

require_once 'vendor/autoload.php';
require_once 'Database.php';
require_once 'Constants.php';
require_once 'User.php';

use Asan\PHPExcel\Excel;
use Asan\PHPExcel\Reader\Csv;

$reader = Excel::load('src/data.csv', function (Csv $reader) {
    $reader->setRowLimit(7);
    $reader->setColumnLimit(5);

});

$database = new Database(Constants::DATABASE_USERNAME, Constants::DATABASE_PASSWORD, "task1");

while ($reader->current()) {
    $item = $reader->current();
    if (is_numeric($item[0])) {
        $user = new User($item[0], $item[1], $item[2], $item[3], $item[4]);
        $database->addOrUpdateItem($user);
    }
    echo '<br>';
    $reader->next();
}
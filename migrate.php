<?php
require_once 'app/core/Database.php';
Db::connect();
function getMigration($directory) {
    $scan = scandir($directory);

    foreach ($scan as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $directory . DIRECTORY_SEPARATOR . $item;

        if (is_dir($path)) {
            getMigration($path);
        } else {
            if ($item === '_migration.php') {
                require_once $path;
            }
        }
    }
}

getMigration(__DIR__);
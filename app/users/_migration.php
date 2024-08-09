<?php

Db::createTable('users', [
    'id' => 'INTEGER PRIMARY KEY',
    'name' => 'VARCHAR(255)',
    'email' => 'VARCHAR(255) UNIQUE',
    'password' => 'VARCHAR(255)',
    'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP'
]);
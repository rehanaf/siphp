<?php

Db::createTable('blog', [
    'id' => 'INTEGER PRIMARY KEY',
    'userId' => 'INTEGER',
    'title' => 'VARCHAR(255)',
    'content' => 'TEXT',
    'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
    'FOREIGN KEY (userId)' => 'REFERENCES users(id)'
]);

Db::create('blog', [
    'title' => 'Hello World',
    'content' => 'Hello world is the beginning of the the the.',
    'userId' => '1'
]);
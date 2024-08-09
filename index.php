<?php
if (!session_id()) session_start();

require_once 'app/init.php';

Db::connect();
$app = new App;

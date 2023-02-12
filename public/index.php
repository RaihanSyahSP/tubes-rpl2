<?php
// header("Accept-Language: id,en;q=0.9");
if (!session_id()) {
    session_start();
}

error_reporting(E_ALL);
require_once '../app/init.php';
// require_once '../app/core/Constans.php';

$app = new App;


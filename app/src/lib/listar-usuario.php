<?php

require_once '../classes/DB.php';
require_once '../classes/User.php';

$result = User::list();

header('Access-Control-Allow-Headers: *');
header('Content-type: application/json; charset=utf8');

echo json_encode($result, JSON_UNESCAPED_UNICODE);
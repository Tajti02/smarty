<?php
const PARAMS = [
    "HOST" => 'localhost',
    "USER" => 'root',
    "PASSWORD" => '',
    "DB" => 'praxa',
    "CHARSET" => 'utf8'
];
$dsn = "mysql:host=" . PARAMS['HOST'] . ";
dbname=" . PARAMS['DB'] . ";charset=" . PARAMS['CHARSET'];

$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
$userOnPage = 5;

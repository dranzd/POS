<?php

$dbInfo = require_once 'config/db.php';

$host     = $dbInfo['host'];
$username = $dbInfo['username'];
$password = $dbInfo['password'];
$database = $dbInfo['database'];
$port     = $dbInfo['port'];

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_errno) {
    die("Connection failed: ".$conn->connect_error);
}

$GLOBALS['con'] = $conn;

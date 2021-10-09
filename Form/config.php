<?php
include_once("mysql.class.php");
$servername = "db_host";
$username = "db_username";
$password = "db_passowrd";
$dbname = "db_name";

$MySQLiObject = new MySQLiObject;
$MySQLiObject -> connect($servername, $username, $password, $dbname);

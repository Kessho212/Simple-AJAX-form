<?php
include_once("mysql.class.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie";

$MySQLiObject = new MySQLiObject;
$MySQLiObject -> connect($servername, $username, $password, $dbname);
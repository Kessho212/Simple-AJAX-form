<?php
header("Content-Type: application/json; charset=UTF-8");
include_once("config.php");
$sortVal = $_GET["sort"];
$sql = "SELECT * FROM pojazd ORDER BY pojazd.$sortVal";
$result = $MySQLiObject -> select($sql);

echo json_encode($result);
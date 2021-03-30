<?php
include_once("config.php");
$id = $_GET['id'];
$sql = "DELETE FROM pojazd WHERE pojazd.id = $id";
$MySQLiObject -> delete($sql);
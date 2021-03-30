<?php
include_once("config.php");
$id = $_GET['id'];
$model = $_GET['model'];
$marka = $_GET['marka'];
$rok_produkcji = $_GET['rok_produkcji'];
$sql = "UPDATE pojazd SET model = '$model', marka = '$marka', rok_produkcji = '$rok_produkcji' WHERE pojazd.id = $id;";
$MySQLiObject -> insert($sql);
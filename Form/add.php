<?php
include_once("config.php");
$model = $_GET['model'];
$marka = $_GET['marka'];
$rok_produkcji = $_GET['rok_produkcji'];
$sql = "INSERT INTO pojazd (id, model, marka, rok_produkcji) VALUES (NULL, '$model', '$marka', '$rok_produkcji');";
$MySQLiObject -> insert($sql);
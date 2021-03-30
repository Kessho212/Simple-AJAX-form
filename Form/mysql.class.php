<?php
class MySQLiObject{
  private $conn;
  
  function connect($servername, $username, $password, $dbname){
    $conn = new mysqli($servername, $username, $password, $dbname);
    $this->conn = $conn;
    $sql="SET CHARACTER SET utf8";
    $conn->query($sql);
    return $conn;
  }
    
  function insert($sql){
    $conn = $this->conn;
    $conn->query($sql);
  }

  function select($sql){
    $conn = $this->conn;
    $result = $conn->query($sql);
    $Array = [];
    while($row = mysqli_fetch_assoc($result)) {
        array_push($Array, $row);
    }
    return $Array;
  }

  function delete($sql){
    $conn = $this->conn;
    $conn->query($sql);
  }
}
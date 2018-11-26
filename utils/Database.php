<?php

class Database {
  
  private function __construct() {
  }

  public static function connect($dbName) {
    try {
      $conn = new PDO("mysql:host=localhost;dbname=$dbName","user","password");
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      print $e;
    }
    return $conn;
  }
}
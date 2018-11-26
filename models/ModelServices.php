<?php

include 'utils/Database.php';

class ModelServices {
  private $conn;

  public function __construct() {
    //$this->conn = Database::connect('database_name');
  }

  public function sampleModel() {
    // Model code goes here
    $this->conn = null;
  }
}

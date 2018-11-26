<?php

include 'models/ModelServices.php';
include 'views/View.php';

class ControllerHelloWorld {
  private $model;
  private $view;
  
  public function __construct() {
    //$this->model = new ModelServices();
    $this->view = new View();
  }

  public function printMessage() {

    $data = array(
      'data' => 'Hello World!'
    );

    $templates = array(
      '1' => 'welcome.php'
    );

    $this->view->configureView($templates, $data);
    $this->view->displayView();
  }
}

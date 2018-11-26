<?php

include 'models/ModelServices.php';
include 'views/View.php';

class ControllerWelcome {
  private $args;
  private $model;
  private $view;
  
  public function __construct($args) {
    $this->args = $args;
    //$this->model = new ModelServices();
    $this->view = new View();
  }

  public function printMessage() {
    // Target code goes here
    $data = array(
      'data' => 'Hello World ' . $this->args 
    );

    $templates = array(
      '1' => 'welcome.php'
    );

    $this->view->configureView($templates, $data);
    $this->view->displayView();
  }
}

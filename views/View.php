<?php

class View {
  private $templates;
  private $data;

  public function configureView($templates, $data = array()) {
    $this->templates = $templates;
    $this->data = $data;
  }

  public function displayView() {
    $data = $this->data;
    foreach( $this->templates as $template ) {
      include 'templates/' . $template;
    }
  }

}
<?php

class Route {
  private $name; # route's name
  private $requestMethod; # method of the reques
  private $controller; # name of the controller to be called
  private $controllerMethod; # name of the controller method to be called
  private $hasArgs; # true if route has args
  private $args; # array of arguments to be passed to the controller method

  public function __construct($name, $requestMethod, $target, $hasArgs = true) {
    $this->name = $name;
    $this->requestMethod = $requestMethod;
    $this->parseTarget($target);
    $this->hasArgs = $hasArgs;
  }

  private function parseTarget($target) {
    $targets = explode(':', $target);
    $this->controller = $targets[0];
    $this->controllerMethod = $targets[1];
  }

  public function hasArgs() {
    return $this->hasArgs;
  }

  public function getName() {
    return $this->name;
  }

  public function getRequestMethod() {
    return $this->requestMethod;
  }

  public function getController() {
    return $this->controller;
  }

  public function getAction() {
    return $this->controllerMethod;
  }

  public function getArgs() {
    return $this->args;
  }

  public function setArgs($args) {
    $this->args = $args;
  }
}
<?php

class RouteCollection {
  private $routes; # collection of routes

  public function __construct() {
    $this->routes = array();
  }

  public function addRoute(Route $route) {
    array_push($this->routes, $route);
  }

  public function getRoutes() {
    return $this->routes;
  }
}
<?php

class Router {

  private $uri;
  private $method;
  private $routes = array();
  private $route;

  public function __construct(RouteCollection $routes) {
    $this->routes = $routes->getRoutes();
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];

    // Match route
    $this->matchRoute();
    if ( empty($this->route) ) {
      print 'No route found';
      exit(0);
    }
  }

  private function matchRoute() {    
    // Get arg from uri 
    preg_match('/[&:a-zA-Z0-9]*$/', $this->uri, $arg);

    // Route has args
    if ( ! empty($arg[0]) ) {
      $hasArgs = true;
      $routeArg = $arg[0];
      $routeName = substr($this->uri, 0, - (strlen($routeArg)));
    } else {
      $hasArgs = false;
      $routeName = $this->uri;
    }

    foreach ($this->routes as $route) {
      if ( $route->getName() === $routeName &&
             $route->hasArgs() === $hasArgs &&
             strtoupper($route->getRequestMethod()) === $this->method) {

        $this->route = $route;
        // Route has args
        if ( $this->route->hasArgs() ) {
          $this->route->setArgs($routeArg);
        } 
        return;
      } 
    }

    // No route found
    $this->route = '';
  }

  public function routeToController() {
    $controller = $this->route->getController();
    $action = $this->route->getAction();

    // Route contains a redirect
    if ( $controller === 'redirect' ) {
      header('Location: ' . $action);
      return;
    }

    include 'controllers/' . $controller . '.php';

    // Get args from request
    switch ( $this->method ) {
      case 'GET':
        $data = $this->route->getArgs();
        break;
      case 'POST':
        $data = $this->route->getArgs();
        break;
      case 'PUT':
        parse_str(file_get_contents('php://input'), $data);
        break;
      case 'DELETE':
        parse_str(file_get_contents('php://input'), $data);
        break;
    }
    
    // Call controller
    $c = new $controller($data);
    $c->$action();
  }

  public function getUri() {
    return $this->uri;
  }

  public function printRoutes() {
    foreach ( $this->routes as $route ) {
      print $route->getName();
    }
  }
}

?>

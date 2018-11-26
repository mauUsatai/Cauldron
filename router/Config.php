<?php

include('Route.php');
include('RouteCollection.php');

$routes = new RouteCollection();
# $routes->addRoute(new Route('name', 'method', 'controller.controllerMethod', 'hasArgs');

### ROUTES
# GET
// Example of redirect
$routes->addRoute(new Route('/cauldron/', 'get', 'redirect:/get/hello/world/', false));
// Example of route to controller without arguments
$routes->addRoute(new Route('/get/hello/world/', 'get', 'ControllerHelloWorld:printMessage', false));
// Example of route to controller with arguments
$routes->addRoute(new Route('/get/hello/world/', 'get', 'ControllerWelcome:printMessage', true));

# POST
# $routes->addRoute(new Route('controller', 'post', 'controllerTest1.getVar'));

# PUT
# $routes->addRoute(new Route('controller', 'put', 'controllerTest.getVar'));

# DELETE
# $routes->addRoute(new Route('controller', 'delete', 'controllerTest.getVar'));

?>
<?php

include('router/Router.php');
include('router/Config.php');

$router = new Router($routes);
$router->routeToController();



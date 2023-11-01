<?php
namespace Desafio\Lib\Router;

use Desafio\Lib\MapperJsonModel\factory\MapFactory;
use Desafio\Lib\Router\Entities\Route;

class Router {
  private array $routes;
  function __construct() {
    $this->routes = [];
  }

  public function addRoute(string $method, string $route, $handler) {
    if($method != "GET" && $method != "POST" && $method != "PUT" && $method != "DELETE"){
      echo "metodo não permitido";
      return;
    }

    $newRoute = new Route($route, $method, $handler);
    array_push( $this->routes, $newRoute);
  }

  public function cors(string $origin): void {
    header("Access-Control-Allow-Origin: $origin");
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
      header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
      header('Access-Control-Allow-Headers: Content-Type');
      exit();
    }
  }

  public function validationRequest(){
    $requestUri = $_SERVER["REQUEST_URI"];
    $requestUri = explode("?", $requestUri)[0];
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    header('Content-Type: application/json');
    $routeExists = false;

    foreach ($this->routes as $route ) {
      $pattern = $route->getRoute();
      if ($pattern == $requestUri && $route->getMethod() == $requestMethod) {
        $routeExists = true;
        $result = $route->getHandler();
        echo "$result\n";
        break;
      }
    }
    if(!$routeExists){
      http_response_code(404);
      echo json_encode(["error" => "rota não cadastrada\n"]);
    }
  }
}


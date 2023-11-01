<?php
namespace Desafio;

require_once(__DIR__ . '/../vendor/autoload.php');

use Desafio\Repositories\factory\CrudFactory;
use Desafio\Service\EmployeeService;
use Desafio\Service\OfficeService;
use Desafio\Controller\EmployeeController;
use Desafio\Controller\OfficeController;
use \Desafio\Lib\Router\Router;

$router = new Router();
$router->cors('http://localhost:5173');

$crudFactory = new CrudFactory();
$employeeService = new EmployeeService($crudFactory);
$officeService = new OfficeService($crudFactory);
$employeeController = new EmployeeController($employeeService);
$officeController = new OfficeController($officeService);

$indexHandler = function () {
  http_response_code(200);
  return json_encode(
    array(
      'message' => 'Index Route',
      'author' => 'Jonatas de Lima'
    )
  );
};

$employeeHandlers = [
  array($employeeController, "getAll"),
  array($employeeController, "getById"),
  array($employeeController, "insert"),
  array($employeeController, "remove"),
  array($employeeController, "update"),
];

$officeHandlers = [
  array($officeController, "getAll"),
  array($officeController, "getById"),
  array($officeController, "insert"),
  array($officeController, "remove"),
  array($officeController, "update"),
];

$router->addRoute("GET", "/", $indexHandler);

$router->addRoute("GET", "/employees", $employeeHandlers[0]);
$router->addRoute("GET", "/employees/id", $employeeHandlers[1]);
$router->addRoute("POST", "/employees", $employeeHandlers[2]);
$router->addRoute("DELETE", "/employees", $employeeHandlers[3]);
$router->addRoute("PUT", "/employees", $employeeHandlers[4]);

$router->addRoute("GET", "/offices", $officeHandlers[0]);
$router->addRoute("GET", "/offices/id", $officeHandlers[1]);
$router->addRoute("POST", "/offices", $officeHandlers[2]);
$router->addRoute("DELETE", "/offices", $officeHandlers[3]);
$router->addRoute("PUT", "/offices", $officeHandlers[4]);

$router->validationRequest();

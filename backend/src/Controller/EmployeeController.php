<?php
namespace Desafio\Controller;

use Desafio\Lib\MapperJsonModel\factory\MapFactory;
use Desafio\Service\EmployeeService;

class EmployeeController
{
  private EmployeeService $service;
  function __construct(EmployeeService $service)
  {
    $this->service = $service;
  }

  public function getAll()
  {
    try {
      http_response_code(200);
      $employees = $this->service->findAllEmployees();
      return json_encode(array("employees" => $employees));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array("error" => $e->getMessage()));
    }
  }

  public function getById()
  {
    try {
      $id = $_GET["id"];
      http_response_code(200);
      $employees = $this->service->findByIdEmployee($id);
      return json_encode(array("employee" => $employees));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array("error" => $e->getMessage()));
    }
  }

  public function insert()
  {
    try {
      $data = json_decode(file_get_contents('php://input'), true);
      $jsonToModel = MapFactory::jsonToModel($data);

      http_response_code(201);
      header('Content-Type: application/json');
      $employee = $this->service->saveEmployee($jsonToModel);
      return json_encode(array("employee" => $employee));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array("error" => $e->getMessage()));
    }
  }

  public function remove()
  {
    try {
      $id = $_GET["id"];
      $deleteEmployee = $this->service->deleteEmployee($id);
      http_response_code(200);
      return json_encode(array("message" => $deleteEmployee));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array("error" => $e->getMessage()));
    }
  }

  public function update()
  {
    try {
      $id = $_GET["id"];
      $data = json_decode(file_get_contents('php://input'), true);
      $jsonToModel = MapFactory::jsonToModel($data);

      http_response_code(200);
      header('Content-Type: application/json');
      $employee = $this->service->updateEmployee($jsonToModel, $id);
      return json_encode(array("employee" => $employee));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array("error" => $e->getMessage()));
    }
  }
}

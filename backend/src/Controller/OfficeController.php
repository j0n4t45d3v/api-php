<?php
namespace Desafio\Controller;

use Desafio\Lib\MapperJsonModel\factory\MapFactory;
use Desafio\Service\OfficeService;

class OfficeController
{
  private OfficeService $service;

  public function __construct(OfficeService $service)
  {
    $this->service = $service;
  }

  public function getAll()
  {
    try {
      $offices = $this->service->getList();
      http_response_code(200);
      return json_encode(array('offices' => $offices));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array('error' => $e->getMessage()));
    }
  }

  public function getById()
  {
    try {
      $id = $_GET['id'];
      $office = $this->service->getById($id);
      http_response_code(200);
      return json_encode(array('office' => $office));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array('error' => $e->getMessage()));
    }
  }

  public function insert()
  {
    try {
      $data = json_decode(file_get_contents('php://input'), true);
      $jsonToModel = MapFactory::jsonToModel($data);
      $office = $this->service->create($jsonToModel);

      // header('Location: /office/'. $office, true, 201);

      http_response_code(201);
      return json_encode(array('office' => $office));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array('error' => $e->getMessage()));
    }
  }

  public function remove()
  {
    try {
      $id = $_GET['id'];
      $this->service->delete($id);
      http_response_code(200);
      return json_encode(array('message' => 'Cargo delete'));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array('error' => $e->getMessage()));
    }
  }

  public function update()
  {
    try {
      $id = $_GET['id'];
      $data = json_decode(file_get_contents('php://input'), true);
      $jsonToModel = MapFactory::jsonToModel($data);
      $office = $this->service->updateOffice($jsonToModel, $id);
      http_response_code(200);
      return json_encode(array('office' => $office));
    } catch (\Exception $e) {
      http_response_code(500);
      return json_encode(array('error' => $e->getMessage()));
    }
  }
}

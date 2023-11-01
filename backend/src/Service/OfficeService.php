<?php
namespace Desafio\Service;

use Desafio\Model\Office;
use Desafio\Repositories\factory\CrudFactory;

class OfficeService
{
  private CrudFactory $factoryRepository;

  public function __construct(CrudFactory $factoryRepository)
  {
    $this->factoryRepository = $factoryRepository;
  }

  public function create(Office $office)
  {
    $this->factoryRepository->insert($office);
    return $office;
  }

  public function updateOffice(Office $office, int $id)
  {
    $this->factoryRepository->update($office, $id);
    return "Cargo atualizado!";
  }

  public function delete(int $id)
  {
    $this->factoryRepository->delete("office", $id);
  }

  public function getById(int $id)
  {
    $officeFound = $this->factoryRepository->findById("office", $id);

    if (empty($officeFound)) {
      throw new \Exception("Cargo não encontrado!");
    }

    return $officeFound;
  }

  public function getList()
  {
    return $this->factoryRepository->findAll("office");
  }
}

<?php
namespace Desafio\Service;

use Desafio\Model\Employee;
use Desafio\Repositories\factory\CrudFactory;

class EmployeeService {
  private CrudFactory $factoryRepository;

  public function __construct(CrudFactory $factoryRepository) {
    $this->factoryRepository = $factoryRepository;
  }

  public function saveEmployee(Employee $employee){
    return $this->factoryRepository->insert($employee);
  }

  public function updateEmployee(Employee $employee, int $id){
    $employeeFound = $this->factoryRepository->findById("employee", $id);

    if(!$employeeFound){
      throw new \Exception("Funcionário não encontrado!");
    }

    return $this->factoryRepository->update($employee, $id);
  }

  public function deleteEmployee(int $id){
    return $this->factoryRepository->delete("employee", $id);
  }

  public function findAllEmployees(){
    $employeesFound = $this->factoryRepository->findAll("employee");
    $arrayEmployees = [];

    foreach ($employeesFound as $employee) {
      if ($this->isEmployeeBirthdate($employee["birthdate"])){
        $employee["message"] = "Parabéns por mais um ano de vida, Tenhas um dia repleto de felicidades.";
      }
      array_push($arrayEmployees, $employee);
    }
    return $arrayEmployees;
  }

  public function findByIdEmployee($id) {
    $employeeFound = $this->factoryRepository->findById("employee", $id);
    if (!$employeeFound){
      throw new \Exception("Funcionário não encontrado!");
    }
    return $employeeFound;
  }

  private function isEmployeeBirthdate($birthdate){
    $today = date("Y-m-d");
    $explodeToday = explode("-", $today);
    $explodeBirthdate = explode("-", $birthdate);

    $monthDayToday = "$explodeToday[1]-$explodeToday[2]";
    $monthDayBirthdate = "$explodeBirthdate[1]-$explodeBirthdate[2]";

    return $monthDayBirthdate == $monthDayToday;

  }
}

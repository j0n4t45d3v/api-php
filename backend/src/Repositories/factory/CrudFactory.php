<?php
namespace Desafio\Repositories\factory;

use Desafio\Model\Employee;
use Desafio\Model\Office;
use Desafio\Repositories\implementation\EmployeeRepositoryImpl;
use Desafio\Repositories\implementation\OfficeRepositoryImpl;

class CrudFactory {
  public function insert ($object) {
    switch (get_class($object)){
      case Employee::class:
        return EmployeeRepositoryImpl::insert($object);
      case Office::class:
        return OfficeRepositoryImpl::insert($object);
    }
  }

  public function update ($object, int $id) {
    switch (get_class($object)){
      case Employee::class:
        return EmployeeRepositoryImpl::update($object, $id);
      case Office::class:
        return OfficeRepositoryImpl::update($object, $id);
    }
  }

  public function delete (string $type, int $id) {
    switch ($type){
      case "employee":
        return EmployeeRepositoryImpl::delete($id);
      case "office":
        return OfficeRepositoryImpl::delete($id);
    }
  }

  public function findAll (string $type) {
    switch ($type){
      case "employee":
        return EmployeeRepositoryImpl::findAll();
      case "office":
        return OfficeRepositoryImpl::findAll();
    }
  }

  public function findById(String $type, int $id) {
    switch($type) {
      case "employee":
        return EmployeeRepositoryImpl::findById($id);
      case "office":
        return OfficeRepositoryImpl::findById($id);
    }
  }

}

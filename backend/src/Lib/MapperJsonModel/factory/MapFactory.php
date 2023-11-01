<?php
namespace Desafio\Lib\MapperJsonModel\factory;
use Desafio\Lib\MapperJsonModel\implementation\JsonToEmployee;
use Desafio\Lib\MapperJsonModel\implementation\JsonToOffice;

class MapFactory {
  public static function jsonToModel(array $data) {
    $isOfficeOrEmployee = count($data) == 5 ? "Employee" : "Office";

    switch ($isOfficeOrEmployee) {
      case 'Employee':
        return JsonToEmployee::map($data);
      case 'Office':
        return JsonToOffice::map($data);
      default:
        throw new \Exception("Error Processing Request", 1);
    }
  }
}

<?php
namespace Desafio\Lib\MapperJsonModel\implementation;
use Desafio\Lib\MapperJsonModel\Mapper;
use Desafio\Model\Employee;
use Desafio\Model\Office;

class JsonToEmployee implements Mapper{

  public static function map(array $data){
    $name = $data["name"];
    $lastname = $data["lastname"];
    $birthdate = $data["birthdate"];
    $salary = $data["salary"];
    $office = $data["office"];

    return new Employee($name, $lastname, $birthdate, $salary, $office);
  }

}

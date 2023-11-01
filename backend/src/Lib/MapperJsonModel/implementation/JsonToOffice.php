<?php
namespace Desafio\Lib\MapperJsonModel\implementation;
use Desafio\Lib\MapperJsonModel\Mapper;
use Desafio\Model\Office;

class JsonToOffice implements Mapper{

  public static function map(array $data){
    return new Office($data["description"]);
  }

}

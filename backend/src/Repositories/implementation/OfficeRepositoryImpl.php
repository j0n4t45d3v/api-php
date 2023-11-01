<?php
namespace  Desafio\Repositories\implementation;
use Desafio\Config\Database;
use Desafio\Repositories\ICrudRepository;

class OfficeRepositoryImpl implements ICrudRepository{
  private static $table = 'offices';

  public static function insert($object){
    $con = Database::connect();
    $sql = "INSERT INTO ".self::$table." (description) VALUES (:description)";

    $stmt = $con->prepare($sql);
    $stmt->bindValue(':description', $object->getDescription());
    $stmt->execute();

    if($stmt->rowCount() > 0){
      return $con->lastInsertId();
    }else{
      throw new \Exception("Erro ao cadastrar cargo!");
    }

  }
  public static function update($object, int $id){
    $con = Database::connect();
    $sql = "UPDATE ".self::$table." SET description = :description WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':description', $object->getDescription());
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
      return "Cargo atualizado com sucesso!";
    }else{
      throw new \Exception("Erro ao atualizar cargo!");
    }
  }
  public static function delete(int $id){
    $con = Database::connect();
    $sql = "DELETE FROM ".self::$table." WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
      return "Cargo deletado com sucesso!";
    }else{
      throw new \Exception("Erro ao deletar cargo!");
    }
  }
  public static function findAll(){
    $con = Database::connect();
    $sql = "SELECT * FROM ".self::$table;
    $stmt = $con->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public static function findById(int $id) {
    $con = Database::connect();

    $sql = "SELECT * FROM ".self::$table." WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
}

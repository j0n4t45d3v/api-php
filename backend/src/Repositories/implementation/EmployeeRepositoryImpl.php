<?php
namespace Desafio\Repositories\implementation;

use Desafio\Config\Database;
use Desafio\Model\Employee;
use Desafio\Repositories\ICrudRepository;

class EmployeeRepositoryImpl implements ICrudRepository {
  private static $table = 'employees';

  public static function insert($employee){
    $con = Database::connect();

    $sql = "INSERT INTO ".self::$table." (name, lastname, birthdate, salary, office_id) VALUES (:name, :lastname, :birthdate, :salary, :office_id)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':name', $employee->getName());
    $stmt->bindValue(':lastname', $employee->getLastname());
    $stmt->bindValue(':birthdate', $employee->getBirthdate());
    $stmt->bindValue(':salary', $employee->getSalary());
    $stmt->bindValue(':office_id', 5);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      return $con->lastInsertId();
    }else{
      throw new \Exception("Erro ao cadastrar funcionário!");
    }
  }
  public static function update($employee, int $id){
    $con = Database::connect();

    $sql = "UPDATE ".self::$table." SET name = :name, lastname = :lastname, birthdate = :birthdate, salary = :salary WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':name', $employee->getName());
    $stmt->bindValue(':lastname', $employee->getLastname());
    $stmt->bindValue(':birthdate', $employee->getBirthdate());
    $stmt->bindValue(':salary', $employee->getSalary());
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      return "Funcionário atualizado com sucesso!";
    }else{
      throw new \Exception("Erro ao atualizar funcionário!");
    }
  }
  public static function delete(int $id){
    $con = Database::connect();

    $sql = "DELETE FROM ".self::$table." WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      return "Funcionário deletado com sucesso!";
    }else{
      throw new \Exception("Erro ao deletar funcionário!");
    }
  }
  public static function findAll(){
    $con = Database::connect();

    $sql = "SELECT * FROM ".self::$table." AS emp INNER JOIN offices AS ofc ON emp.office_id = ofc.id";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  public static function findById(int $id) {
    $con = Database::connect();

    $sql = "SELECT * FROM ".self::$table." AS emp INNER JOIN offices AS ofc ON emp.office_id = ofc.id WHERE emp.id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
}

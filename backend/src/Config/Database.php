<?php

namespace Desafio\Config;

class Database
{
  public static function connect()
  {

    try {
      $connect = new \PDO(DRIVER . ":host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORDDB);
      self::createTablesIfNotExists($connect);
      return $connect;
      // return new \PDO("mysql:host=localhost;dbname=desafio", "root", "senhasecreta");
    } catch (\PDOException $e) {
      $errorMessage = "Erro ao conectar ao banco de dados: " . $e->getMessage();
      http_response_code(500);

      // log( $e->getTraceAsString());
      echo json_encode(array("message" => $errorMessage, "status" => "internal server error"));
      exit;
    }
  }

  private static function createTablesIfNotExists(\PDO $connect)
  {
    $sql = "CREATE TABLE IF NOT EXISTS `offices` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `description` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

    CREATE TABLE IF NOT EXISTS `employees` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL,
      `lastname` VARCHAR(255) NOT NULL,
      `birthdate` DATE NOT NULL,
      `salary` REAL NOT NULL,
      `office_id` INT NOT NULL,
      PRIMARY KEY (`id`),
      FOREIGN KEY (`office_id`) REFERENCES `offices`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
  }
}

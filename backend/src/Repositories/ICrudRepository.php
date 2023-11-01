<?php
namespace Desafio\Repositories;

interface ICrudRepository {
  public static function insert($object);
  public static function update($object, int $id);
  public static function delete(int $id);
  public static function findAll();
  public static function findById(int $id);
}

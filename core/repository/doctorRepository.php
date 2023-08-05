<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/doctor.class.php");


class DoctorRepository extends Database {

  public function getByName($name) {
    // code...
    $sql = "SELECT * FROM doctor WHERE name = ? LIMIT 1";
    $stmnt = $this->connect()->prepare($sql);
    $stmnt->execute([$name]);
    $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');
    $user = $stmnt->fetch();

    return $user;
  }

  public function getAll() {
    $objectList = [];
    // code...
    $sql = "SELECT * FROM doctor";
    $stmnt = $this->connect()->query($sql);
    $objectList = $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');

    return $objectList;
  }
}
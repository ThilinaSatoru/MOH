<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/doctor.class.php");


class DoctorRepository extends Database {

    public function save(Doctor $doctor) {

        $sql = "INSERT INTO doctor (id, name, email, contact, nic) 
                VALUES (
                ".$doctor->getId().",
                ".$doctor->getName().",
                ".$doctor->getEmail().",
                ".$doctor->getContact().",
                ".$doctor->getNic()."
                )";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute();
    }

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

    public function getNewDoctorID() {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) AS maxID FROM doctor";

        $stmnt = $this->connect()->query($sql);
        $row = $stmnt->fetch();
        $maxID = $row['maxID'];

        if ($maxID === null) {
            $nextID = "D001";
        } else {
            $nextID = "D" . sprintf("%03d", $maxID + 1);
        }

        return $nextID;
    }

}
<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/doctor.class.php");


class DoctorRepository extends Database {

    public function save(Doctor $doctor) {

        $sql = "INSERT INTO doctor (id, name, email, contact, nic, account_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([
            $doctor->getId(), 
            $doctor->getName(), 
            $doctor->getEmail(), 
            $doctor->getContact(), 
            $doctor->getNic(),
            $doctor->getAccount_id()
        ]);
    }

    public function setAccount($acc_id, $nic) {
        $sql = "UPDATE doctor SET account_id = ? WHERE nic = ?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$acc_id, $nic]);
    }

    public function getByName($name) {
        // code...
        $sql = "SELECT * FROM doctor WHERE name = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$name]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');
        $result = $stmnt->fetch();

        return $result;
    }

    public function getByNic($nic)
    {
        // code...
        $sql = "SELECT * FROM doctor WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');
        $result = $stmnt->fetch();

        return $result;
    }

    public function findByAccount($id)
    {
        $sql = "SELECT * FROM doctor WHERE account_id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');
        $result = $stmnt->fetch();

        return $result;
    }

    public function getAll()
    {
        $result = [];
        // code...
        $sql = "SELECT * FROM doctor";
        $stmnt = $this->connect()->query($sql);
        $result = $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');

        return $result;
    }

    public function findNewDoctorID() {
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
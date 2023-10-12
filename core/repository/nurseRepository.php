<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/nurse.class.php");


class NurseRepository extends Database
{

    public function getAll()
    {
        $sql = "SELECT * FROM nurse;";
        $stmnt = $this->connect()->query($sql);
        return $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Nurse');
    }

    public function save(Nurse $nurse)
    {
        $sql = "INSERT INTO nurse (name, email, contact, nic, account_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([
            $nurse->getName(),
            $nurse->getEmail(),
            $nurse->getContact(),
            $nurse->getNic(),
            $nurse->getAccount_id()
        ]);
    }

    public function setAccount($acc_id, $nic)
    {
        $sql = "UPDATE nurse SET account_id = ? WHERE nic = ?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$acc_id, $nic]);
    }

    public function getByName($name)
    {
        // code...
        $sql = "SELECT * FROM nurse WHERE name = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$name]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Nurse');
        $result = $stmnt->fetch();

        return $result;
    }

    public function getByNic($nic)
    {
        // code...
        $sql = "SELECT * FROM nurse WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Nurse');
        $result = $stmnt->fetch();

        return $result;
    }
}
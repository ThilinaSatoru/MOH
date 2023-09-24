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
        $sql = "INSERT INTO nurse (name, email, contact, account_id) 
                VALUES (?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([
            $nurse->getName(),
            $nurse->getEmail(),
            $nurse->getContact(), 
            $nurse->getAccount_id()
        ]);
    }
}
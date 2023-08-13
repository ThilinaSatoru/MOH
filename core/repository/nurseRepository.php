<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/nurse.class.php");


class NurseRepository extends Database {

    public function getByNic($nic) {
        // code...
        $sql = "SELECT * FROM nurse WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Nurse');
        $result = $stmnt->fetch();

        return $result;
    }

    public function save(Nurse $nurse) {

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
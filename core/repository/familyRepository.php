<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/family.class.php");


class FamilyRepository extends Database {

    public function getByNic($nic) {
        // code...
        $sql = "SELECT * FROM family WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Doctor');
        $result = $stmnt->fetch();

        return $result;
    }
}
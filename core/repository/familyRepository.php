<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/family.class.php");


class FamilyRepository extends Database {

    public function save(Family $family)
    {
        $sql = "INSERT INTO family (id, date_married, account_id) VALUES (?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([
            $family->getId(),
            $family->getDate_married(),
            $family->getAccount_id()
        ]);
    }

    public function findByAccount($acc_id)
    {
        $sql = "SELECT * FROM family WHERE account_id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$acc_id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Family');
        $result = $stmnt->fetch();

        return $result;
    }

}
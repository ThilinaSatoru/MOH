<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/parent.class.php");


class ParentRepository extends Database
{

    public function save(_Parent $parent)
    {
        try {
            $sql = "INSERT INTO parent (id, name, email, contact, nic, dob, address, family_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmnt = $this->connect()->prepare($sql);
            $stmnt->execute(
                [
                    $parent->getId(),
                    $parent->getName(),
                    $parent->getEmail(),
                    $parent->getContact(),
                    $parent->getNic(),
                    $parent->getDob(),
                    $parent->getAddress(),
                    $parent->getFamily_id()
                ]
            );
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function findByNic($nic)
    {
        $sql = "SELECT * FROM parent WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '_Parent');
        $result = $stmnt->fetch();

        return $result;
    }

    public function findUnregistered()
    {
        $sql = "SELECT * FROM parent WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute();
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '_Parent');
        $result = $stmnt->fetch();

        return $result;
    }
}

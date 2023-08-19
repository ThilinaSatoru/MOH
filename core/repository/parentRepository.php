<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/parent.class.php");


class ParentRepository extends Database
{

    public function save(_Parent $parent)
    {
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
    }
}

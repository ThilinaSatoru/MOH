<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/vaccine.class.php");


class VaccineRepository extends Database
{

    public function save(Vaccine $vaccine)
    {
        $sql = "INSERT INTO vaccine (available, expire, factory, name, register, issued_by) VALUES (?, ?, ?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $vaccine->getAvailable(),
                $vaccine->getExpire(),
                $vaccine->getFactory(),
                $vaccine->getName(),
                $vaccine->getRegister(),
                $vaccine->getIssuedBy(),
            ]
        );
    }

    public function getAllFamily()
    {
        $sql = "SELECT * FROM vaccine";
        $stmnt = $this->connect()->query($sql);
        return $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Vaccine');
    }

    public function findByName($name)
    {
        $sql = "SELECT * FROM vaccine WHERE name = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$name]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Vaccine');
        return $stmnt->fetch();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM vaccine WHERE id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Vaccine');
        return $stmnt->fetch();
    }
}
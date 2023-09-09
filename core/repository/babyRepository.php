<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/baby.class.php");


class BabyRepository extends Database
{

    public function save(Baby $baby)
    {
        $sql = "INSERT INTO baby (name, gender, dob, weight, reg_date, family_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $baby->getName(),
                $baby->getGender(),
                $baby->getDob(),
                $baby->getWeight(),
                $baby->getReg_date(),
                $baby->getFamily_id(),
            ]
        );
    }

    public function setFamily($fam_id, $id)
    {
        $sql = "UPDATE baby SET family_id = ? WHERE id = ?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$fam_id, $id]);
    }

    public function findByNameAndFamily(Baby $baby)
    {
        $sql = "SELECT * FROM baby WHERE name = ? AND family_id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$baby->getName(), $baby->getFamily_id()]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Baby');
        $result = $stmnt->fetch();

        return $result;
    }

}

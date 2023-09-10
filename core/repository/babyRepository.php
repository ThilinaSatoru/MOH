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

    public function update(Baby $baby)
    {
        $sql = "UPDATE baby SET name=?, gender=?, dob=?, weight=?, reg_date=?, family_id=?) WHERE id=?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $baby->getName(),
                $baby->getGender(),
                $baby->getDob(),
                $baby->getWeight(),
                $baby->getReg_date(),
                $baby->getFamily_id(),
                $baby->getId()
            ]
        );
    }

    public function delete($id)
    {
        $sql = "DELETE FROM baby WHERE id=?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [$id]
        );
    }

    public function getAll()
    {
        $sql = "SELECT * FROM baby";
        $stmnt = $this->connect()->query($sql);
        $result = $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Baby');

        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM baby WHERE id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Baby');
        $result = $stmnt->fetch();

        return $result;
    }

    public function findByNameAndFamily($name, $fid)
    {
        $sql = "SELECT * FROM baby WHERE name = ? AND family_id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$name, $fid]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Baby');
        $result = $stmnt->fetch();

        return $result;
    }

}

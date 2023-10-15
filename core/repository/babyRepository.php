<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/baby.class.php");


class BabyRepository extends Database
{

    public function save(Baby $baby): bool
    {
        try {
            $sql = "INSERT INTO baby (name, gender, dob, weight, reg_date, family_id) VALUES (:name, :gender, :dob, :weight, :reg_date, :family_id)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindValue(':name', $baby->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':gender', $baby->getGender(), PDO::PARAM_STR);
            $stmt->bindValue(':dob', $baby->getDob(), PDO::PARAM_STR);
            $stmt->bindValue(':weight', $baby->getWeight(), PDO::PARAM_INT);
            $stmt->bindValue(':reg_date', $baby->getReg_date(), PDO::PARAM_STR);
            $stmt->bindValue(':family_id', $baby->getFamily_id(), PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error Message: " . $errorInfo[2] . "<br>";
                return false;
            }
        } catch (PDOException $e) {
            echo "<script>";
            echo "alert('Failed ::'" . json_encode($e->getMessage()) . ");";
            echo "</script>";
            return false;
        }

    }

    public function update(Baby $baby)
    {
        $sql = "UPDATE baby SET name=?, gender=?, dob=?, weight=?, reg_date=?, family_id=? WHERE id=?";
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

    public function getAllByFamily($id)
    {
        $sql = "SELECT * FROM baby where family_id = :family_id";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->bindParam(':family_id', $id, PDO::PARAM_INT);
        $stmnt->execute();
        $result = $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Baby');
        return $result;
    }

    public function findById($id): Baby
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

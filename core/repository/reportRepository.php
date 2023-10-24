<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/report.class.php");

class ReportRepository extends Database
{
    // b1 b2 h1 h2 p1 p2 s1 s2
    //  1  0  0  0  0  0  0  0
    // 2 0 0 0 0 0 0 0

    public function save(Report $report): bool
    {
        try {
            $sql = "INSERT INTO `report` (`bcg1`, `bcg2`, `hep1`, `hep2`, `polio1`, `polio2`, `sarampa1`, `sarampa2`, `se1`, `se2`, `baby_id`, `approved_by`, `issued_by`) 
                    VALUES (:bcg1, :bcg2, :hep1, :hep2, :polio1, :polio2, :sarampa1, :sarampa2, :se1, :se2, :baby, :approved, :issued)";
            $stmt = $this->connect()->prepare($sql);
            // Bind values to placeholders
            $stmt->bindValue(':bcg1', $report->getBcg1(), PDO::PARAM_INT);
            $stmt->bindValue(':bcg2', $report->getBcg2(), PDO::PARAM_INT);
            $stmt->bindValue(':hep1', $report->getHep1(), PDO::PARAM_INT); // Empty string is replaced with null
            $stmt->bindValue(':hep2', $report->getHep2(), PDO::PARAM_INT);
            $stmt->bindValue(':polio1', $report->getPolio1(), PDO::PARAM_INT);
            $stmt->bindValue(':polio2', $report->getPolio2(), PDO::PARAM_INT);
            $stmt->bindValue(':sarampa1', $report->getSarampa1(), PDO::PARAM_INT);
            $stmt->bindValue(':sarampa2', $report->getSarampa2(), PDO::PARAM_INT);
            $stmt->bindValue(':se1', $report->getSe1(), PDO::PARAM_INT);
            $stmt->bindValue(':se2', $report->getSe2(), PDO::PARAM_INT);
            $stmt->bindValue(':baby', $report->getBaby_id(), PDO::PARAM_INT);
            $stmt->bindValue(':approved', $report->getApproved_by(), PDO::PARAM_INT);
            $stmt->bindValue(':issued', $report->getIssued_by(), PDO::PARAM_INT);

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

    public function update(Report $report): bool
    {
        $sql = "UPDATE report SET 
        `bcg1` = :bcg1, 
        `bcg2` = :bcg2, 
        `hep1` = :hep1, 
        `hep2` = :hep2, 
        `polio1` = :polio1, 
        `polio2` = :polio2, 
        `sarampa1` = :sarampa1, 
        `sarampa2` = :sarampa2, 
        `se1` = :se1, 
        `se2` = :se2,
        `baby_id` = :baby,
        `approved_by` = :approved,
        `issued_by` = :issued 
        WHERE id = :reportId";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindValue(':bcg1', $report->getBcg1(), PDO::PARAM_INT);
        $stmt->bindValue(':bcg2', $report->getBcg2(), PDO::PARAM_INT);
        $stmt->bindValue(':hep1', $report->getHep1(), PDO::PARAM_INT); // Empty string is replaced with null
        $stmt->bindValue(':hep2', $report->getHep2(), PDO::PARAM_INT);
        $stmt->bindValue(':polio1', $report->getPolio1(), PDO::PARAM_INT);
        $stmt->bindValue(':polio2', $report->getPolio2(), PDO::PARAM_INT);
        $stmt->bindValue(':sarampa1', $report->getSarampa1(), PDO::PARAM_INT);
        $stmt->bindValue(':sarampa2', $report->getSarampa2(), PDO::PARAM_INT);
        $stmt->bindValue(':se1', $report->getSe1(), PDO::PARAM_INT);
        $stmt->bindValue(':se2', $report->getSe2(), PDO::PARAM_INT);

        $stmt->bindValue(':baby', $report->getBaby_id(), PDO::PARAM_INT);
        $stmt->bindValue(':approved', $report->getApproved_by(), PDO::PARAM_INT);
        $stmt->bindValue(':issued', $report->getIssued_by(), PDO::PARAM_INT);

        $stmt->bindValue(':reportId', $report->getId(), PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error Message: " . $errorInfo[2] . "<br>";
            return false;
        }
    }


    public function getAllReports()
    {
        $sql = "SELECT * FROM report";
        $stmnt = $this->connect()->query($sql);
        return $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Report');
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM report WHERE id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Report');
        return $stmnt->fetch();
    }

    public function findByApproved($baby_id)
    {
        $sql = "SELECT * FROM report WHERE baby_id = ? AND approved_by is not null LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$baby_id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Report');
        return $stmnt->fetch();
    }

    public function findByBaby($id)
    {
        $sql = "SELECT * FROM report WHERE baby_id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Report');
        // Fetch one row as an object
        $report = $stmnt->fetch();

        // Check if a row was found
        if ($report) {
            return $report; // Return the "Report" object
        } else {
            return null; // No rows found, return null or handle it as needed
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM report WHERE id=?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [$id]
        );
    }
}
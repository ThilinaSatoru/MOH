<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/report.class.php");

class ReportRepository extends Database
{
    // b1 b2 h1 h2 p1 p2 s1 s2
    //  1  0  0  0  0  0  0  0
    // 2 0 0 0 0 0 0 0

    public function save(Report $report)
    {
        $sql = "INSERT INTO report (bcg1, bcg2, hep1, hep2, polio1, polio2, sarampa1, sarampa2, se1, se2, baby_id, approved_by, issued_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $report->getBcg1(),
                $report->getBcg2(),
                $report->getHep1(),
                $report->getHep2(),
                $report->getPolio1(),
                $report->getPolio2(),
                $report->getSarampa1(),
                $report->getSarampa2(),
                $report->getSe1(),
                $report->getSe2(),
                $report->getBaby_id(),
                $report->getApproved_by(),
                $report->getIssued_by(),
            ]
        );
    }

    public function update(Report $report)
    {
        $sql = "UPDATE report SET bcg1=?, bcg2=?, hep1=?, hep2=?, polio1=?, polio2=?, sarampa1=?, sarampa2=?, se1=?, se2=?, baby_id=?, approved_by=? where id=?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $report->getBcg1(),
                $report->getBcg2(),
                $report->getHep1(),
                $report->getHep2(),
                $report->getPolio1(),
                $report->getPolio2(),
                $report->getSarampa1(),
                $report->getSarampa2(),
                $report->getSe1(),
                $report->getSe2(),
                $report->getBaby_id(),
                $report->getApproved_by(),
                $report->getIssued_by(),
            ]
        );
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

    public function delete($id)
    {
        $sql = "DELETE FROM report WHERE id=?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [$id]
        );
    }
}
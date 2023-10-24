<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/feedback.class.php");


class FeedbackRepository extends Database
{

    public function findAll()
    {
        $sql = "SELECT * FROM feedback;";
        $stmnt = $this->connect()->query($sql);
        return $stmnt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Feedback');
    }

    public function save(Feedback $feedback)
    {
        $sql = "INSERT INTO feedback (account_id, message, subject) 
                VALUES (?, ?, ?)";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([
            $feedback->getAccountId(),
            $feedback->getMessage(),
            $feedback->getSubject()
        ]);
    }

    public function findById($id): Feedback
    {
        $sql = "SELECT * FROM feedback WHERE id = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$id]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Feedback');
        $result = $stmnt->fetch();

        return $result;
    }

}
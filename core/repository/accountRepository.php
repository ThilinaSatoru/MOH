<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/account.class.php");
 

class AccountRepository extends Database
{
    public function save(Account $account)
    {
        $sql = "INSERT INTO account (type, password, username) 
            VALUES (?, ?, ?);";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [
                $account->getType(),
                $account->getPassword(),
                $account->getUsername()
            ]
        );
        // return $stmnt->lastInsertId();
    }

    public function findByUsername($user)
    {
        $sql = "SELECT * FROM account WHERE username = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$user]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');
        $result = $stmnt->fetch();

        return $result;
    }

    public function findByUsernameAndPassword(Account $account)
    {
        $sql = "SELECT * FROM account WHERE username = ? AND password = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$account->getUsername(), $account->getPassword()]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');
        $result = $stmnt->fetch();

        return $result;
    }

    public function countByUsername($username): int
    {
        $sql = "SELECT * FROM account WHERE username = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$username]);
        $result = $stmnt->rowCount();

        return $result;
    }

    public function findAllByType($type)
    {
        $sql = "SELECT * FROM account WHERE type = ?";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$type]);
        $result = $stmnt->rowCount();

        return $result;
    }
}

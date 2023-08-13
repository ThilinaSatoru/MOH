<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/account.class.php");


class AccountRepository extends Database {


    public function save(Account $account) {
        $sql = "INSERT INTO account (nic, type, password, username) 
            VALUES (?, ?, ?, ?);";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute(
            [$account->getNic(),
             $account->getType(),
             $account->getPassword(),
             $account->getUsername()]);
        // return $stmnt->lastInsertId();
    }

    public function findByNic($nic) {
        // code...
        $sql = "SELECT * FROM account WHERE nic = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$nic]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');
        $result = $stmnt->fetch();

        return $result;
    }

    public function findByUsernameAndPassword(Account $account) {
        // code...
        $sql = "SELECT * FROM account WHERE username = ? AND password = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$account->getUsername(), $account->getPassword()]);
        $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Account');
        $result = $stmnt->fetch();

        return $result;
    }

    public function countByUsername($username) {
        // code...
        $sql = "SELECT * FROM account WHERE username = ? LIMIT 1";
        $stmnt = $this->connect()->prepare($sql);
        $stmnt->execute([$username]);
        $result = $stmnt->rowCount();

        return $result;
    }


}
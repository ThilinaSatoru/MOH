<?php

require_once("../../core/database/database.class.php");
include("../../core/entity/account.class.php");


class AccountRepository extends Database {

    public function register(Account $account, $userId) {

        // if count of result(account) is not greater than 0
        if(!$this->countByUsername() > 0) {
            $sql = "INSERT INTO account (type, password, username) 
                VALUES (
                ".$account->getType().",
                ".$account->getPassword().",
                ".$account->getUsername()."
                )";
            $stmnt = $this->connect()->prepare($sql);
            $stmnt->execute();

            if($account->getType() == '') {
                
            } elseif($account->getType() == '') {

            } elseif($account->getType() == '') {

            }

        } else {
            // username already exists
        }
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
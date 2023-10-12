<?php

require_once("../../../moh/core/repository/doctorRepository.php");
require_once("../../../moh/core/repository/accountRepository.php");



class DoctorService extends DoctorRepository {

    public function loadDoctorTableData() {

        foreach($this->getAll() as $obj) {
            echo 
            "<tr>
                <td>".$obj->getId()."</td>
                <td>".$obj->getName()."</td>
                <td>" . $obj->getEmail() . "</td>
                <td>" . $obj->getContact() . "</td>
                <td>" . $obj->getNic() . "</td>
                <td>" . $obj->getAccount_id() . "</td>

                <td></td>
            </tr>";
        }
    }

    public function register(Account $account, Doctor $doctor): bool
    {
        $success = false;
        $ACCOUNT_REPO = new AccountRepository();

        // if count of result(account) is less than 1
        if ($ACCOUNT_REPO->countByUsername($account->getUsername()) < 1) {
            // new account
            if (!$ACCOUNT_REPO->findByUsername($account->getUsername())) {
                //save account
                $ACCOUNT_REPO->save($account);
                //get saved auto id
                $saved_acc_id = $ACCOUNT_REPO->findByUsername($account->getUsername())->getId();
                //save doctor for account

                $doctor->setAccount_id($saved_acc_id);
                if($doctor != null) {
                    $this->save($doctor);
                } else {
                    echo '<script>alert("acc id null")</script>';
                }
                $this->clear_register();
                $success = true;

            } else {
                echo '<script>alert("Account with NIC exists.")</script>';
            }
        } else {
            echo '<script>alert("Username Already Exists.")</script>';
        }

        return $success;
    }

    private function clear_register() {
        echo '<script>alert("Saved")</script>';
        echo "
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        ";
    }

    public function getNewDoctorID()
    {
        return $this->findNewDoctorID();
    }

    public function loadAllDoctorOptions($id)
    {
        foreach ($this->getAll() as $obj) {
            echo
                "
                <option value='" . $obj->getId() . "'
            ";
            if ($id == $obj->getId()) {
                echo ' selected';
            }
            echo
                "
            >" . $obj->getName() . " (" . $obj->getId() . ")</option>
            ";
        }
    }

}
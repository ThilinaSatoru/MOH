<?php
require_once("../../../moh/core/repository/familyRepository.php");
require_once("../../../moh/core/repository/parentRepository.php");
require_once("../../../moh/core/repository/accountRepository.php");
require_once("../../../moh/core/entity/baby.class.php");

class FamilyService extends FamilyRepository
{
    public function register(Account $account, Family $family, $f_NIC, $m_NIC)
    {
        $success = false;
        $saved_acc_id = null;
        $ACCOUNT_REPO = new AccountRepository();
        $PARENT_REPO = new ParentRepository();


        if (!$ACCOUNT_REPO->findByUsername($account->getUsername())) {

            $ACCOUNT_REPO->save($account);
            $saved_acc_id = $ACCOUNT_REPO->findByUsername($account->getUsername())->getId();

            if (!$this->findByAccount($saved_acc_id)) {
                $family->setAccount_id($saved_acc_id);
                $this->save($family);

                $saved_fam_id = $this->findByAccount($saved_acc_id)->getId();

                $father = $PARENT_REPO->findByNic($f_NIC);
                if ($father) {
                    $PARENT_REPO->setFamily($saved_fam_id, $father->getId());
                }
                $mother = $PARENT_REPO->findByNic($m_NIC);
                if ($mother) {
                    $PARENT_REPO->setFamily($saved_fam_id, $mother->getId());
                }

                $this->clear_register();
                $success = true;
            }
        } else {
            echo '<script>alert("Account with Username exists.")</script>';
        }

        return $success;
    }

    private function clear_register()
    {
        echo '<script>alert("Saved")</script>';
        echo "
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        ";
    }

    public function loadAllFamilyOptions($id)
    {

        foreach ($this->getAllFamily() as $obj) {
            echo
            "
                <option value='" . $obj->getId() . "'
            ";
            if ($id == $obj->getId()) {
                echo ' selected';
            }
            echo
            "
            >" . $obj->getId() . "</option>
            ";
        }
    }

    public function loadFamilyTableData()
    {

        foreach ($this->getAllFamily() as $obj) {
            echo
            "<tr>
                <td>" . $obj->getId() . "</td>
                <td>" . $obj->getDate_married() . "</td>
                <td>" . $obj->getAccount_id() . "</td>
            </tr>";
        }
    }
}
?>
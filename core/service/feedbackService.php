<?php
require_once("../../../moh/core/repository/accountRepository.php");
require_once("../../../moh/core/repository/feedbackRepository.php");

class FeedbackService extends FeedbackRepository
{

    public function send(Feedback $feedback): bool
    {
        $ACC_REPO = new AccountRepository();
        $acc = $ACC_REPO->findByUsername($_SESSION['username']);
        if ($acc) {
            $feedback->setAccountId($acc->getId());

            $this->save($feedback);
            $this->clear_register();
            return true;
        } else {
            return false;
        }

    }

    private function clear_register()
    {
        echo "
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        ";
    }

    public function loadTableData()
    {
        foreach ($this->findAll() as $obj) {
            echo
                "<tr>
                    <td>" . $obj->getId() . "</td>
                    <td>" . $obj->getSubject() . "</td>
                    <td>" . $obj->getMessage() . "</td>
                    <td>" . $obj->getAccountId() . "</td>
                </tr>";
        }
    }

}
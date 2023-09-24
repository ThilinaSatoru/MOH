<?php
require_once("../../../moh/core/repository/vaccineRepository.php");

class vaccineService extends vaccineRepository
{

    public function loadAllTableData()
    {
        foreach ($this->getAllFamily() as $obj) {
            echo
                "<tr>
                    <td>" . $obj->getId() . "</td>
                    <td>" . $obj->getAvailable() . "</td>
                    <td>" . $obj->getExpire() . "</td>
                    <td>" . $obj->getFactory() . "</td>
                    <td>" . $obj->getName() . "</td>
                    <td>" . $obj->getRegister() . "</td>
                    <td>" . $obj->getIssuedBy() . "</td>
                    <td>
                    <ul class='btn-group navbar-nav'>
                        <li class='nav-item dropdown'>
                            <a class='btn btn-warning dropdown-toggle' href='' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Action
                            </a>
                            <ul class='dropdown-menu'>
                                <form method='POST'>
                                    <li><a class='dropdown-item' href='baby_update.php?edit=" . $obj->getId() . "'>Edit</a></li>
                                    <li><a class='dropdown-item' href='baby_table.php?delete=" . $obj->getId() . "'>Delete</a></li>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </td>
                </tr>";
        }
    }

    public function register(Vaccine $vaccine): bool
    {
        $success = false;
        if ($vaccine->getName() != null) {
            if (!$this->findByName($vaccine->getName())) {
                $this->save($vaccine);
                $this->clear_register();
                $success = true;
            } else {
                echo '<script>alert("Vaccine exists.")</script>';
            }
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

}
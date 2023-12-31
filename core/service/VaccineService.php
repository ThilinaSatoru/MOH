<?php
require_once("../../../moh/core/repository/vaccineRepository.php");

class VaccineService extends vaccineRepository
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
                                    <li><a class='dropdown-item' href='vaccine_table.php?edit=" . $obj->getId() . "'>Edit</a></li>
                                    <li><a class='dropdown-item' href='vaccine_table.php?delete=" . $obj->getId() . "'>Delete</a></li>
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
                echo '<script>alert("Saved")</script>';
                $this->clear_register();
                $success = true;
            } else {
                echo '<script>alert("Vaccine exists.")</script>';
            }
        }
        return $success;
    }

    public function edit(Vaccine $vaccine): bool
    {
        $success = false;
        if ($vaccine->getId() != null) {
            if ($this->findById($vaccine->getId())) {
                $this->update($vaccine);
                echo "<script>alert('Updated " . $vaccine->getId() . "');</script>";
            } else {
//                $this->save($vaccine);
                echo '<script>alert("Saved 2")</script>';
            }
            $this->clear_register();
            $success = true;
        }
        return $success;
    }

    public function deleteVaccine($id)
    {
        $this->delete($id);
    }

    public function clear_register()
    {
        echo "
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        ";
    }


}
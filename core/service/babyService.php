<?php
require_once("../../../moh/core/repository/familyRepository.php");
require_once("../../../moh/core/repository/reportRepository.php");
require_once("../../../moh/core/repository/babyRepository.php");
require_once("../../../moh/core/repository/accountRepository.php");

class BabyService extends BabyRepository
{
    public function register(Baby $baby, $family_selected): bool
    {
        $success = false;
        $FAMILY_REPO = new FamilyRepository();

        if ($family_selected != null) {
            if (!$this->findByNameAndFamily($baby->getName(), $family_selected)) {
                $fam_id = $FAMILY_REPO->findById($family_selected);
                if ($fam_id) {
                    $baby->setFamily_id(intval($fam_id->getId()));
                    $this->save($baby);
                    $this->clear_register();
                    $success = true;
                } else {
                    echo '<script>alert("Invalid Family.")</script>';
                }
            } else {
                echo '<script>alert("Baby with Name exists in this Family.")</script>';
            }
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
        }
        return $success;
    }

    public function edit(Baby $baby, $family_selected): bool
    {
        $success = false;
        $FAMILY_REPO = new FamilyRepository();
        echo '<script>alert(" Deleting.. ' . $baby->getId() . '")</script>';

        if ($family_selected != null) {

            if (!$this->findByNameAndFamily($baby->getName(), $family_selected)) {
                $fam_id = null;
                $fam_id = $FAMILY_REPO->findById($family_selected);
                if ($fam_id) {
                    $baby->setFamily_id(intval($fam_id->getId()));
                    $this->update($baby->getId());
                    $this->clear_register();
                    $success = true;
                } else {
                    echo '<script>alert("Invalid Family.")</script>';
                }
            } else {
                echo '<script>alert("Baby with Name exists in this Family.")</script>';
            }
        } else {
            echo '<script>alert("Please Try Again Shortly.....")</script>';
        }
        return $success;
    }

    public function deleteBaby($id)
    {
        $this->delete($id);
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

    public function getById($id): Baby
    {
        return $this->findById($id);
    }

    public function loadBabyTableData()
    {
        foreach ($this->getAll() as $obj) {
            echo
            "<tr>
                <td>" . $obj->getId() . "</td>
                <td>" . $obj->getName() . "</td>
                <td>" . $obj->getGender() . "</td>
                <td>" . $obj->getDob() . "</td>
                <td>" . $obj->getWeight() . "</td>
                <td>" . $obj->getReg_date() . "</td>
                <td>" . $obj->getFamily_id() . "</td>
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

    public function loadBabyTableDataByFamily($username)
    {
        $REPORT_REPO = new ReportRepository();
        $ACCOUNT_REPO = new AccountRepository();
        $FAMILY_REPO = new FamilyRepository();
        $id = $ACCOUNT_REPO->findByUsername($username)->getId();
        $fam_id = $FAMILY_REPO->findByAccount($id);

        if ($fam_id) {
            foreach ($this->getAllByFamily($fam_id->getId()) as $obj) {
                echo
                    "<tr>
                <td>" . $obj->getId() . "</td>
                <td>" . $obj->getName() . "</td>
                <td>" . $obj->getGender() . "</td>
                <td>" . $obj->getDob() . "</td>
                <td>" . $obj->getWeight() . "</td>
                <td>" . $obj->getReg_date() . "</td>
                <td>" . $obj->getFamily_id() . "</td>
                ";
                if (isset($_SESSION['user_type'])) {
                    if ($_SESSION['user_type'] == 'FAMILY') {
                        if ($REPORT_REPO->findByApproved($obj->getId())) {
                            echo "
                            <td>
                                <form method='POST'>
                                    <button type='button' class='btn btn-primary'>
                                        <a class='dropdown-item' href='vaccination_report.php?repId=" . $obj->getId() . "'>
                                            View Report
                                        </a>
                                    </button>
                                </form>
                            </td>
                        ";
                        } else {
                            echo "
                            <td>
                                <form method='POST'>
                                    <button type='button' class='btn btn-danger' disabled>
                                        Not Approved
                                    </button>
                                </form>
                            </td>
                        ";
                        }
                    } else {
                        echo "
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
                        ";
                    }
                }
            }
        }
    }

    public function loadAllBabyOptions($id)
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

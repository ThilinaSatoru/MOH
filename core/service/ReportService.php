<?php
require_once("../../../moh/core/repository/reportRepository.php");

class ReportService extends ReportRepository
{

    public function loadAllTableData()
    {
        foreach ($this->getAllReports() as $obj) {
            echo
                "<tr>
                    <td>" . $obj->getId() . "</td>
                    <td>" . $obj->getBcg1() . "</td>
                    <td>" . $obj->getBcg2() . "</td>
                    <td>" . $obj->getHep1() . "</td>
                    <td>" . $obj->getHep2() . "</td>
                    <td>" . $obj->getPolio1() . "</td>
                    <td>" . $obj->getPolio2() . "</td>
                    <td>" . $obj->getSarampa1() . "</td>
                    <td>" . $obj->getSarampa2() . "</td>
                    <td>" . $obj->getSe1() . "</td>
                    <td>" . $obj->getSe2() . "</td>
                    <td>" . $obj->getBaby_id() . "</td> ";

            if (isset($_SESSION['user_type'])) {
                if ($_SESSION['user_type'] == 'DOCTOR') {
                    if ($obj->getApproved_by() != null) {
                        echo "
                            <td>
                                <form method='POST'>
                                    <button type='button' class='btn btn-success'>
                                        <a class='dropdown-item' href='baby_vaccine_table.php?approve=" . $obj->getId() . "'>
                                            <span class='badge text-bg-secondary'>" . $obj->getApproved_by() . "</span>
                                        </a>
                                    </button>
                                </form>
                            </td>
                        ";
                    } else {
                        echo "
                            <td>
                                <form method='POST'>
                                    <button type='button' class='btn btn-danger'>
                                        <a class='dropdown-item' href='baby_vaccine_table.php?approve=" . $obj->getId() . "'>
                                            <span class='badge text-bg-secondary'>NO</span>
                                        </a>
                                    </button>
                                </form>
                            </td>
                            
                        ";
                    }
                } else {
                    echo "
                    <td>
                        <span class='badge text-bg-secondary'>" . $obj->getApproved_by() . "</span>
                    </td>
                    ";
                }
            }

            echo "<td>" . $obj->getIssued_by() . "</td>";

            if (isset($_SESSION['user_type'])) {
                if ($_SESSION['user_type'] == 'DOCTOR') {
                    echo "
                        <td>
                            <ul class='btn-group navbar-nav'>
                                <li class='nav-item dropdown  btn btn-primary'>
                                    <a class='dropdown-item' role='button' 
                                    href='baby_vaccine_table.php?edit=" . $obj->getId() . "'>View</a>
                                </li>
                            </ul>
                        </td>
                    ";
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
                                            <li><a class='dropdown-item' href='baby_vaccine_table.php?edit=" . $obj->getId() . "'>Edit</a></li>
                                            <li><a class='dropdown-item' href='baby_vaccine_table.php?delete=" . $obj->getId() . "'>Delete</a></li>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    ";
                }
            }
            echo "</tr>";
        }
    }

    public function edit(Report $report): bool
    {
        $success = false;
        if ($report->getId() != null) {
            if ($this->findById($report->getId())) {
                $this->update($report);
                echo "<script>alert('Updated " . $report->getId() . "');</script>";
            } else {
                $this->save($report);
                echo '<script>alert("Saved 2")</script>';
            }
            $this->clear_register();
            $success = true;
        }
        return $success;
    }

    public function register(Report $report): bool
    {
        if (!$this->findByBaby($report->getBaby_id())) {
            if ($this->save($report)) {
                echo '<script>alert("Report Saved")</script>';
                $this->clear_register();
            } else {
                echo '<script>alert("Report Failed")</script>';
            }
        } else {
            echo "<script>alert('Report with Baby " . $report->getBaby_id() . "Exists!');</script>";
        }

        return true;
    }

    public function deleteReport($id)
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

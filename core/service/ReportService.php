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
                    <td>" . $obj->getBaby_id() . "</td>
                    <td>" . $obj->getApproved_by() . "</td>
                    <td>" . $obj->getIssued_by() . "</td>
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
        $this->save($report);
        echo '<script>alert("Saved")</script>';
        $this->clear_register();

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

<?php
require_once("../../../moh/core/repository/parentRepository.php");


class ParentService extends ParentRepository
{

    public function loadAllFatherOptions()
    {
        foreach ($this->getAllFathers() as $obj) {
            echo
            "
                <option>" . $obj->getNic() . " (" . $obj->getName() . ")</option>
            ";
        }
    }

    public function findById($id)
    {
        return $this->findById($id);
    }


    public function loadAllMotherOptions()
    {
        foreach ($this->getAllMothers() as $obj) {
            echo
                "
                <option>" . $obj->getNic() . " (" . $obj->getName() . ")</option>
            ";
        }
    }

    public function loadParentTableData()
    {
        foreach ($this->getAll() as $obj) {
            echo
            "<tr>
                <td>" . $obj->getId() . "</td>
                <td>" . $obj->getName() . "</td>
                <td>" . $obj->getEmail() . "</td>
                <td>" . $obj->getContact() . "</td>
                <td>" . $obj->getNic() . "</td>
                <td>" . $obj->getDob() . "</td>
                <td>" . $obj->getAddress() . "</td>
                <td>" . $obj->getType() . "</td>
                <td>" . $obj->getFamily_id() . "</td>
            </tr>";
        }
    }


    public function register(Parents $f, Parents $m): bool
    {
        if (!$this->findByNic($f->getNic()) && !$this->findByNic($m->getNic())) {
            if ($this->save($f) && $this->save($m)) {
                $this->clear_register();
                return true;
            } else {
                echo '<script>alert("Something Went Wrong. Please try Again.")</script>';
                return false;
            }
        } else {
            echo '<script>alert("Parent with NIC Already exists.")</script>';
            return false;
        }
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

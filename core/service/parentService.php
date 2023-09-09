<?php
require_once("../../../moh/core/repository/parentRepository.php");


class ParentService extends ParentRepository
{

    public function loadAllFatherOptions()
    {
        foreach ($this->getAllFathers() as $obj) {
            echo
            "
                <option>" . $obj->getNic() . "</option>
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
                <option>" . $obj->getNic() . "</option>
            ";
        }
    }


    public function register(_Parent $f,  _Parent $m)
    {
        if (!$this->findByNic($f) && !$this->findByNic($m)) {
            if ($this->save($f) && $this->save($m)) {
                $this->clear_register();
                return true;
            } else {
                echo '<script>alert("Something Went Wrong. Please try Again.")</script>';
                return false;
            }
        } else {
            echo '<script>alert("Parent with NIC Already exists.")</script>';
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

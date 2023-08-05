<?php
require_once("../../../MOH-office/core/repository/doctorRepository.php");



class DoctorService extends DoctorRepository {

  public function loadDoctorTableData() {

    foreach($this->getAll() as $obj) {
        echo 
        "<tr>
            <td>".$obj->getId()."</td>
            <td>".$obj->getName()."</td>
            <td>".$obj->getEmail()."</td>
            <td>".$obj->getContact()."</td>
            <td>".$obj->getPassword()."</td>
            <td>".$obj->getUsername()."</td>

            <td></td>
        </tr>";
    }
  }


}


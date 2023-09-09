<?php
require_once("../../../moh/core/repository/familyRepository.php");
require_once("../../../moh/core/repository/babyRepository.php");
require_once("../../../moh/core/repository/accountRepository.php");

class BabyService extends BabyRepository
{
    public function register(Baby $baby, $family)
    {
        $success = false;
        $FAMILY_REPO = new FamilyRepository();

        echo $baby->getFamily_id();
        if ($baby != null) {

            if (!$this->findByNameAndFamily($baby)) {
                $fam_id = $FAMILY_REPO->findById($family);
                if ($fam_id) {
                    $baby->setFamily_id(intval($fam_id));
                    $this->save($baby);
                    $this->clear_register();
                    $success = true;
                } else {
                    echo '<script>alert("Invalid Family.")</script>';
                }
            } else {
                echo '<script>alert("Baby with Name exists in this Family.")</script>';
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

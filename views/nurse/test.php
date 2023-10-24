<?php
include_once("../../core/service/familyService.php");
include_once("../../core/service/parentService.php");
include_once("../../core/repository/familyRepository.php");
include_once("../../core/repository/parentRepository.php");
include_once("../../core/entity/account.class.php");
include_once("../../core/entity/family.class.php");
$FAMILY_SERVICE = new FamilyService();
$PARENT_SERVICE = new ParentService();

$FAMILY_REPO = new FamilyRepository();
$PARENT_REPO = new ParentRepository();


$saved_fam_id = $FAMILY_REPO->findByAccount(1);
echo($saved_fam_id);

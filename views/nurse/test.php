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
$ACCOUNT_REPO = new AccountRepository();


$saved_acc_id = $ACCOUNT_REPO->findByUsername("fa");
//echo($saved_acc_id);
echo($saved_acc_id->getId());


$PARENT_REPO->setFamily(3, 5);
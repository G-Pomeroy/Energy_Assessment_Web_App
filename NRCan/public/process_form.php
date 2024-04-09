<?php
require_once '..\Controller\FormSubmitter.php'; 
require_once '..\Controller\ProgramDeterminer.php';

$formSubmitter = new FormSubmitter();
$programDeterminer = new ProgramDeterminer();

$applicablePrograms = $programDeterminer->determineApplicablePrograms($_POST);

if ($_POST["first_nations"] == "yes") {
    $applicablePrograms = [5];
}

$formSubmitter->submitForm($_POST);

if ($_POST["primary_owner"] != "yes" && empty($applicablePrograms)) {
    header("Location: not_eligible.php");
} else {
    $queryString = http_build_query(array('programs' => $applicablePrograms));
    header("Location: display_programs.php?$queryString");
}
exit;



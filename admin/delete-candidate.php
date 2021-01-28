<?php
require_once '../functions/databaseController.php';
require_once '../functions/Candidates.php';
$db_handle = new databaseController();  //new instance of db controller class


## get specific userid
$candidateId = "";
if(isset($_GET['candidateid']))
	$candidateId = $_GET['candidateid'];

## new object of users class
$voter = new Candidates();
$voter->deleteCandidate($candidateId);
if(!empty($voter)){
echo "<script>alert('Success!\\nCandiate record deleted!')</script>";
echo"<script>window.location.href='candidates.php'</script>";
}

?>
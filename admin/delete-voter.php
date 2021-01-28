<?php
require_once '../functions/databaseController.php';
require_once '../functions/Voters.php';
$db_handle = new databaseController();  //new instance of db controller class


## get specific userid
$voterId = "";
if(isset($_GET['voterid']))
	$voterId = $_GET['voterid'];

## new object of users class
$voter = new Voters();
$voter->deleteVoter($voterId);
if(!empty($voter)){
echo "<script>alert('Success!\\nVoter record deleted!')</script>";
echo"<script>window.location.href='voters.php'</script>";
}

?>
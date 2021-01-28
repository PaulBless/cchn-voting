<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once '../functions/databaseController.php';
require_once '../functions/Voters.php';

//invoke database controller class
$db_handle = new databaseController();

//get session logged user
if(isset($_SESSION['uname']))
	$createdby = $_SESSION['uname'];
	

if(isset($_POST['test'])){
	$phone_number = preg_replace('/^0/','233',$_POST['phone']);
    echo "<script>alert('$phone_number')</script>";
}

	//process form data
if(isset($_POST['btnRegister'])){
     //get form data
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $fullname = $firstname. ' '. $lastname; //concatenate firstname & lastname into fullname
    //  $phone_number_db = preg_replace('/^0/','233',$phone);

           
    //new object instantiation
    $voter = new Voters();  

    //check if mobile number exists
   if($voter->getVoterByNumber($phone)){
     echo "<script>alert('Mobile number $phone already registered..'); document.location.href='voters.php'</script>";
    }else{
    
    //invoke the add voter method, to save record
    $insertId = $voter->addVoter($fullname, $gender, $phone, $course, $createdby);
    if(empty($insertId)){
        $response = array(
        "message" => "Process failed..",
        "type" => "error"
        );
    header ('location: voters.php');
    } else{
        $message = "Success! \\nVoter $fullname added.";
        echo "<script>alert('".$message."'); document.location.href='voters.php'</script>";;
        } 
   }
}

    

?>
<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once '../functions/databaseController.php';
require_once '../functions/Candidates.php';
require_once '../functions/db_connection.php';

//invoke database controller class
$db_handle = new databaseController();


//get session name
if(isset($_SESSION['uname']))
$createdby = $_SESSION['uname'];


if(isset($_POST['btnSave'])){

     //get form data
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phonenumber = $_POST['phone'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $fullname = $firstname. ' '. $lastname; //concatenate firstname & lastname into fullname
    $name = "{$firstname} {$lastname}";
        
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
    $location="upload/" . $_FILES["image"]["name"];
                    
    //check if the details exists in the database
   //preparing the SQL statement will prevent SQL injection.
    if ($stmt = $connect_db->prepare('SELECT `position` FROM `candidates` WHERE `name` = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), 
        //in our case the username is a string so we use "s"
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->store_result(); 	//store the result, and check it availability.
        if ($stmt->num_rows > 0) {
        $stmt->bind_result($pose_vying);
        $stmt->fetch(); 	//record exists, fetch candidate 
            $error = "Record Exists..\\nThis candidate had been added already for the position of $pose_vying.!";
            echo "<script>alert('".$error."'); document.location.href='candidates.php'</script>";
        }else{
    //new object instantiation
    $new_candidate = new Candidates();  
    //invoke the add user method, to save record
    $insertId = $new_candidate->addCandidate($name, $gender, $phonenumber, $position, $createdby, $location);
    if(empty($insertId)){
        $response = array(
        "message" => "Process failed..",
        "type" => "error"
        );
    header ('location: candidates.php');
    } else{
        $message = "New Candidate successfully added with the name: $name";
        echo "<script>alert('".$message."'); document.location.href='candidates.php'</script>";;
            } 
        }
    } 
}

?>
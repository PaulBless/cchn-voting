<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once '../functions/databaseController.php';
require_once '../functions/Admin.php';

//invoke database controller class
$db_handle = new databaseController();

if(isset($_POST['btnRegister'])){
     //get form data
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phonenumber = $_POST['phone'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $regdate = $_GET['regdate'];
    $status = 'Active';
    $fullname = $firstname. ' '. $lastname; //concatenate firstname & lastname into fullname
    $name = "{$firstname} {$lastname}";
       
        
//    //check phone, verify valid mtn, airteltigo, vodafone or glo
//    $chk_phone = substr($phonenumber, 0, 3);        
//    if($chk_phone != '024' && $chk_phone != '054' && $chk_phone != '055' && $chk_phone != '056' && $chk_phone != '059' && $chk_phone != '027' && $chk_phone != '057' && $chk_phone != '026' && $chk_phone != '050' && $chk_phone != '020' && $chk_phone != '023'){
//    echo "<script>alert('Sorry! Could not process\\n \\nThe phone number you entered is not valid..'); document.location.href='register.php'</script>";
//    }
        
    //check if the details exists in the database
    
    //new object instantiation
    $admin_user = new Admin();  
    $hashpwd = password_hash($password, PASSWORD_DEFAULT);  //hash the password
    //invoke the add user method, to save record
    $insertId = $admin_user->addAdmin($name, $phonenumber, $emailid, $username, $hashpwd, $status);
    if(empty($insertId)){
        $response = array(
        "message" => "Process failed..",
        "type" => "error"
        );
    header ('location: accounts.php');
    } else{
        $message = "User successfully added.\\n\\nLogin Details\\n------------------------\\nUsername: ".$username. "\\nPassword: ".$password." ";
        echo "<script>alert('".$message."'); document.location.href='accounts.php'</script>";;
        } 
    
}

    

?>
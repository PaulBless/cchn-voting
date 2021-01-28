<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnUpdate'])){
    require ('../functions/db_connection.php');
    
    $bool = true;
    $course=$_POST['course'];
    $fullname=$_POST['fullname'];
    $gender=$_POST['gender'];
    $phoneno = $_POST['phone'];
    $voter_id=$_POST['voter_id'];
    $phone_number_db = preg_replace('/^0/','233',$phone); //set phone number format
    $course_name = ucwords($course);
    $voter_fullname = ucwords($fullname);

    // prepare query to update record
    $query = "UPDATE `voters` SET `name` = '$voter_fullname', gender = '$gender', phoneno = '$phoneno', course = '$course_name' WHERE voterid = '$voter_id'";
    $execute_update = mysqli_query($connect_db, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Voter record updated!'); document.location.href='voters.php'</script>";
    }
}

if(isset($_POST['trycode'])){
    // require ('../functions/databaseController.php');
    // require ('../functions/Voters.php');

    // //invoke db instance
    // $db_handle = new databaseController();
    // $voter = new Voters();  //object instance of voters class

    ## proceed to update record
    // $voter->editVoter($voter_fullname, $gender, $phoneno, $course_name, $voter_id);
    // if($voter == true){ echo "<script>alert('voter record updated!'); document.location.href='voters.php'</script>";}


}

?>
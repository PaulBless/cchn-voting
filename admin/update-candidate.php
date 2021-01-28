<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if(ISSET($_POST['btnUpdate'])){
    require ('../functions/db_connection.php');

    $bool = true;
    $position=$_POST['position'];
    $fullname=$_POST['fullname'];
    $gender=$_POST['gender'];
    $phoneno = $_POST['phone'];
    $candidate_id=$_POST['candidate_id'];
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);
    $image_size= getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
    $location="upload/" . $_FILES["image"]["name"];
    

    $query = "UPDATE `candidates` SET `name` = '$fullname', gender = '$gender', phoneno = '$phoneno', position = '$position', picture='$location' WHERE candidateid = '$candidate_id'";
    $execute_update = mysqli_query($connect_db, $query);
    if($execute_update == true)
    {
        echo "<script>alert('Candidate record updated!'); document.location.href='candidates.php'</script>";
    }
}	

?>
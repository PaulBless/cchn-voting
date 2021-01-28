<?php 
session_start();
require_once('../vendor/autoload.php');  //no longer used
require_once('../functions/db_connection.php');


if (isset($_POST['sendotp'])) {   
    //pass form username and password
    $user_number = $_POST['phone_number']; //get phone number
    $phone_number = preg_replace('/^0/','233',$user_number); //append country code to phone number

    // preparing the SQL statement to prevent SQL injection.
    if ($stmt = $connect_db->prepare('SELECT `name` FROM `voters` WHERE phoneno = ?')) {    
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $user_number);
	$stmt->execute();  //execute the query
	$stmt->store_result(); // Store the result to check if the account exists

    if ($stmt->num_rows > 0) {
	$stmt->bind_result($voter_name);
	$stmt->fetch();
    
    ## create session variables
    $_SESSION['voter_phone'] = $_POST['phone_number'];
    $_SESSION['voter_name'] = $voter_name;

    ## generate random OTP code
    $otp = mt_rand(1000, 9999);

    //custom message to send
    $message = "Hello, " .$voter_name.", your verification code is: " . $otp;

    //defining the parameters
    $key = "HEWn2T1xE99bSuVt4YzKfDade";  // my sms API Key 
    $to = $phone_number;    // phone number to send sms to
    $msg = $message;        // message to send
    $sender_id = "CCHN eVote";   //11 Characters maximum
    $date_time = "";        // datetime of message

    //encode the message
    $msg = urlencode($msg);

    //prepare your url
    $url = "https://apps.mnotify.net/smsapi?"
                . "key=$key"
                . "&to=$to"
                . "&msg=$msg"
                . "&sender_id=$sender_id"
                . "&date_time=$date_time";
    
    $response = file_get_contents($url) ;   // get message response
    
    // if($response == 1000)   //message sent success
    // {
        //display success message and navigate to verification page
    echo "<script>alert('Login code is sent to your phone number'); window.location.href='../verifyotp.php'</script>";
    ## save OTP code in db to verify later on request
    $save_otp = mysqli_query($connect_db, "INSERT INTO `codes` (otp,mobileno,code_state) VALUES ('$otp','$user_number', '0')");      
    // }else{
    //    echo "<script>alert('Sorry, there was an error whiles sending OTP')</script>";
    // }

    } else{
        echo "<script>alert('Sorry, phone number is not registered'); window.location.href='../login.php'</script>";
    }

    }
}

?>
<?php 
session_start();
// require_once('../vendor/autoload.php');  //no longer used
require_once('db_connection.php');


if (isset($_POST['sendotp'])) {   
    //pass form username and password
    $user_number = $_POST['phone_number']; //get phone number
    $phone_number = preg_replace('/^0/','233',$user_number); //append country code to phone number

    // preparing the SQL statement to prevent SQL injection.
    if ($stmt = $connect_db->prepare('SELECT `voterid`, `name` FROM `voters` WHERE phoneno = ?')) {    
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the phone_number is a string so we use "s"
	$stmt->bind_param('s', $user_number);
	$stmt->execute();  //execute the query
	$stmt->store_result(); // Store the result to check if the account exists

        if ($stmt->num_rows > 0) {
        $stmt->bind_result($voter_id,$voter_name);
        $stmt->fetch();
        
        ## create session variables
        $_SESSION['voter_phone_number'] = $_POST['phone_number'];
        $_SESSION['voter_name'] = $voter_name;
        $_SESSION['voter_id'] = $voter_id;

        ## generate random OTP code
        $otp = mt_rand(1000, 9999);

        //custom message to send
        $message = "Hello, " .$voter_name.", your verification code is: " . $otp;

        //defining the parameters
        $key = "HEWn2T1xE99bSuVt4YzKfDade";  // mNotify SMS API Key 
        $to = $phone_number;    // phone number to send sms to
        $msg = $message;        // message to send
        $sender_id = "CCHN eVote";   //sender_id: 11 Characters maximum
        // $date_time = date("Y-m-d H:i:sa");    // datetime of message; if message is to be scheduled for sending later

        //encode the message
        $msg = urlencode($msg);

        //prepare the url & endpoint
        $url = "https://apps.mnotify.net/smsapi?"
                    . "key=$key"
                    . "&to=$to"
                    . "&msg=$msg"
                    . "&sender_id=$sender_id";
                    // . "&date_time=$date_time";
        
        $response = file_get_contents($url);   // get message response
        // if(!empty($response)){
        //     //show message sent alert popup
        //     echo "<script>alert('Login verification code is sent to your phone number'); window.location.href='../verification.php'</script>";    
        //    //save otp in db for verification later upon request
        //     $save_otp = mysqli_query($connect_db, "INSERT INTO `codes` (otp, mobileno, code_state) VALUES ('$otp', '$user_number', '0')");      
        // }

         //display success message and navigate to verification page
        echo "<script>alert('Login verification code is sent to your phone number'); window.location.href='../verification.php'</script>";
        ## save OTP code in db to verify later on request
        $save_otp = mysqli_query($connect_db, "INSERT INTO `codes` (otp, mobileno, code_state) VALUES ('$otp', '$user_number', '0')");      

        } else{
        echo "<script>alert('Sorry, phone number is not valid or registered'); window.location.href='../login.php'</script>"; 
        }

    }   //end sql query prepare

}

?>


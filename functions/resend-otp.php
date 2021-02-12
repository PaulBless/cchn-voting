<?php 
session_start();
// require_once('../vendor/autoload.php');  //no longer used
require_once('db_connection.php');


if (isset($_SESSION['voter_phone_number']) && !empty($_SESSION['voter_phone_number'])) {   
    //pass form username and password
    $user_number = $_SESSION['voter_phone_number']; //get phone number
    $phone_number = preg_replace('/^0/','233',$user_number); //append country code to phone number

    // preparing the SQL statement to prevent SQL injection.
    if ($stmt = $connect_db->prepare('SELECT `otp` FROM `codes` WHERE mobileno = ? AND `code_state`=?')) {    
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the phone_number is a string so we use "s"
	$stmt->bind_param('si', $user_number,'0');
	$stmt->execute();  //execute the query
	$stmt->store_result(); // Store the result to check if the account exists

        if ($stmt->num_rows > 0) { // Check if record exists
        $stmt->bind_result($stored_otp);
        $stmt->fetch();
        
        ## fetch voter name from db
        $sql=mysqli_query($connect_db, "SELECT `name` FROM `voters` WHERE `phoneno`=$user_number");
        $get_name = mysqli_fetch_assoc($sql);
        $voter_name = $get_name['name']; // value from db

        // show name
        echo "<script>alert('Voter name is : $voter_name'); document.location.href='../verification.php'</script>";

        //custom message to send
        $message = "Hello, " .$voter_name.", your new verification pin is: " . $stored_otp;

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
        
        //display success message and navigate to verification page
        echo "<script>alert('Login verification code successfully resent to your phone number'); window.location.href='../verification.php'</script>";
        
        } else{
        echo "<script>alert('Sorry, it seems the phone number is not found to process request'); window.location.href='../login.php'</script>"; 
             }

    }
}else{ echo "<script>alert('Sorry, no valid phone number found to process request'); window.location.href='../verification.php'</script>";}

?>


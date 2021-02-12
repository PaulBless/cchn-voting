
<?php 

session_start();
error_reporting(0);

//ensure db is added before processing script
require_once('./functions/db_connection.php');
require_once('./vendor/autoload.php'); 


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
// if (isset($_POST['sendotp'])) {   
//     //pass form username and password
//     $user_number = $_POST['phone_number'];

    
//     // preparing the SQL statement to prevent SQL injection.
//     if ($stmt = $connect_db->prepare('SELECT `name` FROM `voters` WHERE phoneno = ?')) {
// 	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
// 	$stmt->bind_param('s', $user_number);
// 	$stmt->execute();  //execute the query
// 	$stmt->store_result(); // Store the result to check if the account exists

//     if ($stmt->num_rows > 0) {
// 	$stmt->bind_result($voter_name);
// 	$stmt->fetch();
    
//     ##get voter name from db
//     //api variables
//     $api_key = '49195ddf';
//     $api_secret = 'sPnoLxvOUy9fkAmS';
//     $sender = "CCHN Voting";
//     $message_detail = "";

//     //call Vonage Client
//     $basic  = new \Vonage\Client\Credentials\Basic($api_key, $api_secret);
//     $client = new \Vonage\Client($basic);

//     $response = $client->sms()->send(
//         new \Vonage\SMS\Message\SMS($user_number, $sender, 'Hello, your code is')
//     );

//     $message = $response->current();

//     if ($message->getStatus() == 0) {
//         echo "OTP message was sent successfully\n";
//     } else {
//         echo "The message failed with status: " . $message->getStatus() . "\n";
//         }

		
//         }
    
//     }

// }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Application title -->
    <title>Voting System | LogIn</title>
    
    <!--meta information-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Voting system for college of community health nursing">
    <meta name="author" content="Paul Eshun">
    
    <!-- browser image -->
    <link rel="icon" href="./assets/images/logo.png" type="image/png">    
     <!-- bootstrap csss -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <!-- page main css -->
    <link href="./assets/css/pas-styles.css" rel="stylesheet">
    <link href="./assets/font-awesome/css/fontawesome-all.css" rel="stylesheet">

  <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src=".assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    //     $(function(){
    //       $("#user_number").focus(); 
    //    });    
    </script>
</head>
       
<body class="page-login"> 
       <!--login container-->
    <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form text-center" action="./functions/sendOTP.php" method="post" role="form" id="defaultForm">
            <div class="logo "><img src="./assets/images/logo.png" width="110" height="110"/><span style="display: block"><h4 class="app-title text-bold py-1">cchn voting system - login </h4></span>
            </div> 
            <div class="form-group mb-2 text-black">
                To sign in, enter your registered mobile number and we will send you a login pin to continue.. 
            </div>
            <div class="form-group">
                <input type="tel" class="form-control text-success font-weight-bold rounded-pill form-control-lg mb-3" placeholder="Phone Number" pattern="[0][0-9]{9}" maxlength="10" name="phone_number" id="user_number" autofocus required>
            </div>
            <div class="login-link">
                <button class="btn btn-custom mt-3 btn-block font-weight-bold rounded-pill btn-login" name="sendotp">GET LOGIN PIN </button>
            </div>
            <div class="bottom-text">
                <p class="lower-text">Designed by <a class="developer" href="https://linkedin.com/in/paul-eshun">Paul Eshun</a></p>
            </div>
    
        </form>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-login").click(function() {
            // $(this).prop("disabled", true);
            $(this).html(
                `<span style="display: inline-block;
    width: 2rem;
    height: 2rem;
    vertical-align: text-bottom;
    border: .25em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: spinner-border .75s linear infinite;
    animation: spinner-border .75s linear infinite;width: 1rem;
    height: 1rem;
    border-width: .2em;
    " class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> processing...`            );
            });
        });
    </script>
</body>
</html>

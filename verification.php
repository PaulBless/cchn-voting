
<?php 

session_start();
error_reporting(0);

//get voter phone number from session
if(isset($_SESSION['voter_phone_number']))
  $voters_phone = $_SESSION['voter_phone_number'];

//ensure db is added before processing script
require_once('./functions/db_connection.php');

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (isset($_POST['btnVerify'])) {   
    //get input data
    $code1 = $_POST['code1'];
    $code2 = $_POST['code2'];
    $code3 = $_POST['code3'];
    $code4 = $_POST['code4'];
    $otp_code = $code1 .$code2 .$code3 .$code4; //set input code

   
  // preparing the SQL statement to prevent SQL injection.
  if ($stmt = $connect_db->prepare('SELECT otp, mobileno, code_state FROM `codes` WHERE otp = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the otp is a string so we use "s"
	$stmt->bind_param('s', $otp_code);
	$stmt->execute();  //execute the query
	$stmt->store_result(); // Store the result to check later

    if ($stmt->num_rows > 0) {
    $stmt->bind_result($verify_otp, $voter_number, $code_status);
    $stmt->fetch();
      
      // check if code status is already used or validated
      if($code_status == 1)
      {
        echo "<script>alert('Sorry, this OTP Code is already used..\\nCannot proceed to vote!'); document.location.href='./verification.php'</script>"; 
      }else{
      //otp code valid, not used
      //update otp code status
      $update_otp_state = mysqli_query($connect_db, "UPDATE `codes` SET code_state='1' WHERE otp = $otp_code");

      // echo "<script>alert('Welcome $voter_number, to CCHN Voting System'); document.location.href='voting.php'</script>";
      header('location: voting.php');
        }
    } else {
      echo "<script>alert('Ooops..\\nOTP verification code invalid..'); document.location.href='./verification.php'</script>"; 
         } 

	  $stmt->close();    //close sql
    $connect_db->rollback(); //rollback db connection
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Application title -->
    <title>Voting System  - Verification</title>
    
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
        $(function(){
          $("#user_number").focus(); 
       });    
    </script>

    <style>
    input {
        margin: 0 5px;
        text-align: center;
        line-height: 80px;
        font-size: 50px;
        border: solid 1px #ccc;
        box-shadow: 0 0 5px #ccc inset;
        outline: none;
        width: 15%;
        transition: all .2s ease-in-out;
        border-radius: 3px;
      }

        input:focus {
          border-color: #3a6248;
          box-shadow: 0 0 5px #3a6248 inset;
        }
        .sms-not-sent{
            margin: 15px 0;
        }
        .sms-not-sent a:hover, .sms-not-sent a:visited{
            color: purple;
        }
        .sms-not-sent a:hover{
          text-decoration: underline;;
        }
        </style>
</head>
       
<body class="page-login"> 
       <!--login container-->
    <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form text-center" action="" method="post" role="form">
        <div class="logo"><img src="./assets/images/logo.png" width="110" height="110"/><span style="display: block"><h4 class="app-title text-bold py-1">cchn voting system - verify pin </h4></span>
         </div> 
        <div class="form-group">
         	Please enter the verification code we sent you on : <b> <?php echo $_SESSION['voter_phone_number']; ?> </b> to proceed voting...
        </div>
         <div class="form-group">
            <!-- <input type="tel" class="form-control rounded-pill form-control-lg" placeholder="Phone Number" name="phone_number" id="user_number" required> -->
            <div id="form">
              <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code1"/>
              <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code2"/>
              <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code3"/>
              <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code4"/>
            </div>
        </div>
        
        <div class="login-link">
        <button class="btn btn-custom mt-3 btn-block font-weight-bold rounded-pill btn-login" name="btnVerify">VERIFY PIN</button>
        </div>

        <div class="sms-not-sent">
            Didn't receive the code?<br />
          <a href="./functions/resend-otp.php" id="resend">Re-send code</a><br />
        </div>

        <div class="bottom-text">
            <p class="lower-text">Designed by <a class="developer" href="https://linkedin.com/in/paul-eshun">Paul Eshun</a></p>
        </div>
    
        </form>
    </div>
    
    <!-- auto move to next input box -->


<script type="text/javascript">
    // auto move input character function
    $(function() {
    'use strict';

      var body = $('body');

      function goToNextInput(e) {
        var key = e.which,
          t = $(e.target),
          sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
          e.preventDefault();
          return false;
        }

        if (key === 9) {
          return true;
        }

        if (!sib || !sib.length) {
          sib = body.find('input').eq(0);
        }
        sib.select().focus();
      }

      function onKeyDown(e) {
        var key = e.which;

        if (key === 9 || (key >= 48 && key <= 57)) {
          return true;
        }

        e.preventDefault();
        return false;
      }
      
      function onFocus(e) {
        $(e.target).select();
      }

      body.on('keyup', 'input', goToNextInput);
      body.on('keydown', 'input', onKeyDown);
      body.on('click', 'input', onFocus);

    })

</script>

<script type="text/javascript">
      $(document).ready(function() {
        //function to show spinner on button clicked
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
            " class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> a moment please...`            );
            });
        });
    </script>

</body>
</html>

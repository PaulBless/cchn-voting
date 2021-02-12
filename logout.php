<?php
	session_start();
	session_destroy();
## add database connection
require_once './functions/db_connection.php';

## get loggedin user ID
$userID = "";
if(isset($_SESSION['id']))
	$userID = $_SESSION['id'];

?>


<!DOCTYPE html>
<<html>
    <head>
          <head>
    <meta charset="utf-8">
     <!--  Application title -->
    <title>Voting System | Logout</title>
    
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
    
     
    <script type="text/javascript">
        function pageRedirect() {
            window.location.replace("index.php");
        }      

        setTimeout("pageRedirect()", 2000);
    </script>
    
    <!--  styles-->
       <style type="text/css">  
           body{
               background: #fff;
           }
           .logout .loader{
               position: fixed;
               left: 0px;
               top: 40%;
               width: 100%;
               z-index: 2;
               background: url('./assets/images/loader.gif') 50% 50% no-repeat;
               opacity: 0.8;
           }
           .hint{
               display: inline-block;
               margin-top: 60px;
           }
        </style>
    </head>
    
    <body>
        <div class="logout text-center"> 
        <div class="loader"><span class="hint">Loging out, please wait...</span></div>
    </div>
    </body>
</html>


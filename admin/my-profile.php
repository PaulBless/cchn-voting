
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

//include db connection file
include '../functions/db_connection.php';

//invoke controller classes
require_once '../functions/databaseController.php';
require_once '../functions/Admin.php';

//instance of db controller class
$db_handle = new databaseController();


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

//get and set loggedin username
if (isset($_SESSION['uname'])){
   $uname = ($_SESSION['uname']);
}


//get and set loggedin userid
if (isset($_SESSION['id'])){
   $uid = ($_SESSION['id']);
}

//fetch user data
$admin = new Admin();
$fetch = $admin->getAdminById($uid);
## -----------------------------------------


//process data on form submission
if(isset($_POST['btnupdate'])){
    ## set variables         
    //get form data
    $fullname = ($_POST['fullname']);
    $mobile = ($_POST['mobile']);
    $email = ($_POST['email']);
    $username = ($_POST['username']);
       
    #create instance object of admin class
    $new_admin = new Admin();
    //update record of user
	$update_profile = $new_admin->updateProfile($fullname,$mobile,$email,$username,$uid);
	
	//show success msg
	    $message = "Profile updated successfully";
	    echo "<script>alert('".$message."')</script>";
	    echo "<script>window.location.href='dashboard.php'</script>";
	   
}


?>


     
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Voting System  </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!--browser icon-->
    <link rel="icon" href="../assets/images/logo.png" type="image/png">    
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../admin/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../admin/assets/css/main.css" />
    <link rel="stylesheet" href="../admin/assets/css/theme.css" />
    <link rel="stylesheet" href="../admin/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.css" />
    <!--END GLOBAL STYLES -->

      <!--page level scripts-->
<!--   <link rel="stylesheet" href="../third-party/vendor/bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" href="../third-party/dist/css/bootstrapValidator.css">
    <!--scripts-->
    <script type="text/javascript" src="../third-party/vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../third-party/vendor/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../third-party/dist/js/bootstrapValidator.js"></script>
    
    <script type="text/javascript">
		function pageLoading(){
			$('.loading').show();
			setTimeout(function(){
				$('.loading').fadeOut();
			}, 1000);
		}
	</script>

	
    <!--stylesheet-->
    <style type="text/css" lang="css">
        legend{
            font-size: 15px;
            font-weight: bold;
            color: #5b6574;
        }
        .panel .my-sub-link:hover{
/*            background-color: #33b35a;*/
/*            color: white;*/
            background: #343a40;
            transition: transform .3s ease, -webkit-transform .3s ease, -moz-transform .3s ease, -o-transform .3s ease;
        }
      
        .loading{
            position: fixed;
            width: 100%;
            height: 100%;
			left: 0px;
			top: 0px;
			display: none;
            opacity:  0.7;
            background:#ccc url(../assets/images/spin.gif) center no-repeat;
            z-index: 99999;
			
        }
    </style>
   </head>    <!-- END HEAD -->

   
    <!-- BEGIN BODY -->
<body class="padTop53" onload="pageLoading()">
	<div class="loading" id="loader"></div>

 <!-- MAIN WRAPPER -->
    <div id="wrap" >
        
        <!-- HEADER SECTION -->
        <?php include('top.php') ?>
        <!-- END HEADER SECTION -->

		<!-- MENU SECTION -->
        <?php include('left.php') ?>
        <!--END MENU SECTION -->

       
        <!--PAGE CONTENT -->
        <div id="content">
                     
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                       <!--page title/section-->
                        <h5><span class="fa fa-home"></span> E-Voting <i class="fa fa-chevron-right"></i> Main Menu <i class="fa fa-chevron-right"></i> User Settings <i class="fa fa-chevron-right"></i> My Profile </h5>
                    </div>
                </div>
                <hr />
                
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                        <div class="icons"><i class="fa fa-user-plus"></i>
                        </div>
                        <h5>USER PROFILE</h5>
                        <div class="toolbar">
                        <ul class="nav">
                        <li>
                        <div class="btn-group">
                        <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                        href="#collapseForm">
<!--                        <i class="fa fa-chevron-up"></i>-->
                        </a>
                        </div>
                        </li>
                        </ul>
                        </div>
                        </header>
                        <!--form inputs fields-->
                    <div id="collapseForm" class="accordion-body collapse in body ">                           
						<form id="form-adduser" method="post" class="form-horizontal px-4 py-3" action="">
                    	<div class="panel panel-default">
                     	<div class="panel-heading">
                            Personal Info
                        </div>
						<br>
                      
                       <!--input field-->
                        <div class="form-group">
                            <label class="control-label col-lg-4">Full Name</label>
                            <div class="col-lg-4">
                                <input type="text" id="fullname" name="fullname" value="<?php echo $fetch[0]['fullname']; ?>" class="form-control"/>
                            </div>
                            <span class="lbl-error col-lg-4" id="fullname-error"></span>
                        </div>
                        <!--- email -->
                        <div class="form-group">
                            <label class="control-label col-lg-4">E-mail</label>
                            <div class="col-lg-4">
                                <input type="email" id="email" name="email" value="<?php echo $fetch[0]['email']; ?>" class="form-control" />
                            </div>
                            <span class="lbl-error col-lg-4" id="email-error"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Phone number</label>
                            <div class="col-lg-4">
                                <input type="tel" class="form-control" name="mobile" value="<?php echo $fetch[0]['mobileno']; ?>" id="mobile" pattern="[0][0-9]{9}" maxlength="10"/>
                            </div>
                            <span class="lbl-error col-lg-4" id="mobile-error"></span>   
                        </div>
                       <!--end-->
                       
                        <!--account info-->
                        <div class="panel-heading">
                            Account Info
                        </div>
						<br>
                        <!--username-->
                        <div class="form-group">
                            <label class="control-label col-lg-4">Username</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="username" value="<?php echo $fetch[0]['username']; ?>" />
                            </div>
                        </div>
                        <!--password-->
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-4">
                               <?php 
								$pwd = password_get_info($fetch[0]['password']); //get info
								$pwd_unhash = password_get_info($fetch[0]['password']);
								//echo $fetch[0]['password']; ?>
                                <input type="password" value="<?php echo $pwd_unhash; ?>" class="form-control" name="password" disabled />
                            </div>
                        </div>
                        <!--date value hidden-->
                        <div class="form-group">
                            <label class="col-lg-4 control-label ">Status</label>
                            <div class="col-lg-4">
                               <input type="text" class="form-control" value="<?php echo $fetch[0]['status']; ?>" name="status" id="status" readonly>
                            </div>
                        </div>   <!--date value hidden-->
                        <div class="form-group">
                            <label class="col-lg-4 control-label ">Date Registered</label>
                            <div class="col-lg-4">
                               <input type="text" class="form-control" value="<?php echo date('d M, Y', strtotime($fetch[0]['regdate'])); ?>" name="regdate" id="regdate" readonly>
                            </div>
                        </div>
                        
                        <!--buttons group-->
                        <div class="form-actions no-margin-bottom" style="text-align:center;">

						<!-- submit button-->
                       <button type="submit" name="btnupdate" value="" id="btnSave" class="btn btn-success" style="font-weight: bold; "><i class="fa fa-edit"></i> Update Profile</button>
                        <a class="btn btn-danger" type="reset" href="dashboard.php" style="margin-left: 25px; font-weight: bold;"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                        <br>
							</div><!-- panel default-->
                       	
                        </form>
                        
                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--END PAGE CONTENT -->
        
</div>    <!--END MAIN WRAPPER -->

<!-- FOOTER -->
    <div id="footer">
        <p>&copy; E-Voting 2021. &nbsp;Developed by <a class="app-developer" href="">Paul Eshun </a>&nbsp;</p>
    </div>
    <!--END FOOTER -->
    
        
    <!--END PAGE LEVEL SCRIPT-->
   <!-- validation scripts-->
<script type="text/javascript">
	$(document).ready(function() {
     
    //bootstrap form-control fields validation
    $('#form-adduser').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
//            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullname: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'Fullname cannot be empty, required!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z -]+$/,
                        message: 'The fullname can only consist of alphabet'
                    },
                }
            }, 
			username: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'Username cannot be empty, required!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z -]+$/,
                        message: 'The username can only consist of alphabet'
                    },
                }
            },
            email: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'Email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            mobile: {
                group: '.col-lg-4',
                validators: {
                    digits: {
                        message: 'Phone number should be digits only'
                    },
                    notEmpty: {
                            message: 'Phone number is required'
                        },
                    stringLength: {
                        min: 1,
                        max: 10,
                        message: 'Phone number is not complete'
                            },
                        }
                    },
        }
    });
    
    
    // keypress event
    //phone-number validation
    jQuery("#mobile").keypress(function(ev){
    var x = $(this).val();
    if (ev.keyCode < 48 || ev.keyCode > 57) {
      ev.preventDefault();
        }
    });
    
 
    
    //last-name validation
    jQuery("#fullname").keypress(function(ev){
        var x = $(this).val();
        if ((ev.keyCode < 65 || ev.keyCode > 90) && (ev.keyCode < 97 || ev.keyCode > 122 ) && (ev.keyCode == 32)){
            ev.preventDefault();
        }
    });
    
    
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
 
	$('#btnSave').click(function(){
        var addBtn = document.querySelector('.btn-success');
        
        addBtn.addEventListener("click", function(){
            addBtn.innerHTML = "Saving..";
            addBtn.classList.add('saving');
            
            setTimeout(function(){
                addBtn.classList.remove('saving');
                addBtn.innerHTML = "Save";
            }, 4000);
        }, false);
        
    });
</script>

<!--preloading-->
 	<script type="text/javascript">
        function displayLoader(){
			$('.loading').show();        
        setTimeout(function(){
            $('.loading').fadeOut();
        }, 1000)};
    </script>
   
    </body>
</html>
    
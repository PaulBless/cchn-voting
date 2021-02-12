
<?php
session_start();

include '../functions/db_connection.php';
//invoke controller classes
require_once '../functions/databaseController.php';
require_once '../functions/Candidates.php';


//instance of db controller class
$db_handle = new databaseController();


## If the user is not logged in, redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: logout.php');
	exit;
}


//get user action type
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


//get application reviewid
$reviewId = "";
if (isset($_GET['reviewId'])) {
    $reviewId = $_GET['reviewId'];
}

//fetch candidates list
$candidates = new Candidates();
$dbresults = $candidates->getAllCandidates();
## -----------------------------------------


?>


    
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head class="">
    <meta charset="UTF-8" />
    <title>Voting System  </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="E-voting system for nursing" name="description" />
	<meta content="Paul Eshun" name="author" />
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
			$('.spinning').show();
			setTimeout(function(){
				$('.spinning').hide();
			}, 1000);
		}
	</script>
      
       <style>
           /* custom styling to sub-menus*/
        .panel .my-sub-link:hover{
    /*            background-color: #33b35a;*/
    /*            color: white;*/
                background: #343a40;
                transition: transform .3s ease, -webkit-transform .3s ease, -moz-transform .3s ease, -o-transform .3s ease;
            }
		   .spinning{
			opacity: 1.0;
			background: #fefefe url(../assets/images/LoaderIcon.gif) no-repeat center;
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0px;
			left: 0px;
			z-index: 2000;
			display: none;
		}
    </style>
    
	</head>
   
<!--   BEGIN THE PAGE BODY-->
    <body class="padTop53 " onload="pageLoading()" onreset="" >
    	<div class="spinning"></div>
    
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
                        <h5><span class="fa fa-home"></span> E-Voting <i class="fa fa-chevron-right"></i> Candidates <i class="fa fa-chevron-right"></i> Candidate List </h5>
                    </div>
                </div>
                  <hr class="border-primary"/>
                   
                 <div class="col-lg-12">
                   <a href="dashboard.php" class="btn btn-warning btn-sm" style="font-weight: bold"><i class="fa fa-arrow-left" style="margin-right: 3px;"></i> Go Back</a>
                <div class="box">
                    <header>
                        <div class="icons"><i class="fa fa-users"></i></div>
                        <h5>CANDIDATE LIST</h5>

                        <div class="toolbar">
                            <ul class="nav pull-right">
                                <li>
                                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-4">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </header>
                    
                    <!--get admin account details-->
                    <div class="panel panel-default">
                                               
                        <a href="" target="_self" data-toggle="modal" data-target="#regAdmin" class="btn btn-primary btn-rect" style="font-weight: bold; float: right; margin: 5px 5px 5px 5px;"><i class="fa fa-plus"></i> Add Candidate</a>
						<br>
                       <div class="panel-body" style="margin-top: 10px;">
                        <div class="panel panel-default">

                                <div class="panel-body" >
                                    <table id="table" data-toggle="table" data-pagination="" data-search="true" data-show-columns="" data-show-pagination-switch="" data-show-refresh="" data-key-events="" data-show-toggle="" data-resizable="" data-cookie="" data-cookie-id-table="saveId" data-show-export="" data-click-to-select="" data-toolbar="#toolbar" class="table table-bordered table-hover" width="100%">
            
                    			<thead class="text-warning" style="background: #000">
                        			<tr class="">
                        <th class="">No.</th>
                        <th data-field="userid" class="hidden">ID</th>
                        <th data-field="fullname">Full Name</th>
                        <th data-field="gender">Gender</th>
                        <th data-field="mobile">Mobile No</th>
                        <th data-field="position">Position</th>
                        <th data-field="createdby" class="">Created By</th>
                        <th data-field="picture">Picture</th>
                        <th data-field="action">Action</th>
                        </tr>
                    			</thead>
                    <tbody>
        <?php
        	$bool = false;
            $query1=mysqli_query($connect_db, "SELECT * FROM `candidates` ORDER BY `name` ASC");
            $cnt=1;
		
		//fetch[0]['name'];
            while($records=mysqli_fetch_array($query1)){
            //get candidate id
            $candidate_id = $records['candidateid'];
        ?>
                <tr>
                <td><?php echo $cnt; ?></td>
                 <td class="hidden"><?php echo $records['candidateid'] ?></td>
                <td><?php echo $records['name']; ?></td>
                <td><?php echo $records['gender']; ?></td>
                <td><?php echo $records['phoneno']; ?></td>
                <td><?php echo $records['position']; ?></td>
                <td><?php echo $records['createdby']; ?></td>
                <td class=""><img style="" src="<?php echo $records['picture']; ?>" width="35" height="35" class="img-rounded"</td>
                <td class="datatable-ct">
                  
                <!--update link-->
                 <a title="Click to update" id="<?php echo $records['candidateid'] ?>" href="#edit_candidate<?php echo $records['candidateid'] ?>"  data-toggle="modal" class="btn btn-info btn-sm" href=""> <i class="fa fa-trash"></i> Edit </a>
                 <?php require('modal/edit_candidate.php'); ?>

                 <!-- delete link -->
                 <a title="Click to delete" class="btn btn-danger btn-sm" href="delete-candidate.php?candidateid=<?php echo htmlentities($records['candidateid']);?>" onclick="return confirm('Do you really want to delete this candidate from the system?')"> <i class="fa fa-trash"></i> Delete </a>
                 
               </td>
                </tr>
            <?php
            $cnt=$cnt+1;        
}?>
                    </tbody>
                </table>   
                                </div>

                        </div>
                          </div>                
                    
                       
                    </div>
      
                </div>
					</div>

			</div>

        </div><!--END PAGE CONTENT -->
        
    </div> <!--END MAIN WRAPPER -->


<!--include add user modal-->
   <?php include('modal/add_candidate.php') ?>
    
<!-- FOOTER -->
<?php include('../includes/footer.php'); ?>
<!--END FOOTER -->
    

<!-- validation scripts-->
<script type="text/javascript">
	$(document).ready(function() {
    
		//button click event
		
		// Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    
    //bootstrap form-control fields validation
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
//            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                group: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Firstname cannot be empty, required!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The firstname can only consist of alphabet'
                    },
                }
            },
            lastName: {
                group: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Lastname cannot be empty, required!'
                    },
                     regexp: {
                        regexp: /^[a-zA-Z -]+$/,
                        message: 'The lastname can only consist of alphabet'
                    },
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Username cannot be empty, required!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
//                    remote: {
//                        type: 'POST',
//                        url: '../functions/checkUsernameAvailabiility.php',
//                        message: 'The username is not available'
//                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password cannot be empty, required!'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password must be more than 6 and less than 30 characters long'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'Retype your password to confirm!'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password must be more than 6 and less than 30 characters long'
                    },
                    identical: {
                        field: 'password',
                        message: 'The passwords you entered do not match'
                    },
                    different: {
                        field: 'username',
                        message: 'Password cannot be the same as your Username'
                    }
                }
            },
            phone: {
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
            
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });
    
    // keypress event
    //phone-number validation
    jQuery("#phone-number").keypress(function(ev){
    var x = $(this).val();
    if (ev.keyCode < 48 || ev.keyCode > 57) {
      ev.preventDefault();
        }
    });
    
    jQuery("#phone-number").onblur(function(ev){
        var x = $(this).val();
        var num = this.substring(0, 3);
        if (num != '054' && num != '024'){
            alert('Phone number is invalid.');
        }
    });
    
    //first-name validation
    jQuery("#first-name").keypress(function(ev){
        var x = $(this).val();
        if ((ev.keyCode < 65 || ev.keyCode > 90) && (ev.keyCode < 97 || ev.keyCode > 122 )){
            ev.preventDefault();
        }
    });
    
    //last-name validation
    jQuery("#last-name").keypress(function(ev){
        var x = $(this).val();
        if ((ev.keyCode < 65 || ev.keyCode > 90) && (ev.keyCode < 97 || ev.keyCode > 122 )){
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

</script>

	</body>
</html>









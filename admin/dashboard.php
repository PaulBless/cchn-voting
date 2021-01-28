
 
<?php
session_start();
error_reporting(0);

include '../functions/db_connection.php';
//invoke controller classes
require_once '../functions/databaseController.php';
//require_once '../functions/Candidates.php';
//require_once '../functions/Voters.php';
//require_once '../functions/Admin.php';

//instance of db controller class
$db_handle = new databaseController();


## If the user is not logged in, redirect to the login page...
//if (!isset($_SESSION['loggedin'])) {
//	header('Location: logout.php');
//	exit;
//}

if(isset($_SESSION['ufullname'])){
	
}

//get user action type
$action = "";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


//global variables
$total_users = "";                 
$total_candidates = "";        
$total_voters = "";

//run code below to get last total users, total applications,
//and total permits from db
$sql_admin = "select count(*) as totadmin from `admin_account`";
$sql_total_candidates = "select count(*) as totcandidates from `candidates`";
$sql_total_voters = "select count(*) as totvoters from `voters`";


//get total Admins
$result = $connect_db->query($sql_admin);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $total_users = $row["totadmin"];  
    }
}else{
    //no record found in db
    $total_users = "0";
}


//get total candidate list
$result1 = $connect_db->query($sql_total_candidates);
if($result1->num_rows > 0){
    while($row = $result1->fetch_assoc()){
        $total_candidates = $row["totcandidates"];
    }
}else{
    $total_candidates = "0";
}

//get total voter list
$result2 = $connect_db->query($sql_total_voters);
if($result2->num_rows > 0){
    while($row = $result2->fetch_assoc()){
        $total_voters = $row["totvoters"];
    }
}else{
    $total_voters = "0";
}




?>


 <?php include('../includes/header.php'); ?>
    
    <style>
      /* custom styling to sub-menus*/
      .panel .my-sub-link:hover{
    /*            background-color: #33b35a;*/
    /*            color: white;*/
                background: #343a40;
                transition: transform .3s ease, -webkit-transform .3s ease, -moz-transform .3s ease, -o-transform .3s ease;
            }
    </style>
    
 <!-- MAIN WRAPPER -->
    <div id="wrap" >

       <?php include ('top.php') ?>

      <?php include ('left.php'); ?>
       
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                       <!--page title/section-->
                        <h5 class=""><span class="fa fa-home"></span> Voting System <i class="fa fa-chevron-right"></i> Admin Dashboard </h5>
                    </div>
                </div>
                  <hr />
                  
                  
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">


                   <!--system users-->
                    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
                        <div class="main-box infographic-box ">
                            <i class="fa fa-user-md red-bg"></i>
                            <span class="headline"><strong>System Users</strong></span>
                            <span class="value"><?php echo $total_users; ?></span>
                             <span class="subtitle">(total system users)</span>
                        </div>
                    </div>
                    <!--total applications received-->
                    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
                        <div class="main-box infographic-box ">
                            <i class="fa fa-users emerald-bg"></i>
                            <span class="headline"><strong>Total Candidates</strong></span>
                            <span class="value"><?php echo $total_candidates ?></span>
                             <span class="subtitle">(total candidate lists)</span>
                        </div>
                    </div>
                    <!--permits granted -->
                    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
                        <div class="main-box infographic-box ">
                            <i class="fa fa-list-ul green-bg"></i>
                            <span class="headline"><strong>Total Voters</strong></span>
                            <span class="value"><?php echo $total_voters ?></span>
                             <span class="subtitle">(total voter list)</span>
                        </div>
                    </div>
                   
                    </div>
                </div>
                 <!--end row top items-->          
                 
                  <!--END BLOCK SECTION -->
                <hr />
                 
				
		<!--   add user modal-->
                <?php include('modal/add_user.php') ?> 

            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        <div id="right">
            <div class="well well-small">
                <ul class="list-unstyled">
                    <li class="text-primary">System Users: <span class="text-warning" style="font-weight:bold"><?php echo $total_users ?></span></li>
                    <li class="text-primary">Candidates: <span class="text-warning" style="font-weight:bold"><?php echo $total_candidates ?></span></li>
                    <li class="text-primary">Voters: <span class="text-warning" style="font-weight:bold"><?php print $total_voters ?></span></li>
                </ul>
            </div>
            <!--well column-->

        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

<?php include('../includes/footer.php'); ?>




<?php 
session_start();

include './functions/db_connection.php';
// require_once './functions/databaseController.php';

$positions_array = [];

$get_positions = mysqli_query($connect_db,'SELECT * FROM candidates');

while ($each_position = mysqli_fetch_array($get_positions)) {
    $position = $each_position['position'];
    if(!in_array($position,$positions_array)){ // Check if position is already in array
        array_push($positions_array,$position);
    }
}

 ?>


<!DOCTYPE html> 
<html> 

<head> 
    <title>CCHN Voting System</title>
    <link rel="icon" href="./assets/images/logo.png" type="image/png">    

	<!--add bootstrap core files-->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css"> 
	<!-- <link rel="stylesheet" href="./assets/css/pas-styles.css">  -->
    
    <!-- <link rel="stylesheet" href="./admin/assets/plugins/bootstrap/css/bootstrap.css" /> -->
    <link rel="stylesheet" href="./includes/main.css" />
    <link rel="stylesheet" href="./includes/theme.css" />
    <link rel="stylesheet" href="./includes/MoneAdmin.css" />

     <!-- PAGE LEVEL STYLES -->
     <link href="./admin/assets/plugins/jquery-steps-master/demo/css/normalize.css" rel="stylesheet" />
    <link href="./admin/assets/plugins/jquery-steps-master/demo/css/wizardMain.css" rel="stylesheet" />
    <link href="./admin/assets/plugins/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" />    
    <!-- END PAGE LEVEL  STYLES -->

	<!--add jquery-->
	
    

    <style type="text/css">
        #nav li{
            font-size: 18px;
            font-weight: 600;
            /* margin: 0 0 0 20px; */

        }   
      
        #nav li:first-child{
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 0 50px;

        }
        #nav li:hover{
            background:  #f8f9fa;
            cursor: all pointer;
        }
        #nav a{
        /* color: #252525 !important; */
        }
        #nav a:hover, #nav:visited{
        text-decoration: none;
        }

    </style>
</head> 

<body> 

	<!--First navbar-->
	<nav class="navbar navbar-expand-lg" style="background-color: cadetblue;" id="nav_1"> 

		<a class="navbar-brand text-light" href="#"><strong>CCHN Voting System</strong></a> 
        
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item"><a href="" class="nav-link text-white"><b>Welcome, <?php echo $_SESSION['voter_name']; ?></b></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white"><b>Logout</></a></li>
        </ul>
	</nav> 

	<!--Second navbar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav"> 
		
		<button class="navbar-toggler"
			type="button" data-toggle="collapse"
			data-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup"
			aria-expanded="false"
			aria-label="Toggle navigation"> 
			
			<span class="navbar-toggler-icon"></span> 
		</button> 

		<div class="collapse navbar-collapse"
			id="navbarNavAltMarkup"> 
			
			<ul class="navbar-nav "> 
                <li class="nav-item nav-link active" style="background: lightgray">
               <a href="voting.php"> Core Members </a>
				</li> 
				
				<li class="nav-item nav-link" >
                   <a href="auxiliary.php">Auxiliary Members </a>
				</li> 
				
			</ul> 
		</div> 
    </nav> 
    
    <div class="wrap">
    <!-- add position list -->
    <?php include('sidebar_positions.php'); ?>

    <div id="content">
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                       <!--page title/section-->
                        <!-- <h5>E-Voting: Candidate List </h5> -->
                    </div>
                </div>
                  <hr />
                   

<?php

for ($i=0; $i < count($positions_array); $i++) { 
    $current_position = $positions_array[$i];
    echo $current_position;

?>
<div class="col-lg-12">

                 <div class="box">
                 <?php //echo $current_position; ?>

                 <div class="panel panel-primary" style="padding: 15px 15px;">
                        <div class="text-danger text-bold"><center>
                            Select One Candidate</center>
                        </div>
                 </div>

                 <div class="panel-body">
                     <?php 
                     $sql = "SELECT * FROM `candidates` WHERE `position`='$current_position'";
                     $query = mysqli_query($connect_db, $sql);
                     while($results = mysqli_fetch_array($query))
                     {
                         ?>
                        <div id = "position" style="padding: 10px 10px; ">
                        <div class="col-lg-5 ">
                     <div class="card" style="max-width: 500px;">
                    <div class="row no-gutters">
                        <div class="col-sm-5" style="background: #868e96;" id="picture">
                            <img src="admin/<?php echo $results['picture'] ?>" class="card-img-top h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $results['name'] ?></h5>
                                <input type="checkbox" name="pres_id" id="" class="president">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                         <?php
                     }
                     ?>


                 </div> <!--end of canidate card -->

                

                
    </div>
    </div>
            </div>


<?php } ?>



            

    <!-- <script src="./assets/js/jquery-3.4.1.min.js"> </script>  -->

    <script src="./admin/assets/js/jquery-2.0.3.min.js"></script>
	<script src="./assets/js/bootstrap.bundle.min.js"> </script> 

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="./admin/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="./admin/assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
    <script src=".admin/assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>   
    <script src="./admin/assets/js/WizardInit.js"></script>

    <script type="text/javascript">
     //Near checkboxes
     $('.president').on('change', function() {
        $('.president').not(this).prop('checked', false);  
    });
  </script>         <!--END PAGE LEVEL SCRIPTS -->
</body> 

</html> 

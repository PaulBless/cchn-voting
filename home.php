<?php 
session_start();

include './functions/db_connection.php';
// require_once './functions/databaseController.php';

## check if voter has cast ballot already
// $sql = "SELECT * FROM `vote_cast` WHERE `voters_id` = '".$_SESSION['id']."'";
// $vquery = $connect_db->query($sql);
// if($vquery->num_rows > 0){
//   //show error message, already voted

// }
////////// end of checking casted vote here /////////


$positions_array = [];  // array for positions

$get_positions = mysqli_query($connect_db,'SELECT * FROM candidates'); // get position

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
	<link rel="stylesheet" href="./assets/font-awesome/css/fontawesome-all.css"> 
    
    <!-- <link rel="stylesheet" href="./admin/assets/plugins/bootstrap/css/bootstrap.css" /> -->
  <link rel="stylesheet" href="./includes/main.css" />
  <link rel="stylesheet" href="./includes/theme.css" />
  <link rel="stylesheet" href="./includes/MoneAdmin.css" />

     <!-- PAGE LEVEL STYLES -->
  <link href="./admin/assets/plugins/jquery-steps-master/demo/css/normalize.css" rel="stylesheet" />
  <link href="./admin/assets/plugins/jquery-steps-master/demo/css/wizardMain.css" rel="stylesheet" />
    <!-- <link href="./admin/assets/plugins/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" />     -->
    <!-- END PAGE LEVEL  STYLES -->
	
    
  <style type="text/css">

    #top-nav1{
      height: 100px;
      /* background-color: cadetblue !important; */
      background-image: linear-gradient(cadetblue, rgba(0,0,0,0.1)), url(./assets/images/voting.jpg);
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      filter: sepia(15%);
      padding: 60px;
    }
    #top-nav1 .navbar-brand{
      color: #fff;
      font-size: 1.7rem;
    }
    #top-nav1 span{
      display: block;
      font-size: 0.8rem;
    }   
    #top-nav2{
      border-bottom: 2px solid #f1f1f1;
    }
  
    #list{
    padding:  10px auto 25px;
    }
    .candidates img{
       border-radius: 10%;
     }
    .cand-img{
      margin: 10px auto;
      display: inline;
      float: left;
      width: 100%;
      background: #f8f8f8;
      transition: 0.5s;
      text-align: center;
      border: 1px solid #ccc;
    }
    .cand-img:hover{
      box-shadow: 0 2px 20px #333;
      border-top: 4px solid cadetblue;
      filter: grayscale(1);
          
    }
    .caption{
      font-family: 'Arial';
      font-size: 12px;
      letter-spacing: 2px;
      margin: 20px 0 10px 0;
    }
    .caption::after
    {
        content: '';
        background: #1f7099;
        display: block;
        height: 1px;
        width: 80px;
        margin: 5px auto 5px;
      }

    .cand-tag
    {
        font-size: 12px;
        font-weight: bold;
        margin: 10px 0 10px 0;
    }
    .cand-tag span{
        font-size: 20px;
        font-weight: 500;
    }
    .cand-picture{
        display: inline;
        /* float: left; */
        padding-top: 20px;
        padding-bottom: 20px;
        margin-bottom: 10px;
    }
    .cand-content
    {
        font-size: 15px;
        color: #252525;
    }
    .cand-content strong
    {
        display: block;
    }
    .link-box a:hover{
      text-decoration: none;
    }
    .cast-vote-btn{
      position: relative;
      display: inline-block;
      text-transform: capitalize;
      margin-top: 10px;
      margin-bottom: 10px;
      border-radius: 6px;
      overflow: hidden;
      transition:all 0.3s ease;
      -moz-transition:all 0.3s ease;
      -webkit-transition:all 0.3s ease;
      -ms-transition:all 0.3s ease;
      -o-transition:all 0.3s ease;
    }

    .cast-vote-btn .btn-title{
      position: relative;
      display:block;
      font-size: 16px;
      color: #ffffff;
      font-weight: 700;
      padding: 10px 20px;
      background: cadetblue;
      border-radius: 8px;
      z-index:1;
      transition:all 0.3s ease;
      -moz-transition:all 0.3s ease;
      -webkit-transition:all 0.3s ease;
      -ms-transition:all 0.3s ease;
      -o-transition:all 0.3s ease;
    }

    .cast-vote-btn:hover .btn-title{
      background: #252525;
      color: #ffffff;
    }

    .positions{
      padding-top: 20px;
    }
  </style>

</head> 

<body> 

	<!-- start header for double nav menus -->
<header >

  <nav class="navbar navbar-expand navbar-light bg-light " style="height: 25px; font-size: 10px; font-weight: bold; color: cadetblue">
    <div class="container">
      <a class="navbar-brand text-primary font-weight-bold" style="font-size: 12px;" href="#">Welcome, <?php echo $_SESSION['voter_name'] ?></a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 " style="color: white;">
          <li class="nav-item"> 
            <a class="nav-link mt-1" href="#"><i class="fa fa-search text-primary"></i> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><button class="btn-custom btn-xs rounded-pill border-primary"><i class="fa fa-user"></i> Logout</button> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <nav class="navbar navbar-expand navbar-light bg-light " id="top-nav1">
    <div class="container">
      <a class="navbar-brand " href="#">CCHN - Winneba <span>College of Community Health Nursing</span><span>2020/21 Academic year Elections</span></a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="collapse navbar-collapse " id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 " style="color:  white;">
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Name: <?php ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Logout</a>
          </li>
        </ul>
      </div> -->
    </div>
  </nav><!--end first nav -->

  <nav class="navbar navbar-expand-sm navbar-light bg-light mt-0 font-weight-bold text-dark" id="top-nav2"> <!-- begin second nav -->
    <div class="container">
      <!-- <a class="navbar-brand" href="#">E-Voting System</a> -->
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse align-items-center justify-content-center" id="collapsibleNavId">
        <ul class="navbar-nav justify-content-center mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Core Members</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auxiliary.php">Auxiliary Members</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> <!-- end second nav -->
</header>  
<!-- end header -->

    
     
  <?php

for ($i=0; $i < count($positions_array); $i++) { 
    $current_position = $positions_array[$i];
    // echo $current_position; 

  ?>
    
                 <?php //echo $current_position; ?>
                    
                     <?php 
                     $sql = "SELECT * FROM `candidates` WHERE `position`='$current_position'";
                     $query = mysqli_query($connect_db, $sql);
                     while($results = mysqli_fetch_array($query))
                     {
                         ?>
                        <div class="positions bg-white">
                          <form action="" id="vote-detail">
                          <div class="row align-items-center justify-content-center ">
                            <div class="col-md-4 candidates">
                                  <div class="cand-img" > 
                                    <div class="cand-head">
                                        <div class="caption ">Position Vying For</div>
                                        <div class="cand-tag"><?php echo $results['position']; ?></div>
                                        <div class="cand-picture"> <img src="admin/<?php echo $results['picture']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="cand-content">
                                    <h3><?php echo $results['name']; ?></h3> 
                                    </div>
                                        <div class="link-box">
                                          <input type="radio" name="cast[]" class="border-primary" value="<?php echo $results['candidateid'] ?>">
                                          <!-- <a href="" id="cand_select" class="custom-btn cast-vote-btn" data-id="<?php echo $results['candidateid']; ?>"><button type="button" id="castVote" class="btn-title cand_selected" data-id="<?php echo $results['candidateid'] ?>" name="vote" value="<?php echo $results['candidateid'] ?>">VOTE</button></a> -->
                                          <!-- <button type="submit" id="castVote" class="custom-btn cast-vote-btn btn-title cand_selected" data-id="<?php echo $results['candidateid'] ?>" name="vote" value="<?php echo $results['candidateid'] ?>">VOTE</button> -->
                                        </div>
                                  </div>
                            </div>
                          </div> <!-- end row -->
                          </form> <!-- end form -->
                        
                        
                         <?php
                     }
                     ?>                

                </div> <hr>


<?php } ?>


<footer class="main-footer justify-content-between " style="background: #252525; margin-top: 40px; color: #979797; height: 50px; font-size: 13px">
    <div class="container mt-4 mb-4 py-3">
      <div class="pull-right hidden-xs" style="float: right; margin-top: 5x">
        <b>Designed by Paul Eshun</b>
      </div>
      <strong class="pull-left " style="margin-top: 5px;">CCHN - Copyright &copy; 2021 </strong>
    </div>
</footer>


    <script src="./assets/js/jquery-3.4.1.min.js"> </script> 

    <!-- <script src="./admin/assets/js/jquery-2.0.3.min.js"></script> -->
	  <!-- <script src="./assets/js/bootstrap.bundle.min.js"> </script>  -->

    <!-- PAGE LEVEL SCRIPTS -->
    <!-- <script src="./admin/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script> -->
    <script src="./admin/assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
    <script src=".admin/assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>   
    <script src="./admin/assets/js/WizardInit.js"></script>

    <script type="text/javascript">
     //Near checkboxes
     $('.president').on('change', function() {
        $('.president').not(this).prop('checked', false);  
    });
  </script>     
  
  <script type="text/javascript">
      $(document).ready(function(){
        //trigger button clicked
        $('#castVote').click(function(e){
          alert ("button clicked");
          $('#vote_detail').html().hide();
        });

      });
    </script>
  
  <!--END PAGE LEVEL SCRIPTS -->
</body> 

</html> 

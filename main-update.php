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
  <!-- <link href="./admin/assets/plugins/jquery-steps-master/demo/css/normalize.css" rel="stylesheet" /> -->
  <!-- <link href="./admin/assets/plugins/jquery-steps-master/demo/css/wizardMain.css" rel="stylesheet" /> -->
    <!-- <link href="./admin/assets/plugins/jquery-steps-master/demo/css/jquery.steps.css" rel="stylesheet" />     -->
    <!-- END PAGE LEVEL  STYLES -->

    <link href="./third-party/dist/css/smart_wizard_all.min.css" rel="stylesheet" />
	
    
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


<div id="smartwizard" height="600px">

    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#step-1">
            Step 1
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-2">
            Step 2
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-3">
            Step 3
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#step-4">
            Step 4
          </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
            Lorem ipsum dolor sit amet, consectet
        </div>
        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
            Lorem ipsum dolor sit amet, consectet
        </div>
        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
            Lorem ipsum dolor sit amet, consectet
        </div>
        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
             Lorem ipsum dolor sit amet, consectet
        </div>
    </div>
</div>

  <?php

  for ($i=0; $i < count($positions_array); $i++) { 
      $current_position = $positions_array[$i];
      // echo $current_position;
      ?> 
      <div class="d-lg-flex align-content-center justify-content-center text-light font-weight-bold mt-4 py-2 bg-dark "> <center>Position: <?php echo $current_position; ?> <span class="ml-4 text-secondary ">Select only one Candidate</span> </center>  </div>
      <?php

  ?>
                    
            <?php 
                     $sql = "SELECT * FROM `candidates` WHERE `position`='$current_position'";
                     $query = mysqli_query($connect_db, $sql);
                     while($results = mysqli_fetch_array($query))
                     {
                        ?>
                       
                        <div class="bg-white container d-flex align-items-center justify-content-center">
                            <!-- <p class="text-warning">Please, choose your favourite candidate</p> -->
                            <form action="" id="ballot" class="ballot ">
                                <div class="form-group ">
                                   <input type="radio" name="person[]" id="candidate_selected" class="mb-2 py-2 mr-4" value="<?php echo $results['candidateid'] ?>">
                                    <img src="admin/<?php echo $results['picture'] ?>" class="image-responsive mb-2 py-1 m-2" alt="Picture" height="120" width="120" style="border-radius: 50%;">
                                    <label for="name" class="text-black text-uppercase mb-2 py-2 mr-4 font-weight-bold"><?php echo $results['name'] ?></label>
                                </div>

                                <!-- submit vote button --> 
                            </form>                           

                    </div>
                        <?php
                     }
            ?>                


<?php } ?>

<!-- 
<footer class="main-footer justify-content-between " style="background: #252525; margin-top: 40px; color: #fff; height: 50px; font-size: 13px">
    <div class="container">
      <div class="pull-right hidden-xs" style="float: right; margin-top: 5px">
        <b>Designed by Paul Eshun</b>
      </div>
      <strong>CCHN - Copyright &copy; 2021 </strong>
    </div>
</footer> -->


    <script src="./assets/js/jquery-3.4.1.min.js"> </script> 

    <!-- <script src="./admin/assets/js/jquery-2.0.3.min.js"></script> -->
	  <script src="./assets/js/bootstrap.bundle.min.js"> </script> 
	  <script src="./third-party/dist/js/jquery.smartWizard.min.js"></script> 

    <!-- PAGE LEVEL SCRIPTS -->
    <!-- <script src="./admin/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script> -->
    <!-- <script src="./admin/assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script> -->
    <!-- <script src=".admin/assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>    -->
    <!-- <script src="./admin/assets/js/WizardInit.js"></script> -->


    <script type="text/javascript">
$(document).ready(function() {

  $('#smartwizard').smartWizard({
  selected: 0, // Initial selected step, 0 = first step
  theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
  justified: true, // Nav menu justification. true/false
  darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
  autoAdjustHeight: true, // Automatically adjust content height
  cycleSteps: false, // Allows to cycle the navigation of steps
  backButtonSupport: true, // Enable the back button support
  enableURLhash: true, // Enable selection of the step based on url hash
  transition: {
      animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
      easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
  },
  toolbarSettings: {
      toolbarPosition: 'bottom', // none, top, bottom, both
      toolbarButtonPosition: 'right', // left, right, center
      showNextButton: true, // show/hide a Next button
      showPreviousButton: true, // show/hide a Previous button
      toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
  },
  anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: false, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
  },
  keyboardSettings: {
      keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
      keyLeft: [37], // Left key code
      keyRight: [39] // Right key code
  },
  lang: { // Language variables for button
      next: 'Next',
      previous: 'Previous'
  },
  disabledSteps: [], // Array Steps disabled
  errorSteps: [], // Highlight step with errors
  hiddenSteps: [] // Hidden steps
});

});
</script>



    <script type="text/javascript">
     //Near checkboxes
     $('.president').on('change', function() {
        $('.president').not(this).prop('checked', false);  
    });
  </script>     
  
  <script type="text/javascript">
      $(document).ready(function(){
        
        

      });
    </script>
  
  <!--END PAGE LEVEL SCRIPTS -->
</body> 

</html> 

<?php 


?>

<!DOCTYPE html> 
<html> 

<head> 
    <link rel="icon" href="./assets/images/logo.png" type="image/png">    

	<!--add bootstrap core files-->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="./assets/css/pas-styles.css"> 

	<!--add jquery-->
	<script src="./assets/js/jquery-3.4.1.min.js"> 
	</script> 
	<script src="./assets/js/bootstrap.bundle.min.js"> 
    </script> 
    
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
		
		
 #nav a:hover, #nav:visited{
        text-decoration: none;
        }

    </style>
</head> 

<body> 

	<!--First navbar-->
	<nav class="navbar navbar-expand-lg" style="background-color: cadetblue;" id="nav_1"> 

		<a class="navbar-brand text-light" href="#">CCHN Voting System</a> 
				
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
                <li class="nav-item nav-link " >
               <a href="voting.php"> Core Members </a>
				</li> 
				
				<li class="nav-item nav-link active" style="background: lightgray">
                   <a href="auxiliary.php">Auxiliary Members </a>
				</li> 
				
			</ul> 
		</div> 
	</nav> 
</body> 

</html> 

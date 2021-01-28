 <!-- MENU SECTION -->
    	<div id="left" >
            <div class="media user-media well-small">
                <div class="media-body">
                    <h5 class="media-heading"><i class="fa fa-user-circle"></i> <?php echo ($_SESSION['uname']); ?></h5>
                    <ul class="list-unstyled user-info">
                        <li><a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online  
                        </li>
                    </ul>
                </div>
                <br />
            </div>
            
            <ul id="menu" class="collapse">
                <li class="panel active">
                    <a href="dashboard.php" >
                        <i class="fa fa-home"></i> Main Menu
                    </a>                                   
                </li>
              
               <!-- candidates menu item -->
                <li><a href="candidates.php"><i class="fa fa-users"></i> Candidates <span class="pull-right"><i class="fa fa-angle-right"></i></span> </a></li>

               <!-- voters menu item -->
                <li><a href="voters.php"><i class="fa fa-list-ul"></i> Voters <span class="pull-right"><i class="fa fa-angle-right"></i></span> </a></li>

               <!--userlist item-->
                 <li><a href="accounts.php"><i class="fa fa-user-md"></i> Users <span class="pull-right"><i class="fa fa-angle-right"></i></span> </a></li>
               
                 <!-- report -->
                 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="fa fa-file-alt"></i> Report
                        <span class="pull-right">
                        <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="pagesr-nav">
                        <li class="my-sub-link" id="getObject"><a href="votes.php"><i class="fa fa-angle-right"></i> Votes </a></li>
                        <li class="my-sub-link" id="getObject"><a href="votecast.php"><i class="fa fa-angle-right"></i> Total Votes </a></li>
                    </ul>
                </li>

                <!--menu item exit-->
                <li><a href="logout.php" id="logout"><i class="fa fa-power-off"></i> Logout </a></li>
                
            </ul>

        </div>
        <!--END MENU SECTION -->

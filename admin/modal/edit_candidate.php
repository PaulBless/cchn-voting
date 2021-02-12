
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_candidate<?php  echo $candidate_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-warning">
						<div class="panel-heading">
							<center>Edit Candidate</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
            <form id="defaultForm" method="post" class="form-horizontal px-4 py-3" action="update-candidate.php" enctype = "multipart/form-data">
           
            <input class="form-control" type="hidden" name="candidate_id" value="<?php echo $records['candidateid'] ?>">

                        <!--candidate name-->
                        <div class="form-group">
                             <label class="col-lg-3 control-label">Candidate Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="fullname" id="name" value="<?php echo $records['name']; ?>" />
                            </div>
                        </div>
                        <!--email-->
                        <div class="form-group ">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-6">
                            <select class = "form-control" name = "gender">
								<option><?php echo $records['gender']; ?></option>
								<option></option>
								<option >Male</option>
								<option >Female </option>
                            </select>
                            </div>
                        </div>
                        <!--phone number-->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone Number</label>
                            <div class="col-lg-6">
                                <input onblur="chk_phone" type="tel" class="form-control" name="phone" pattern="[0][0-9]{9}" maxlength="10" id="phone-number" value="<?php echo $records['phoneno']; ?>" required/>
                            </div>
                        </div><!--end-->
                      
                        <!-- position -->
                        <div class="form-group">
							<label class="col-lg-3 control-label">Position</label>
							<div class="col-lg-6">
							<select class = "form-control" name = "position">
									<option ><?php echo $records['position']; ?></option>
									<option ></option>
									<option >President</option>
									<option >Vice President </option>
									<option >General Secretary</option>
									<option >Financial Secretary</option>
									<option >Public Relations</option>
									<option >General Organizer</option>
									<option >Cordinating Secretary</option>
									<option >Secretary for Education</option>
									<option >Press & Information</option>
									<option >Computer Prefect</option>
									<option >Utility/Water Prefect</option>
								</select>
							</div>
						</div>
                        
                        <!-- picture -->
                        <div class="form-group">
							<label class="col-lg-3 control-label">Picture</label>
							<div class="col-lg-6">
							<input type="file" name="image" required> 
							</div>
                        </div>
                        
                        <!-- register button-->
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-3">
                                <button type="submit" class="btn btn-block btn-success btn-update" name="btnUpdate" id="update" style="font-weight:bold"><i class="fa fa-pencil"></i> Update </button>
                            </div>
                            <!-- <div class="" >
                            	<button type="submit" class="btn btn-danger" data-dismiss="modal" style="font-weight:bold"><i class="fa fa-times"></i> Close</button>
                            </div> -->
                        </div>
						  </form>

				
			</div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
                               
	<?php 
		
		// if(ISSET($_POST['btnUpdate'])){
        //     require ('../functions/db_connection.php');

		// 	$bool = true;
		// 	$position=$_POST['position'];
		// 	$fullname=$_POST['fullname'];
        //     $gender=$_POST['gender'];
        //     $phoneno = $_POST['phone'];
		// 	$candidate_id=$_POST['candidate_id'];
		// 	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		// 	$image_name= addslashes($_FILES['image']['name']);
		// 	$image_size= getimagesize($_FILES['image']['tmp_name']);
		// 	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
		// 	$location="upload/" . $_FILES["image"]["name"];
            

		// 	$query = "UPDATE `candidates` SET `name` = '$fullname', gender = '$gender', phoneno = '$phoneno', position = '$position', picture='$location' WHERE candidateid = '$candidate_id'";
        //     $execute_update = mysqli_query($connect_db, $query);
        //     if($execute_update == true)
        //     {
        //         echo "<script>alert('Candidate record updated!'); document.location.href='candidates.php'</script>";
        //     }
		// }	
	?>
								
<?php
	}
?>
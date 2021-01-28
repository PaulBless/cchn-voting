
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_voter<?php  echo $voters_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-warning">
						<div class="panel-heading">
							<center>Edit Voter Record</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
            <form id="defaultForm" method="post" class="form-horizontal px-4 py-3" action="update-voter.php" enctype = "multipart/form-data">
           
            <input class="form-control" type="hidden" name="voter_id" value="<?php echo $records['voterid'] ?>">

                        <!--candidate name-->
                        <div class="form-group">
                             <label class="col-lg-3 control-label">Candidate Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="fullname" id="name" value="<?php echo $records['name']; ?>" />
                            </div>
                        </div>
                        <!--email-->
                        <div class="form-group ">
                        <label for="gender" class="control-label col-lg-3">Gender <span class="text-danger">*</span></label>
                          <div class="col-lg-6">
                          <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php if($records['gender'] == "Male") echo "checked" ?> required>Male</label>
                          <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if($records['gender'] == "Female") echo "checked" ?> required>Female</label>
                          </div>
                        </div>
                        <!--phone number-->
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Number</label>
                            <div class="col-lg-2 hidden">
                            	<select class="form-control" id="country_code" name="country_code">
  								<option value="233">+233</option>
                           		</select>	
                            </div>
                            <div class="col-lg-4">
                                <input onblur="chk_phone" type="tel" class="form-control" name="phone" pattern="[0][0-9]{9}" maxlength="10" id="phone-number" value="<?php echo $records['phoneno']; ?>"/>
                            </div>
                        </div><!--end-->
                      
                        <!-- position -->
                        <div class="form-group">
						<label class="col-lg-3 control-label">Course </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="course" id="course" value="<?php echo $records['course']; ?>" />
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
		
	?>
								
<?php
	}
?>
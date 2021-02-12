<!-- REGISTER ADMIN MODAL FORM -->
	<div class="col-lg-12">
        <div class="modal fade in" id="regAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
           <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h4 class="modal-title" id="H2">Add New Candidate</h4>
                      </div>
                      <div class="modal-body">
                          <form id="defaultForm" method="post" class="form-horizontal px-4 py-3" action="register-candidate.php" enctype = "multipart/form-data">
                            <div class="msg"></div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Firstname</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="firstName" placeholder="Enter firstname" id="first-name" value="" />
                            </div>
                        </div>
                        <!--lastname-->
                        <div class="form-group">
                             <label class="col-lg-3 control-label">Lastname</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="lastName" placeholder="Enter lastname" id="last-name" value="" />
                            </div>
                        </div>
                        <!--email-->
                        <div class="form-group ">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-6">
                            <select class = "form-control" name = "gender">
								<option>--Select--</option>
								<option >Male</option>
								<option >Female </option>
                            </select>
                            </div>
                        </div>
                        <!--phone number-->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone Number</label>
                            <div class="col-lg-6">
                                <input onblur="chk_phone" type="tel" class="form-control" name="phone" placeholder="Enter mobile number" pattern="[0][0-9]{9}" maxlength="10" id="phone-number" value=""/>
                            </div>
                        </div><!--end-->
                      
                        <!-- position -->
                        <div class="form-group">
						<label class="col-lg-3 control-label">Position</label>
						<div class="col-lg-6">
						<select class = "form-control" name = "position">
								<option >--Select--</option>
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
                                <button type="submit" class="btn btn-block btn-success btn-signup" name="btnSave" id="btnreg" style="font-weight:bold"><i class="fa fa-save"></i> Save </button>
                            </div>
                            <div class="" >
                            	<button type="submit" class="btn btn-danger" data-dismiss="modal" style="font-weight:bold"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
						  </form>
                         </div>
                          
<!--
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                          </div>
-->

                    <?php

                    ?>
					</div>
                                </div>
                
        </div>
    </div>
    <!--END -->
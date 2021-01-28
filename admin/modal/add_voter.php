<!-- REGISTER ADMIN MODAL FORM -->
	<div class="col-lg-12">
        <div class="modal fade in" id="regAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
           <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h4 class="modal-title" id="H2">Add Voter</h4>
                      </div>
                      <div class="modal-body">
                          <form id="defaultForm" method="post" class="form-horizontal px-4 py-3" action="register-voter.php">
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
                        <!--gender-->                        
                        <div class="form-group">
                          <label for="gender" class="control-label col-lg-3">Gender <span class="text-danger">*</span></label>
                          <div class="col-lg-6">
                          <label class="radio-inline"><input type="radio" name="gender" value="Male" required>Male</label>
                          <label class="radio-inline"><input type="radio" name="gender" value="Female" required>Female</label>
                          </div>
                        </div>
                        
                        <!--phone number-->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone Number</label>
                            <div class="col-lg-2">
                            	<select class="form-control" id="country_code" name="country_code">
  								<option value="233">+233</option>
                           		</select>	
                            </div>
                            <div class="col-lg-4">
                                <input onblur="chk_phone" type="tel" class="form-control" name="phone" placeholder="Enter mobile number" pattern="[0][0-9]{9}" maxlength="10" id="phone-number" value=""/>
                            </div>
                        </div><!--end-->
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Course of Study</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="course" placeholder="Enter course" />
                            </div>
                        </div>
                        
                        
                        <!-- save button-->
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-3">
                                <button type="submit" class="btn btn-block btn-success btn-signup" name="btnRegister" id="btnreg" style="font-weight:bold"><i class="fa fa-save"></i> Save Voter</button>
                            </div>
                            <div class="" >
                            	<button type="submit" class="btn btn-danger" data-dismiss="modal" style="font-weight:bold"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                        </div>
						  </form>
                         </div>
                          
<!--
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                          </div>
-->

					</div>
                                </div>
                
        </div>
    </div>
    <!--END -->
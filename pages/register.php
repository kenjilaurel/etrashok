<?php include '../template/header.php'; ?>
<?php require '../connection/dbconnect.php'; ?>
<?php header('Content-Type: text/html; charset=ISO-8859-1'); ?>
<title>Register</title>
</head>	
<body class="animsition" id="register-page">

    <div class="page-wrapper">

        <div class="page-content--bge5">
            <div class="container">
                <div class="col-sm-10 offset-1">
                	<div class="register-wrap ">
                		<!--Message -->
                		<?php if(isset($_GET['msg'])){ ?>
                		<?php if($_GET['msg'] == 'success'){ ?>
                		<div class="card">								
							<div class="card-body">								
								<div class="alert alert-success" role="alert">
									You have successfully registered!
								</div>																					
							</div>
						</div>
						<?php }else if($_GET['msg'] == 'error'){ ?>
						<div class="card">								
							<div class="card-body">																						
								<div class="alert alert-warning" role="alert">
									Something is wrong, please try again!
								</div>
								
							</div>
						</div>	
						<?php } ?>	
						<?php } ?>
                	<form class="form" method="post" action="../api/register-api.php">
	                	<div class="col-sm-12 header-top-head">
	                		<div class="row">
		                		<div class="col-sm-6">
		                			<div class="form-group">
		                				<label>Application No.
		                					<input type="number" name="application_no" class="form-control" placeholder="Type your application number" required="">
		                				</label>
		                			</div>
		                		</div>
		                		<div class="col-sm-6 text-right">
		                			<div class="form-group">
		                				<label>Precinct No.
		                					<input type="number" name="precinct_no" class="form-control" placeholder="Type your precinct number" required="">
		                				</label>
		                			</div>	                			
		                		</div>
	                		</div>
	                	</div>
	                	<hr/>
	                	<div class="middle-content">
	                		<div class="container">
	                			<div class="col-sm-12 ">
	                				<div class="inner-top content-border">
	                					<p><strong>Instructions: </strong>Accomplish separately in three copies;(2) print legibly;and (3) check the appropriate box.</p>
	                				</div>
	                				<div class="inner-top bg-dark color-white content-border">
	                					<h5 class="color-white"><span style="margin-right: 3em;">Part 1 </span> PERSONAL INFORMATION (To be filled out by Applicant)</h5> 
	                				</div>
	                			</div>
	                			<div class="col-sm-12">
	                				<div class="row">
	                					<div class="col-sm-8 personal-info ">
	                						<div class="form-group">
	                							<label><strong class="title-gin">NAME</strong>
	                								<div class="form-group inline">
	                									<label>Last</label>
	                									<input type="text" name="lastname" class="form-control" placeholder="Type your last name" required="">	                									
	                								</div>
	                								<div class="form-group inline">
	                									<label>First</label>
	                									<input type="text" name="firstname" class="form-control" placeholder="Type your first name" required="">	                									
	                								</div>
	                								<div class="form-group inline">
	                									<label>Middle</label>
	                									<input type="text" name="middlename" class="form-control" placeholder="Type your middle name" required="">	                									
	                								</div>
	                							</label>
	                						</div>
	                					</div>
	                					<div class="col-sm-4 " style="    margin-bottom: -17px;">
	                						<div class="inner bg-grey pad1em">	                							
		                						<div class="form-check">
	                                                <div class="checkbox">
	                                                    <label for="checkbox1" class="form-check-label ">
	                                                        <input type="checkbox" id="checkbox1" name="user_cat1" value="1" class="form-check-input"> &nbsp;Illiterate
	                                                    </label>
	                                                </div>
	                                                <div class="checkbox">
	                                                    <label for="checkbox2" class="form-check-label ">
	                                                        <input type="checkbox" id="checkbox2" name="user_cat2" value="1" class="form-check-input"> &nbsp;Indigenous People
	                                                    </label>
	                                                </div>
	                                                <div class="checkbox">
	                                                    <label for="checkbox3" class="form-check-label ">
	                                                        <input type="checkbox" id="checkbox3" name="user_cat3" value="1" class="form-check-input"> &nbsp;Person with Disability
	                                                    </label>
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
	                                            	<label>
	                                            		Assisted by:
	                                            		<input type="text" name="assisted_by" class="form-control" placeholder="Name of the person who assist">
	                                            		<p class="small">(Please fill up Supplemental Data Form/Assistor's Oath)</p>
	                                            	</label>
	                                            </div>

	                						</div>
	                					</div><!-- col-sm-4 -->
	                				</div>
	                			</div>
	                			<hr/>
	                			<div class="col-sm-12">
	                				<div class="row">
	                					<div class="col-sm-8 ">
	                						<h5 style="margin-right: 1em;">RESIDENCES/ADDRESS</h5>	
	                						<div class="form-group">
	                							<label class="fw">
	                								Province
	                								<input type="text" name="province" class="form-control" placeholder="Type your province" required="">
	                							</label>
	                						</div>
	                						<div class="row">
	                							<div class="col-sm-6">
		                							<div class="form-group">
		                								<label class="fw">
			                								City/Municipality
			                								<input type="text" name="city" class="form-control" placeholder="Type your City or Municipality" required="">
			                							</label>	
		                							</div>		                						

		                						</div>
		                						<div class="col-sm-6">
		                							<div class="form-group">
		                								<label class="fw">
			                								Barangay
			                								<input style="width:85%;" type="text" name="barangay" class="form-control" placeholder="Type your Barangay" required="">
			                							</label>
		                							</div>
		                						</div>	
	                						</div>
	                						
	                								<div class="form-group">
	                									<div class="row">
	                										<div class="col-sm-8">
	                											<label class="fw">
				                									House No. / Street
				                									<input type="text" name="street" class="form-control" placeholder="Type your House Number or Street Address">
				                								</label>	
	                										</div>
	                										<div class="col-sm-4">
	                											<label class="fw">Sitio
	                											<select name="sitio" id="select-sitio" class="form-control">
			                                                     <?php 
			                                                     	$sql = "SELECT id,
			                                                     					sitio_name FROM 
			                                                     					sitio WHERE deleted = 0 ";                                                     
										                                $result = mysqli_query($mysqli,$sql);
										                                if (mysqli_num_rows($result) > 0) {                                    
										                                    while($row = mysqli_fetch_assoc($result)) {
									                                       		$id = $row['id'];
									                                       		$name = $row['sitio_name'];					                                        
									                                            echo '<option value="'.$id.'">'.$name.'</option>';
										                                    	  
										                                    }
										                                }else{
										                                	echo '<option> Sitio is Empty. </option>';
										                                }
			                                                      ?>	
			                                                    </select>
			                                                	</label>
	                										</div>
	                										
	                									</div>	                							
	                							</div>
	                							<div class="row">
		                							<div class="col-sm-6">
		                								<div class="form-group">
		                									<label class="fw">
		                										<h5>CITIZENSHIP</h5>
		                										<input type="text" name="citizenship" placeholder="Type your Citizenship here" class="form-control" required="">
		                									</label>
		                								
		                								</div>
		                							</div>
		                							<div class="col-sm-6">
		                								<div class="form-check ">
	                                                        <div class="radio">
	                                                            <label for="radio1" class="form-check-label ">
	                                                                <input type="radio" id="citizenship_acquired1" name="citizenship_acquired" value="0" class="form-check-input" checked="checked" > &nbsp; By Birth
	                                                            </label>
	                                                        </div>
	                                                        <div class="radio">
	                                                            <label for="radio2" class="form-check-label ">
	                                                                <input type="radio" id="citizenship_acquired2" name="citizenship_acquired" value="1" class="form-check-input"> &nbsp; Naturalized
	                                                            </label>
	                                                        </div>

	                                                        <div class="radio">
	                                                            <label for="radio3" class="form-check-label ">
	                                                                <input type="radio" id="citizenship_acquired3" name="citizenship_acquired" value="2" class="form-check-input" placeholder="Reacquisition Date"> &nbsp; Reacquired
	                                                            </label>
	                                                        </div>
	                                                    </div>
	                                                    
		                							</div>	
		                							<div class="reacquired-content" style="display: none;">		    								                					
			                							<p class="small">(If naturalized/reacquired, state date of naturalization/reacquisition and Certificate Number of naturalization/order of approval of reacquisition)</p>                

			                							<div class="col-sm-12" style="    margin-bottom: -37px;">
			                								<div class="row ">
			                								<div class="col-sm-6">
			                									<div class="form-group">
			                										
				                									<label>Date of Naturalization</label>
				                									<label>
				                										Reacquisition			                										
															                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
															                    <input class="form-control"  type="text" value="" name="natural_reacquire_date" placeholder="Reacquisition Date">
															                    
																				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>

															                </div>
															                <p class="small">Year - Month - Day</p>
																			<input type="hidden" id="dtp_input3" value="" /><br/>
															            
				                									</label>
			                									</div>	
			                								</div>
			                								<div class="col-sm-6">
			                									<br/>
			                									<div class="form-group">
			                                                    	<label>Certificate No. / Order of Approval
			                                                    		<input type="number" name="certificate_no" class="form-control" placeholder="Type your certificate number/approval">
			                                                    	</label>
			                                                    </div>	
			                								</div>
			                								</div>
			                							</div>	<!-- row -->	
		                							</div>
	                							</div>	                							
	                							<hr/>
	                							
	                							<h5>PERIOD OF RESIDENCE</h5>
	                							<div class="row" style="    margin-bottom: -27px;">	                								
	                								
	                								<div class="col-sm-6">
																
	                									<div class="form-group">
	                									<label>In the City/Municipality</label>	
	                										<div class="form-inner inline">
	                											<div class="form-group">
	                												<label>
		                												No. of years
		                												<input type="Number" name="period_city_yr" class="form-control" placeholder="0">
		                											</label>	
	                											</div>
	                											<div class="form-group">
	                												<label>
		                												No. of months
		                												<input type="Number" name="period_city_mos" placeholder="0" class="form-control">
		                											</label>	
	                											</div>
	                										</div>	
	                											
	                										
	                									</div>
	                								</div>
	                								<div class="col-sm-6">
	                									
	                									<div class="form-group">
	                										<label>In the Philippines</label>
	                										<div class="form-inner inline">
	                											<div class="form-group">
	                												<label>
		                												No. of years
		                												<input type="Number" name="period_phil_yr" class="form-control" placeholder="0">
		                											</label>	
	                											</div>
	                											
	                										</div>	
	                									</div>
	                								</div>
	                							</div>
	                							<hr/>
	                							<div class="row">
	                								<div class="col-sm-6">
	                									<div class="form-group">
	                										<h5>PROFESSION / OCCUPATION</h5>	
	                										<input type="text" name="profession" placeholder="Type your profession" class="form-control">
	                									</div>
	                									
	                								</div>		
	                								<div class="col-sm-6">
	                									<div class="form-group">
	                										<h5>TIN</h5>
	                										<input type="number" name="tin" class="form-control" placeholder="Type your TIN">
	                									</div>
	                								</div>
	                							</div>
	                					</div>	

	                					<div class="col-sm-4" style="    margin-top: -16px;">

	                						<div class="inner bg-grey pad1em">
	                							
	                							<h5>SEX</h5>
	                							<div class="form-check inline">
                                                    <div class="radio" style="width: 50%;">
                                                        <label for="radio1" class="form-check-label ">
                                                            <input type="radio" id="sex1" name="sex" value="0" class="form-check-input" checked="checked" > &nbsp; Female
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label for="radio2" class="form-check-label ">
                                                            <input type="radio" id="sex2" name="sex" value="1" class="form-check-input"> &nbsp; Male
                                                        </label>
                                                    </div>                                                        
                                                </div>
                                                <br>
                                                <h5>DATE OF BIRTH</h5>
                                                  									              
									                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									                    <input class="form-control"  type="text" value="" name="birthday" placeholder="Birthdate" required="">
									                    
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>

									                </div>
									                <p class="small">Year - Month - Day</p>
													<input type="hidden" id="dtp_input2" value="" /><br/>
									            
                                                <hr>
                                                <h5>PLACE OF BIRTH</h5>
                                                <div class="form-group">
                                                	<label>City/Municipality
                                                		<input type="text" name="placebirth_city" class="form-control" placeholder="Type your City or Municipality" required="">
                                                	</label>
                                                </div>
                                                <div class="form-group">
                                                	<label>Province
                                                		<input type="text" name="placebirth_province" class="form-control" placeholder="Type your province" required="">
                                                	</label>
                                                </div>
                                                <hr/>
                                                <br/>
                                                <h5>CIVIL STATUS</h5>
                                                <div class="form-check inline">
                                                    <div class="radio" style="width: 50%;">
                                                        <label for="radio1" class="form-check-label ">
                                                            <input type="radio" id="civil1" name="civil" value="0" class="form-check-input" checked="checked" > &nbsp; Single
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label for="radio2" class="form-check-label ">
                                                            <input type="radio" id="civil2" name="civil" value="1" class="form-check-input"> &nbsp; Married
                                                        </label>
                                                    </div>                                                        
                                                </div>
                                                
                                                <div class="form-group">
                                                	<label class="fw">Name of spouse,If Married
                                                		<input type="text" name="spouse" class="form-control " placeholder="Type the name of your spouse">
                                                	</label>
                                                </div>
                                                <hr/>
                                                <div id="error_message" style="display: none;font-size: 14px;">
                                                	ERROR:
                                                </div>
                                                <div class="form-group">
                                                	<label style="width: 100%;">Email
                                                		<input  type="email" name="email" value="" class="form-control form-email" placeholder="Email Address" required="">
                                                	</label>
                                                </div>
                                                <div class="form-group">
                                                	<label style="width: 100%;">Password
                                                		<input id="password" type="password" name="password" class="form-control" required="" value="">
                                                	</label>
                                                </div>
                                                <div class="form-group">
                                                	<label style="width: 100%;">Confirm Password
                                                		<input id="confirm_password" type="password" name="confirm_password" class="form-control" value="" required="">
                                                	</label>
                                                </div>
                                                <div class="form-group">
                                                	<input type="submit" name="register" value="Register Now" class="btn btn-primary form-control btn-register" >	
                                                </div>
                                                <div class="form-group">
                                                	<a href="login.php" class="small"><i class="fa fa-arrow-left"></i> Back To Login</a>
                                                </div>
                                                
	                						</div>

	                					</div><!-- col-sm-4 -->
	                					
	                					
	                				</div>
	                				
	                			</div>
	                		</div>
	                	</div>
                	</div>
                </form>
                </div><!-- register-->
            </div>
        </div>

    </div>

<?php include '../template/footer.php' ?>

<script type="text/javascript">
  	$(document).ready(function(){
  		$("#citizenship_acquired1").click(function(){
  			// $(".reacquired-content").css("display","none");  
            $(".reacquired-content").hide(1000);           

  		});
  		$("#citizenship_acquired2").click(function(){
  			// $(".reacquired-content").css("display","block")
            $(".reacquired-content").show(1000);           
  		});
   		$("#citizenship_acquired3").click(function(){
   			// $(".reacquired-content").css("display","block");           
            $(".reacquired-content").show(1000);           
        });       	
   		 // Initialize select2
		  $("#select-sitio").select2();
	});
	/* check email exists */
	$( document ).ready(function() {
	    $('.form-email').on('change', function() {
	        //ajax request
	        $.ajax({
	            url: "../api/check-email.php",
	            data: {
	                'email' : $('.form-email').val()
	            },
	            dataType: 'json',
	            success: function(data) {
	                if(data == true) {
	                    $("#error_message").text("Email Already Exists");
	                    $("#error_message").css("display","block");
	                    
	                }else{
	                	$("#error_message").text("");
	                	
	                }	                
	            },
	            error: function(data){
	                //error
	            }
	        });
	    });

	    /* check confirm pass*/
	    $('#password').on('change', function() {
	      checkPass();
	    });
	    $('#confirm_password').on('change', function() {
	      checkPass();
	    });
	    function checkPass(){
			var pass = $("#password").val();
			var confirm = $("#confirm_password").val();
			if(pass != confirm){
				$("#error_message").text("Password and Confirm not the same.");
				$('.btn-register').prop('disabled', true);
			}else{
				$("#error_message").text("");
				$('.btn-register').prop('disabled', false);
			}
		}
	});

</script>

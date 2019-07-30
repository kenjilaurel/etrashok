<?php include '../template/header.php'; ?>
<?php error_reporting(1); ?>
<title>Profile</title>
</head> 
<body class="animsition" id="profile-page">
    <div class="page-wrapper">
       
       <!-- navigation -->
       <?php include '../template/navigation-user.php'; ?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!--Message -->
           <?php include '../snippet/system-message.php'; ?>
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Profile</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
<?php 
    $login_id = $_SESSION['login_id'];

    $sql = "SELECT  user.id uid,
                    application_no,
                    precinct_no,
                    firstname,
                    middlename,
                    lastname,
                    category,
                    assisted_by,
                    address_province,
                    address_city,
                    address_brgy,
                    address_street_house,
                    citizenship,
                    citizenship_acquired,
                    natural_reacquire_date,
                    certificate_no,
                    period_residence_city_yr,
                    period_residence_city_month,
                    period_residence_phil_yr,
                    profession,
                    tin,
                    sex,
                    date_birth,
                    place_birth_city,
                    place_birth_province,
                    civil_status,
                    spouse,
                    approved,
                    user_role,
                    account_id,
                    sitio,
                    image_path,
                    email FROM user 
                    INNER JOIN user_account ON user.account_id = user_account.id
                    WHERE user.deleted = 0 AND user.id = '$login_id'";
    $result = mysqli_query($mysqli,$sql);
    if (mysqli_num_rows($result) > 0) {                                    
        while($row = mysqli_fetch_assoc($result)) {

           $app_no                  = $row['application_no'];
           $precinct_no             = $row['precinct_no'];
           $fname                   = $row['firstname'];
           $mname                   = $row['middlename'];
           $lname                   = $row['lastname'];
           $category                = $row['category'];
           $assisted_by             = $row['assisted_by'];
           $address_province        = $row['address_province'];
           $address_city            = $row['address_city'];
           $address_brgy            = $row['address_brgy'];
           $address_street_house    = $row['address_street_house'];
           $citizenship             = $row['citizenship'];
           $citizenship_acquired    = $row['citizenship_acquired'];
           $natural_reacquire_date  = $row['natural_reacquire_date'];
           $certificate_no          = $row['certificate_no'];
           $period_residence_city_yr    = $row['period_residence_city_yr'];
           $period_residence_city_month = $row['period_residence_city_month'];
           $period_residence_phil_yr    = $row['period_residence_phil_yr'];
           $profession              = $row['profession'];
           $tin                     = $row['tin'];
           $sex                     = $row['sex'];
           $date_birth              = $row['date_birth'];
           $place_birth_city        = $row['place_birth_city'];
           $place_birth_province    = $row['place_birth_province'];
           $civil_status            = $row['civil_status'];
           $spouse                  = $row['spouse'];
           $role                    = getUserRole($row['user_role']);
           $account_id              = $row['account_id'];
           $email                   = $row['email'];
           $sitio                   = $row['sitio'];
           $avatar                  = $row['image_path'];
        }
    }else{
        echo 'Something went wrong. Please Refresh or call the administrator';
    }

?>
            <!-- Main Content-->
            <div class="main-content">
               <section id="profile">
               		<div class="container">
           			<form class="form" method="post" action="../api/profile.php" style="background: #fff;padding-bottom: 1em;" enctype="multipart/form-data">
                    	<div class="col-sm-12 header-top-head">
                    		
                    	</div>
                    	<hr/>
                    	<div class="middle-content">
                    		<div class="container">
                    		
                    			<div class="col-sm-12">
                    				<div class="row">
                    					<div class="col-sm-8 personal-info ">

                    						<div class="row">                							                					
    	                						<div class="col-sm-7">
                                                    
    		                						<div class="image-avatar" style="max-height: 222px;background: url('../images/<?php echo $avatar; ?>')">
    		                							    		                						
    		                						</div>

                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['login_id']; ?>">
                                                    <input type="hidden" name="account_id" value="<?php echo $account_id; ?>">

    		                						<div class="row form-group" style="margin-top: 0.5em;">
    	                                                <div class="col col-md-4">
    	                                                    <label for="file-input" class=" form-control-label" style="font-size:13.7px;">Upload Avatar 
                                                            <span style="font-size: 13px;">size: 355 x 222</span></label>
    	                                                </div>
    	                                                <div class="col-12 col-md-8">
    	                                                    <input type="file" id="file-input" name="image" class="form-control-file">
    	                                                </div>
    	                                            </div>
    					                		</div>
    					                		<div class="col-sm-5 text-right" >
    					                			<div class="form-group text-left" >
    					                				<label>Application No.
    					                					<input type="number" name="application_no" class="form-control" placeholder="Type your application number" required="" value="<?php echo $app_no; ?>">
    					                				</label>
    					                			</div>
    					                			<div class="form-group text-left" >
    					                				<label>Precinct No.
    					                					<input type="number" name="precinct_no" class="form-control" placeholder="Type your precinct number" required="" value="<?php echo $precinct_no; ?>">
    					                				</label>
    					                			</div>	    
                                                    <div class="form-group text-left" >
                                                        <label><b>Role:</b> <?php echo $role; ?>                                                            
                                                        </label>
                                                    </div>               			
    					                		</div>
    				                		</div>
    				                		<div class="clearfix myclear"></div>
                    						<div class="form-group">
                    							<label><strong class="title-gin">NAME</strong>
                    								<div class="form-group inline">
                    									<label>Last</label>
                    									<input type="text" name="lastname" class="form-control" placeholder="Type your last name" required="" value="<?php echo $lname; ?>">	                									
                    								</div>
                    								<div class="form-group inline">
                    									<label>First</label>
                    									<input type="text" name="firstname" class="form-control" placeholder="Type your first name" required="" value="<?php echo $fname; ?>">	                									
                    								</div>
                    								<div class="form-group inline">
                    									<label>Middle</label>
                    									<input type="text" name="middlename" class="form-control" placeholder="Type your middle name" required="" value="<?php echo $mname; ?>">	                									
                    								</div>
                    							</label>
                    						</div>

                    						<h5 style="margin-right: 1em;">RESIDENCES/ADDRESS</h5>	
                    						<div class="form-group">
                    							<label class="fw">
                    								Province
                    								<input type="text" name="province" class="form-control" placeholder="Type your province" required="" value="<?php echo $address_province; ?>">
                    							</label>
                    						</div>
                    						<div class="row">
                    							<div class="col-sm-6">
    	                							<div class="form-group">
    	                								<label class="fw">
    		                								City/Municipality
    		                								<input type="text" name="city" class="form-control" placeholder="Type your City or Municipality" required="" value="<?php echo $address_city; ?>">
    		                							</label>	
    	                							</div>		                						

    	                						</div>
    	                						<div class="col-sm-6">
    	                							<div class="form-group">
    	                								<label class="fw">
    		                								Barangay
    		                								<input style="width:85%;" type="text" name="barangay" class="form-control" placeholder="Type your Barangay" required="" value="<?php echo $address_brgy; ?>">
    		                							</label>
    	                							</div>
    	                						</div>	
                    						</div>
                    						
                    								<div class="form-group">
                    									<div class="row">
                    										<div class="col-sm-8">
                    											<label class="fw">
    			                									House No. / Street
    			                									<input type="text" name="street" class="form-control" placeholder="Type your House Number or Street Address" value="<?php echo $address_street_house; ?>">
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

                                                                                if($sitio == $id){
                                                                                    echo '<option value="'.$id.'" selected>'.$name.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$id.'" >'.$name.'</option>';
                                                                                }                                            								                                            
    									                                    	  
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
    	                										<input type="text" name="citizenship" placeholder="Type your Citizenship here" class="form-control" required="" value="<?php echo $citizenship; ?>">
    	                									</label>
    	                								
    	                								</div>
    	                							</div>
    	                							<div class="col-sm-6">
    	                								<div class="form-check ">
                                                            <div class="radio">
                                                                <label for="radio1" class="form-check-label ">

                                                                    <input type="radio" id="citizenship_acquired1" name="citizenship_acquired" value="0" class="form-check-input" <?php if($citizenship_acquired == 0) echo  'checked';  ?> > &nbsp; By Birth
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label for="radio2" class="form-check-label ">
                                                                    <input type="radio" id="citizenship_acquired2" name="citizenship_acquired" value="1" class="form-check-input" <?php if($citizenship_acquired == 1) echo  'checked';  ?>> &nbsp; Naturalized
                                                                </label>
                                                            </div>

                                                            <div class="radio">
                                                                <label for="radio3" class="form-check-label ">
                                                                    <input type="radio" id="citizenship_acquired3" name="citizenship_acquired" value="2" class="form-check-input" placeholder="Reacquisition Date" <?php if($citizenship_acquired == 2) echo  'checked';  ?> > &nbsp; Reacquired
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
    	                							</div>	
    	                							<div class="reacquired-content" style="<?php if($citizenship_acquired == 0) echo 'display:none;'  ?>">		    								                					
    		                							<p class="small">(If naturalized/reacquired, state date of naturalization/reacquisition and Certificate Number of naturalization/order of approval of reacquisition)</p>                

    		                							<div class="col-sm-12" style="    margin-bottom: -37px;">
    		                								<div class="row ">
    		                								<div class="col-sm-6">
    		                									<div class="form-group">
    		                										
    			                									<label>Date of Naturalization</label>
    			                									<label>
    			                										Reacquisition			                										
    														                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
    														                    <input class="form-control"  type="text"  name="natural_reacquire_date" placeholder="Reacquisition Date" value="<?php echo $natural_reacquire_date; ?>">
    														                    
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
    		                                                    		<input type="number" name="certificate_no" class="form-control" placeholder="Type your certificate number/approval" value="<?php echo $certificate_no; ?>">
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
    	                												<input type="Number" name="period_city_yr" class="form-control" placeholder="0" value="<?php echo $period_residence_city_yr; ?>">
    	                											</label>	
                    											</div>
                    											<div class="form-group">
                    												<label>
    	                												No. of months
    	                												<input type="Number" name="period_city_mos" placeholder="0" class="form-control" value="<?php echo $period_residence_city_month; ?>">
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
    	                												<input type="Number" name="period_phil_yr" class="form-control" placeholder="0" value="<?php echo $period_residence_phil_yr; ?>">
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
                    										<input type="text" name="profession" placeholder="Type your profession" class="form-control" value="<?php echo $profession; ?>">
                    									</div>
                    									
                    								</div>		
                    								<div class="col-sm-6">
                    									<div class="form-group">
                    										<h5>TIN</h5>
                    										<input type="number" name="tin" class="form-control" placeholder="Type your TIN" value="<?php echo $tin; ?>">
                    									</div>
                    								</div>
                    							</div>
                    					</div><!-- col8 -->


                    					<div class="col-sm-4 " style="    margin-bottom: -17px;">
                    						<div class="inner bg-grey pad1em" style="background: #e0e0e04a;">	                					<?php
                                                    $Illiterate = $category{1};
                                                    $Indigenous = $category{2};
                                                    $Disability = $category{3};                                             
                                              ?>		
    	                						<div class="form-check">
                                                    <div class="checkbox">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="checkbox1" name="user_cat1" value="1" class="form-check-input" disabled="" <?php if($Illiterate == 1)echo 'checked'; ?> > &nbsp;Illiterate
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="checkbox2" class="form-check-label ">
                                                            <input type="checkbox" id="checkbox2" name="user_cat2" value="1" class="form-check-input" disabled="" <?php if($Indigenous == 1)echo 'checked'; ?> > &nbsp;Indigenous People
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="checkbox3" class="form-check-label ">
                                                            <input type="checkbox" id="checkbox3" name="user_cat3" value="1" class="form-check-input" disabled="" <?php if($Disability == 1)echo 'checked'; ?> > &nbsp;Person with Disability
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<label>
                                                		Assisted by:
                                                		<input type="text" name="assisted_by" class="form-control" placeholder="Name of the person who assist" readonly="" value="<?php echo $assisted_by; ?>">
                                                		<p class="small">(Please fill up Supplemental Data Form/Assistor's Oath)</p>
                                                	</label>
                                                </div>
                    						</div>
                    						<div class="inner bg-grey pad1em" style="background: #e0e0e04a;">
                    							
                    							<h5>SEX</h5>
                    							<div class="form-check inline">
                                                    <div class="radio" style="width: 50%;">
                                                        <label for="radio1" class="form-check-label ">
                                                            <input type="radio" id="sex1" name="sex" value="0" class="form-check-input" <?php if($sex == 0) echo 'checked'; ?> > &nbsp; Female
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label for="radio2" class="form-check-label ">
                                                            <input type="radio" id="sex2" name="sex" value="1" class="form-check-input" <?php if($sex == 1) echo 'checked'; ?> > &nbsp; Male
                                                        </label>
                                                    </div>                                                        
                                                </div>
                                                <br>
                                                <h5>DATE OF BIRTH</h5>
                                                  									              
    								                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
    								                    <input class="form-control"  type="text" value="<?php echo $date_birth; ?>" name="birthday" placeholder="Birthdate" required="">
    								                    
    													<span class="input-group-addon"><span class="fa fa-calendar"></span></span>

    								                </div>
    								                <p class="small">Year - Month - Day</p>
    												<input type="hidden" id="dtp_input2" value="" /><br/>
    								            
                                                <hr>
                                                <h5>PLACE OF BIRTH</h5>
                                                <div class="form-group">
                                                	<label>City/Municipality
                                                		<input type="text" name="placebirth_city" class="form-control" placeholder="Type your City or Municipality" required="" value="<?php echo $place_birth_city; ?> ">
                                                	</label>
                                                </div>
                                                <div class="form-group">
                                                	<label>Province
                                                		<input type="text" name="placebirth_province" class="form-control" placeholder="Type your province" required="" value="<?php echo $place_birth_province; ?> ">
                                                	</label>
                                                </div>
                                                <hr/>
                                                <br/>
                                                <h5>CIVIL STATUS</h5>
                                                <div class="form-check inline">
                                                    <div class="radio" style="width: 50%;">
                                                        <label for="radio1" class="form-check-label ">
                                                            <input type="radio" id="civil1" name="civil" value="0" class="form-check-input" <?php if($civil_status == 0) echo 'checked'; ?> > &nbsp; Single
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label for="radio2" class="form-check-label ">
                                                            <input type="radio" id="civil2" name="civil" value="1" class="form-check-input" <?php if($civil_status == 1) echo 'checked'; ?> > &nbsp; Married
                                                        </label>
                                                    </div>                                                        
                                                </div>
                                                
                                                <div class="form-group">
                                                	<label class="fw">Name of spouse,If Married
                                                		<input type="text" name="spouse" class="form-control " placeholder="Type the name of your spouse" value="<?php echo $spouse; ?>">
                                                	</label>
                                                </div>
                                                <hr/>
                                                <div id="error_message" style="display: none;font-size: 14px;">
                                                    ERROR:
                                                </div>
                                                <div class="form-group">
                                                	<label style="width: 100%;">Email
                                                		<input  type="email" name="email" class="form-control form-email" placeholder="Email Address" required="" value="<?php echo $email; ?>">
                                                	</label>
                                                </div>
                                                <div class="btn-show-pass">
                                                    <span onclick="showPasswordArea();" class="btn-pass-mod">Modify my password 
                                                        <span class="arrow admin nav-arrow"><i class="fas fa-angle-left"></i></span>
                                                    </span>
                                                </div>
                                                <div class="password-area" style="display: none;">
                                                    <div class="form-group">
                                                    	<label style="width: 100%;">Password
                                                    		<input id="password" type="password" name="password" class="form-control"  >
                                                    	</label>
                                                    </div>
                                                    <div class="form-group">
                                                    	<label style="width: 100%;">Confirm Password
                                                    		<input id="confirm_password" type="password" name="confirm_password" class="form-control"  >
                                                    	</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	
                                                	<button class="btn btn-primary form-control  btn-save" type="submit" name="save">
                                                		<i class="fa fa-save"> </i> SAVE
                                                	</button>
                                                </div>                                          
                                                
                    						</div>

                    					</div><!-- col-sm-4 -->
                    				</div><!-- row-->
                    			</div>
                    			<hr/>
                    			<div class="col-sm-12">
                    				<div class="row">
                    					

                    					<div class="col-sm-4" style="    margin-top: -16px;">

                    						

                    					</div><!-- col-sm-4 -->
                    					
                    					
                    				</div>
                    				
                    			</div>
                            
                    		</div><!-- container -->
                    	</div>
                	</div>
                </form>
               	</div>
               </section>

                <!-- END DATA TABLE-->
                 <section class="p-t-60 p-b-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
				$('.btn-save').prop('disabled', true);
                $("#error_message").show();
			}else{
				$("#error_message").text("");
				$('.btn-save').prop('disabled', false);
                $("#error_message").hide();
			}
		}
	});

    /* functions */
    function showPasswordArea(){
        $(".password-area").toggle(1000);
    }

</script>

<?php
 require '../connection/dbconnect.php';
 require '../api/functions.php';
 $id = $_GET['id'];

$isAccountExist = isAccountExist($id,$mysqli);
$approved = 0;
$user_role = 0;

$sql = "SELECT approved,user_role FROM user WHERE id = '$id'";
$result = mysqli_query($mysqli,$sql);
	if (mysqli_num_rows($result) > 0) {        
		while($row = mysqli_fetch_assoc($result)) {
			$approved = $row['approved'];
			$user_role = $row['user_role'];
		}
	}
?>
<style type="text/css">
	select{
		padding: 0.5em 1em;
    	border-radius: 3px;
	}
</style>
<h5>Approval</h5>
<br>
<input type="hidden" name="user_id" value="<?php echo $id; ?>">
<div class="form-check inline">
    <div class="radio" style="width: 50%;">
        <label for="radio1" class="form-check-label ">
            <input type="radio" id="approve" name="approved" value="1" class="form-check-input"  <?php if($approved == 1){ echo 'checked="checked"';}?>> &nbsp; Approve
        </label>
    </div>
    <div class="radio">
        <label for="radio2" class="form-check-label ">
            <input type="radio" id="unapprove" name="approved" value="0" class="form-check-input" <?php if($approved == 0){ echo 'checked="checked"';}?> > &nbsp; Not Approve
        </label>
    </div>                                                        
</div>
<hr>
<div class="inline">
	<h5 style="padding-right: 1em;">User Role</h5>
   <div class="table-data__tool-right form-group">      
        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <select class="js-select2" name="user_role" class="form-control">
                <option value="0" <?php if($user_role == 0){ echo 'selected="selected"';} ?> >Select user role</option>
                <option value="2" <?php if($user_role == 2){ echo 'selected="selected"';} ?> >Collector</option>
                <option value="3" <?php if($user_role == 3){ echo 'selected="selected"';} ?> >Residence</option>
                <option value="4" <?php if($user_role == 4){ echo 'selected="selected"';} ?> >Facilitator</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
</div>

<hr/>
<?php if($isAccountExist == 0){ ?>
<h5>Create Account</h5>
<br>
<div class="inline">
	<div class="form-group">
		<label style="width: 100%;">
			Email Address
			<input type="email" name="email" placeholder="Type the email here" class="form-control" value="" required="">
		</label>
	</div>
	<div class="form-group">
		<label style="width: 100%;">
			Password
			<input type="password" name="password" placeholder="Type the password here" class="form-control" value="" required="">
		</label>
	</div>
</div>
<?php }else{ ?>
	<p>This user already have an account.</p>
<?php } ?>
<!-- 
<div class="form-group">
	<label style="width: 100%;">
		Confirm Password
		<input type="email" name="email" placeholder="Confirm your password here" class="form-control">
	</label>
</div> -->
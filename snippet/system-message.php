<?php if(isset($_GET['msg'])){ ?>
	<?php if($_GET['msg'] == 'success'){ ?>
	<div class="card">								
		<div class="card-body">								
			<div class="alert alert-success" role="alert">
				You have successfully modified the user!
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
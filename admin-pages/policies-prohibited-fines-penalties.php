<?php include '../template/header.php' ?>
<title>Prohibited Acts Fines & Penalties</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css">
<body class="animsition">

    <div class="page-wrapper">
       <?php include '../template/navigation-admin.php'; ?>
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
                                        <li class="list-inline-item">Laws & Policies</li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Prohibited Acts Fines & Penalties</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <?php
            $id = 1;
            $sql = "SELECT title,description FROM laws_policies WHERE id = 1";
        	$result = mysqli_query($mysqli,$sql);
            if (mysqli_num_rows($result) > 0) {         
            	               
                while($row = mysqli_fetch_assoc($result)) {
                	$title = $row['title'];
                	$desc  = $row['description'];
                }
            }
            ?>
            <!-- MAIN CONTENT-->
            <div class="main-content" id="penalties-page">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">                            	
      				                <div class="card">
      				                  <div class="card-header">
      				                  	<form method="post" class="summernote" action="../api/policies-prohibited.php">
      					                    <strong class="card-title">
      					                    	<input id="title-input" type="text" name="title" placeholder="Type the title here" class="form-control"  value="<?php echo $title; ?>">
      					                    </strong>
      					                 <!--    <button id="edit-btn-title" class="item icon-btn " data-toggle="tooltip" data-placement="top" title="" onclick="javascript:editTitle();" data-original-title="Edit Title"><i class="zmdi zmdi-edit"></i></button> -->

      					                     <button name="save_title" id="save-btn-title" class="item icon-btn " data-toggle="tooltip" data-placement="top" title="" data-original-title="Save Title" ><i class="fa fa-save"></i></button>
      				                 	</form>
      				                  </div>

      				                  <div class="card-body">

      				                   <!--   <button id="edit-btn-desc" class="item icon-btn " data-toggle="tooltip" data-placement="top" title="" onclick="javascript:editDescription();" data-original-title="Edit Description" style="margin-bottom: -33px;position: relative;float: right;"><i class="zmdi zmdi-edit"></i></button>-->
      				                   	<form method="post" class="summernote" action="../api/policies-prohibited.php">

      					                     <button type="submit" name="save_description" id="save-btn-desc" class="item icon-btn " data-toggle="tooltip" data-placement="top" title="" onclick="javascript:saveDescription();" data-original-title="Save Description" style="margin-bottom: -33px;position: relative;float: right;"><i class="fa fa-save"></i></button>

      					                     <textarea id="description-input" name="description" class="form-control" style="height: 100vh;font-size: 15px;" placeholder="Type your article here" ><?php echo $desc; ?></textarea>
      				                    </form> 
      				                  </div>
      				                </div>
                            </div>
                        </div><!-- row -->
                  
                    </div><!-- container Fluid -->
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

     
    </div>
    <?php include '../template/footer.php' ?>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.min.js"></script>
  <script type="text/javascript">
  	function editTitle(){
  		$("#edit-btn-title").hide();
  		$("#save-btn-title").show();
  		$("#title-input").attr("readonly", false); 
  	}
	function saveTitle(){
  		$("#edit-btn-title").show();
  		$("#save-btn-title").hide();
  		$("#title-input").attr("readonly", true); 
  	}
  	function editDescription(){
  		$("#edit-btn-desc").hide();
  		$("#save-btn-desc").show();
  		$("#description-input").attr("readonly", false); 
  	}
	function saveDescription(){
  		$("#edit-btn-desc").show();
  		$("#save-btn-desc").hide();
  		$("#description-input").attr("readonly", true); 
  	}
  	//Bootstrap 4 + daemonite material UI + Summernote wysiwyg text editor
	//doc : https://github.com/summernote/summernote

	$('#description-input').summernote({
	  minHeight: 200,
	  placeholder: 'Write article here ...',
	  focus: false,
	  airMode: false,
	  fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
	  fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
	  dialogsInBody: true,
	  dialogsFade: true,
	  disableDragAndDrop: false,
	  toolbar: [
	    // [groupName, [list of button]]
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['para', ['style', 'ul', 'ol', 'paragraph']],
	    ['fontsize', ['fontsize']],
	    ['font', ['strikethrough', 'superscript', 'subscript']],
	    ['height', ['height']],
	    ['misc', ['undo', 'redo', 'print', 'help', 'fullscreen']]
	  ],
	  popover: {
	    air: [
	      ['color', ['color']],
	      ['font', ['bold', 'underline', 'clear']]
	    ]
	  },
	  print: {
	    //'stylesheetUrl': 'url_of_stylesheet_for_printing'
	  }
	});
	// $('#my-summernote2').summernote({airMode: true,placeholder:'Try the airmode'});
  
  </script>
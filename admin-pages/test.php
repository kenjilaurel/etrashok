<?php include '../template/header.php' ?>
<title>Prohibited Acts Fines & Penalties</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css">
<style type="text/css">
/* Material design styling */
/* for text editor*/
/*placeholder style*/

.note-placeholder {
  position: absolute;
  top: 20%;
  left: 5%;
  font-size: 2rem;
  color: #e4e5e7;
  pointer-events: none;
}

/*Toolbar panel*/

.note-editor .note-toolbar {
  background: #f0f0f1;
  border-bottom: 1px solid #c2cad8;
  -webkit-box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.14), 0 3px 4px 0 rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.14), 0 3px 4px 0 rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
}

/*Buttons from toolbar*/

.summernote .btn-group, .popover-content .btn-group {
  background: transparent;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.note-popover {
  background: #f0f0f1!important;
}

.summernote .btn, .note-btn {
  color: rgba(0, 0, 0, .54)!important;
  background-color: transparent!important;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.summernote .dropdown-toggle:after {
  vertical-align: middle;
}

.note-editor.card {
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 2px;
}

/* Border of the Summernote textarea */

.note-editor.note-frame {
  border: 1px solid rgba(0, 0, 0, .14);
}

/* Padding of the text in textarea */

.note-editor.note-frame .note-editing-area .note-editable {
  padding-top: 1rem;
}

</style>
<body class="animsition">
    <div class="page-wrapper">
       

            <!-- MAIN CONTENT-->
            <div class="main-content" id="penalties-page">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">                            	
				                
          <textarea id="my-summernote" name="editordata"></textarea>
        
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
  //Bootstrap 4 + daemonite material UI + Summernote wysiwyg text editor
//doc : https://github.com/summernote/summernote

$('#my-summernote').summernote({
  minHeight: 200,
  placeholder: 'Write here ...',
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
$('#my-summernote2').summernote({airMode: true,placeholder:'Try the airmode'});

  </script>
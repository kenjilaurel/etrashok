$(document).ready(function(){
  $(".nav-arrow").click(function(){
  	
  	var className = $(this).find('i').attr('class');
  	if(className == 'fas fa-angle-down'){
  		$(this).parent().find('.fa-angle-down').addClass('fa-angle-left').removeClass('fa-angle-down');
  	}else{
  		$(this).parent().find('.fa-angle-left').addClass('fa-angle-down').removeClass('fa-angle-left');
  	}
  	
  });
});


$(document).ready(function(){
	$('.demo-btn').on('click', function(){
	    $('.demo-container').slideToggle();
	});

	$('.color-option').on('click', function(){
		var color = $(this).attr('data-color-value');
		$('#color-style').attr('href', 'css/'+color+'-skin.min.css');
	});

})
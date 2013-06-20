
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>George's List</title>

<link href="styles.css" type="text/css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/quicksearch.js" type="text/javascript"></script>
<script src="js/isotope.min.js" type="text/javascript"></script>



<script>

$(document).ready(function() {

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
}
	$('.vendorclick').click(function() {
		var id = $(this).attr('id');
		var obj = $('.popups#' + id);
		obj.children('.moreinfo').center();
		obj.fadeIn();
	//	obj.siblings('.overlay').fadeIn();
	});

	$('.overlay').click(function() {
		$(this).parent('.popups').fadeOut();
		//$(this).fadeOut();
	});
	
	$('.x').click(function() {
		$(this).parent('.moreinfo').parent('.popups').fadeOut();
		//$(this).parent('.moreinfo').siblings('.overlay').fadeOut();
	});
	
	$('#vendorsearch').val("");
	
	$(function() {

   var $container = $('#isotope-container');

   $container.isotope({
        itemSelector: '.item',
		animationEngine : 'jquery',
		layoutMode: 'straightDown',
			animationOptions: {
				duration: 250,
				easing: 'linear',
				queue: false
			} 
    });


    $('input#vendorsearch').quicksearch('#isotope-container .item', {
        'show': function() {
            $(this).addClass('quicksearch-match');
			
        },
        'hide': function() {
            $(this).removeClass('quicksearch-match');
			
        }
    }).keyup(function(){
        setTimeout( function() {
            $container.isotope({ filter: '.quicksearch-match' }).isotope(); 
			if(('#vendorsearch').length) { $('.noresults').show(); } else { $('.noresults').show(); }
        }, 100 );
    });

});
	
});
</script>

<?php include("includes.php"); ?>
</head>
<body>
<div id="wrapper">
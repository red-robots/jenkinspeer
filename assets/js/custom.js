jQuery(document).ready(function ($) {
	
	$('#featurePortfolio').flexslider({
		selector: '.slides > .slide-group',
		directionNav: false,
		controlsContainer: "#slide-controller"
	}); 

	$(document).on("click","#toggleMenu",function(){
		$(this).toggleClass('open');
		$("#site-navigation").toggleClass('menu-open');
	});

}); 
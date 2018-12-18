/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	

	// people 
	$(".person").hover(function () {
 
    // Set the effect type
    var effect = 'slide';
 
    // Set the options for the effect type chosen
    var options = { direction: 'left' };
 
    // Set the duration (default: 400 milliseconds)
    var duration = 100;
 
    $(this).find('.peopleinfo').toggle(effect, options, duration);
});
	
 $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
		
		
// Turn Portfolio nav red when in the portfolio taxonomy
    if ( document.location.href.indexOf('portfolio-categories') > -1 ) {
        $('ul.nav-menu li.portfolio a').addClass("active");
    }
	
// Turn Portfolio nav red when viewing a single portfolio item	
	if ( document.location.href.indexOf('portfolio') > -1 ) {
        $('ul.nav-menu li.portfolio a').addClass("active");
    }
	
// keep the firm nav red when viewing children	
	if ( document.location.href.indexOf('firm') > -1 ) {
        $('ul.nav-menu li.firm a').addClass("active");
    }
	
// keep the firm nav red when viewing people	
	if ( document.location.href.indexOf('people') > -1 ) {
        $('ul.nav-menu li.firm a').addClass("active");
    }


});




// blogbox hover
$(".blogpost").hover(function(){
    $(this).find('.blogcontent').removeClass("blog_off");
	$(this).find('.readmore').removeClass("read_off");
	$(this).find('.blogcontent').addClass("blog_hover");
	$(this).find('.readmore').addClass("read_hover");
}, function(){
    $(this).find('.blogcontent').addClass("blog_off");
	$(this).find('.readmore').addClass("read_off");
	$(this).find('.blogcontent').removeClass("blog_hover");
	$(this).find('.readmore').removeClass("read_hover");
});
	
	
	// initialize Isotope
var $container = $('#container').isotope({
  // options
  itemSelector: '.item',
  masonry: {
	/*columnWidth: 200,*/
	gutter: 30
			}
});
// layout Isotope again after all images have loaded
$container.imagesLoaded( function() {
  $container.isotope('layout');
});


	

	$('a.colorbox').colorbox({
 		rel:'gal',
 		scalePhotos: true,
 		maxWidth: "100%"
 	});

	$('#flexcarousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 100,
		itemMargin: 5,
		asNavFor: '#flexslider2'
	});

	$('#flexslider2').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false
	});

});// END #####################################    END	
	
	
$(window).load(function () {

	// set up and load the front page carousel
  	$('#mycarousel').jcarousel({
    	wrap: 'circular',
		auto: 0,
		scroll: 3,
		animation: 4000,
	    buttonNextEvent: 'click',
        buttonPrevEvent: 'click',
		animation: 'fast', 
    });
	
	// WE added a css of display: none to the list itme so it doesn't flicker or look weird when it's loading
	// But we need to remove that class on load to see the carousel 
 	$('ul#mycarousel li a').removeClass('.hideitemonload');
		
	
	// var gallery = $('#gallery').galleriffic('#navigation', {
	// 	delay:                2000,
	// 	numThumbs:            6,
	// 	imageContainerSel:    '#slideshow',
	// 	controlsContainerSel: '#controls',
	// 	titleContainerSel:    '#image-title',
	// 	descContainerSel:     '#image-desc',
	// 	downloadLinkSel:      '#download-link',
	// 	fixedNavigation:	   true,
	// 	galleryKeyboardNav:	   true,
	// 	autoPlay:			   false
	// });
	
	// gallery.onFadeOut = function() {
	// 	$('#details').fadeOut('fast');
	// };
	
	// gallery.onFadeIn = function() {
	// 	$('#details').fadeIn('fast');
	// };
	
});// END #####################################    END	
	
	

	
	
	
	

	
	
	


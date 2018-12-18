$(document).ready(function () {
	
	
	
	
	
	
	// Highlight some nav things. Add an "active" class
				
			$("[href]").each(function() {
    			if (this.href == window.location.href) {
        	$(this).addClass("active");
        	}
    		});
			
			// For some odd reason the above activation doesn't work for Portfolio 
			if(window.location.href.indexOf("portfolio") > -1) {
      			 $('#navigation .port a').addClass("active");
	        }
			
			if(window.location.href.indexOf("portfolio-item") > -1) {
      			 $('#navigation .port a').addClass("active");
	        }
			
			if(window.location.href.indexOf("portfolio-categories") > -1) {
      			 $('#navigation .port a').addClass("active");
	        }
	
	
	
	
	
	// transition effect
		style = 'easeOutQuart';

		
		// if the mouse hover the image
		$('.port-post-div').hover(
			function() {
				//display heading and caption
				$(this).children('.proj-title').stop(false,true).animate({top:0},{duration:200, easing: style});
			},

			function() {
				//hide heading and caption
				$(this).children('.proj-title').stop(false,true).animate({top:-130},{duration:200, easing: style});
			}
		);
		
	
		
		
		
		
// set up and load the front page carousel
  jQuery('#mycarousel').jcarousel({
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
 jQuery('ul#mycarousel li a').removeClass('.hideitemonload');
		
		
		
	
	
	
				// We only want these styles applied when javascript is enabled
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 9,
					preloadAhead:              6,
					enableTopPager:            false,
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              '',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);

						// Update the photo index display
						this.$captionContainer.find('div.photo-index')
							.html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
						var nextPageLink = this.find('a.next').css('visibility', 'hidden');
						
						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.css('visibility', 'visible');

						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.css('visibility', 'visible');

						this.fadeTo('fast', 1.0);
					}
				});

				/**************** Event handlers for custom next / prev page links **********************/

				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});

				gallery.find('a.next').click(function(e) {
					gallery.nextPage();
					e.preventDefault();
				});

				/****************************************************************************************/

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;

					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
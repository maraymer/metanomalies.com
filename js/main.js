$(function() {
	
	/* menu and search modal show/hide */
	
	$( "#Header form.search" ).hide();
	$( "#Nav" ).hide();
	
	$( "#Header button.hamburger" ).click(function() {
		$( "#Header form.search" ).hide();
		$( "#Header button.search" ).removeClass( "active" );
		$( "#Header button.hamburger" ).toggleClass( "active" );
		$( "#Nav" ).slideToggle( "fast" );
	});
	
	$( "#Header button.search" ).click(function() {
		$( "#Nav" ).hide();
		$( "#Header button.hamburger" ).removeClass( "active" );
		$( "#Header button.search" ).toggleClass( "active" );
		$( "#Header form.search" ).fadeToggle( "fast" );
	});
	
	
	/*
		Masonry: http://masonry.desandro.com/
		imageLoaded: http://imagesloaded.desandro.com/
	*/
	
	var $container = $('ul.articles');
	
	// initialize Masonry
	$container.masonry({
		columnWidth: '.grid-sizer',
		itemSelector: '.article',
		gutter: 20,
		transitionDuration: '0.2s'
	});
	
	// layout Masonry again after all images have loaded
	$container.imagesLoaded( function() {
		$container.masonry();
	});
	
	/* owlCarousel:  */
	
	$("#FeaturedArticles").owlCarousel({
		singleItem: true,
		afterUpdate: function() {
			$container.masonry();
		}
	});
	
});
(function($){

	$(document).ready(function() {
	 
		 var $owl = $("#owl-demo");
		 
		 $owl.owlCarousel({
		      autoPlay : 5000,
			  slideSpeed: 3000,
			  transitionStyle : "fade",
			  singleItem : true
		 });
	 
	      // Custom Navigation Events
		  $(".next").click(function(){		 
			  $owl.trigger('owl.next');
		  });
		
		  $(".prev").click(function(){
	  	 	  $owl.trigger('owl.prev');
	  	  });
	  	  
	  	  
	  	  //dynamically settings the width for pictureNav buttons width based on 
	  	  // the # of total buttons i.e. 5 buttons = widthsize, 6 buttons = slightly smaller width
	  	  // 7 buttons smaller than that...etc
	  	  var count = $(".pictureNav > a").size();
	  	  var container_width = $(".pictureNav").width();
	  	  var ele_width = (container_width / count) - 2.5;
	  	  $(".pictureNav a").css('width', ele_width + "px");
	});
	
	
	
	$(window).load(function(){
		var map_canvas = document.getElementById('map_canvas');
	    var yankeeloc = new google.maps.LatLng('42.34784' , '-71.036042');
	    var map_options = {
	      center: yankeeloc ,
	      zoom: 15,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	      
	    }
	    var map = new google.maps.Map(map_canvas, map_options);
	    var  marker = new google.maps.Marker({
	        position: yankeeloc,
	        map: map
	    });
	});

})(jQuery);

jQuery(document).ready(function() {
		/* for top navigation */
		jQuery(" #menu ul ").css({display: "none"}); // Opera Fix
		jQuery(" #menu li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
		
});		 
	

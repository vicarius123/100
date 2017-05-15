jQuery(document).ready(function(){
	
	var spinner = jQuery( ".spin" ).spinner({min: 20,
		change: function( event, ui ) {
			var obj = jQuery(this).val();
			jQuery( ".spin" ).val(obj);
			
		}
	});
});
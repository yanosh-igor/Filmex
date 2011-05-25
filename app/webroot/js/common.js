// when the document is ready
$(document).ready(function(){

	// stripe all the tables in the application
	$('table.stripe tr:even').addClass('altrow');

	// get value of selected type
	var current_type = $('.type_select option:selected').text();

	// if the selected option is not 'TV Show' then hide the tv options
	if(current_type != "TV Shows") {
		// hide the tv elements from form
		$('.tv_hide').parent().hide();
	}

	// add event handler to type select form input
	$('.type_select').change(function(){
		// get the value of the selected option
		var type = $(this).find('option:selected').text();

		// log the type for testing purposes
		console.log( type );

		// if the type is a tv show
		if(type == "TV Shows") {
			// fadein the form inputs
			$('.tv_hide').parent().fadeIn();
		} else {
			// fade out and hide the form inputs
			$('.tv_hide').parent().fadeOut();
		}
	});
});
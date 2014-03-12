function simpleflat_playpause_button($, data){
			
	//If the player is playing
	if ( data.data == YT.PlayerState.PLAYING ){
		
		//Hide play button
		$('.mpvsyt-controls .mpvsyt-play-btn').css('display', 'none');
		
		//Show pause button
		$('.mpvsyt-controls .mpvsyt-pause-btn').css('display', 'inline');
	}
	
	//If the player is paused or cued
	if ( data.data == YT.PlayerState.PAUSED || data.data == YT.PlayerState.CUED || !data.data){
	
		//Show play button
		$('.mpvsyt-controls .mpvsyt-play-btn').css('display', 'inline');
		
		//Hide pause button
		$('.mpvsyt-controls .mpvsyt-pause-btn').css('display', 'none');
	
	}
		
}

//Set volume
function simpleflat_set_volume_width(){
	//Volume area width
	var volume_area_width_percentage_multiplier = jQuery('.mpvsyt-volume-area').width()/100;
	
	//Set volume on load
	var width = mpvsyt_var.getVolume() * volume_area_width_percentage_multiplier;
	
	jQuery('.mpvsyt-volume-bar').css( 'width', width ); 
}

function simpleflat_set_seek_bar_width(){
	//Update seek bar every 500ms	
	setInterval(function() {	
		
		var seconds_total = mpvsyt_var.getDuration();
		var width_percent_loaded = mpvsyt_var.getVideoLoadedFraction();
		var seconds_current = mpvsyt_var.getCurrentTime();
		width_percent_current = seconds_current / seconds_total;
		
		//Set css width for seek bar
		jQuery( '.mpvsyt-seek-bar' ).css('width', width_percent_current * 100 + '%' );
		
		//Set css width for loaded bar
		jQuery( '.mpvsyt-loaded-bar' ).css('width', width_percent_loaded * 100 + '%' );
	
	},500);
}

// Launch fullscreen for browsers that support it!
//simpleflat_launchFullscreen(document.getElementsByClassName("mpvsyt-container")); // any individual element
	
jQuery(document).ready(function($){
	
	//When the player is set up
	$(window).on( 'mpvsyt_set_up_player', function( event, data){
		//Show/Hide the play pause buttons
		simpleflat_playpause_button( $, data );
		
		//Set the volume bar's width
		simpleflat_set_volume_width();
		
		//Set the seek bar width
		simpleflat_set_seek_bar_width();
		
		//data.target.stopVideo();
	});
	
	//When the player's state changes
	$(window).on( 'mpvsyt_state_change', function( event, data){
		//Show/Hide the play pause buttons
		simpleflat_playpause_button( $, data );
	});
	
	//On play click
	$( '.mpvsyt-controls .mpvsyt-play-btn' ).on( 'click', function(event){
		if (mpvsyt_var) {
			mpvsyt_var.playVideo();
		}
	});
	
	//On pause click
	$( '.mpvsyt-controls .mpvsyt-pause-btn' ).on( 'click', function(event){
		if (mpvsyt_var) {
			mpvsyt_var.pauseVideo();
		}
	});
	
	//Go to where the user clicks on the seek area
	$('.mpvsyt-seek-area').on( 'mouseup mousedown', function(event){
		
		//Get click position
		var xPosition = $(this).offset().left - $(window).scrollLeft();
		var click_position = Math.round( (event.clientX - xPosition) );
		
		//Get width of seek area
		var total_width = $(this).width();
		
		//Get percentage
		var click_percentage = click_position / total_width;
		
		//Total time of the video in seconds
		var total_time = mpvsyt_var.getDuration()
		
		//Find out percentage is in time of the video
		seek_to_time = total_time * click_percentage;
		mpvsyt_var.seekTo(seek_to_time, true);
		
	});
	
	//Set the volume based on where the user clicks on the volume area
	$('.mpvsyt-volume-area').on( 'mouseup mousedown', function(event){
		
		//Get click position
		var xPosition = $(this).offset().left - $(window).scrollLeft();
		var click_position = Math.round( (event.clientX - xPosition) );
		
		//Get width of seek area
		var total_width = $(this).width();
		
		//Get percentage
		var click_percentage = click_position / total_width * 100;
		
		//Set the volume
		mpvsyt_var.setVolume(click_percentage);
		
		//Set the volume bar's width
		
		//Volume area width
		jQuery('.mpvsyt-volume-bar').css( 'width', click_position ); 
		
	});
	
	
});
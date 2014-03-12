<?php

//Placeholder image used for video sizing
function mp_video_skinner_simpleflat_bottom_extra( $default_bottom_extra ){
	//Return the height of the player controls in pixels
	return 45;
}
add_filter( 'mp_video_skinner_bottom_extra', 'mp_video_skinner_simpleflat_bottom_extra' );
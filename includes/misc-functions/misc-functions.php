<?php

/**
 * Add this skin to the array of skins used in MP Video Skinner
 *
 * @since    1.0.0
 * @link     http://moveplugins.com/doc/
 * @see      function_name()
 * @param    array $args See link for description.
 * @return   void
 */
function mp_simpleflat_add_simpleflat_skin( $skins ){
	
	//Add this skin
	$skins['simpleflat'] = "SimpleFlat";
	
	//Return the incoming array with this skin added
	return $skins;
	
}
add_filter( 'mp_video_skinner_skins', 'mp_simpleflat_add_simpleflat_skin' );
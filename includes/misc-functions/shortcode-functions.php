<?php

/**
 * Returns Custom options options for shortcode inserter via ajax
 *
 * @since    1.0.0
 * @link     http://moveplugins.com/doc/
 * @see      function_name()
 * @param    array $args See link for description.
 * @return   void
 */
function mp_simpleflat_shortcode_options_ajax(){
	
	$ajax_return_html = NULL;
	
	//Controls background
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Control Area Background Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="text" class="mp-simpleflat-control-bg-color of-color" />
		
	</div>';
	
	//Play/Pause Button Color
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Play/Pause Button Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="text" class="mp-simpleflat-playpause-color of-color" />
		
	</div>';
	
	//Play Pause Button Hover Color
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Play/Pause Mouse-Over Button Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="text" class="mp-simpleflat-mouseover-color of-color" />
		
	</div>';
	
	//Seek Bar bg Color
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Seek-Bar Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="checkbox" class="mp-simpleflat-seekarea-color" />
		
	</div>';
	
	//Loaded Bar Color
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Loaded-Bar Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="text" class="mp-simpleflat-loaded-color of-color" />
		
	</div>';
	
	//Play Bar Color
	$ajax_return_html .= '
	<div class="mp_field">
            	
		<div class="mp_title">
			<label for="simpleflat_text_color">
				<strong>' . __( 'Play-Bar Color:', 'mp_simpleflat_skin' ) . '</strong> 
			<em>' . __( 'Select a color', 'mp_simpleflat_skin' ) . '</em>
			</label>
		</div>   
		
		<input type="text" class="mp-simpleflat-playbar-color of-color" />
		
	</div>';
	
	echo $ajax_return_html;
	
	die();
	
}
add_action( 'wp_ajax_simpleflat_shortcode_options', 'mp_simpleflat_shortcode_options_ajax' );
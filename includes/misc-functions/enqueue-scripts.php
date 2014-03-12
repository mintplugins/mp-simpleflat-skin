<?php

/* Styles for site holding embedded iframe */
function mp_simpleflat_skin_site_scripts(){
		
	//Simpleflat Site CSS
	wp_enqueue_style( 'mp_simpleflat_skin_site_css', plugins_url( 'skin/simpleflat/css/simpleflat-site.css', dirname(__FILE__) ) );			
			
}
add_action( 'wp_enqueue_scripts', 'mp_simpleflat_skin_site_scripts', 20 );

/* Styles for video embed page */
function mp_simpleflat_skin_footer_embed_scripts(){
	
	//Video ID
	$skin = isset($_GET['skin']) ? $_GET['skin'] : NULL;
				
	//If a Youtube URL has been entered by the user
	if ( $skin == 'simpleflat'){
			
		//Simpleflat Youtube Player Skin CSS
		wp_enqueue_style( 'mp_simpleflat_skin_youtube_skin_css', plugins_url( 'skin/simpleflat/css/simpleflat-embed.css', dirname(__FILE__) ) );	
		
		//Simpleflat Youtube Player Skin js
		wp_enqueue_script( 'mp_simpleflat_skin_youtube_skin_js', plugins_url( 'skin/simpleflat/js/simpleflat-embed.js', dirname(__FILE__) ), 
			array( 'jquery', 'mp_video_skinner_youtube_js' ) );	
		}
			
}
add_action( 'mp_video_skinner_skins_enqueue', 'mp_simpleflat_skin_footer_embed_scripts', 20 );
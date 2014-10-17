<?php

function font_awesome_shortcodes_styles_all() {
    wp_register_style( 'font-awesome-shortcodes-help-all', plugins_url( 'font-awesome-shortcodes/includes/help/css/fontawesome-shortcodes-help-all.css' ) );
    wp_enqueue_style( 'font-awesome-shortcodes-help-all' );
}

add_action( 'admin_enqueue_scripts', 'font_awesome_shortcodes_styles_all' );


function fontawesome_shortcodes_help_styles() {
    $screen = get_current_screen(); 
    if($screen->parent_base != "gf_edit_forms") {
        wp_register_style( 'fa-font', plugins_url( 'font-awesome-shortcodes/includes/help/fa-font.css' ) );
        wp_register_style( 'fontawesome-shortcodes-help', plugins_url( 'font-awesome-shortcodes/includes/help/css/fontawesome-shortcodes-help.css' ) );
        wp_register_style( 'fontawesome-shortcodes-help-icons', plugins_url( 'font-awesome-shortcodes/includes/help/css/font-awesome.min.css' ) );
        wp_register_style( 'bootstrap-modal', plugins_url( 'font-awesome-shortcodes/includes/help/css/bootstrap-modal.css' ) );

        wp_enqueue_style( 'fontawesome-shortcodes-help' );
        wp_enqueue_style( 'fontawesome-shortcodes-help-icons' );
        wp_enqueue_style( 'bootstrap-modal' );
        wp_enqueue_style( 'fa-font' );

        wp_register_script( 'bootstrap', plugins_url( 'font-awesome-shortcodes/includes/help/js/bootstrap.min.js' ) );
        wp_enqueue_script( 'bootstrap' );
    }

}
add_action( 'media_buttons', 'fontawesome_shortcodes_help_styles' );

add_filter('the_content', 'fa_fix_shortcodes');

//action to add a custom button to the content editor
function add_fontawesome_button() {
    
    $screen = get_current_screen(); 
    if($screen->parent_base != "gf_edit_forms") {
  
        //the id of the container I want to show in the popup
        $popup_id = 'fontawesome-shortcodes-help';

        //our popup's title
        $title = 'Font Awesome Shortcodes Help';

        //append the icon
        //append the icon
        printf(
        '<a data-toggle="modal" data-target="#fontawesome-shortcodes-help" title="%2$s" href="%3$s" class="%4$s"><span class="fa_font-awesome-logo wp-media-buttons-icon"></span></a>',
        esc_attr( $popup_id ),
        esc_attr( $title ),
        esc_url( '#' ),
        esc_attr( 'button add_media font-awesome-shortcodes-button')
        //sprintf( '<img src="%s" style="height: 20px; position: relative; top: -2px;">', esc_url( $img ) )
        );
    }
}

// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons', 'add_fontawesome_button', 11);

function fontawesome_shortcodes_help() {
    include('fontawesome-shortcodes-help.php');
}
add_action( 'admin_footer', 'fontawesome_shortcodes_help' );

// Add the Font Awesome Shortcodes button to Distraction Free Writing mode 
function fa_fullscreenbuttons($buttons) {

	$buttons[] = 'separator';

	$buttons['fontawesome-shortcodes'] = array(
		'title' => __('Font Awesome Shortcodes Help'),
		'onclick' => "jQuery('#fontawesome-shortcodes-help').modal('show');",
		'both' => false 
	);

	return $buttons;
}
add_action ('wp_fullscreen_buttons', 'fa_fullscreenbuttons');

add_filter("gform_noconflict_styles", "fa_register_script");
function fa_register_script($scripts){

    //registering my script with Gravity Forms so that it gets enqueued when running on no-conflict mode
    $scripts[] = "font-awesome-shortcodes-help-all";
    return $scripts;
}
?>

<?php
function fontawesome_shortcodes_font() {
    wp_register_style( 'fa-font', plugins_url( 'font-awesome-shortcodes/includes/help/fa-font.css' ) );
    wp_enqueue_style( 'fa-font' );
}
function fontawesome_shortcodes_help_styles() {
	wp_register_style( 'fontawesome-shortcodes-help', plugins_url( 'font-awesome-shortcodes/includes/help/css/fontawesome-shortcodes-help.css' ) );
	wp_register_style( 'fontawesome-shortcodes-help-icons', plugins_url( 'font-awesome-shortcodes/includes/help/css/font-awesome.min.css' ) );
    wp_register_style( 'bootstrap-modal', plugins_url( 'font-awesome-shortcodes/includes/help/css/bootstrap-modal.css' ) );

    wp_enqueue_style( 'fontawesome-shortcodes-help' );
    wp_enqueue_style( 'fontawesome-shortcodes-help-icons' );
    wp_enqueue_style( 'bootstrap-modal' );

    wp_register_script( 'bootstrap', plugins_url( 'font-awesome-shortcodes/includes/help/js/bootstrap.min.js' ) );
	wp_enqueue_script( 'bootstrap' );

}
add_action( 'admin_enqueue_scripts', 'fontawesome_shortcodes_font' );
add_action( 'edit_form_top', 'fontawesome_shortcodes_help_styles' );

add_filter('the_content', 'fa_fix_shortcodes');

//action to add a custom button to the content editor
function add_fontawesome_button() {
  
  //the id of the container I want to show in the popup
  $popup_id = 'fontawesome-shortcodes-help';
  
  //our popup's title
  $title = 'Font Awesome Shortcodes Help';

  //append the icon
  //append the icon
 printf(
    '<a data-toggle="modal" data-target="#fontawesome-shortcodes-help" title="%2$s" href="%3$s" class="%4$s" style="padding-left: 0px; padding-right: 0px;"><span class="fa_font-awesome-logo wp-media-buttons-icon"></span></a>',
    esc_attr( $popup_id ),
    esc_attr( $title ),
    esc_url( '#' ),
    esc_attr( 'button add_media font-awesome-shortcodes-button')
    //sprintf( '<img src="%s" style="height: 20px; position: relative; top: -2px;">', esc_url( $img ) )
  );
}

// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons', 'add_fontawesome_button', 11);

function fontawesome_shortcodes_help() {
    include('fontawesome-shortcodes-help.php');
}
add_action( 'edit_form_after_editor', 'fontawesome_shortcodes_help' );


?>
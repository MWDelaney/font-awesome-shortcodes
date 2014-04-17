<?php
function fontawesome_shortcodes_font() {
    wp_register_style( 'fa-font', plugins_url( 'font-awesome-shortcodes/includes/help/fa-font.css' ) );
    wp_enqueue_style( 'fa-font' );
}
function fontawesome_shortcodes_help_styles() {
	wp_register_style( 'fontawesome-shortcodes-help', plugins_url( 'font-awesome-shortcodes/includes/help/css/fontawesome-shortcodes-help.css' ) );
	wp_register_style( 'fontawesome-shortcodes-help-icons', plugins_url( 'font-awesome-shortcodes/includes/help/css/font-awesome.min.css' ) );

    wp_enqueue_style( 'fontawesome-shortcodes-help' );
    wp_enqueue_style( 'fontawesome-shortcodes-help-icons' );

    wp_register_script( 'fontawesome-shortcodes-help', plugins_url( 'font-awesome-shortcodes/includes/help/js/bootstrap.min.js' ), 'jquery' );
	wp_enqueue_script( 'fontawesome-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'fontawesome_shortcodes_font' );
add_action( 'edit_form_top', 'fontawesome_shortcodes_help_styles' );

add_filter('the_content', 'fa_fix_shortcodes');

//action to add a custom button to the content editor
function add_fontawesome_button() {
  
  //the id of the container I want to show in the popup
  $popup_id = 'fontawesome-shortcodes-help-popup';
  
  //our popup's title
  $title = 'Font Awesome Shortcodes Help';

  //append the icon
  printf(
    '<a title="%1$s" href="%2$s" class="thickbox button add_media font-awesome-shortcode-button" style="padding-left: 0px; padding-right: 0px;" title="%1$s"><span class="fa_font-awesome-logo wp-media-buttons-icon"></span></a>',
    esc_attr( $title ),
    esc_url( '#TB_inline?width=640&height=650&inlineId=' . $popup_id )
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
add_action( 'admin_footer', 'fontawesome_shortcodes_help' );


?>
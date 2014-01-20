<?php
function fontawesome_shortcodes_help_styles() {
	wp_register_style( 'fontawesome-shortcodes-help', plugins_url( 'fontawesome-shortcodes/includes/help/css/fontawesome-shortcodes-help.css' ) );
	wp_register_style( 'fontawesome-shortcodes-help-icons', plugins_url( 'fontawesome-shortcodes/includes/help/css/font-awesome.min.css' ) );

    wp_enqueue_style( 'fontawesome-shortcodes-help' );
    wp_enqueue_style( 'fontawesome-shortcodes-help-icons' );

    wp_register_script( 'fontawesome-shortcodes-help', plugins_url( 'fontawesome-shortcodes/includes/help/js/bootstrap.min.js' ) );
	wp_enqueue_script( 'fontawesome-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'fontawesome_shortcodes_help_styles' );

add_filter('the_content', 'fa_fix_shortcodes');

//action to add a custom button to the content editor
function add_fontawesome_button() {
  
  //path to my icon
  $img = FA_SHORTCODES_URL . 'images/Fontawesome_logo.svg';
  
  //the id of the container I want to show in the popup
  $popup_url = 'fontawesome-shortcodes-help-popup';
  
  //our popup's title
  $title = 'Font Awesome Shortcodes Help';

  //append the icon
  $context .= "<a title='{$title}'
    href='#TB_inline?width=640inlineId={$popup_url}&height=550' class='thickbox button add_media' style='padding-left: 0px; padding-right: 0px;' title='Font Awesome Shortcodes Help'>
    <img src='{$img}' style='height: 20px; position: relative; top: -2px;'></a>";
  
  echo $context;
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
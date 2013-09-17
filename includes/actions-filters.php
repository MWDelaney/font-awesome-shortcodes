<?php
add_filter('the_content', 'fa_fix_shortcodes');

// Create a Media Button for the help file
//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'add_fontawesome_button');

//action to add a custom button to the content editor
function add_fontawesome_button($context) {
  
  //path to my icon
  $img = FA_SHORTCODES_URL . 'images/fontawesome-logo.png';
  
  //the id of the container I want to show in the popup
  $popup_url = FA_SHORTCODES_URL . 'fontawesome-shortcodes-help.php';
  
  //our popup's title
  $title = 'Font Awesome Shortcodes Help';

  //append the icon
  $context .= "<a class='thickbox' title='{$title}'
    href='{$popup_url}?TB_iframe=true&width=400'>
    <img src='{$img}' /></a>";
  
  return $context;
}
?>
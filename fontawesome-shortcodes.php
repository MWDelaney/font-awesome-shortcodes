<?php
/*
Plugin Name: Font Awesome Shortcodes
Plugin URI: https://github.com/FoolsRun/fontawesome-shortcodes
Description: The plugin adds a shortcodes for all Font Awesome icons.
Version: 4.1
Author: M. W. Delaney
Author URI: 
License: GPL2
*/

/*  Copyright 2012  M. W. Delaney  (email : michael@michael-delaney.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* ============================================================= */

require_once(dirname(__FILE__) . '/includes/defaults.php');
require_once(dirname(__FILE__) . '/includes/functions.php');
require_once(dirname(__FILE__) . '/includes/actions-filters.php');

// Begin Shortcodes
class FontawesomeShortcodes {

  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) );
  }


  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {

    add_shortcode('fa', array( $this, 'fa' ));
    add_shortcode('fa-stack', array( $this, 'fa_stack' ));

  }

  /*--------------------------------------------------------------------------------------
    *
    * fa_icon
    *
    *-------------------------------------------------------------------------------------*/
  function fa($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => '',
        "size" => false,
        "pull" => false,
        "muted" => false,
        "border" => false,
        "spin" => false,
        "list_item" => false,
        "fixed_width" => false,
        "rotate" => false,
        "flip" => false,
        "stack_size" => false,
        "inverse" => false,
        "xclass" => false
     ), $atts));

    $class  = 'fa';
    $class .= ( $type )         ? ' fa-' . $type : '';
    $class .= ( $size )         ? ' fa-' . $size : '';
    $class .= ( $pull )         ? ' pull-' . $pull : '';
    $class .= ( $border )       ? ' fa-border' : '';
    $class .= ( $spin )         ? ' fa-spin' : '';
    $class .= ( $list_item )    ? ' fa-li' : '';
    $class .= ( $fixed_width )  ? ' fa-fw' : '';
    $class .= ( $rotate )       ? ' fa-rotate-' . $rotate : '';
    $class .= ( $flip )         ? ' fa-flip-' . $flip : '';
    $class .= ( $stack_size )   ? ' fa-stack-' . $stack_size : '';
    $class .= ( $inverse )      ? ' fa-inverse' : '';
    $class .= ( $xclass )   ? ' ' . $xclass : '';
      
    return sprintf( 
      '<i class="%s"></i>',
      esc_attr( $class )
    );
  }

  /*--------------------------------------------------------------------------------------
    *
    * fa_icon_stack
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function fa_stack( $atts, $content = null ) {
     extract(shortcode_atts(array(
        "size" => false,
        "xclass" => false
     ), $atts));
      
     $class  =  'fa-stack';
     $class .= ($size) ? ' fa-' . $size : '';

    return sprintf( 
      '<span class="%s">%s</span>',
      esc_attr( $class ),
      do_shortcode( $content )
    );
  }
}

new FontawesomeShortcodes();
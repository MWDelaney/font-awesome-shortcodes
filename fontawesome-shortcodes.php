<?php
/*
Plugin Name: Font Awesome Shortcodes
Plugin URI: https://github.com/FoolsRun/fontawesome-shortcodes
Description: The plugin adds a shortcodes for all Font Awesome icons.
Version: 1.0
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

    add_shortcode('fa-icon', array( $this, 'fa_icon' ));
    add_shortcode('fa-icon-stack', array( $this, 'fa_icon_stack' ));

  }



  /*--------------------------------------------------------------------------------------
    *
    * fa_icon
    *
    *-------------------------------------------------------------------------------------*/
  function fa_icon($atts, $content = null) {
     extract(shortcode_atts(array(
        "type" => '',
        "size" => false,
        "pull" => false,
        "muted" => false,
        "border" => false,
        "spin" => false,
        "list-item" => false,
        "fixed-width" => false,
        "rotate" => false,
        "flip" => false,
        "stack-base" => false,
        "xclass" => false
     ), $atts));

     $return  =  '<i class="icon';
     $return .= ($type) ? ' icon-' . $type : '';
     $return .= ($size) ? ' icon-' . $size : '';
     $return .= ($pull) ? ' pull-' . $pull : '';
     $return .= ($border) ? ' icon-border' : '';
     $return .= ($spin) ? ' icon-spin' : '';
     $return .= ($list-item) ? ' icon-li' : '';
     $return .= ($fixed-width) ? ' icon-fixed-width' : '';
     $return .= ($rotate) ? ' icon-rotate-' . $rotate : '';
     $return .= ($flip) ? ' icon-flip-' . $flip : '';
     $return .= ($stack-base) ? ' icon-stack-base' : '';
     $return .= ($xclass) ? ' ' . $xclass : '';
     $return .= '"></i>';

     return $return;
  }
    
  /*--------------------------------------------------------------------------------------
    *
    * fa_icon_stack
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
  function fa_icon_stack( $atts, $content = null ) {
    return '<span class="icon-stack">' . do_shortcode( $content ) . '</span>';

  }
    
}

new FontawesomeShortcodes();
<?php
/*
Plugin Name: Font Awesome Shortcodes
Plugin URI: https://github.com/FoolsRun/fontawesome-shortcodes
Description: The plugin adds a shortcodes for all Font Awesome icons.
Version: 4.1.3
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
    add_shortcode('fa-ul', array( $this, 'fa_ul' ));

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
     $class .= ( $xclass )   ? ' ' . $xclass : '';

    return sprintf( 
      '<span class="%s">%s</span>',
      esc_attr( $class ),
      do_shortcode( $content )
    );
  }
    
 /*--------------------------------------------------------------------------------------
    *
    * fa_ul
    *
    *
    *-------------------------------------------------------------------------------------*/
  function fa_ul( $atts, $content = null ) {
    extract( shortcode_atts( array(
      "xclass"  => false,
    ), $atts ) );
      
    $class  = "fa-ul";
    $class .= ($xclass) ? ' ' . $xclass : '';

    $return = '';
    $tag = array('ul');
    $content = do_shortcode($content);
    $return .= $this->scrape_dom_element($tag, $content, $class, $title, $data);
    return $return;
    
  }
    
/*--------------------------------------------------------------------------------------
    *
    * Scrape the shortcode's contents for a particular DOMDocument tag or tags, pull them out, apply attributes, and return just the tags.
    *
    *-------------------------------------------------------------------------------------*/
  function scrape_dom_element( $tag, $content, $class, $title, $data = null ) {

      $previous_value = libxml_use_internal_errors(TRUE);
      
      $dom = new DOMDocument;
      $dom->loadHTML($content);
      
      libxml_clear_errors();
      libxml_use_internal_errors($previous_value);
      foreach ($tag as $find) {
          $tags = $dom->getElementsByTagName($find);
          foreach ($tags as $find_tag) {
              $outputdom = new DOMDocument;
              $new_root = $outputdom->importNode($find_tag, true);
              $outputdom->appendChild($new_root);

              if(is_object($outputdom->documentElement)) {
                  $outputdom->documentElement->setAttribute('class', $outputdom->documentElement->getAttribute('class') . ' ' . esc_attr( $class ));
                  if( $title ) {
                      $outputdom->documentElement->setAttribute('title', $title );
                  }
                  if( $data ) {
                      $data = explode( '|', $data );
                      foreach( $data as $d ):
                        $d = explode(',',$d);    
                        $outputdom->documentElement->setAttribute('data-'.$d[0],trim($d[1]));
                      endforeach;
                  }
              }
            return $outputdom->saveHTML($outputdom->documentElement);

          }
        }
  }
}

new FontawesomeShortcodes();

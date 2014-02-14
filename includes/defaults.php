<?php

// Windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
//$fslashed_dir = trailingslashit(str_replace('\\','/', dirname(__FILE__)));
//$fslashed_abs = trailingslashit(str_replace('\\','/', ABSPATH));

if(!defined('FA_SHORTCODES_DIR')) {
    define('FA_SHORTCODES_DIR', plugin_dir_path( __FILE__ ));
}

if(!defined('FA_SHORTCODES_URL')) {
    define('FA_SHORTCODES_URL', plugin_dir_url( __FILE__ ));
}

?>
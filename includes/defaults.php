<?php

// Windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
$fslashed_dir = trailingslashit(str_replace('\\','/', dirname(__FILE__)));
$fslashed_abs = trailingslashit(str_replace('\\','/', ABSPATH));

if(!defined('FA_SHORTCODES_DIR')) {
    define('FA_SHORTCODES_DIR', $fslashed_dir);
}

if(!defined('FA_SHORTCODES_URL')) {
    define('FA_SHORTCODES_URL', site_url(str_replace($fslashed_abs, '', $fslashed_dir)));
}

?>
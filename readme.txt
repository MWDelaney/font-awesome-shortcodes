=== Font Awesome Shortcodes for WordPress ===
Contributors: FoolsRun
Tags: bootstrap, font awesome, shortcode, shortcodes, icon, icons, bootstrap
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Implements the Font Awesome icon font in WordPress through shortcodes.

== Description ==

###Just The Shortcodes, Please
Plenty of great WordPress plugins focus on providing or including the Font Awesome library into your site. Font Awesome Shortcodes for WordPress assumes you're working with a theme that already includes Font Awesome 4 and focuses on giving you a great set of shortcodes to use it with.

This plugin creates a simple, out of the way button just above the WordPress TinyMCE editor (next to the "Add Media" button) which pops up a handy icon-selector, and the plugin's documentation with shortcode examples for reference and handy "Insert Example" links to send the example shortcodes straight to the editor. There are no additional TinyMCE buttons to clutter up your screen, just great, easy to use shortcodes!

####Updated for Font Awesome 4.2!
Now supporting all of the new icons and aliases added in Font Awesome 4.2.

If you like this plugin, check out our companion plugin for Bootstrap, [Bootstrap 3 Shortcodes](http://www.wordpress.org/plugins/bootstrap-3-shortcodes/)

== Installation ==
1. Download and unzip this plugin
1. Upload the "font-awesome-shortcodes" folder to your site's `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create or edit a page or post and click the flag button that appears above the editor to see the icon selector and plugin documentation!

== Frequently Asked Questions ==

= Does this plugin include Font Awesome? =

No, we assume you are already working with a WordPress theme that includes the Font Awesome libraries.

== Changelog ==

= 4.2 = 
* Icon Picker now supports new icons and aliases added in Font Awesome 4.2 (see Font Awesome site for details)
* Better correct for conflicts with Gravity Forms --these two plugins should finally play well together
* Removed use of extract() to better fit with WordPress's best practices.

= 4.1.3 = 
* Added [fa-ul] shortcode (see documentation for details).
* Add Font Awesome shortcode help popup button to Distraction Free Writing Mode toolbar
* Better responsive styles for help popup button on smaller screens
* Fix display problems for WP-Engine users
* Better handling of Gravity Forms' "No Conflict Mode"
* Fix conflict with All-In-One Events Calendar
* Fix for some situations where the help-tab popup would be behind other popup elements.
* WordPress 4.0 support!

= 4.1.2 = 
* Fix display problem where the Font Awesome Shortcodes help modal was appearing on pages it shouldn't

= 4.1 =
* This release features a brand new, much easier to use popup for the documentation. We're now using Bootstrap's "modal" component rather than the soon-to-be-retired WordPress Thickbox. We've also split the documentation up into tabs so that the technical information about the plugin isn't cluttering up the shortcode reference material. This should make the plugin a little less scary for end-users.
* Support for new icons and aliases added in Font Awesome 4.1 (see Font Awesome site for details)

= 4.0.3.8 =
* Tested to work in WordPress 3.9
* Fix jQuery errors in FireFox
* Fix media button icon in Internet Explorer

= 4.0.3.7 =
* Fix errors with included Markdown parser

= 4.0.3.4 =
* Bug fixes and changes to play nice with other plugins
* Rewrite to better escape input

= 4.0.3.3 =
* Fix some icons not showing properly in the icon picker

= 4.0.3.2 =
* Fix admin styles loading on front-end pages

= 4.0.3.1 =
* Fix help tab styles

= 4.0.3.1 =
* Fix help tab popup on edit pages

= 4.0.3 =
* Initial WordPress.org release


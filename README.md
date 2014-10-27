Font Awesome Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes for easier use of the Font Awesome icons in your content.

## Requirements
This plugin won't do anything if you don't have WordPress theme built with [Font Awesome](http://fortawesome.github.io/Font-Awesome/). **The plugin does not include Font Awesome**.

The plugin is tested to work with ```Font Awesome version 4.2``` and ```WordPress 4.0```.

## Shortcode Reference

* [Icons](#icons)
* [Icon Stacks](#icon-stacks)
* [Icon Lists](#icon-lists)

### Usage

### Icons
	[fa type="exclamation"]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of icon you want to display | required | See Font Awesome docs | none
size | Icon size | optional | lg, 2x 3x, 4x, 5x | false
border | Whether the font is displayed using the "bordered" style | optional | true, false | false
spin | Whether the font is displayed spinning | optional | true, false | false
list_item | Set "true" if the icon is within a list item for better spacing. Be sure to wrap the list in [fa-ul] (see below) | optional | true, false | false
fixed_width | Set "true" if the icon should keep a fixed width for spacing in a menu | optional | true, false | false
rotate | Rotate the icon a number of degrees | optional | normal, 90, 180, 270 | false
flip | Flip the icon vertically or horizontally | optional | vertical, horizontal | false
stack_size | If this icon is in a stack, what size is it? | optional | lg, 2x 3x, 4x, 5x | false
inverse | Whether this icon's color should be inverted (useful in stacks) | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none

[Icon Reference](http://fortawesome.github.io/Font-Awesome/cheatsheet/).

* * *

### Icon Stacks
	[fa-stack size="lg"] 
        [fa type="circle" stack_size="2x"]
        [fa type="flag" inverse="true" stack_size="1x"]
    [/fa-stack]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
size | Icon size | optional | lg, 2x 3x, 4x, 5x | false
xclass | Any extra classes you want to add | optional | any text | none

[Font Awesome documentation](http://fortawesome.github.io/Font-Awesome/examples/).

* * *

### Icon Lists
When using `list_item="true"` for icons, be sure to wrap the list in `[fa-ul]` and `[/fa-ul]`.

	[fa-ul] 
		Standard HTML or WordPress list goes here.
	[/fa-ul]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none

[Font Awesome documentation](http://fortawesome.github.io/Font-Awesome/examples/).



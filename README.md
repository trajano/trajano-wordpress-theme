Trajano WordPress Theme
=======================

This theme is targeted for personal text content blogs with a single author.

Objectives
----------
* Magazine style layout
* [Responsive web design][rwd]
* No animations that are not triggered by a user action (e.g. resize or mouse click).
* Make use of [infinite scroll][is] to handle large amounts of posts

This theme does not use minified versions of the code, it expects the WordPress site to use [W3 Total Cache][w3tc] to
reduce the load.  This was done to make it easier to extend and debug problems on the theme,

Technology used
---------------
* Twitter Bootstrap
* [Bootswatch][boots]
* [Font Awesome][font]
* [ColorBox][cbox]
* [Masonry][masonry]
* JetPack Infinite Scroll

Folder structure
----------------
<root>
> files that are used by WordPress directly.

bootswatch/
> [Bootswatch][boots] files.

colorbox/
> [ColorBox][cbox] files.

content/
> PHP templates.

css/
> stylesheet files that dynamically enqueue from <code>include/css.php</code>.

fontawesome/
> [Font Awesome][font] files

include/
> PHP modules that are dynamically loaded from <code>functions.php</code>.

js/
> Javascript files that explicitly enqueue from <code>include/javascript.php</code> and other places where
> specific Javascript functionality is required.


[boots]: http://bootswatch.com/
[cbox]: http://www.jacklmoore.com/colorbox/
[font]: http://fortawesome.github.com/Font-Awesome/
[is]: http://jetpack.me/support/infinite-scroll/
[masonry]: http://masonry.desandro.com/
[rwd]: http://en.wikipedia.org/wiki/Responsive_web_design
[w3tc]: http://wordpress.org/extend/plugins/w3-total-cache/

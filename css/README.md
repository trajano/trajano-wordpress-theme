CSS files
=========

This folder contains CSS files used by the theme.

> TODO at the moment this folder contains Twitter Bootstrap CSS, this will change in the future to make css/
> contain only custom theme specific CSS files and Twitter Bootstrap files will be relocated to the bootstrap/
> folder.

CSS file structure
------------------

The structure of theme specific CSS files starts with non-responsive CSS directives followed by device specific
directives based on [Twitter Bootstrap][http://twitter.github.com/bootstrap/scaffolding.html#responsive].

    /*
    [CSS file description]
    */

    [default directives for screen width between 980px to 1199px]

    @media (min-width: 1200px) {

        [Large desktop override directives]

    }

    @media (min-width: 768px) and (max-width: 979px) {

        [Portrait tablet to landscape and desktop override directives]

    }

    @media (max-width: 767px) {

        [Landscape phone to portrait tablet override directives]

    }

    @media (max-width: 480px) {

        [Landscape phones and down override directives]

    }

Structure
---------

The structure of the documents follow the [WordPress core structure][wp-core] default theme in terms of IDs.  In terms
of classes it will take advantage of WordPress generated classes as well.

#header

> This contains the site navigation consisting of the branding, search and RSS link.  There is no "Logon" link it is
> expected the blog author knows to go to /wp-login.php to log into the system.  Custom menus if any are added after
> the branding text.

#content

> This contains the content area of the page.  This follows the [WordPress content structure][wp-content] for the ID
> and class declarations.  This includes the notion of "narrowcolumn" and "widecolumn" classes.

#content article

> Individual articles use the element "article"

#comments

> A minimal set of CSS and other code is implemented for this section as the theme expects the blog author to take
> advantage of [Disqus][disqus] for the commenting system.

#sidebar-1

> The one and only side bar.

#sidebar-1 .widget

> Widget directives TBD.  However it will still be prefixed with #sidebar-1 in case there are additional sidebar
> support in the future.

#footer

> Footer directives.

> TODO at the moment this is not fully implemented, that will change in future commits.

[disqus][http://www.disqus.com/]
[wp-core][http://codex.wordpress.org/Site_Architecture_1.5#Core_Structure]
[wp-content][http://codex.wordpress.org/Site_Architecture_1.5#Content]

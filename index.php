<?php get_header(); ?>
<div id="siteNav" class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>

      <div class="nav-collapse collapse">
        <form class="navbar-search pull-right" action="?php bloginfo('url'); ?>">
          <input type="text" name="s" class="search-query" placeholder="<?php _e('Search'); ?>">
        </form>
      </div>

    </div>
  </div>
</div>
<?php get_footer(); ?>

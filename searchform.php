<form class="navbar-search" action="<?php echo home_url('/'); ?>">
    <input type="search" class="search-query" name="s" placeholder="<?php _e('Search'); ?>"
           value="<?php echo esc_attr(get_search_query()) ?>"/>
</form>
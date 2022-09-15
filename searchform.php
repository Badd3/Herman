<form role="search" method="get" class="search-form focus:outline-none focus:outline-0 focus-visible:outline-none focus-visible:outline-0" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
        <input type="search" class="search-field focus-visible:outline-none text-base" placeholder="<?php echo esc_attr_x('SEARCH', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
    </label>
    <!-- <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" /> -->
</form>
<form role="search" method="get" id="searchform" class="searchform" action="http://localhost/learning_wp/">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
        <input type="submit" id="searchsubmit" value="Search">
    </div>
</form>
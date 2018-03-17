<form id="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
  <div class="input-group">
    <div class="input-group-addon mr-1 searchIcon">
      <span class="fa fa-search"></span>
    </div>
    <input type="search" class="form-control" placeholder="Recherche ..." value="<?php echo get_search_query(); ?>" name="s" title="Search" />
  </div>
</form>

<form action="<?php echo home_url('/'); ?>" method="get">
  <input name="s" type="text" value="<?php the_search_query(); ?>" placeholder="検索する" />
  <button type="submit"><span>検索</span></button>
</form>
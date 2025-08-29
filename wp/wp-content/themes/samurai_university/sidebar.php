<!-- sidebar-main に切り出す -->
<div class="sidebar">
  <div class="sidebar_search">
    <div class="category">
      <div class="section_title_container category_title">
        <h2>検索</h2>
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
      <div class="category">
        <div class="section_title_container category_title">
          <h2>CATEGORY</h2>
          <div class="section_subtitle">カテゴリー</div>
        </div>
        <div class="sidebar_categories">
          <ul>
            <?php
            $args = array(
              'hide_empty' => 1, // 投稿記事があるカテゴリーのみ表示する
              'title_li' => '',  // リストの外側に表示するタイトルと表示形式（''であれば何も表示しない）
            );
            wp_list_categories($args);
            ?>
          </ul>
        </div>
      </div>
      <div class="category">
        <div class="section_title_container category_title">
          <h2>Latest Post</h2>
          <div class="section_subtitle">最新記事</div>
        </div>
        <div class="sidebar_categories">
          <ul>
            <?php
            $args = array(
              'posts_per_page' => 3 //表示件数の指定
            );
            $posts = get_posts($args);
            foreach ($posts as $post) : //ループの開始
              setup_postdata($post); //記事データのセット
            ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>
            <?php
            endforeach;
            wp_reset_postdata(); //今回作成したクエリをリセットする
            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- sidebar-main ここまで -->
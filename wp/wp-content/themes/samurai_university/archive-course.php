<?php get_header(); ?>
<!-- Home -->

<div class="home">
  <div class="breadcrumbs_container">
    <div class="image_header">
      <div class="header_info">
        <div>Courses</div>
        <div>コース</div>
      </div>
    </div>
  </div>
</div>

<!-- Courses -->

<div class="courses">
  <div class="footer_row">
    <div class="row">
      <div class="col-lg-12">
        <p class="title">コース</p>
        <div class="courses_container">
          <div class="row courses_row">
            <!-- Course -->
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post() ?>
                <div class="col-lg-4 course_col">
                  <div class="course">
                    <div class="course_image">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="course_body">
                      <h3 class="course_title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <div class="course_text">
                        <p>
                          <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                        </p>
                      </div>
                    </div>
                    <div class="course_footer">
                      <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                        <div class="course_price ml-auto"><a href="<?php the_permalink(); ?>">詳細を見る</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
    <!-- footer.php ここから -->
    <footer class="footer">
      <div class="row footer_row">
        <div class="col">
          <div class="footer_content">
            <div class="row">
              <div class="col-lg-4 footer_col">
                <div class="footer_section footer_about">
                  <div class="footer_logo_container">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_big.png" alt="" />
                    <a href="">
                      <div class="footer_logo_text">ABC University</div>
                    </a>
                  </div>

                  <div class="footer_contact_info">
                    <div>〒101-0022</div>
                    <div>東京都千代田区神田練塀町300番地 住友不動産秋葉原駅前ビル5F</div>
                    <ul>
                      <li><span>TEL: </span>03-1234-5678</li>
                      <li><span>MAIL: </span>: abc@example.com</li>
                    </ul>
                  </div>
                  <div class="footer_social">
                    <ul>
                      <li>
                        <a href="https://twitter.com/samuraijuku"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                      </li>
                      <li>
                        <a href="https://www.facebook.com/sejuku2013/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 footer_col">
                <div class="footer_section footer_links">
                  <div class="footer_links_container">
                    <ul>
                      <li><a href="<?php echo home_url(); ?>/category/news">ニュース</a></li>
                      <li><a href="<?php echo home_url(); ?>/category/event">イベント</a></li>
                      <li><a href="<?php echo home_url(); ?>/course">コース</a></li>
                      <li><a href="<?php echo home_url(); ?>/about_us">ABC大学について</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 footer_col clearfix">
                <a class="twitter-timeline" data-height="265" href="https://twitter.com/samuraijuku?ref_src=twsrc%5Etfw">Tweets by abcjuku</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row copyright_row">
        <div class="col">
          <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
            <div class="cr_text">
              Copyright &copy; ABC University All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
    </div>

    <!--jQuery-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/styles/bootstrap4/popper.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/styles/bootstrap4/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(".carousel").carousel();
    </script>

    <?php wp_footer(); ?>
    </body>

    </html>
    <!-- footer.php ここまで -->
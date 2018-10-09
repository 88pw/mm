

    <!-- footer -->
    <footer class="footer background__pattern">
      <div class="footer-sitemap">
        <div class="wrap__main footer-sitemap__inner">
          <div class="footer-sitemap__label">SITEMAP</div>
          <div class="footer-sitemap__nav">
            <?php
              wp_nav_menu(
                array(
                  'menu' => 'footerNav',
                  'container_id' => 'fnavi',
                  'container_class' => 'nav',
                  'items_wrap'      => '<ul class="footer-nav">%3$s</ul>',
                )
              );
            ?>
          </div>
        </div>
      </div>
      <div class="footer-content">
        <div class="wrap__main">
          <div class="col-sm-30 col-xs-120 text__align_center">
            <div class="footer-content__logo">
              <img src="<?php echo get_template_directory_uri() ?>/assets/footer-logo.png" alt="<?php echo bloginfo( 'title' )?>">
            </div>
          </div>
          <div class="col-sm-30 col-xs-120">
            <div class="footer-content__info">
              <p class="footer-content__title">ショールーム</p>
              <p>大阪府泉大津市千原町1-60-1</p>
              <p>TEL：0725-43-2355</p>
              <p>営業時間：10:00～19:00 （月曜定休）</p>
            </div>
          </div>
          <div class="col-sm-30 col-xs-120">
            <div class="footer-content__info">
              <p class="footer-content__title">MONDAY　関空泉佐野店</p>
              <p>大阪府泉佐野市南中岡本313-1</p>
              <p>TEL：072-466-1111</p>
              <p>営業時間：10:00～19:00 （月曜定休）</p>
            </div>
          </div>
          <div class="col-sm-30 col-xs-120">
            <small class="footer-content__copy">2018 © マンデーオート - MONDAY AUTO</small>
          </div>
        </div>
      </div>
    </footer>





  <script>
    var THEME_URL = "<?php echo get_template_directory_uri() ?>";
    var BASEURL = "<?php echo home_url('/wp-json/wp/v2/') ?>";
    var HOMEURL = "<?php echo home_url() ?>";
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB7G2H-VADxE_heaPPV31LGpexdZT1nRVY"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/bundle.js" type="text/javascript" charset="utf-8" async defer></script>

  <?php if(is_home() || is_front_page()): ?>

    <link href="<?php echo get_template_directory_uri() ?>/css/pogo-slider.css" type="text/css" media="all" rel="stylesheet" />
    <script src="<?php echo get_template_directory_uri() ?>/js/jquery.pogo-slider.min.js"></script>


  <?php endif; ?>

  <?php if(is_home()||is_front_page()): ?>
    <?php if(wp_is_mobile()): ?>
      <script>
        $(function() {
          $('#js-main-slider').pogoSlider({
            autoplay: true,
            autoplayTimeout: 5000,
            displayProgess: true,
            preserveTargetSize: true,
            targetWidth: 640,
            targetHeight: 484,
            responsive: true
          }).data('plugin_pogoSlider');
        });
      </script>
    <?php else: ?>
      <script>
        $(function() {
          $('#js-main-slider').pogoSlider({
            autoplay: true,
            autoplayTimeout: 5000,
            displayProgess: true,
            preserveTargetSize: true,
            targetWidth: 1000,
            targetHeight: 475,
            responsive: true
          }).data('plugin_pogoSlider');
        });
      </script>
    <?php endif; ?>
  <?php endif; ?>

</body>
</html>
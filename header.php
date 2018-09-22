<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123798504-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123798504-1');
  </script>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/favicon.ico" />
  <link href="<?php echo get_template_directory_uri() ?>/assets/favicon.png" rel="apple-touch-icon" >
  <title><?php wp_title(); ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/style.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <?php wp_head() ?>
</head>
<body>

  <!-- header -->
    <header class="header">
      <div class="header__inner wrap__main">
        <div class="header__logo col-sm-60 col-xs-120">
          <a href="<?php echo home_url() ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/header-logo.png" alt="<?php echo bloginfo( 'title' )?>">
          </a>
          <h1 class="header__h1"><?php echo bloginfo( 'description' )?></h1>
        </div>
        <div class="header__info col-sm-60 col-xs-120">
          <a href="tel:0725432355">
            <img src="<?php echo get_template_directory_uri() ?>/assets/header-tel.png" alt="愛車のご相談はMONDAYに【0725-43-2355】　営業時間 10:00～19:00（定休日：月曜）">
          </a>
        </div>

      </div>
      <?php get_template_part('parts','globalnavi') ?>
    </header>

  <?php if(is_home()||is_front_page()): ?>
    <?php if(wp_is_mobile()): ?>
      <div class="main-slider">
        <div class="main-slider__inner wrap__main">
            <div id="js-main-slider" class="pogoSlider">

              <div class="pogoSlider-slide main-res__sp" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/komikomi/komikomi-main-sp.png);"></div>
              <div class="pogoSlider-slide main-res__sp" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/shaken/hoken-main-sp.png);"></div>
              <div class="pogoSlider-slide main-res__sp" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/shaken/shaken-main-sp.png);"></div>
              <div class="pogoSlider-slide main-res__sp" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/seibi/seibi-main-sp.png);"></div>
              <div class="pogoSlider-slide main-res__sp" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/about/about-main-sp.png);"></div>

            </div>

        </div>
      </div>
    <?php else: ?>
      <div class="main-slider">
        <div class="main-slider__inner wrap__main">
            <div id="js-main-slider" class="pogoSlider">

              <div class="pogoSlider-slide main-res__pc" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/komikomi/komikomi-main.png);"></div>
              <div class="pogoSlider-slide main-res__pc" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/shaken/hoken-main.png);"></div>
              <div class="pogoSlider-slide main-res__pc" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/shaken/shaken-main.png);"></div>
              <div class="pogoSlider-slide main-res__pc" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/seibi/seibi-main.png);"></div>
              <div class="pogoSlider-slide main-res__pc" data-transition="zipReveal" data-duration="1000"  style="background-image:url(./wp-content/themes/monday/assets/about/about-main.png);"></div>

            </div>

        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

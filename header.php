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
  <script>var countTime = 1000</script>
</head>
<body>

  <div id="preLoader" class="preloader">
    <i class="preloader__icon">
      <!-- <img src="<?php echo get_template_directory_uri()?>/assets/logo_animation.gif" alt=""> -->
      <svg width="300" id="mondayLogo" data-name="monday-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1510.69 309.08">
        <path class="cls-1" d="M788.06,20V9.55H695.43V20c20.64,0,41.28,28.6,41.28,51.05V177.8C712.34,134.14,671,61.64,671,61.64l13.28-21.32L622.52,9.55c-58.74-12.78-86.31,34.12-86.31,66.89s22.44,60.73,60.26,60.73a33.07,33.07,0,0,0,5.38-.43v91c0,26.05-24,59.25-47.9,59.25V299.2H659.83V287c-24,0-47.9-33.19-47.9-59.25V132.93c16.51-10.59,16.47-37.36,16.47-37.36H620c0,11-2.32,20.56-8.06,26.31V61.64c2.94,3.36,103.17,200.44,108.63,224s10.08,24.37,10.5,23.11,26.53-66,48.74-77.73c-13-2.94-20.17-9.24-26.05-21.85-.88-1.9-3.38-6.57-7-13.13V71.1C746.79,48.65,767.42,20,788.06,20ZM596.47,127.68c-18.57,0-50.18-13.85-50.18-49.15s20.59-47.48,37.4-47.48c10,0,14.55,3.3,18.16,6.68v89.43A27.15,27.15,0,0,1,596.47,127.68Z"/><path class="cls-1" d="M895.92,0c-35.09,0-62,22.83-77.78,42.24a80.51,80.51,0,0,0-13,19.19l-.14.27h0a87.39,87.39,0,0,0-8.33,38.11c0,48.08,29.71,69.23,49.08,77.91v79.66c0,13.17-3,24.32-30.91,24.32v10.64H932.24c16.88,0,107.07-33.44,107.07-139.84S944.56,0,895.92,0ZM828.53,82.08s17.23,12.16,17.23,15.71v68.82c-16.85-8.72-39.08-27.64-39.08-66.8a76.91,76.91,0,0,1,8.77-36.71c12.39-16.68,29.81-33.21,67.8-33.21,6.27,0,12.8,1.77,19.37,4.9C888.88,46,856.29,76.63,828.53,82.08Zm105.89,197.6a229.21,229.21,0,0,1-30.91.65V179.78a55,55,0,0,0,16.39-9.32,33.29,33.29,0,0,0,12.32-25.4,34.78,34.78,0,0,0-11.76-26.22l-6.56,7.55A24.65,24.65,0,0,1,922.24,145c0,4.8-1.59,11.78-8.77,17.83a42.93,42.93,0,0,1-10,6.17V35.22c33,16.3,66.67,66.43,73,99.55C984.08,174.8,981,267,934.43,279.68Z"/><path class="cls-1" d="M323.78,24V11.37h-87l-57,167.21c-13.47-41.37-35.45-113.43-35.45-113.43l5.46-25.21-27-11.49S93.52,6.37,62.85,6.37,4.39,31.78,1.46,63.58h0A89.61,89.61,0,0,0,0,80c0,18.68,6.37,34.81,18.42,46.67C31.89,140,49.71,145.47,62.85,146.46v81.31c0,26.05-24,59.25-47.9,59.25V299.2H120.83V287c-24,0-47.9-33.19-47.9-59.25V146.21a23.6,23.6,0,0,0,14.76-7.84c7.53-8.76,7.51-22.44,6.17-32.37l-8.92,1.2c1.1,8.11,1.28,19.08-4.07,25.3A14.22,14.22,0,0,1,72.93,137V42c8,4.83,13.6,10.81,13.6,14.75h0l.27,7.56c2.94,3.36,63.87,194.55,69.33,218.08s10.08,24.37,10.5,23.11,19.45-56.73,48.74-77.73c-13-2.94-20.17-9.24-26.05-21.85-.51-1.09-1.27-3.07-2.23-5.74l49.71-155V253.82c0,20.52-3.36,32.77-39.08,32.77V299.2H323.78V286.6c-18.49,0-26.89-17.65-26.89-32.77V56.76C296.89,41.63,305.29,24,323.78,24ZM62.85,137.45c-11.36-1-26.58-5.8-38.11-17.15C14.29,110,9,96.49,9,80a83.23,83.23,0,0,1,1.13-14c5.84-17.47,18.59-32,37.14-32a45.32,45.32,0,0,1,15.58,3.05Z"/><path class="cls-1" d="M1279.67,257.38h0c-15.82-55.37-46.13-161.85-52.86-188.18l9.14-33.5c-16.78,2.58-27.33-1.37-35.28-7.93-.68-.61-1.37-1.22-2.08-1.81l-.15-.14v0c-16.27-13.7-38.59-24.09-64.71-24.09a85.81,85.81,0,0,0-58.2,22.5c-13.92,11.17-29,31.2-29.75,65.7q0,1.28,0,2.56c0,32.4,9.26,57.51,25,76.89,7.86,9.67,25.22,25.7,47.87,35.32l-2.51,9.63c-5.7,21.87-28.58,66.08-66.6,66.08v10.77h115.87V280.44s-55.59-4.71-39.72-66.06l1.65-6.39c23.4,7.66,51.37,7.63,80-12.05,6.56,24,12.74,46.54,17.44,63.68,2.72,11.61.1,19.77-29.53,19.77v11.82h119V278.89S1287,283.12,1279.67,257.38ZM1054.72,92.51c0-28,9.82-49.36,29.17-63.35a80.4,80.4,0,0,1,22.23-11.1c7.8-1.92,27.52-3.86,43.88,8.89,8.8,9.82,10.58,16.55,4.7,39.13h0L1126.63,174C1090.58,180,1054.72,156.35,1054.72,92.51Zm112.23,53.66c-.68,1.14-5.25,17.4-30.19,25.32l23.57-91s8.34-27.1,10.51-19c6.08,23,20,74.28,33.23,122.55Z"/><path class="cls-1" d="M1407.59,0V11s51.56.22,34.42,48.7l-27.38,66.45c-3.43,8.32-5.82,7.08-9.4,0L1358,32.93c-10.6-20.94,20.44-20.2,20.44-20.2v-11H1270.94v11c17.69-.16,24.49,7.89,26.62,11.44l.84,1.65,67.4,133.1v89.81c0,16.77-3.59,30.59-31.71,30.59v11.88h114v-10.9s-29.25-1.48-29.25-29.6V139.64l31.08-75.45h0s37.13-51.25,60.81-53.72V0Z"/><path class="cls-1" d="M474.1,23.63c-14.32-3.11-39.22-9.34-61,13.07s-26.14,83.2-26.14,119.42,9.34,132.08,43.58,132.08,41.08-96.59,41.08-133.89,3.74-115.73-48.56-115.73V32.34s4.52-2.77,18.67-1.87c9.94.64,89.64,31.13,89.64,133.22,0,81.55-49.8,137-100.22,137s-107.36-66-107.36-149.4S373.79,2.38,436.66,2.38c21.79,0,41.8,15,41.8,15Z"/>
      </svg>
    </i>
  </div>

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

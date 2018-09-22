  <div class="header__nav_icon">
  	<span class="header__nav_iconbar"></span>
  </div>
  <nav class="header__nav col-xs-120">
  	<span class="header__nav_close"></span>
    <?php
      wp_nav_menu(
      	array(
      	  'menu' => 'global',
      	  'container_id' => 'gnavi',
      	  'container_class' => 'nav',
      	  'items_wrap'      => '<ul class="globalnav">%3$s</ul>',
      	)
      );
    ?>
  </nav>



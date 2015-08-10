<!-- Main Nav -->
<div id="main-nav" class="contain-to-grid">
  <!-- Top Bar -->
  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><span id="topbar-sitename">
          <a href="<?php echo get_home_url(); ?>">
          <?php if( is_page_template('page-home.php') ): ?>

            <!-- implement company logo as clicakble background image
            so that it can be swapped in media queries-->
            <span class="company-logo"></span>

          <?php else: ?>

            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_legado_1.jpg">

          <?php endif; ?>
          </a>
        </span></h1>
      </li>
      <li class="contact-mobile">
        <div class="topbar-contact">
          <span class="contact-number">02 6274 0400</span>
        </div>
      </li>
      <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar"><a href="#"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-icon.png" alt=""></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Left Nav Section -->
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'topbar_menu',
          'container'       => false,
          'items_wrap'      => '<ul class="left">%3$s</ul>',
          'depth'           => 1,
        ) );

        //trilogy_top_nav();
      ?>

      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <li>
          <div class="topbar-contact">
            <span class="contact-number">02 6274 0400</span>
          </div>
        </li>
      </ul>
    </section>
  </nav>
  <!--// End Top Bar -->
</div>
<!--// End Main Nav -->

<div class="title-area-mobile">
  <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/legado-logo-mobile.jpg"></a>
</div>

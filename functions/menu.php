<?php
// The Top Menu
function legado_top_nav() {
   wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'container_class' => '',                        // Class of container
        'menu_class' => 'left',                         // Adding custom nav class
        'theme_location' => 'topbar_menu',              // Where it's located in the theme
        'before' => '',                                 // Before each link <a>
        'after' => '<div class="pad"></div>',           // After each link </a>
        'link_before' => '',                            // Before each link text
        'link_after' => '',                             // After each link text
        'depth' => 2,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Top_Bar_Walker(),
    ));
} /* End Top Menu */

// The Top Menu
function legado_footer_links() {
   wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'container_class' => '',                        // Class of container
        'menu_class' => '',                             // Adding custom nav class
        'theme_location' => 'footer_menu',              // Where it's located in the theme
        'before' => '',                                 // Before each link <a>
        'after' => '',                                  // After each link </a>
        'link_before' => '',                            // Before each link text
        'link_after' => '',                             // After each link text
        'depth' => 1,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
    ));
} /* End Top Menu */
?>

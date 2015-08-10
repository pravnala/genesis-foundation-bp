<?php
/**
* Description: Default template
*/
?>

<?php
/* Header */
add_action('genesis_after_header', function(){
ob_start();
?>

<!-- Main content and markup here -->

<?php
  echo ob_get_clean();
});

genesis();
?>

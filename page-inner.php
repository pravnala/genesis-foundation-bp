<?php
/**
* Template Name: Inner Page
* Description: Inner page template
*/
?>

<?php
/* Header */
add_action('genesis_after_header', function(){
ob_start();
?>

<div id="inner-container">
  <div class="row">
    <div class="small-12 column">

      <div id="inner-layout" class="table">
        <div class="table-row">

          <!-- Main Content -->
          <div id="main-content" class="table-cell">
            <div class="small-12 content-wrapper column">
              <!-- Custom Loop -->
              <?php inner_page_loop(); ?>
            </div>
          </div>

          <!-- Side Panel -->
          <div id="side-panel" class="table-cell">
            <div class="small-12 column">

              <!-- Wrapper -->
              <div class="content-wrapper">

                <!-- Form -->
                <?php if( get_field('sp_form_markup') ): ?>

                  <?php the_field('sp_form_markup'); ?>

                <?php endif; ?>

                <!-- Testimonials -->
                <?php if( have_rows('sp_testimonials') ): ?>

                  <?php
                  $total = count( get_field('sp_testimonials') );
                  //echo $total;
                  $count = 1;
                  while( have_rows('sp_testimonials') ): the_row();
                  ?>
                  <div class="testimonial <?php echo $count == $total ? 'last' : '' ?>">
                    <h1><?php the_sub_field('header'); ?></h1>
                    <div class="testimonial-text">
                      <?php the_sub_field('text'); ?>
                    </div>
                    <div class="testimonial-source">
                      <?php the_sub_field('source'); ?>
                    </div>
                  </div>
                  <?php
                  $count++;
                  endwhile;
                  ?>

                <?php endif; ?>

              </div>
              <!--// End wrapper -->

              <!-- Find Out More -->
              <?php if( get_field('sp_bottom_markup') ): ?>
                <?php the_field('sp_bottom_markup'); ?>
              <?php endif; ?>

            </div>
          </div>
          <!--// End Side Panel -->
        </div>
      </div>

    </div>
  </div>
</div>

<?php
  echo ob_get_clean();
});

genesis();
?>

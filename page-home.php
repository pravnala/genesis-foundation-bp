<?php
/**
* Template Name: Home
* Description: Homepage template
*/
?>

<?php
/* Header */
add_action('genesis_after_header', function(){
ob_start();
?>

<!-- Hero -->
<div class="hero">

  <div class="row">
    <div class="small-12 column content-wrapper">
      <!-- Hero Content -->
      <div class="hero-content">
        <h1><?php the_field('hero_content_title'); ?></h1>
        <p><?php the_field('hero_content_text'); ?></p>
        <a href="<?php the_field('hero_button_url'); ?>" class="button"><?php the_field('hero_button_text'); ?></a>
      </div>
    </div>
  </div>

  <!-- Roles -->
  <div class="roles banner">
    <div class="row">
      <div class="small-12 column content-wrapper">
        <h1 class="hide-for-medium-only"><?php the_field('cyr_header'); ?></h1>
        <div class="divider hide-for-medium-only"></div>
        <ul class="grid small-block-grid-1 medium-block-grid-2 large-block-grid-5">
          <li class="role title show-for-medium-only hide-for-large-up">
            <h1><?php the_field('cyr_header'); ?></h1>
            <div class="divider"></div>
          </li>

          <?php while( have_rows('cyr_roles') ): the_row(); ?>

          <li class="role">
            <div class="role-icon">
              <img src="<?php the_sub_field('icon') ?>">
            </div>
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('text'); ?></p>
            <div class="role-choose">
              <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
            </div>
          </li>

          <?php endwhile; ?>

        </ul>
      </div>
    </div>
  </div>

</div>
<!--// End Hero -->

<!-- Content Blocks -->
<?php if( have_rows('hwh_content_blocks') ): ?>
<div class="banner content-blocks">
  <?php
  $count = 1;
  while( have_rows('hwh_content_blocks') ): the_row();
  ?>

    <div class="row">

      <?php if( $count % 2 != 0 ): ?>

        <div class="small-12 medium-12 large-6 columns">
          <img src="<?php the_sub_field('image') ?>">
        </div>

        <div class="small-12 medium-12 large-6 columns">
          <div class="content-wrapper medium-text-left small-text-center">
            <h1><?php the_sub_field('header'); ?></h1>
            <p><?php the_sub_field('text'); ?></p>
            <a href="<?php the_sub_field('button_url') ?>" class="button"><?php the_sub_field('button_text'); ?></a>
          </div>
        </div>

      <?php else: ?>

        <div class="small-12 medium-12 large-6 show-for-small-up hide-for-large-up columns">
          <img src="<?php the_sub_field('image') ?>">
        </div>
        <div class="small-12 medium-12 large-6 columns">
          <div class="content-wrapper medium-text-left small-text-center">
            <h1><?php the_sub_field('header'); ?></h1>
            <p><?php the_sub_field('text'); ?></p>
            <a href="<?php the_sub_field('button_url') ?>" class="button"><?php the_sub_field('button_text'); ?></a>
          </div>
        </div>
        <div class="small-12 medium-12 large-6 show-for-large-up columns">
          <img src="<?php the_sub_field('image') ?>">
        </div>

      <?php endif; ?>

    </div>

  <?php
  $count++;
  endwhile;
  ?>

  </div>

</div>
<?php endif; ?>
<!--// End Content Blocks -->

<!-- Business Purchase Process -->
<div class="banner purchase-process">
  <div class="row">
    <div class="small-12 column content-wrapper">
      <h1><?php the_field('bpp_header'); ?></h1>
      <div class="divider"></div>

      <?php if( have_rows('bpp_steps') ): ?>

      <div class="steps-container">

        <?php
        $count = 1;
        while( have_rows('bpp_steps') ): the_row(); ?>

        <div class="row">

          <div class="step medium-12 large-6 columns <?php echo $count % 2 == 0 ? 'end' : 'large-offset-6'; ?>">
            <div class="number"><?php echo $count; ?>.</div>
            <div class="text-wrap">
              <h2><?php the_sub_field('header'); ?></h2>
              <p><?php the_sub_field('text'); ?></p>
            </div>
          </div>
        </div>

        <?php
        $count++;
        endwhile; ?>

        <a href="<?php the_field('bpp_button_url'); ?>" class="button"><?php the_field('bpp_button_text'); ?></a>

      </div>

      <?php endif; ?>

    </div>
  </div>
</div>
<!--// End Business Purchase Process -->

<!-- Find Out More -->
<div class="banner find-out-more">
  <div class="row">
    <div class="small-12 column content-wrapper">
      <h1><?php the_field('bb_header'); ?></h1>
      <div class="divider"></div>
      <div class="container">
        <p><?php the_field('bb_text'); ?></p>
        <a href="<?php the_field('bb_button_url'); ?>" class="button"><?php the_field('bb_button_text'); ?></a>
      </div>
    </div>
  </div>
</div>
<!--// End Find Out More -->

<?php
  echo ob_get_clean();
});

genesis();
?>

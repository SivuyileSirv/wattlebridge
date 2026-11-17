<?php
/**
 * Front page template.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="main-content" class="site-main">

  <?php
  // Hero — always rendered first.
  get_template_part('template-parts/sections/hero');
  ?>

  <?php
  // Our Approach Section
  get_template_part('template-parts/sections/approach'); ?>

  <?php
  // Services Section
  get_template_part('template-parts/sections/services'); ?>

  <?php
  // Pathways Section
  get_template_part('template-parts/sections/pathways'); ?>

  <?php

  ?>

</main>

<?php
get_footer();
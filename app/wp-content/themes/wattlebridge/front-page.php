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
  // Fixed homepage hero — always rendered first.
  get_template_part('template-parts/sections/hero');
  ?>

  <?php
  /**
   * Reorderable homepage sections will be rendered here.
   *
   * Future SCF Flexible Content field:
   * homepage_sections
   *
   * The hero will remain outside that loop.
   */
  ?>

</main>

<?php
get_footer();
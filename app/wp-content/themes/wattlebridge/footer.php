<?php
/**
 * Site footer.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;
?>

<footer class="site-footer">
  <div class="site-container">
    <p>
      &copy; <?php echo esc_html(gmdate('Y')); ?>
      <?php echo esc_html(get_bloginfo('name')); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>

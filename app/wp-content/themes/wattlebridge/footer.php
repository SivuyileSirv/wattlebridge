<footer class="site-footer">
  <div class="container">
    <p class="site-footer__copyright">
      &copy; <?php echo esc_html(gmdate('Y')); ?>
      <?php echo esc_html(get_bloginfo('name')); ?>.
      <?php esc_html_e('All rights reserved.', 'wattlebridge'); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>

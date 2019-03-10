<footer class="footer grid">

  <?php if ( is_active_sidebar( 'footer_col_one' ) ) : ?>

  	<div class="primary-sidebar widget-area" role="complementary">
  		<?php dynamic_sidebar( 'footer_col_one' ); ?>
  	</div>

  <?php endif; ?>

  <?php if ( is_active_sidebar( 'footer_col_two' ) ) : ?>

    <div class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer_col_two' ); ?>
    </div>

  <?php endif; ?>

  <?php if ( is_active_sidebar( 'footer_col_three' ) ) : ?>

    <div class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer_col_three' ); ?>
    </div>

  <?php endif; ?>

  <?php if ( is_active_sidebar( 'footer_col_four' ) ) : ?>

    <div class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'footer_col_four' ); ?>

    </div>

  <?php endif; ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>

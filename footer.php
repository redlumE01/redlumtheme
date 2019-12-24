<?php $option = new option(); ?>

<footer class="footer">
    <div class="inner <?php echo $option::getWidgetCount(false,true); ?> ">
		<?php
			for( $i = 1; $i < $option::getWidgetCount(true,false) + 1; $i++ ) { ?>
				<?php if ( is_active_sidebar( 'footer_col_'.$i.'' ) ) : ?>
					<div class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_col_'.$i.'' ); ?>
					</div>
				<?php endif; ?>
			<?php }
		?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

<?php	$option = new option(); ?>

<footer class="footer">
	<?php if (option::getOptions('use_widgets') === 'on') {?>
		<div class="inner <?php echo $option::getWidgetCount('word'); ?> ">
			<?php
			for( $i = 1; $i < $option::getWidgetCount('int') + 1; $i++ ) { ?>
				<?php if ( is_active_sidebar( 'footer_col_'.$i.'' ) ) : ?>
					<div class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_col_'.$i.'' ); ?>
					</div>
				<?php endif; ?>
			<?php }
			?>
		</div>
	<?php } ?>
</footer>

<script type="application/javascript">
	const observer = lozad(); // lazy loads elements with default selector as '.lozad'
	observer.observe();
</script>

<?php wp_footer(); ?>

</body>
</html>

<?php

	$option = new option();

	if (option::getOptions('use_widgets') === 'on') {
		function redlum_widgets_init() {
			$option = new option();
			$widgetCount = $option::getWidgetCount('int') + 1;

			for( $i = 1; $i < $widgetCount ; $i++ ) {
				register_sidebar( array(
					'name'          => 'Footer column '.$i.'',
					'id'            => 'footer_col_'.$i.'',
					'before_widget' => '<div>',
					'after_widget'  => '</div>',
					'before_title'  => '<h2>',
					'after_title'   => '</h2>',
				));
			}
		}

		add_action( 'widgets_init', 'redlum_widgets_init' );
	}

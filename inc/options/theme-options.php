<?php

require_once('optionBuilder.php');

$pages = array(
	'redlum_theme_options'	=> array(
		'page_title'	=> __( 'Theme options', 'redlum_theme_settings' ),
		'sections'		=> array(
			'section-one'	=> array(
				'title'			=> __( 'Options', 'redlum_theme_settings' ),
				'fields'		=> array(
					'checkbox'		=> array(
						'title'			=> __( 'Use Widgets', 'redlum_theme_settings' ),
						'type'			=> 'checkbox'
					),
					'select'		=> array(
						'title'			=> __( 'Widget Count', 'redlum_theme_settings' ),
						'text'			=> __( 'How many widgets?', 'redlum_theme_settings' ),
						'type'			=> 'select',
						'value'			=> 'option_1',
						'choices'		=> array(
							'option_1'	=> __( 'One', 'redlum_theme_settings' ),
							'option_2'	=> __( 'Two', 'redlum_theme_settings' ),
							'option_3'	=> __( 'Three', 'redlum_theme_settings' ),
							'option_4'	=> __( 'Four', 'redlum_theme_settings' ),
						),
					),


//					'default'		=> array(
//						'title'			=> __( 'Default (text)', 'redlum_theme_settings' ),
//						'text'			=> __( 'Text attributes are used as help text for most input types.' ),
//					),
//					'date'			=> array(
//						'title'			=> __( 'Date', 'redlum_theme_settings' ),
//						'type'			=> 'date',
//						'value'			=> 'now',
//					),
//					'datetime'		=> array(
//						'title'			=> __( 'Datetime-Local', 'redlum_theme_settings' ),
//						'type'			=> 'datetime-local',
//						'value'			=> 'now',
//					),
//					'datetime-local' => array(
//						'title'			=> __( 'Datetime-Local', 'redlum_theme_settings' ),
//						'type'			=> 'datetime-local',
//						'value'			=> 'now',
//					),
//					'email'			=> array(
//						'title'			=> __( 'Email', 'redlum_theme_settings' ),
//						'type'			=> 'email',
//						'placeholder'	=> 'email.address@domain.com',
//					),
//					'month'			=> array(
//						'title'			=> __( 'Month', 'redlum_theme_settings' ),
//						'type'			=> 'month',
//						'value'			=> 'now',
//					),
//					'number'		=> array(
//						'title'			=> __( 'Number', 'redlum_theme_settings' ),
//						'type'			=> 'number',
//						'value'			=> 42,
//					),
//					'password'		=> array(
//						'title'			=> __( 'Password', 'redlum_theme_settings' ),
//						'type'			=> 'password',
//					),
//					'search'		=> array(
//						'title'			=> __( 'Search', 'redlum_theme_settings' ),
//						'type'			=> 'search',
//						'placeholder'	=> __( 'Keywords or terms&hellip;', 'redlum_theme_settings' ),
//					),
//					'tel'			=> array(
//						'title'			=> __( 'Telephone', 'redlum_theme_settings' ),
//						'type'			=> 'tel',
//						'placeholder'	=> '(555) 555-5555',
//					),
//					'time'			=> array(
//						'title'			=> __( 'Time', 'redlum_theme_settings' ),
//						'type'			=> 'time',
//						'value'			=> 'now',
//					),
//					'url'			=> array(
//						'title'			=> __( 'URL', 'redlum_theme_settings' ),
//						'type'			=> 'url',
//						'placeholder'	=> 'http://jeremyhixon.com',
//					),
//					'week'			=> array(
//						'title'			=> __( 'Week', 'redlum_theme_settings' ),
//						'type'			=> 'week',
//						'value'			=> 'now',
//					),
//					'checkbox'		=> array(
//						'title'			=> __( 'Checkbox', 'redlum_theme_settings' ),
//						'type'			=> 'checkbox',
//						'text'			=> __( 'Text attributes are used as labels for checkboxes' ),
//					),
//					'color'			=> array(
//						'title'			=> __( 'Color', 'redlum_theme_settings' ),
//						'type'			=> 'color',
//						'value'			=> '#cc0000',
//					),
//					'media'			=> array(
//						'title'			=> __( 'Media', 'redlum_theme_settings' ),
//						'type'			=> 'media',
//						'value'			=> 'http://your-domain.com/wp-content/uploads/2016/01/sample.jpg',
//					),
//					'radio'			=> array(
//						'title'			=> __( 'Radio', 'redlum_theme_settings' ),
//						'type'			=> 'radio',
//						'value'			=> 'option-two',
//						'choices'		=> array(
//							'option-one'	=> __( 'Option One', 'redlum_theme_settings' ),
//							'option-two'	=> __( 'Option Two', 'redlum_theme_settings' ),
//						),
//					),
//					'range'			=> array(
//						'title'			=> __( 'Range', 'redlum_theme_settings' ),
//						'type'			=> 'range',
//						'value'			=> 75,
//					),

//					'select'		=> array(
//						'title'			=> __( 'Select', 'redlum_theme_settings' ),
//						'type'			=> 'select',
//						'value'			=> 'option-two',
//						'choices'		=> array(
//							'option-one'	=> __( 'Option One', 'redlum_theme_settings' ),
//							'option-two'	=> __( 'Option Two', 'redlum_theme_settings' ),
//						),
//					),

//					'textarea'		=> array(
//						'title'			=> __( 'Textarea', 'redlum_theme_settings' ),
//						'type'			=> 'textarea',
//						'value'			=> 'Pellentesque consectetur volutpat lectus, ac molestie lorem molestie nec. Vestibulum in auctor massa. Vivamus convallis nunc quis lacus maximus, non ultricies risus gravida. Praesent ac diam imperdiet, volutpat nisi sed, semper eros. In nec orci hendrerit, laoreet nunc eu, semper magna. Curabitur eu lorem a enim sodales consequat. Vestibulum eros nunc, congue sed blandit in, maximus eu tellus.',
//					),
//					'wp_editor'		=> array(
//						'title'			=> __( 'WP Editor', 'redlum_theme_settings' ),
//						'type'			=> 'wp_editor',
//						'value'			=> 'Pellentesque consectetur volutpat lectus, ac molestie lorem molestie nec. Vestibulum in auctor massa. Vivamus convallis nunc quis lacus maximus, non ultricies risus gravida. Praesent ac diam imperdiet, volutpat nisi sed, semper eros. In nec orci hendrerit, laoreet nunc eu, semper magna. Curabitur eu lorem a enim sodales consequat. Vestibulum eros nunc, congue sed blandit in, maximus eu tellus.',
//					),


				),
			),
		),
	),
);

$option_page = new themeOptionBuilder( $pages );

// Options Class

class option {

	function getOptions($option){
		$templateOptions = get_option('redlum_theme_options');
		return $templateOptions[$option];
	}

	public function getWidgetCount($type) {
		$widgetCount = str_replace('option_','',option::getOptions('widget_count'));

		switch ($type) {
			case 'int':
				$widgetCount = intval($widgetCount);
				break;
			case 'word':
				$string = array('one','two','three','four');
				$widgetCount = $string[intval($widgetCount) - 1];
				break;
		}

		return $widgetCount;
	}

	public function getWPCustomize() {
		$wpCustomize = get_option( 'redlum_starter_settings' )['redlum_starter_disable_wpcustomizer'];
		return $wpCustomize;
	}

}


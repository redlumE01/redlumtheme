<?php
add_action( 'admin_menu', 'redlum_add_admin_menu' );
add_action( 'admin_init', 'redlum_settings_init' );

function redlum_add_admin_menu(  ) {
	add_options_page( 'redlumWPtheme', 'redlumWPtheme', 'manage_options', 'redlumwptheme', 'redlum_options_page' );
}

function redlum_settings_init(  ) {

	register_setting( 'pluginPage', 'redlum_settings' );

	add_settings_section(
		'redlum_pluginPage_section',
		__( 'Your section description', 'redlum' ),
		'redlum_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'redlum_text_field_0',
		__( 'Settings field description', 'redlum' ),
		'redlum_text_field_0_render',
		'pluginPage',
		'redlum_pluginPage_section'
	);

	add_settings_field(
		'redlum_checkbox_field_1',
		__( 'Settings field description', 'redlum' ),
		'redlum_checkbox_field_1_render',
		'pluginPage',
		'redlum_pluginPage_section'
	);

	add_settings_field(
		'redlum_textarea_field_2',
		__( 'Settings field description', 'redlum' ),
		'redlum_textarea_field_2_render',
		'pluginPage',
		'redlum_pluginPage_section'
	);

	add_settings_field(
		'redlum_select_field_3',
		__( 'Settings field description', 'redlum' ),
		'redlum_select_field_3_render',
		'pluginPage',
		'redlum_pluginPage_section'
	);


}


function redlum_text_field_0_render(  ) {

	$options = get_option( 'redlum_settings' );
	?>
	<input type='text' name='redlum_settings[redlum_text_field_0]' value='<?php echo $options['redlum_text_field_0']; ?>'>
	<?php

}


function redlum_checkbox_field_1_render(  ) {

	$options = get_option( 'redlum_settings' );
	?>
	<input type='checkbox' name='redlum_settings[redlum_checkbox_field_1]' <?php checked( $options['redlum_checkbox_field_1'], 1 ); ?> value='1'>
	<?php

}


function redlum_textarea_field_2_render(  ) {

	$options = get_option( 'redlum_settings' );
	?>
	<textarea cols='40' rows='5' name='redlum_settings[redlum_textarea_field_2]'>
		<?php echo $options['redlum_textarea_field_2']; ?>
 	</textarea>
	<?php

}


function redlum_select_field_3_render(  ) {

	$options = get_option( 'redlum_settings' );
	?>
	<select name='redlum_settings[redlum_select_field_3]'>
		<option value='1' <?php selected( $options['redlum_select_field_3'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['redlum_select_field_3'], 2 ); ?>>Option 2</option>
	</select>

<?php

}

function redlum_settings_section_callback(  ) {
	echo __( 'This section description', 'redlum' );
}

function redlum_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Theme editor</h2>

		<?php
  		settings_fields( 'pluginPage' );
  		do_settings_sections( 'pluginPage' );
  		submit_button();
		?>

	</form>
	<?php

}

?>

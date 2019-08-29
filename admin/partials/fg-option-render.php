<?php
// check user capabilities.
if ( ! current_user_can( 'manage_options' ) ) {
	return;
}
// add error/update messages.
// check if the user have submitted the settings.
// WordPress will add the "settings-updated" $_GET parameter to the url.
if ( ! empty( filter_input( INPUT_GET, 'settings-updated' ) ) ) {
	// add settings saved message with the class of "updated".
	add_settings_error( 'tve_messages', 'tve_message', 'Settings Saved', 'updated' );
}
// show error/update messages.
settings_errors( 'tve_messages' );
?>
<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">
		<?php
		// output security fields for the registered setting "tve".
		settings_fields( 'fg_settings_group' );
		// output setting sections and their fields.
		// (sections are registered for "tve", each field is registered to a specific section).
		do_settings_sections( 'fg_settings_group' );
		// output save settings button.
        
        submit_button( 'Save Settings' );
		?>
	</form>
</div>
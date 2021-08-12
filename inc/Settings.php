<?php
// Settings Page for Kittle Map

// ----- Settings Page -----
add_action('admin_menu', 'settings_page');

function settings_page()
{
	add_options_page('Kittle Map Settings', 'Kittle Map Settings', 'manage_options', 'kittle-map-settings', 'render_settings_page');
}

// ----- Settings Section -----
function render_settings_page()
{

	?>
<h1>Kittle Map Settings</h1>
<br>
<form action='options.php' method='post'>
<?php
settings_fields('kittle_map_options');
	do_settings_sections('kittle_map_plugin');
	submit_button();
	?>
</form>
<?php

	register_setting('kittleMap', 'kittle_map_settings');
	add_settings_section(
		'kittle_map_setting_section',
		'Kittle Map Settings',
		'kittle_map_settings_section_callback',
		'kittleMap'
	);
}

function kittle_map_settings()
{
	register_setting('kittle_map_options', 'kittle_map_options', 'kittle_map_options_validate');

	// Depreciated
	// add_settings_section('database_settings', 'Database Settings', 'kittle_map_section_text', 'kittle_map_plugin');
	// add_settings_field('kittle_map_setting_url_endpoint', 'SheetsDB URL Endpoint', 'kittle_map_setting_url_endpoint', 'kittle_map_plugin', 'database_settings');

	// Mapbox API Key
	add_settings_section('mapbox_settings', 'Mapbox Settings', 'mapbox_settings_render', 'kittle_map_plugin');
	add_settings_field('kittle_map_mapbox_api_key', 'Mapbox API Key', 'kittle_map_mapbox_api_key', 'kittle_map_plugin', 'mapbox_settings');
	add_settings_field('kittle_map_mapbox_style', 'Map Box Style URL', 'kittle_map_mapbox_style', 'kittle_map_plugin', 'mapbox_settings');

	// Google Sheets API Key
	add_settings_section('google_sheets_settings', 'Google Sheets Settings', 'google_sheets_settings_render', 'kittle_map_plugin');
	add_settings_field('kittle_map_google_sheets_api_key', 'Google Sheets API Key', 'kittle_map_google_sheets_api_key', 'kittle_map_plugin', 'google_sheets_settings');
	add_settings_field('kittle_map_google_sheets_id', 'Google Sheet ID', 'kittle_map_google_sheets_id', 'kittle_map_plugin', 'google_sheets_settings');

	// Google Sheets API OAuth2
	add_settings_section('google_sheets_settings', 'Google OAuth2', 'google_oauth_settings_render', 'kittle_map_plugin');

}
add_action('admin_init', 'kittle_map_settings');

function kittle_map_options_validate($input)
{
	$newinput['mapbox_key']     = trim($input['mapbox_key']);
	$newinput['style']          = trim($input['style']);
	$newinput['GOOGLE_API_KEY'] = trim($input['GOOGLE_API_KEY']);
	$newinput['SHEET_ID']       = trim($input['SHEET_ID']);

	return $newinput;
}

// ----- Map Box Settings Section -----

function mapbox_settings_render()
{
	echo '<p>Here you can set all the options for using Mapbox</p>';
}

function kittle_map_mapbox_api_key()
{
	$options = get_option('kittle_map_options');
	echo '<input id="kittle_map_mapbox_api_key" name="kittle_map_options[mapbox_key]" type="text" value="' . esc_attr($options['mapbox_key']) . '" class="regular-text"/>';
}

function kittle_map_mapbox_style()
{
	$options = get_option('kittle_map_options');
	echo '<input id="kittle_map_mapbox_style" name="kittle_map_options[style]" type="text" value="' . esc_attr($options['style']) . '" class="regular-text"/>';
}

// ----- Google Sheets Settings Section -----

function google_sheets_settings_render()
{
	echo '<p>Here you can set all the options for using Google Sheets</p>';
}

function kittle_map_google_sheets_api_key()
{
	$options = get_option('kittle_map_options');
	echo '<input id="kittle_map_google_sheets_api_key" name="kittle_map_options[GOOGLE_API_KEY]" type="text" value="' . esc_attr($options['GOOGLE_API_KEY']) . '" class="regular-text"/>';
}

function kittle_map_google_sheets_id()
{
	$options = get_option('kittle_map_options');
	echo '<input id="kittle_map_google_sheets_id" name="kittle_map_options[SHEET_ID]" type="text" value="' . esc_attr($options['SHEET_ID']) . '" class="regular-text"/>';
}

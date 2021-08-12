<?php

add_action('init', 'add_wp_media');

function add_wp_media()
{
    wp_enqueue_media();
}

// Register the script
wp_register_script('mapbox_variables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/Autocomplete.js');

// Localize the script with new data
$translation_array = array(
    'token' => __(get_option('kittle_map_options')['mapbox_key'], 'plugin-domain'),
    'style' => __(get_option('kittle_map_options')['mapbox_style'], 'pugin-domain'),
);
wp_localize_script('mapbox_variables', 'mapbox', $translation_array);

// Enqueued script with localized data.
wp_enqueue_script('mapbox_variables');

/* ===== MODEL ===== */
// Register the script
wp_register_script('modelVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/Model.js');

// Localize the script with new data
$translation_array_tag = array();
wp_localize_script('modelVariables', 'modelVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('modelVariables');

/* ===== VIEW ===== */

// Register the script
wp_register_script('viewVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/View.js');

// Localize the script with new data
$translation_array_tag = array(
    'tagName1'  => __('Accepting Applicants', 'plugin-domain'),
    'tagName2'  => __('New Construction', 'pugin-domain'),
    'tagName3'  => __('Affordable', 'pugin-domain'),
    'tagName4'  => __('Family', 'pugin-domain'),
    'tagName5'  => __('Pet Friendly', 'pugin-domain'),
    'tagName6'  => __('Clubhouse', 'pugin-domain'),
    'tagName7'  => __('Luxury', 'pugin-domain'),
    'tagName8'  => __('Utilities required', 'pugin-domain'),
    'tagName9'  => __('Senior', 'pugin-domain'),
    'tagName10' => __('Student', 'pugin-domain'),
);
wp_localize_script('viewVariables', 'viewVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('viewVariables');

/* ===== CONTROLLER ===== */
// Register the script
wp_register_script('controllerVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/Controller.js');

// Localize the script with new data
$translation_array_tag = array();
wp_localize_script('controllerVariables', 'controllerVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('controllerVariables');

/* ===== LEAFLET FUNCTIONS ===== */
// Register the script
wp_register_script('leafletVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/LeafletFunctions.js');

// Localize the script with new data
$translation_array_tag = array();
wp_localize_script('leafletVariables', 'leafletVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('leafletVariables');

/* ===== LEAFLET FUNCTIONS ===== */
// Register the script
wp_register_script('affordabilityFilterVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/AffordabilityFilter.js');

// Localize the script with new data
$translation_array_tag = array();
wp_localize_script('affordabilityFilterVariables', 'affordabilityFilterVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('affordabilityFilterVariables');

/* ===== LEAFLET FUNCTIONS ===== */
// Register the script
wp_register_script('housingTypeFilterVariables', plugin_dir_url(dirname(__FILE__, 2)) . '/src/map/HousingTypeFilter.js');

// Localize the script with new data
$translation_array_tag = array();
wp_localize_script('housingTypeFilterVariables', 'housingTypeFilterVariables', $translation_array_tag);

// Enqueued script with localized data.
wp_enqueue_script('housingTypeFilterVariables');

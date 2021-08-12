<?php

include_once 'Styles.php';

/**
 * LoadScripts
 * Function to load scripts with a version that is equal to the files last update time
 * @return void
 */

function LoadScripts()
{
    // Affordability
    $affordabilityFilterVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/AffordabilityFilter.js'));
    wp_enqueue_script('AffordabilityFilter', plugins_url('src/AffordabilityFilter.js', __FILE__), array(), $affordabilityFilterVersion);

    // Autocomplete
    $autocompleteVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/Autocomplete.js'));
    wp_enqueue_script('Autocomplete', plugins_url('src/Autocomplete.js', __FILE__), array(), $autocompleteVersion);

    // Controller
    $controllerVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/Controller.js'));
    wp_enqueue_script('Controller', plugins_url('src/Controller.js', __FILE__), array(), $controllerVersion);

    // Housing Type Filter
    $housingFilterVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/HousingTypeFilter.js'));
    wp_enqueue_script('HousingTypeFilter', plugins_url('src/HousingTypeFilter.js', __FILE__), array(), $housingFilterVersion);

    // Leaflet Functions
    $leafletFunctionsVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/LeafletFunctions.js'));
    wp_enqueue_script('LeafletFunctions', plugins_url('src/LeafletFunctions.js', __FILE__), array(), $leafletFunctionsVersion);

    // Model
    $modelVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/Model.js'));
    wp_enqueue_script('Model', plugins_url('src/Model.js', __FILE__), array(), $modelVersion);

    // View
    $viewVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'src/Map/View.js'));
    wp_enqueue_script('View', plugins_url('src/View.js', __FILE__), array(), $viewVersion);

    LoadStyles();
}

add_action('wp_enqueue_scripts', 'LoadScripts');

<?php

include_once 'Styles.php';

/**
 * LoadScripts
 * Function to load scripts with a version that is equal to the files last update time
 * @return void
 */

function LoadScripts()
{
    // // Affordability
    // $affordabilityFilterVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/AffordabilityFilter.js'));
    // wp_enqueue_script('AffordabilityFilter', plugins_url('src/map/AffordabilityFilter.js', dirname(__FILE__, 1)), array(), $affordabilityFilterVersion);

    // // Autocomplete
    // $autocompleteVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/Autocomplete.js'));
    // wp_enqueue_script('Autocomplete', plugins_url('src/map/Autocomplete.js', __FILE__), array(), $autocompleteVersion);

    // // Controller
    // $controllerVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/Controller.js'));
    // wp_enqueue_script('Controller', plugins_url('src/map/Controller.js', dirname(__FILE__, 1)), array(), $controllerVersion);

    // // Housing Type Filter
    // $housingFilterVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/HousingTypeFilter.js'));
    // wp_enqueue_script('HousingTypeFilter', plugins_url('src/map/HousingTypeFilter.js', dirname(__FILE__, 1)), array(), $housingFilterVersion);

    // // Leaflet Functions
    // $leafletFunctionsVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/LeafletFunctions.js'));
    // wp_enqueue_script('LeafletFunctions', plugins_url('src/map/LeafletFunctions.js', dirname(__FILE__, 1)), array(), $leafletFunctionsVersion);

    // // Model
    // $modelVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/Model.js'));
    // wp_enqueue_script('Model', plugins_url('src/map/Model.js', dirname(__FILE__, 1)), array(), $modelVersion);

    // // View
    // $viewVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/map/View.js'));
    // wp_enqueue_script('View', plugins_url('src/map/View.js', dirname(__FILE__, 1)), array(), $viewVersion);

    // Add Model
    $addViewVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/add_property/AddModel.js'));
    wp_enqueue_script('View', plugins_url('src/add_property/AddModel.js', dirname(__FILE__, 1)), array(), $addModelVersion);

    // Add View
    $addViewVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/add_property/AddView.js'));
    wp_enqueue_script('View', plugins_url('src/add_property/AddView.js', dirname(__FILE__, 1)), array(), $addViewVersion);

    // Add Controller
    $addViewVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'src/add_property/AddController.js'));
    wp_enqueue_script('View', plugins_url('src/add_property/AddController.js', dirname(__FILE__, 1)), array(), $addControllerVersion);

    //LoadStyles();
}

add_action('wp_enqueue_scripts', 'LoadScripts');

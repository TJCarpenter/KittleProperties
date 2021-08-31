<?php

/**
 * LoadStyles
 * Function to load styles with a version that is equal to the files last update time
 * @return void
 */
function LoadStyles()
{
    $filterGroupVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'style/FilterGroup.css'));
    wp_register_style('FilterGroupStyle', plugins_url('style.css', dirname(__FILE__, 1)), false, $filterGroupVersion);
    wp_enqueue_style('FilterGroupStyle');

    $listingVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'style/Listing.css'));
    wp_register_style('ListingStyle', plugins_url('style.css', dirname(__FILE__, 1)), false, $listingVersion);
    wp_enqueue_style('ListingStyle');

    $mapVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'style/Map.css'));
    wp_register_style('MapStyle', plugins_url('style.css', dirname(__FILE__, 1)), false, $mapVersion);
    wp_enqueue_style('MapStyle');

    $markerStyleVersion = date("ymd-Gis", filemtime(plugin_dir_path(dirname(__FILE__, 1)) . 'style/MarkerStyle.css'));
    wp_register_style('MarkerStyle', plugins_url('style.css', dirname(__FILE__, 1)), false, $markerStyleVersion);
    wp_enqueue_style('MarkerStyle');

}

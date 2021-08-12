<?php

/**
 * LoadStyles
 * Function to load styles with a version that is equal to the files last update time
 * @return void
 */
function LoadStyles()
{
	$filterGroupVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'style/FilterGroup.css'));
	wp_register_style('FilterGroupStyle', plugins_url('style.css', __FILE__), false, $filterGroupVersion);
	wp_enqueue_style('FilterGroupStyle');

	$listingVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'style/Listing.css'));
	wp_register_style('ListingStyle', plugins_url('style.css', __FILE__), false, $listingVersion);
	wp_enqueue_style('ListingStyle');

	$mapVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'style/Map.css'));
	wp_register_style('MapStyle', plugins_url('style.css', __FILE__), false, $mapVersion);
	wp_enqueue_style('MapStyle');

	$markerStyleVersion = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'style/MarkerStyle.css'));
	wp_register_style('MarkerStyle', plugins_url('style.css', __FILE__), false, $markerStyleVersion);
	wp_enqueue_style('MarkerStyle');

}

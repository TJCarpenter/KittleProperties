<?php
/**
 * Plugin Name:     Kittle Map
 * Description:     Creates a shortcode map of each apartment based on the database
 * Version:         0.0.1
 * Author:          Tyler Carpenter
 */

// Kill the plugin if not being accessed by Wordpress
if (!defined('ABSPATH')) {
    die;
}

// Map
require_once 'inc/map/MapFunctions.php';

// Add Properties
//require_once 'inc/add_property/PropertyFunctions.php';

// Settings Page
require_once 'inc/Settings.php';

// Short Codes
require_once 'inc/Shortcode.php';

// Google Client
require_once 'inc/GoogleClient.php';

// Endpoints
require_once 'inc/Endpoints.php';
require_once 'inc/endpoints/KittleJSON.php';
require_once 'inc/endpoints/KittlePropertiesJSON.php';
require_once 'inc/endpoints/RentableXML.php';
require_once 'inc/endpoints/SendUpdate.php';
// require_once 'inc/endpoints/_OutlookEmail.php';

// Scripts
require_once 'inc/Scripts.php';

// Styles
//require_once 'inc/Styles.php';

<?php
/**
 * Builds a JSON file that contains all of the needed information for the
 * map and listings.
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author    Tyler Carpenter <tylercarpenter1996@gmail.com>
 * @copyright 2001-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: 1.0.0
 * @since     File available since Release 1.0.0
 * @return    JSON
 */

/**
 * Builds a JSON file to be used for map display and listing displays
 * If a new build fails, the last successful build is returned
 *
 * @return JSON
 */
function kittle_json()
{

    $kittle_json = new stdClass();

    // Initialize a new Kittle Map JSON Object
    $kittle_json->STATEDATA  = array();
    $kittle_json->PROPERTIES = array();

    try {
        $client  = getGoogleClient();
        $service = new Google_Service_Sheets($client);
    } catch (\Throwable $th) {
        //return file_get_contents(str_replace(' ', '%20', plugin_dir_url(dirname(__FILE__)) . 'json/cachedResponse.json'));
    }

    $spreadsheetid = get_option('kittle_map_options')['SHEET_ID'];

    $property_range      = 'Property!A:P';
    $property_tags_range = 'Property Tags!A:K';

    $response_property = $service->spreadsheets_values->get($spreadsheetid, $property_range);
    $response_tags     = $service->spreadsheets_values->get($spreadsheetid, $property_tags_range);

    // Extract the header values from each property
    $header_property = $response_property->getValues()[0];
    $header_tags     = $response_tags->getValues()[0];

    // First we need to get and update the number of buildings per state
    $num_properties_per_state = get_number_of_properties_per_state($response_property);

    $state_coordinate = json_decode(file_get_contents(str_replace(' ', '%20', plugin_dir_url(dirname(__FILE__, 2)) . 'json/state_coordinates.json')), true);

    // Add each state coordinate data for drawing the map
    foreach ($state_coordinate as $state => $geometry) {

        if (array_key_exists($state, $num_properties_per_state)) {
            $state_object                        = new stdClass();
            $state_object->type                  = 'Feature';
            $state_object->ID                    = array_search($state, array_keys($num_properties_per_state));
            $state_object->properties            = new stdClass();
            $state_object->properties->STATE     = $state;
            $state_object->properties->BUILDINGS = $num_properties_per_state[$state];
            $state_object->geometry              = $geometry;
            array_push($kittle_json->STATEDATA, $state_object);
        }
    }

    // Add each property by state
    foreach (array_slice($response_property->getValues(), 1) as $property) {

        $property_object                   = new stdClass();
        $property_object->ID               = $property[0];
        $property_object->NAME             = $property[1];
        $property_object->ADDRESS          = $property[2];
        $property_object->CITY             = $property[3];
        $property_object->STATE            = $property[4];
        $property_object->ZIPCODE          = $property[5];
        $property_object->LAT              = $property[6];
        $property_object->LON              = $property[7];
        $property_object->AFFORDABILITY    = $property[8];
        $property_object->HOUSINGTYPES     = $property[9];
        $property_object->WEBSITE          = $property[10];
        $property_object->SISTERPROPERTY   = $property[11];
        $property_object->SISTERPROPERTYID = $property[12];
        $property_object->IMAGE            = get_attachment_url_by_slug($property[15]);
        $property_object->TAGS             = array_slice(array_combine($header_tags, $response_tags->getValues()[array_search($property[0], array_column($response_tags->getValues(), 0))]), 1);

        array_push($kittle_json->PROPERTIES, $property_object);

    }

    // Check if the file exists. If not, make a cache file
    if (!file_exists(WP_PLUGIN_DIR . '/Kittle Map/json/cachedResponse.json')) {
        touch(WP_PLUGIN_DIR . '/Kittle Map/json/cachedResponse.json');
    }

    // Write the backupfile
    $file = fopen(WP_PLUGIN_DIR . '/Kittle Map/json/cachedResponse.json', 'w');
    fwrite($file, json_encode($kittle_json));
    fclose($file);

    return json_encode($kittle_json);
}

/**
 * Returns the number of properties in a given state
 *
 * @param Object $response_property The response from the sheet containing the values
 *
 * @return int
 */
function get_number_of_properties_per_state($response_property)
{
    $property_list = $response_property->getValues();

    $num_properties_per_state = array();

    if (empty($property_list)) {
        // Empty
        // TODO Handle Error
    } else {
        foreach ($property_list as $row) {

            $state = $row[4];

            if (!isset($num_properties_per_state[$state])) {
                $num_properties_per_state[$state] = 0;
            }

            $num_properties_per_state[$state] += 1;
        }
    }

    return $num_properties_per_state;
}

/**
 * Function to retreive the image file name from the media library based on the given
 * slug name
 *
 * @param String $slug The name of the slug extracted from the database
 *
 * @return String
 */
function get_attachment_url_by_slug($slug)
{
    $args = array(
        'post_type'      => 'attachment',
        'name'           => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status'    => 'inherit',
    );
    $_header = get_posts($args);
    $header  = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : 'http://127.0.0.1/wp/wp-content/uploads/2021/07/kittle_placeholder-1024x683.png';
}

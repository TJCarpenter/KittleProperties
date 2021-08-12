<?php

function kittle_properties_json()
{

    // Initialize a new Kittle Map JSON Object
    $kittle_properties_json = new stdClass();

    // Initialize the Properties object
    $kittle_properties_json->PROPERTIES = array();

    try {
        $client  = getGoogleClient();
        $service = new Google_Service_Sheets($client);
    } catch (\Throwable $th) {
        return file_get_contents(str_replace(' ', '%20', plugin_dir_url(dirname(__FILE__)) . 'json/cachedPropertiesResponse.json'));
    }

    // Grab the spreadsheet ID from the settings
    $spreadsheetid = get_option('kittle_map_options')['SHEET_ID'];

    // Set the range of the data from the sheets
    // TODO Make updateable from the settigns page
    $property_range      = 'Property!A:M';
    $property_tags_range = 'Property Tags!A:K';

    // Get the values from the sheets
    $response_property = $service->spreadsheets_values->get($spreadsheetid, $property_range);
    $response_tags     = $service->spreadsheets_values->get($spreadsheetid, $property_tags_range);

    // Extract the header values from each property
    $header_property = $response_property->getValues()[0];
    $header_tags     = $response_tags->getValues()[0];

    // Extract each of the properties
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
        $property_object->TAGS             = array_slice(array_combine($header_tags, $response_tags->getValues()[array_search($property[0], array_column($response_tags->getValues(), 0))]), 1);

        array_push($kittle_properties_json->PROPERTIES, $property_object);

    }

    // Create a cache file if the file does not exist
    if (!file_exists(WP_PLUGIN_DIR . '/Kittle Map/json/cachedPropertiesResponse.json')) {
        touch(WP_PLUGIN_DIR . '/Kittle Map/json/cachedPropertiesResponse.json');
    }

    // Write the cache backupfile
    $file = fopen(WP_PLUGIN_DIR . '/Kittle Map/json/cachedPropertiesResponse.json', 'w');
    fwrite($file, json_encode($kittle_properties_json));
    fclose($file);

    return json_encode($kittle_properties_json);
}

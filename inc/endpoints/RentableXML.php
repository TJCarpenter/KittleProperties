<?php

/**
 * rentable_xml
 *
 * @param  mixed $request
 * @return void
 */
function rentable_xml(WP_REST_Request $request)
{
    $xml = new SimpleXMLElement('<PhysicalProperty />');

    $client  = getGoogleClient();
    $service = new Google_Service_Sheets($client);

    $spreadsheetId  = get_option('kittle_map_options')['SHEET_ID'];
    $listing_range  = 'Listing!A:J';
    $property_range = 'Property!A:O';

    $response = $service->spreadsheets_values->get(
        $spreadsheetId,
        $listing_range
    );
    $listing_values = $response->getValues();

    // Initialize an empty data array
    $rentable_data = array();

    if (empty($listing_values)) {
        array_push($data, array('error' => 'No values found'));
    } else {

        // Add each value to the data array grouping by property ID
        foreach ($listing_values as $row) {
            $listing_id      = $row[0];
            $parent_id       = $row[1];
            $bedrooms        = $row[3];
            $bathrooms       = $row[4];
            $min_square_feet = $row[5];
            $max_square_feet = $row[6];
            $min_price       = (int) filter_var($row[7], FILTER_SANITIZE_NUMBER_INT);
            $max_price       = (int) filter_var($row[8], FILTER_SANITIZE_NUMBER_INT);
            $data_available  = $row[9];

            if ('PARENT ID' == $parent_id) {
                continue;
            }

            // Create an empty array if the property ID index has not been created
            if (!isset($rentable_data[$parent_id]['ILS_Unit'])) {
                $rentable_data[$parent_id]['ILS_Unit'] = array();
            }

            // Push to the array
            array_push(
                $rentable_data[$parent_id]['ILS_Unit'],
                array(
                    'ListingID'     => $listing_id,
                    'MarketingName' => '',
                    'UnitBedrooms'  => $bedrooms,
                    'UnitBathrooms' => $bathrooms,
                    'MinSquareFeet' => $min_square_feet,
                    'MaxSquareFeet' => $max_square_feet,
                    'UnitRent'      => $min_price,
                    'MinPrice'      => $min_price,
                    'MaxPrice'      => $max_price,
                    'DateAvailable' => $data_available,
                )
            );
        }
    }

    // Get the response from the spreadsheet
    $response = $service->spreadsheets_values->get(
        $spreadsheetId,
        $property_range
    );

    // Extract the values from the response
    $property_values = $response->getValues();

    // Check if the values are empty
    if (empty($property_values)) {
        // TODO Return previous successful response
    } else {
        // Add each value to the data array grouping by property ID
        foreach ($property_values as $row) {

            $id          = $row[0];
            $name        = $row[1];
            $address     = $row[2];
            $city        = $row[3];
            $state       = $row[4];
            $postal_code = $row[5];
            $lat         = $row[6];
            $lon         = $row[7];
            $phone       = trim($row[13]);
            $email       = $row[14];

            if ('ID' == $id) {
                continue;
            }

            // Push to the array
            $rentable_data[$id]['Property'] = array('ID' => $id, 'Address' => array('AddressLine1' => $address, 'City' => $city, 'State' => $state, 'PostalCode' => $postal_code), 'Phone' => $phone, 'Email' => $email);

            $rentable_data[$id]['ILS_Identification'] = array('Latitude' => $lat, 'Longitude' => $lon);

            if (isset($rentable_data[$id]['ILS_Unit'])) {
                foreach ($rentable_data[$id]['ILS_Unit'] as &$unit) {
                    $unit['MarketingName'] = $name;
                }
            }
        }
    }

    foreach ($rentable_data as $data_point) {

        // Property
        $property = $xml->addChild('Property');
        $property->addAttribute(
            'IDValue',
            $data_point['Property']['ID']
        );
        $property->addAttribute(
            'IDType',
            'PrimaryID'
        );

        // PropertyID
        $property_id = $property->addChild('PropertyID');

        // Identification
        $identification = $property_id->addChild('Identification');
        $identification->addAttribute(
            'IDValue',
            $data_point['Property']['ID']
        );
        $identification->addAttribute(
            'IDType',
            'PrimaryID'
        );

        //Address
        $address = $property_id->addChild('Address');
        $address->addAttribute(
            'AddressType',
            'Property'
        );

        //Address Line 1
        $address_line_1 = $address->addChild(
            'AddressLine1',
            $data_point['Property']['Address']['AddressLine1']
        );

        //City
        $city = $address->addChild(
            'City',
            $data_point['Property']['Address']['City']
        );

        //State
        $state = $address->addChild(
            'State',
            $data_point['Property']['Address']['State']
        );

        //Postal Code
        $postal_code = $address->addChild(
            'PostalCode',
            $data_point['Property']['Address']['PostalCode']
        );

        // Phone Number
        $phone = $property->addChild('Phone');
        $phone->addAttribute(
            'PhoneType',
            'Office'
        );
        $phoneNumber = $phone->addChild(
            'PhoneNumber',
            $data_point['Property']['Phone']
        );

        // Email
        $email = $property->addChild(
            'Email',
            $data_point['Property']['Email']
        );

        // ILS_Identification
        $ils_identification = $property->addChild('ILS_Identification');
        $ils_identification->addAttribute(
            'ILS_IdentificationType',
            'Apartment'
        );
        $ils_identification->addAttribute(
            'RentalType',
            'Unspecified'
        );

        // Latitude
        $ils_identification->addChild(
            'Latitude',
            $data_point['ILS_Identification']['Latitude']
        );

        // Longitude
        $ils_identification->addChild(
            'Longitude',
            $data_point['ILS_Identification']['Longitude']
        );

        // Create the Unit Listing
        if (isset($data_point['ILS_Unit'])) {

            foreach ($data_point['ILS_Unit'] as $unit_data) {
                // ILS_Unit

                $ils_unit = $property->addChild('ILS_Unit');
                $ils_unit->addAttribute(
                    'IDValue',
                    $unit_data['ListingID']
                );
                $ils_unit->addAttribute(
                    'IDType',
                    'ILS_UnitID'
                );

                $units = $ils_unit->addChild('Units');
                $unit  = $units->addChild('Unit');

                // Identification
                $identification = $unit->addChild('Identification');
                $identification->addAttribute(
                    'IDValue',
                    $unit_data['ListingID']
                );
                $identification->addAttribute(
                    'IDType',
                    'ILS_UnitID'
                );

                // Marketing Name
                $unit->addChild(
                    'MarketingName',
                    $unit_data['MarketingName']
                );

                // Unit Bedroom
                $unit->addChild(
                    'UnitBedrooms',
                    $unit_data['UnitBedrooms']
                );

                // Unit Bathroom
                $unit->addChild(
                    'UnitBathrooms',
                    $unit_data['UnitBathrooms']
                );

                // Minimum Square Feet
                $unit->addChild(
                    'MinSquareFeet',
                    $unit_data['MinSquareFeet']
                );

                // Maximum Square Feet
                $unit->addChild(
                    'MaxSquareFeet',
                    $unit_data['MaxSquareFeet']
                );

                // Unit Rent
                $unit->addChild(
                    'UnitRent',
                    $unit_data['UnitRent']
                );

                // Effective Rent
                $effective_rent = $ils_unit->addChild('EffectiveRent');
                $effective_rent->addAttribute(
                    'Min',
                    $unit_data['MinPrice']
                );
                $effective_rent->addAttribute(
                    'Max',
                    $unit_data['MaxPrice']
                );

                $availability    = $ils_unit->addChild('Availability');
                $made_ready_date = $availability->addChild('MadeReadyDate');
                $made_ready_date->addAttribute(
                    'Month',
                    getdate(strtotime($unit_data['DateAvailable']))['mon']
                );
                $made_ready_date->addAttribute(
                    'Day',
                    getdate(strtotime($unit_data['DateAvailable']))['mday']
                );
                $made_ready_date->addAttribute(
                    'Year',
                    getdate(strtotime($unit_data['DateAvailable']))['year']
                );
            }
        }

    }

    // Create a cache file if the file does not exist
    if (!file_exists(WP_PLUGIN_DIR . '/Kittle Map/xml/cachedRentableFeed.xml')) {
        touch(WP_PLUGIN_DIR . '/Kittle Map/xml/cachedRentableFeed.xml');
    }

    // Write the cache backupfile
    $file = fopen(WP_PLUGIN_DIR . '/Kittle Map/xml/cachedRentableFeed.xml', 'w');
    fwrite($file, $xml->asXML());
    fclose($file);

    return $xml->asXML();
}

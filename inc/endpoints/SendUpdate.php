<?php

function append_properties()
{
    if (isset($_POST['propertyID'])) {

        $property = new stdClass();

        // Property ID
        $property->id = $_POST['propertyID'];

        // Property Name
        $property->name = $_POST['propertyName'];

        // Property Address
        $property->address = $_POST['propertyAddress'];

        // Property City
        $property->city = $_POST['propertyCity'];

        // Property State
        $property->state = $_POST['propertyState'];

        // Property Zipcode
        $property->zipcode = $_POST['propertyZipcode'];

        // Property LAT
        $property->lat = $_POST['propertyLAT'];

        // Property LON
        $property->lon = $_POST['propertyLON'];

        // Property Affordability
        $property->affordability = $_POST['propertyAffordability'];

        // Property Housing Type
        $property->housingType = $_POST['propertyHousingType'];

        // Tags
        $property->tag1 = isset($_POST['tag1']) ? 'TRUE' : 'FALSE'; // Under Construction
        $property->tag2 = isset($_POST['tag2']) ? 'TRUE' : 'FALSE'; // Now Accepting Applications
        $property->tag3 = isset($_POST['tag3']) ? 'TRUE' : 'FALSE'; // Imediate Move In's Available
        $property->tag4 = isset($_POST['tag4']) ? 'TRUE' : 'FALSE'; // Waitlist is Open
        // $property->tag5  = isset($_POST['tag5']) ? 'TRUE' : 'FALSE';
        // $property->tag6  = isset($_POST['tag6']) ? 'TRUE' : 'FALSE';
        // $property->tag7  = isset($_POST['tag7']) ? 'TRUE' : 'FALSE';
        // $property->tag8  = isset($_POST['tag8']) ? 'TRUE' : 'FALSE';
        // $property->tag9  = isset($_POST['tag9']) ? 'TRUE' : 'FALSE';
        // $property->tag10 = isset($_POST['tag10']) ? 'TRUE' : 'FALSE';

        // Property Has Sister Property
        $property->hasSisterProperty = isset($_POST['propertyHasSisterProperty']) ? 'TRUE' : 'FALSE';

        // Property Sister Property ID
        $property->sisterPropertyID = 'TRUE' === $property->hasSisterProperty ? $_POST['propertySisterPropertyID'] : -1;

        // Property Website
        $property->website = $_POST['propertyWebsite'];

        // Property Phone Number
        $property->phoneNumber = $_POST['propertyPhoneNumber'];

        // Property Email
        $property->email = $_POST['propertyEmailAddress'];

        // Property PhotoID
        $property->photoID = "apartment_$property->id";

        $client  = getGoogleClient();
        $service = new Google_Service_Sheets($client);

        $spreadsheetid = '12eetDxOo1DOtPNWnKOJblnM6nazWVZlS7kNbdjZf5-M';

        // Add New Property
        $range      = 'Property';
        $valueRange = new Google_Service_Sheets_ValueRange();
        $valueRange->setValues(
            ['values' => [
                $property->id,
                $property->name,
                $property->address,
                $property->city,
                $property->state,
                $property->zipcode,
                $property->lat,
                $property->lon,
                $property->affordability,
                $property->housingType,
                $property->website,
                $property->hasSisterProperty,
                $property->sisterPropertyID,
                $property->phoneNumber,
                $property->email,
                $property->photoID,
            ],
            ]
        );
        $options = ['valueInputOption' => 'USER_ENTERED'];

        $service->spreadsheets_values->append($spreadsheetid, $range, $valueRange, $options);

        $last_row = get_last_row($service, $spreadsheetid, 'Property Tags');

        // Add Tags to Property
        $valueRange = new Google_Service_Sheets_BatchUpdateValuesRequest(
            [
                "valueInputOption" => 'USER_ENTERED',
                "data"             => [
                    [
                        "range"  => "Property Tags!" . $last_row . ":" . $last_row,
                        "values" => [
                            [
                                $property->id,
                                $property->tag1,
                                $property->tag2,
                                $property->tag3,
                                $property->tag4,
                                $property->tag5,
                                $property->tag6,
                                $property->tag7,
                                $property->tag8,
                                $property->tag9,
                                $property->tag10,
                            ],
                        ],
                    ],
                ],
            ]
        );
        $service->spreadsheets_values->batchUpdate($spreadsheetid, $valueRange);
    }

}

function get_last_row($service, $spreadsheetId, $spreadsheetName)
{
    $response = $service->spreadsheets_values->get($spreadsheetId, $spreadsheetName);
    $values   = $response->getValues();

    foreach ($values as $key => $value) {
        if ("" === $values[$key][0]) {
            return $key + 1;
        }
    }
}
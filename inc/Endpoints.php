<?php
/**
 * Creates endpoints to be used by Kittle and Rentable in JSON and XML formats
 * respectively
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
 */

add_action(
    'rest_api_init',
    function () {
        // API Route for Rentable XML Feed
        register_rest_route(
            'api/v1',
            'rentable',
            array(
                'methods'  => 'GET',
                'callback' => 'rentable_xml',
            )
        );

        // API Route for Kittle Map Information
        register_rest_route(
            'api/v1',
            'kittle',
            array(
                'methods'  => 'GET',
                'callback' => 'kittle_json',
            )
        );

        // API Route for Property Information
        register_rest_route(
            'api/v1',
            'properties',
            array(
                'methods'  => 'GET',
                'callback' => 'kittle_properties_json',
            )
        );
    }
);

/**
 * Checks that the Route is equal to the callback. If it is, return the xml response
 *
 * @param mixed $served  *
 * @param mixed $result  *
 * @param mixed $request *
 * @param mixed $server  *
 *
 * @return none
 */
function Check_Rentable_xml($served, $result, $request, $server)
{
    // Check if the route of the current REST API request is the callback
    if ('/api/v1/rentable' !== $request->get_route()
        || 'rentable_xml' !== $request->get_attributes()['callback']
    ) {
        return $served;
    }

    // Set the headers
    $server->send_header('Content-Type', 'text/xml');

    // Print the XML that's returned by rentable_xml().
    echo $result->get_data();

    exit;
}

/**
 * Checks that the Route is equal to the callback. If it is, return the JSON response
 *
 * @param mixed $served  *
 * @param mixed $result  *
 * @param mixed $request *
 * @param mixed $server  *
 *
 * @return none
 */
function Check_Kittle_json($served, $result, $request, $server)
{
    // Check if the route of the current REST API request is the callback
    if ('/api/v1/kittle' !== $request->get_route()
        || 'kittle_json' !== $request->get_attributes()['callback']
    ) {
        return $served;
    }

    // Set the headers
    $server->send_header('Content-Type', 'application/json');

    // Print the JSON that's returned by kittle_json().
    echo $result->get_data();

    exit;
}

/**
 * Checks that the Route is equal to the callback. If it is, return the JSON response
 *
 * @param mixed $served  *
 * @param mixed $result  *
 * @param mixed $request *
 * @param mixed $server  *
 *
 * @return none
 */
function Check_Kittle_Properties_json($served, $result, $request, $server)
{
    // Check if the route of the current REST API request is the callback
    if ('/api/v1/properties' !== $request->get_route()
        || 'kittle_properties_json' !== $request->get_attributes()['callback']
    ) {
        return $served;
    }

    // Set the headers
    $server->send_header('Content-Type', 'application/json');

    // Print the JSON that's returned by kittle_properties_json().
    echo $result->get_data();

    exit;
}

add_filter('rest_pre_serve_request', 'Check_Rentable_xml', 10, 4);
add_filter('rest_pre_serve_request', 'Check_Kittle_json', 10, 4);
add_filter('rest_pre_serve_request', 'Check_Kittle_Properties_json', 10, 4);

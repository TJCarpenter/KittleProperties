<?php

function kittle_map()
{
    include 'map/Map.php';

}
add_shortcode('kittle_map', 'kittle_map');

function kittle_new_property()
{
    include 'add_property/AddProperty.php';
}

add_shortcode('new_property', 'kittle_new_property');

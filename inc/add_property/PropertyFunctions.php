<?php

add_action('wp_enqueue_scripts', 'send_image_source_to_js');
function send_image_source_to_js()
{
    global $post;

    // Does this post have a featured image? If yes, fetch the link / source
    $has_image = $source = false;
    if ($thumb_id = get_post_thumbnail_id($post->ID)) {
        $has_image    = true;
        $source_array = wp_get_attachment_image_src($thumb_id, array(600, 400));
        $source       = $source_array[0];
    }

    // Build an array with what we've found about the post
    $image_params = array(
        'has_image' => $has_image ? 1 : 0,
        'source'    => $source ? $source : 0,
    );

    // Register, localize and enqueue the script
    wp_register_script('my_script', plugin_dir_url(dirname(__FILE__, 3) . '/src/map/Controller.js'));
    wp_localize_script('my_script', 'image_params', $image_params);
    wp_enqueue_style('my_script');
}

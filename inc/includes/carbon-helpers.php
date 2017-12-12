<?php

function get_value($name, $container_id = ""){
    return carbon_get_the_post_meta($name, $container_id);
}

function get_file($name, $container_id = ""){
    return wp_get_attachment_url(carbon_get_the_post_meta($name, $container_id));
}

function get_text($name, $container_id = ""){
    return wpautop(get_value($name, $container_id));
}


function the_value($name, $container_id = ""){
    echo get_value($name, $container_id);
}

function the_file($name, $container_id = ""){
    echo get_file($name, $container_id);
}

function the_text($name, $container_id = ""){
    echo get_text($name, $container_id);
}

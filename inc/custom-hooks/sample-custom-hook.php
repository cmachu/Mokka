<?php


add_action('wp_footer', 'sample_custom_hook', 100);

function sample_custom_hook() {
    echo "<script>console.log('Sample hook');</script>";
}

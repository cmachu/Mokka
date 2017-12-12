<?php


add_filter('init', 'sample_custom_hook', 10, 2);

function sample_custom_hook() {
    echo "<script>console.log('Sample hook');</script>";
}

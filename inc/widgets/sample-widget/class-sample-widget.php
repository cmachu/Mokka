<?php
class SampleWidget extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'Sample Widget Title' );
    }

    function widget( $args, $instance ) {
        // Widget output
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
    }

    function form( $instance ) {
        // Output admin widget options form
    }
}
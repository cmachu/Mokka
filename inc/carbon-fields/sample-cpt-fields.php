<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('post_meta', 'Additional information')
    ->where('post_type','=','sample')
    ->add_tab('Details',array(
        Field::make('text', 'item_url'),
        Field::make('text', 'item_date')
    ));


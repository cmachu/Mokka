<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Mokka Sample Options', 'crb' ) )
    ->add_tab( 'Social', array(
        Field::make( 'text', 'facebook_url', 'Facebook URL' )
            ->set_help_text( 'Enter your Facebook page url' ),
        Field::make( 'text', 'instagram_url', 'Instagram URL' )
            ->set_help_text( 'Enter your Instagram profile url' ),
        Field::make( 'text', 'github_url', 'Github URL' )
            ->set_help_text( 'Enter your Github profile url' ),
        Field::make( 'text', 'codepen_url', 'Codepen URL' )
            ->set_help_text( 'Enter your Codepen profile url' ),
        Field::make( 'text', 'skype_url', 'Skype Name' )
            ->set_help_text( 'Enter your Skype name profile url' ),
    ) );

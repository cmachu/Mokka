<?php


class Mokka
{

    private $config = [];
    private $version = '1.0.0';
    private $locale = 'mokka';

    function __construct($config)
    {
        $this->config = $config;
    }

    public function init()
    {
        $this->setVersion();

        $this->configureWordpress();
        $this->configureStyles();
        $this->configureScripts();

        $this->configureCarbonFields();

        $this->configureMenus();
        $this->configureCPT();
        $this->configureIncludes();
        $this->configureCustomHooks();

        $this->configureSidebars();
        $this->configureWidgets();
        $this->configureShortcodes();
    }

    private function setVersion()
    {
        if (isset($this->config['version'])) {
            $this->version = $this->config['version'];
        }

        if (isset($this->config['locale'])) {
            $this->locale = $this->config['locale'];
        }
    }

    private function configureWordpress()
    {

        $this->configureWordpressPieces();

        if (function_exists('add_theme_support')) {
            if (isset($this->config['wordpress']['support'])) {
                foreach ($this->config['wordpress']['support'] as $support_value) {
                    add_theme_support($support_value);
                }
            }

            if (isset($this->config['wordpress']['image_sizes'])) {
                foreach ($this->config['wordpress']['image_sizes'] as $image_size) {
                    add_image_size($image_size[0], $image_size[1], $image_size[2], $image_size[3]);
                }
            }

        }
    }

    private function configureWordpressPieces()
    {
        if (isset($this->config['wordpress']['admin-bar'])) {
            add_filter('show_admin_bar', function () {
                return $this->config['wordpress']['admin-bar'];
            });
        }

        if (isset($this->config['wordpress']['autop']) && $this->config['wordpress']['autop'] == false) {
            remove_filter('the_excerpt', 'wpautop');
            remove_filter('the_content', 'wpautop');
        }

        if (isset($this->config['wordpress']['image-dimensions']) && $this->config['wordpress']['image-dimensions'] == false) {
            add_filter('post_thumbnail_html', function ($html) {
                $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
                return $html;
            }, 10);
            add_filter('image_send_to_editor', function ($html) {
                $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
                return $html;
            }, 10);
        }
    }

    private function configureStyles()
    {
        if (isset($this->config['styles'])) {
            add_action('wp_enqueue_scripts', function () {
                foreach ($this->config['styles'] as $style) {
                    wp_register_style($style[0], get_template_directory_uri() . $style[1], $style[2], $this->version, 'all');
                    wp_enqueue_style($style[0]);
                }
            });
        }
    }

    private function configureScripts()
    {
        if (isset($this->config['scripts']) && $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            add_action('init', function () {
                foreach ($this->config['scripts'] as $script) {
                    wp_register_script($script[0], get_template_directory_uri() . $script[1], $script[2], $this->version);
                    wp_enqueue_script($script[0]);
                }
            });
        }
    }

    private function configureMenus()
    {
        if (isset($this->config['menus'])) {
            add_action('init', function () {
                foreach ($this->config['menus'] as $menu) {
                    register_nav_menus(array(
                        $menu[0] => __($menu[1], $this->locale),
                    ));
                }
            });
        }
    }

    private function configureCPT(){
        if (isset($this->config['custom-post-types'])) {
            foreach($this->config['custom-post-types'] as $customposttype){
                require_once(get_template_directory().'/inc/custom-post-types/cpt-'.$customposttype.'.php');
                add_action('init', 'cpt_'.str_replace('-','_',$customposttype));
            }
        }
    }

    private function configureCustomHooks(){
        if (isset($this->config['custom-hooks'])) {
            foreach($this->config['custom-hooks'] as $customhook){
                require_once(get_template_directory().'/inc/custom-hooks/'.$customhook.'.php');
            }
        }
    }

    private function configureIncludes(){
        if (isset($this->config['includes'])) {
            foreach($this->config['includes'] as $custominclude){
                require_once(get_template_directory().'/inc/includes/'.$custominclude.'.php');
            }
        }
    }

    private function configureCarbonFields(){
        if (isset($this->config['carbon_fields'])) {
            add_action( 'carbon_fields_register_fields', function() {
                foreach ($this->config['carbon_fields'] as $customhook) {
                    require_once(get_template_directory() . '/inc/carbon-fields/' . $customhook . '.php');
                }
            });

            add_action( 'after_setup_theme', function(){
                require_once( get_template_directory() .'/vendor/autoload.php' );
                \Carbon_Fields\Carbon_Fields::boot();
            });
        }
    }

    private function configureSidebars(){
        if (isset($this->config['sidebars'])) {
            add_action('widgets_init', function () {
                foreach($this->config['sidebars'] as $sidebar) {
                    register_sidebar(array(
                        'name' => __($sidebar[0], $this->locale),
                        'id' => $sidebar[1],
                        'description' => __($sidebar[2], $this->locale),
                        'before_widget' => $sidebar[3],
                        'after_widget' => $sidebar[4],
                        'before_title' => $sidebar[5],
                        'after_title' => $sidebar[6],
                    ));
                }
            });
        }
    }

    private function configureWidgets(){
        if (isset($this->config['widgets'])) {
            add_action('widgets_init', function (){
                foreach($this->config['widgets'] as $widget) {
                    require_once(get_template_directory().'/inc/widgets/'.$widget.'/class-'.$widget.'.php');
                    register_widget( implode('',explode('-',ucwords($widget,'-'))) );
                }
            });
        }
    }

    private function configureShortcodes(){
        if (isset($this->config['shortcodes'])) {
            foreach($this->config['shortcodes'] as $shortcode) {
                require_once(get_template_directory().'/inc/shortcodes/'.$shortcode.'/'.$shortcode.'.php');
                add_shortcode($shortcode, str_replace('-','_',$shortcode).'_exec');
            }
        }
    }




}
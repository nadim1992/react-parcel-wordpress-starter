<?php
namespace App;

/**
 * Scripts and Styles Class
 */
class Assets {

    function __construct() {

        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register() {
        $this->register_scripts( $this->get_scripts() );
        $this->register_styles( $this->get_styles() );
    }

    /**
     * Register scripts
     *
     * @param  array $scripts
     *
     * @return void
     */
    private function register_scripts( $scripts ) {
        foreach ( $scripts as $handle => $script ) {
            $deps      = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version   = isset( $script['version'] ) ? $script['version'] : BASEPLUGIN_VERSION;

            wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function register_styles( $styles ) {
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, BASEPLUGIN_VERSION );
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts() {
        $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

        $scripts = [
            // 'baseplugin-vendor' => [
            //     'src'       => BASEPLUGIN_ASSETS . '/js/vendor.js',
            //     'version'   => filemtime( BASEPLUGIN_PATH . '/assets/js/vendor.js' ),
            //     'in_footer' => true
            // ],
            // 'baseplugin-frontend' => [
            //     'src'       => BASEPLUGIN_ASSETS . '/js/frontend.js',
            //     'deps'      => [ 'jquery', 'baseplugin-vendor' ],
            //     'version'   => filemtime( BASEPLUGIN_PATH . '/assets/js/frontend.js' ),
            //     'in_footer' => true
            // ],
            'baseplugin-admin' => [
                'src'       => BASEPLUGIN_ASSETS . '/admin.js',
                'deps'      => [ 'jquery' ],
                'version'   => filemtime( BASEPLUGIN_PATH . '/assets/admin.js' ),
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles() {

        $styles = [
            'baseplugin-style' => [
                'src' =>  BASEPLUGIN_ASSETS . '/style.css'
            ],
            // 'baseplugin-frontend' => [
            //     'src' =>  BASEPLUGIN_ASSETS . '/css/frontend.css'
            // ],
            'baseplugin-admin' => [
                'src' =>  BASEPLUGIN_ASSETS . '/admin.css'
            ],
        ];

        return $styles;
    }

}

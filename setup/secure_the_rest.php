<?php

if (!defined('ABSPATH')) {
    exit;
}


// Disable rest API except for custom routes
class Filter_Rest_Api_Endpoints {

    private $my_routes;

    public function __construct( $routes ) {
        $this->my_routes = $routes;
        add_filter( 'rest_endpoints', array( $this, 'run_filter' ) );
    }

    public function run_filter( $endpoints ) {

        foreach ( $endpoints as $route => $endpoint ) {
            $keep_route = false;

            foreach ( $this->my_routes as $my_route ) {

                if ( strpos( $route, $my_route ) !== false ) {
                    $keep_route = true;
                    break;
                }
            }

            if ( !$keep_route ) {
                unset( $endpoints[ $route ] );
            }
        }

        return $endpoints;
    }
}

function hook_my_api_routes_filter() {
    $my_custom_routes = array(
        '/core-vue/',
    );
    new Filter_Rest_Api_Endpoints( $my_custom_routes );
}
add_action( 'rest_api_init', 'hook_my_api_routes_filter' );

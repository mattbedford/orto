<?php

if (!defined('ABSPATH')) {
    exit;
}


// Load custom template for web requests going anywhere matching /shop/
add_filter( 'template_include', 'only_show_vue_template' );
function only_show_vue_template( $original_template ) {
  global $wp;
  $request = explode( '/', $wp->request );
  if ( is_page( 'shop' ) || current( $request ) === "shop" ) {
    return get_stylesheet_directory() . '/setup/shop_template.php';
  }
  return $original_template;
}


// Disable 404 redirects unless pointed at shop. 
// It needs to return "false" on any request APART FROM those aimined at "shop".
add_filter('redirect_canonical', 'disable_404_redirection');
function disable_404_redirection( $redirect_url ) {

    global $wp;

    if ( !strpos( $wp->request, "shop/" ) !== false ) {
        return false;
    }
    
    return $redirect_url;

}

// Makes sure that any request going to /shop/... will respond with a proper 200 http code
add_action( 'init', 'captaincore_rewrites_init' );
function captaincore_rewrites_init(){
    add_rewrite_rule( '^shop/(.+)', 'index.php', 'top' );
}
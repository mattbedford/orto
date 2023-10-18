<?php

if (!defined('ABSPATH')) {
    exit;
}

// Admin shit
add_action('in_admin_header', function () {
    if (!is_admin()) return;
    remove_all_actions('admin_notices');
    remove_all_actions('all_admin_notices');
  }, 1000);
  
  
  // Front end shit
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
  remove_action( 'wp_head', 'rel_canonical' );
  remove_action( 'wp_head', 'feed_links_extra', 3 ); 
  remove_action( 'wp_head', 'feed_links', 2 ); 
  remove_action( 'wp_head', 'index_rel_link' ); 
  remove_action( 'wp_head', 'parent_post_rel_link' ); 
  remove_action( 'wp_head', 'start_post_rel_link' ); 
  remove_action( 'wp_head', 'adjacent_posts_rel_link' );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
  remove_action( 'wp_head', 'wp_generator' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  
  add_filter('wp_enqueue_scripts', 'disable_classic_theme_styles', 100);
  function disable_classic_theme_styles() {
      if(is_admin()) return;
      wp_deregister_style('dashicons');
      wp_dequeue_style('dashicons');
      wp_deregister_style('classic-theme-styles');
      wp_dequeue_style('classic-theme-styles');
      wp_dequeue_style( 'wp-block-library' );
      wp_dequeue_style( 'wp-block-library-theme' );
      wp_dequeue_style( 'wc-block-style' );
      wp_dequeue_style( 'global-styles' ); 
  }
  
  add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
  function remove_jquery_migrate( &$scripts) {
      if(!is_admin())	{
          $scripts->remove( 'jquery');
          add_filter('show_admin_bar', '__return_false');
      }
  }
  
  
  //Remove posts & comments from menu
  function remove_posts_menu() {
      remove_menu_page('edit.php');
      remove_menu_page('edit-comments.php');
  }
  add_action('admin_menu', 'remove_posts_menu');
  
  //Switching off all comments
  add_action('admin_init', function () {
      // Redirect any user trying to access comments page
      global $pagenow;
      
      if ($pagenow === 'edit-comments.php') {
          wp_redirect(admin_url());
          exit;
      }
  
      // Remove comments metabox from dashboard
      remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  
      // Disable support for comments and trackbacks in post types
      foreach (get_post_types() as $post_type) {
          if (post_type_supports($post_type, 'comments')) {
              remove_post_type_support($post_type, 'comments');
              remove_post_type_support($post_type, 'trackbacks');
          }
      }
  });
  
  // Close comments on the front-end
  add_filter('comments_open', '__return_false', 20, 2);
  add_filter('pings_open', '__return_false', 20, 2);
  
  // Hide existing comments
  add_filter('comments_array', '__return_empty_array', 10, 2);
  
  // Remove comments links from admin bar
  add_action('init', function () {
      if (is_admin_bar_showing()) {
          remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
      }
  });
<?php

    #require('vendor/autoload.php');

    function eletromidia_scripts() {
        #wp_enqueue_style('main_css', get_template_directory_uri() . '/css/styles.css', array(), '1.0', false);
        wp_enqueue_script('main_js', get_template_directory_uri() . '/app.js', array(), '1.0', true);
        wp_localize_script('main_js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    }

    add_action('wp_enqueue_scripts', 'eletromidia_scripts');
    add_theme_support( 'post-thumbnails' );

    add_filter('show_admin_bar', '__return_false');

    add_filter( 'use_block_editor_for_post', false);

    add_image_size( 'general-thumb', 640, 360, true );

    #add_action('init', 'my_flush_function');

    function my_flush_function()
    {
        flush_rewrite_rules();
    }

    function get_the_excerpt_max_charlength($charlength, $end = '[...]', $post_id = null) {
        $excerpt = get_the_excerpt($post_id);
        $charlength++;

        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            $output = '';

            if ( $excut < 0 ) {
                $output .= mb_substr( $subex, 0, $excut );
            } else {
                $output .= $subex;
            }

            $output .= $end;
            return $output;

        } else {
            return $excerpt;
        }
    }



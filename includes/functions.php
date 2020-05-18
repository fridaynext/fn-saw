<?php
/**
 * @package FN_Extras
 * @version 1.0
 */
/*
Plugin Name: San Antonio Weddings Functionality
Plugin URI: https://friday-next.com/
Description: This plugin enhances the functionality of the San Antonio Weddings website, without altering the child theme's functions.php file, so it will survive theme updates / changes.
Author: Friday Next
Version: 1.0
Author URI: https://friday-next.com
Text Domain: fn_extras
*/

define( 'FRIDAY_NEXT_EXTRAS_VERSION', '1.0.1' );
add_action( 'after_setup_theme', 'FridayNextExtrasInit', 15 );

function FridayNextExtrasInit() {
    add_action( 'wp_print_styles', 'fn_enqueue_styles' );

}

function fn_enqueue_styles() {
    wp_register_style( 'fn_extra_styles', plugins_url('assets/css/style.css', __FILE__), array(), FRIDAY_NEXT_EXTRAS_VERSION );
    wp_enqueue_style( 'fn_extra_styles' );
    wp_register_style('swiper_style', plugins_url('../node_modules/swiper/css/swiper.css', __FILE__), array(), FRIDAY_NEXT_EXTRAS_VERSION);
    wp_enqueue_style( 'swiper_style' );
    // 'Vendor List' Page Style
    if( get_post_field( 'post_name', get_post() ) == 'vendor-list' ) {
        wp_register_style( 'vendor_list_style', plugins_url('assets/css/vendor-style.css', __FILE__), array(), FRIDAY_NEXT_EXTRAS_VERSION );
        wp_enqueue_style( 'vendor_list_style' );
    }

    // 'Vendor Profile' Styles
    if( get_post_type() == 'vendor_profile' ) {
        wp_register_style( 'vendor_profile_style', plugins_url('assets/css/vendor-profile.css', __FILE__), array(), FRIDAY_NEXT_EXTRAS_VERSION );
        wp_enqueue_style( 'vendor_profile_style' );
        wp_register_script('vendor_profile_script', plugins_url('assets/js/scripts.js', __FILE__), array('jquery'), FRIDAY_NEXT_EXTRAS_VERSION, true);
        wp_enqueue_script('vendor_profile_script');
        wp_register_script('swiper_slider', plugins_url('../node_modules/swiper/js/swiper.js', __FILE__));
        wp_enqueue_script('swiper_slider');
    }

}

/* Create Vendor User Role */
add_role(
    'vendor', //  System name of the role.
    __( 'Vendor'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => true,
        'delete_published_posts' => true,
        'edit_posts'   => true,
        'publish_posts' => true,
        'upload_files'  => true,
        'edit_pages'  => true,
        'edit_published_pages'  =>  true,
        'publish_pages'  => true,
        'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
    )
);

add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
function mytheme_et_project_posttype_args( $args ) {
    return array_merge( $args, array(
        'public'              => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'show_in_nav_menus'   => false,
        'show_ui'             => false
    ));
}

// ***** Add Vendor Column to Special Offers CPT Page ******
add_filter( 'manage_special_offers_posts_columns', 'set_custom_edit_special_offers_columns' );
function set_custom_edit_special_offers_columns($columns) {
    // Add expiration date, Vendor to columns
    $columns['vendor'] = __( 'Vendor', 'fn_extras' );
    $columns['expiration'] = __( 'Expires', 'fn_extras' );

    return $columns;
}

// ***** Get text for Vendor and Expires date columns *****
add_action( 'manage_special_offers_posts_custom_column' , 'special_offers_columns', 10, 2 );
function special_offers_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'vendor':
            $vendor_profile_obj = get_field('vendor', $post_id);
            $vendor_name = get_the_title($vendor_profile_obj);
            if ( is_string( $vendor_name ) ) {
                echo '<a href="' . get_edit_post_link($vendor_profile_obj) . '">' . $vendor_name . '</a>';
            } else {
                echo "No Vendor Selected";
            }
            break;
        case 'expiration':
            $offer_exp = get_field("offer_end_date");
            if( $offer_exp == null ) {
                echo "Permanent";
            } else {
                echo $offer_exp;
            }
            break;
    }
}

// ****** Make the columns sortable ****** //
add_filter('manage_edit-special_offers_sortable_columns', 'saw_sortable_offers');
function saw_sortable_offers( $columns ) {
    $columns['vendor'] = 'vendor';
    return $columns;
}

add_action('pre_get_posts', 'special_offers_orderby');
function special_offers_orderby($query) {
    if( !is_admin() ) {
        return;
    }
    $orderby = $query->get('orderby');
    if( 'vendor' == $orderby ) {
        $query->set('meta_key', 'vendor');
        $query->set('orderby', 'meta_value');
    }
}

// Add custom meta box with Special Offer items in Vendor profile
add_action( 'add_meta_boxes_vendor_profile', 'add_special_offers_box' );
function add_special_offers_box( $post ) {

    add_meta_box( 'special-offer-box', 'Special Offers', 'special_offer_format', 'vendor_profile', 'side', 'default' );


}

function special_offer_format( $post, $args ) {
    $vendor_id = $post->ID;

    // store matching vendor
    $matching_offers = array();

    // go find all special offers with this vendor as their matching vendor
    $args = array(
        'post_type' => 'special_offers',
        'posts_per_page' => -1
    );
    $all_offers = get_posts($args);
    foreach( $all_offers as $offer ) {
        $this_offer_id = $offer->ID;
        // get custom field with Vendor from Special Offers CPT
        $this_vendor = get_field("vendor", $offer->ID);
        if( $this_vendor->ID == $vendor_id ) {
            $matching_offers[] = $this_offer_id;
        }
    }
    echo '<p class="special-offers" style="line-height:2.3em;">';

    if( !empty( $matching_offers ) ) {

        // Loop through the Special Offers, and print out links to them
        foreach( $matching_offers as $offer_id ) {
            echo '<a href="' . get_edit_post_link($offer_id) . '" target="_blank">' . get_the_title($offer_id) . '</a><br>';
        }
    }
}

// TODO: Change this to be for the profile page
add_filter('single_template', 'vendor_profile_template');
function vendor_profile_template( $single_template ) {
    global $post;
    if( $post->post_type == 'vendor_profile' ) {
        if( file_exists( plugin_dir_path(__FILE__) . 'templates/single-vendor_profile.php')) {
            return plugin_dir_path(__FILE__) . 'templates/single-vendor_profile.php';
        }
    }
    return $single_template;
}

// Could use this to populate archive pages - will see!
// [vendors]
function vendors_func( $atts ) {
    // Get all vendors and list here
    //  Get a count, divide by four, and use count(vendors) / 4, per column
    // $vendor_args = array(
// 		'post_type'			=> 'vendor',
// 		'posts_per_page'	=> -1,
// 		'post_status'		=> 'publish',
// 		'orderby'			=> 'title'
// 	);
// 	$vendors = query_posts( $vendor_args );
//
// 	$num_vendors = count( $vendors );
// 	$num_per_column = float;
// 	$num_per_column = $num_vendors / 4;
// 	$num_per_column = round( $num_per_column );
//
// 	// Print Info
// 	$vendor_html = '<div class="wf-column><ul>';
// 	foreach ($vendors as $key => $vendor) {
// 		$website = get_field( 'website', $vendor->ID );
// 		$phone_number = get_field( 'phone_number', $vendor->ID );
//
// 		$vendor_html .= '<li><a href="' . $website . '" target="_blank">' . $vendor->post_title . '</a>
// 		' . $phone_number . '</li>';
// 		if( ($num_vendors % $num_per_column == 0) && ($num_vendors / $num_per_column !== 4) ) {
// 			$vendor_html .= '</ul></div><div class="wf-column"><ul>';
// 		}
// 	}
// 	$vendor_html .= '</ul></div>';
// 	return $vendor_html;
}
// add_shortcode( 'vendors', 'vendors_func' );
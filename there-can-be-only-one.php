<?php
/**
	Plugin Name: There Can Be Only One
	Plugin URI: http://www.silverspider.com/there-can-be-only-one-sticky-post/ 
	Description: Ensures that there is only one sticky post published to the site. When a new sticky post is published, the previous sticky flag is removed from any and all other published posts, so they will no longer appear at the top of your page. Future posts with the sticky flag will not be modified.
	Version: 0.9
	Author: Alex Jones
	Author URI: http://www.silverspider.com
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	
    Copyright 2015  Alex Jones  (email : only-one@alexjones.us)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'draft_to_publish', 'only_one_sticky' );
add_action( 'future_to_publish', 'only_one_sticky' );
add_action( 'new_to_publish', 'only_one_sticky' );

function only_one_sticky( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
	if ( ! wp_is_post_revision( $post_id ) ) {
		$post_id = $post_id->ID;
	}
    $sticky = ( isset( $_POST['sticky'] ) && $_POST['sticky'] == 'sticky' ) || is_sticky( $post_id );
    if( $sticky ) {
        $sticky_posts = array();
        $sticky_posts_list = get_option( 'sticky_posts', array() );

		// The Post IDs are stored in the options table as a single list, so we need to construct a new list with the future posts, plus the newly-published sticky post.
	    $new_sticky_posts_list = array();
	    foreach ($sticky_posts_list as $sticky_post) {
		    $postStatus =  get_post_status ( $sticky_post );
		    if ( get_post_status ( $sticky_post ) != 'publish' || $sticky_post == $post_id ) {
				array_push( $new_sticky_posts_list, $sticky_post );
			}
	    }
        update_option( 'sticky_posts', $new_sticky_posts_list );
    }
}
?>
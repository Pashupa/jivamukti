<?php

	/*
	Template Name: Hauptmenü Umleitung auf ersten Unterpunkt
	*/

	if ( have_posts() ) {

		while ( have_posts() ) {

			the_post();

			// MENU TREE {

				$locations = get_nav_menu_locations();

				if ( isset( $locations['menu-main'] ) ) {

					$menu = wp_get_nav_menu_object( $locations['menu-main'] );
					$menu_items = wp_get_nav_menu_items( $menu->term_id );
					$curr_menu_id = false;
					$target_post_id = false;

					foreach ( $menu_items as $key => $item ) {

						if ( $item->object_id == $post->ID ) {

							$curr_menu_id = $item->ID;
						}

						if ( $curr_menu_id AND $item->menu_item_parent == $curr_menu_id ) {

							$target_post_id = $item->object_id;
							wp_redirect( get_permalink( $target_post_id ), 302 );
							exit;
						}
					}
				}

			// }

			// FALLBACK PAGE TREE {

				$pagekids = get_pages( array(
					'child_of' => get_the_ID(),
					'sort_column' => 'menu_order',
				) );

				$firstchild = $pagekids[0];

				if ( $firstchild ) {

					wp_redirect( get_permalink( $firstchild->ID ), 302 );
					exit;
				}

			// }

			// FALLBACK HOME {

				wp_redirect( home_url() );
				exit;

			// }

		}
	}

?>
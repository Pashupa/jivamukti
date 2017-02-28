<?php

	/**
	 * WordPress functions.php
	 * @autor: mail@johannheyne.de (Johann Heyne)
	 */

	// DATA {

		require_once( 'modules/data/countries.php' );

	// }

	// GOOGLEMAP {

		require_once( 'modules/googlemaps/functions.php' );

	// }

	// SAVE POSTS ACF content FIELD TO post_content {

		add_filter( 'acf/update_value', function( $value, $post_id, $field ) {

			// field 'content'
			if ( isset( $_POST['acf']['field_584953b84fe52'] ) ) {

				$content = $_POST['acf']['field_584953b84fe52'];

		        wp_update_post( array(
		            'ID' => $post_id,
		            'post_content' => $content
		        ) );
		    }

		    return $value;

		}, 10, 3 );

	// }

	// FIX CATEGORIES HIRARCHICAL LISTING {

		add_filter( 'wp_terms_checklist_args', function( $args, $post_id ) {

			if ( isset( $args['taxonomy'] ) ) {

	 			$args['checked_ontop'] = false;
			}

	   		return $args;

		}, 10, 2 );

	// }
	
//check if role exist before removing it
if( get_role('client') ){
      remove_role( 'client' );
}


	// USER LOGIN DISABLED ACTION {

		add_action( 'wp_login', function( $user_login, $user = null ) {

			if ( ! $user ) {

				$user = get_user_by( 'login', $user_login );
			}

			if ( ! $user ) {

				// not logged in - definitely not disabled
				return;
			}

			// Get user meta

			$disabled = get_field( 'login_disabled', 'user_' . $user->ID );

			// Is the use logging in disabled?
			if ( $disabled == '1' ) {

				// Clear cookies, a.k.a log user out
				wp_clear_auth_cookie();

				// Build login URL and then redirect
				$login_url = site_url( 'wp-login.php', 'login' );
				$login_url = add_query_arg( 'disabled', '1', $login_url );
				wp_redirect( $login_url );

				exit;
			}

		}, 10, 2 );

	// }

	// SEARCH {

		require_once( 'modules/templates/search/function.php' );

	// }

	// ACF FLEXIBLE CONTENT {

		require_once( 'modules/acf-flex-content.php' );

	// }

	// WIDGETS {

		require_once( 'modules/widgets/search/functions.php' );
		require_once( 'modules/widgets/resent-posts/functions.php' );
		require_once( 'modules/widgets/event-menu-years/functions.php' );
		require_once( 'modules/bricks/newsletter/functions.php' );
		require_once( 'modules/segments/footer/functions.php' );

	// }

	// MAILCHIMP {

		require_once( 'modules/mailchimp/functions.php' );

	// }

	// TRAINERS {

		require_once( 'modules/trainers/functions.php' );

	// }

	// BRICK SHOP {

		require_once( 'modules/bricks/shop/functions.php' );

	// }

	// ACF CUSTOM WYSIWYG TOOLBARS {

		add_filter( 'acf/fields/wysiwyg/toolbars' , function ( $toolbars ) {

			// Source: http://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/

			$toolbars['editor'] = array();
			$toolbars['editor'][1] = array( 'formatselect', 'blockquote', 'bullist', 'numlist', 'link', 'unlink', 'strikethrough', 'bold', 'italic', 'removeformat', 'pastetext', 'fullscreen' );

			$toolbars['text_teaser'] = array();
			$toolbars['text_teaser'][1] = array( 'bold', 'link', 'unlink', 'removeformat', 'pastetext' );

			$toolbars['img_subtext'] = array();
			$toolbars['img_subtext'][1] = array( 'bold', 'italic', 'link', 'unlink', 'removeformat', 'pastetext' );

			$toolbars['title'] = array();
			$toolbars['title'][1] = array( 'bold', 'removeformat', 'pastetext' );

			$toolbars['shopify'] = array();
			$toolbars['shopify'][1] = array( 'pastetext' );

			return $toolbars;
		} );

	// }

	// FON LINK FILTER {

		function filter_tel_for_href( $tel ) {

			return 'tel:' . strtr( $tel, array (
				' ' => '',
				'.' => '',
				'-' => '',
				'+490' => '+49', 
				'(0)' => '', 
			) );
		}

	// }

	// CONTEXTURAL HELP {

		add_action( 'current_screen', function() {

			//global $current_screen;

			$screen = get_current_screen();
			//error_log( print_r( $screen, true) );

			if ( $screen->id == 'acf-field-group' AND $screen->action == 'add' ) {

				//$screen->remove_help_tabs();

				$screen->add_help_tab( array(
					'id'       => 'acf-add',
					'title'    => __( 'General' ),
					'content'  => '<ol>
						<li>Set "Settings > Active" to "No"</li>
						<li>Set "Settings > Order No." to "1", to prevent changing 0 on main groups that is needed for setting "Hide on screen" to work.</li>
					</ol>',
				));

				//$screen->set_help_sidebar(
				//	'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
				//	'<p><a href="http://wordpress.org/support/" target="_blank">' . _( 'Support Forums' ) . '</a></p>'
				//);
			}

		} );

	// }

	// CONTACTFORM 7 {

		require_once( 'modules/forms/contactform-7/functions.php' );

	// }

	// EVENTS {

		require_once( 'modules/events/functions.php' );

	// }

?>
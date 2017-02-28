<?php

	require_once('config/config.php');

	// DOCTYPE {

		echo '<!DOCTYPE html>' . "\n";

	// }

	// HTML TAG BEGIN ( Version 2 ) {

		$html_class = ' ' . config_get_site_type() . ' ' . config_get_curr_site_id();
		$html_lang = config_get_curr_site_lang();

		echo '<!--[if lt IE 8]><html lang="' . $html_lang . '" class="lang-' . $html_lang . ' no-js ie outdated' . $html_class . '"> <![endif]-->' . "\n";
		echo '<!--[if IE 8]><html lang="' . $html_lang . '" class="lang-' . $html_lang . ' no-js ie ie8' . $html_class . '"> <![endif]-->' . "\n";
		echo '<!--[if IE 9]><html lang="' . $html_lang . '" class="lang-' . $html_lang . ' no-js ie ie9' . $html_class . '"> <![endif]-->' . "\n";
		echo '<!--[if gt IE 9]><!--><html lang="' . $html_lang . '" class="lang-' . $html_lang . ' no-js' . $html_class . '"> <!--<![endif]-->' . "\n";

	// }

	// HEAD TAG BEGIN {

		echo '<head>' . "\n";
		echo "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKPW5FR');</script>
<!-- End Google Tag Manager -->" . "\n";
	// }

	// CHARSET {

		echo '<meta charset="utf-8"/>' . "\n";

	// }

	// TITLE {

		tool( array(
			'name' => 'tool_meta_title'
		) );

	// }

	// ADAPTIVE IMAGES COOKIE {

		echo '<script>document.cookie=\'resolution=\'+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+\'; path=/\';</script>' . "\n";

	// }

	// FAVICONS {

		// use the theme customizer

	// }

	// METAS {

		// VIEWPORT {

			echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>' . "\n";

		// }

		// ROBOTS {

			echo '<meta name="robots" content="index, follow"/>' . "\n";

		// }

		// AUTOR {

			if ( function_exists( 'get_field' ) ) {

				$opt_site_author_global = get_field( 'opt_site_author_global' . THEME_LANG_SUFIX, 'options' );
			}

			if ( isset( $opt_site_author_global ) && $opt_site_author_global ) {

				echo '<meta name="author" content="' . $opt_site_author_global . '"/>' . "\n";
			}

		// }

		// DESCRIPTION {

			tool( array(
				'name' => 'tool_meta_description',
			) );

		// }

	// }

	// RSS FEEDS {

		// echo '<link rel="alternate" type="application/rss+xml" title="" href="' . bloginfo('rdf_url') . '"/>' . "\n";

	// }

	// WP STYLES & SCRIPTS {

		add_action( 'wp_enqueue_scripts', function() {

			// MINIFICATION {

				// minifing a style and runing autoprefixer in grunt breaks the source map
				// thats why deliver minified sources only in live enviroments

				if ( config_get_site_type() === 'live' ) {

					$min = '.min';
				}
				else {

					$min = '';
				}

			// }

			// MODERNIZR {

				// wp_enqueue_script( 'modernizr_script', get_bloginfo('template_url') . '/js/include/modernizr.js', array(), config_get_theme_version() );

			// }

			// CUSTOM JQUERY VERSION FOR FRONTEND {

				/* use the latest jQuery version on frontend */

				if ( ! is_admin() ) {

					wp_deregister_script( 'jquery' );
					wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, 'latest', false );
					wp_enqueue_script( 'jquery' );
				}
				
				/**/

			// }

			// THEME STYLES AND SCRIPTS {

				wp_enqueue_style( 'theme_style', get_bloginfo( 'template_url' ) . '/css/main' . $min . '.css', array(), config_get_theme_version(), 'all' );
				wp_enqueue_style( 'theme_print_style', get_bloginfo( 'template_url' ) . '/css/print' . $min . '.css', array( 'theme_style' ), config_get_theme_version(), 'print' );
				wp_enqueue_script( 'theme_script', get_bloginfo( 'template_url' ) . '/js/main' . $min . '.js', array( 'jquery' ), config_get_theme_version() );

				// CUSTOM
				//wp_enqueue_style( 'a_style', plugins_url('template_url') . '/wordpress-toolset/style.js', array(), config_get_theme_version() );
				//wp_enqueue_script( 'a_script', plugins_url('template_url') . '/wordpress-toolset/script.js', array('jquery'), config_get_theme_version() );

				wp_enqueue_style( 'fontawesome_style', 'https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css', array(), config_get_theme_version() );

			// }

			// WORPDRESS LOCALIZED JS VARS {

				/**/

				wp_localize_script( 'theme_script', 'wpAjax', array( 
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					//'nonce' => wp_create_nonce( 'app-nonce' ),
				) );

				wp_localize_script( 'theme_script', 'wpTemplateUrlRel', config_get_template_url_rel() );

				wp_localize_script( 'theme_script', 'siteData', array( 
					'type' => config_get_site_type(),
					'toolsetUrl' => plugins_url() . '/wordpress-toolset/',
				) );

				/**/

			// }

		} );

	// }

	// WP HEAD {

		wp_head();

	// }

	// IE9 FIX {

		echo '<!--[if lt IE 9]>';
			echo '<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>';
		echo '<![endif]-->' . "\n";

	// }

	// HEAD TAG END {

		echo '</head>' . "\n";

	// }

	// BODY {

		// CLASSES {

			$classes = get_body_class();

		// }

		echo '<body class="' . implode( ' ', $classes ) . '">';
		echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKPW5FR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';

			// MESSAGES {

				tool( array(
				    'name' => 'tool_javascript_recomended',
				) );

				tool( array(
				    'name' => 'tool_browser_outdated',
				) );

			// }

			// HELPERS {

				//tool( array(
				//	'name' => 'tool_wp_nonce',
				//) );

			// }

			// WRAPPER {

				echo '<div class="segment-wrap">';

			// }

			// HEADER {

				echo '<header class="header segment do-not-print">';
					echo '<div class="segment-page">';
						echo '<div class="segment-inner trim">';

								// MAIN MENU {

									include( 'modules/menus/main/template.php' );

								// }

								// HEADER LOGO {

									$img_id = get_field( 'opt_logo', 'option' );

									echo get_adaptive_image( array(
										'name' => 'header_logo', 
										'id' => $img_id, 
										'link_url' => get_bloginfo( 'url' ),
										'link_class' => 'header-title-logo',
										'link_title' => 'Back to Hompage',
										'img_class' => 'header-title-logo-img',
										'img_class_resp' => ''
									) );

								// }

						echo '</div>';
					echo '</div>';
				echo '</header>';

			// }

	// }

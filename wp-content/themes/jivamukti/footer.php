<?php

		include( 'modules/segments/footer/template.php' );
			
		echo '</div>'; // WRAP END

		wp_footer();
		
		if ( config_get_site_type() === 'local' ) {

			echo '<script src="http://127.0.0.1:35729/livereload.js?ext=Chrome&amp;extver=2.0.9"></script>';
		}

	echo '</body>';
echo '</html>';
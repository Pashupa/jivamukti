<?php

	get_header();

	get_template_part( 'modules/segments/body/template', 'open' );

		get_template_part( 'modules/segments/main/template', 'open' );

			get_template_part( 'modules/events/template', 'single' );

		get_template_part( 'modules/segments/main/template', 'close' );

		// get_sidebar( 'default' );

	get_template_part( 'modules/segments/body/template', 'close' );

	get_footer();

?>
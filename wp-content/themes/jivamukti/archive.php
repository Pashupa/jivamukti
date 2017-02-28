<?php

	get_header();

	get_template_part( 'modules/segments/body/template', 'open' );

		get_template_part( 'modules/segments/main/template', 'open' );

			get_template_part( 'modules/templates/archive/template', 'default' );

		get_template_part( 'modules/segments/main/template', 'close' );

		get_sidebar( 'blog-archive' );

	get_template_part( 'modules/segments/body/template', 'close' );

	get_footer();

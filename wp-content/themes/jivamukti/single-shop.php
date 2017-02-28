<?php

	get_header();

	get_template_part( 'modules/segments/body/template', 'open' );

		get_template_part( 'modules/segments/main/template', 'open' );

			get_template_part( 'modules/bricks/shop/template', 'single' );

		get_template_part( 'modules/segments/main/template', 'close' );

		get_sidebar( 'shop' );

	get_template_part( 'modules/segments/body/template', 'close' );

	get_footer(); 

?>

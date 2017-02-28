<?php

	get_template_part( 'modules/segments/aside/template', 'open' );

		echo '<h1>Sidebar</h1>';

		echo '<ul class="layout-list side">';

			dynamic_sidebar( 'shop' );

		echo '</ul>';

	get_template_part( 'modules/segments/aside/template', 'close' );
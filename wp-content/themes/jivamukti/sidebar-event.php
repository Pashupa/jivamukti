<?php

	get_template_part( 'modules/segments/aside/template', 'open' );

		echo '<h1>Sidebar</h1>';

		echo '<ul class="layout-list top">';

			dynamic_sidebar( 'event' );

		echo '</ul>';

	get_template_part( 'modules/segments/aside/template', 'close' );
<?php

	/*
	Template Name: Transfer Certifications
	*/
	
	// SCRIPT {
		
		echo '<a href="/transfer-certifications/?index=1">Start</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<a href="/transfer-certifications/">Stop</a>';
		
		if ( ! empty( $_GET['index'] ) ) {

			echo '<p>' . $_GET['index'] . '</p>';

			// SCRIPT {

				/*$results = get_posts(array(
					'numberposts' => 1,
					'post_status' => 'publish',
					'post_type' => 'post',
					'orderby' => 'post_date',
					'order' => 'DESC',
					'category_name' => 'certification',
					'offset' => $_GET['index'],
				));
				
				if ( count( $results ) > 0 ) {
					
					echo '<p>' . $results[0]->post_title . '</p>';

					$cerfificate_id = get_post_meta( $results[0]->ID, 'Certificate ID', true );
					$cerfificate_type = get_post_meta( $results[0]->ID, 'Certification type', true );

					echo '<p>ID: ' . $cerfificate_id . '</p>';
					echo '<p>Type: ' . $cerfificate_type . '</p>';

					$fields = get_post_meta( $results[0]->ID );

					echo '<pre>' . print_r( $fields, true) . '</pre>';
					
					$_GET['index']++;
				}
				else {
					
					echo '<meta http-equiv="refresh" content="1; URL=/transfer-certifications/">';
					die();
				}*/
				
				$args = array(
					'blog_id'      => 1,
					'offset'       => $_GET['index'],
					'number'       => '1',
					'fields'       => 'all',
				 ); 
				
				$user = get_users( $args );
				
				echo '<pre>' . print_r( $user, true) . '</pre>';
				
				if ( $user ) {
					
					echo '<p>' . $user[0]->display_name . ' / ' . $user[0]->user_email . '</p>';
					
					
					$posts = get_posts(array(
						'numberposts' => -1,
						//'post_status' => 'publish',
						'post_type' => 'post',
						'category_name' => 'certification',
						'orderby' => 'post_date',
						'order' => 'ASC',
						'meta_query' => array(
							'relation' => 'OR',
							array(
								'key' => 'Certificate ID',
								'value' => $user[0]->user_email,
								'compare' => 'LIKE'
							),
							array(
								'key' => 'Certificate Title',
								'value' => $user[0]->display_name,
								'compare' => 'LIKE'
							),
							array(
								'key' => 'Certificate Title',
								'value' => $user[0]->display_name,
								'compare' => 'LIKE'
							),
							array(
								'key' => 'Certification Legacy Title ',
								'value' => $user[0]->display_name,
								'compare' => 'LIKE'
							)
						),
						
						
					));

					if ( count( $posts ) > 0 ) {
						
						foreach ( $posts as $key => $item ) {
							
							$certification_type = get_post_meta( $item->ID, 'Certification type', true  );
							
							//echo '<p>' . $item->ID . ': ' . $item->post_title  . '</p>';
							echo '<p>' . $certification_type  . '</p>';
							
							echo '<pre>' . print_r( get_post_meta( $item->ID ), true) . '</pre>';
						}
					}

					$_GET['index']++;
				}
				else {
					
					echo '<meta http-equiv="refresh" content="1; URL=/transfer-certifications/">';
					die();
				}
				
			// }
			
			echo '<meta http-equiv="refresh" content="6; URL=/transfer-certifications/?index=' . $_GET['index'] . '">';
		}

	// }

?>
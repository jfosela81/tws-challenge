<?php
/**
 * Template Name: Page with team list
 */

get_header(); 

if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		if ( ! get_transient( 'team-list' ) ) {

			$api_endpoint = 'https://delivery.oddsandstats.co/team_list/NFL.JSON?api_key=74db8efa2a6db279393b433d97c2bc843f8e32b0';

			$data = wp_remote_retrieve_body( wp_remote_get( $api_endpoint ) ) ;
			
			set_transient( 'team-list', $data, DAY_IN_SECONDS );
		}

		// Register the script
		wp_register_script( 
			'build-table', 
			get_stylesheet_directory_uri() . '/assets/js/build-table.js', 
			array( 'jquery' ), 
			false, 
			true
		);
		
		// Localize the script with new data
		$data_array = json_decode( get_transient( 'team-list' ), true );
		wp_localize_script( 'build-table', 'data_json', $data_array );
		
		// Enqueued script with localized data.
		wp_enqueue_script( 'build-table' );

		if ( has_post_thumbnail() ) {

			?>
			<header class="page-header" 
				style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
			</header>
			<?php

		}

		?>
		<section>

			<div class="row">

			<?php the_title( '<h1>', '</h1>' ); ?>

			</div> <!-- .row -->

		</section>

		<?php

		get_template_part( 'partials/teams-table' );

		?>

		<section class="section">
			
			<div class="row">

				<?php
					the_content();
				?>

			</div> <!-- .row -->

		</section> <!-- .section -->
		<?php

	}

}

get_footer();

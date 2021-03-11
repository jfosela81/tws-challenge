<?php
/**
 * Partial template for displaying teams from API
 */

$array_divisions = array(
	'all' => __( 'All divisions', 'acmesports' ),
	'North' => __( 'North', 'acmesports' ),
	'South' => __( 'South', 'acmesports' ),
	'East' => __( 'East', 'acmesports' ),
	'West' => __( 'West', 'acmesports' ),
);

$array_conferences = array(
	'all' => __( 'All conferences', 'acmesports' ),
	'National Football Conference' => __( 'National', 'acmesports' ),
	'American Football Conference' => __( 'American', 'acmesports' ),
);

?>
		<div class="table-wrap">
			<div class="table-filters">

				<div class="single-filter">
					<span><?php echo __( 'Division:', 'acmesports' ) ?></span>
					<select name="filter-division" class="select-division">

					<?php

						foreach ( $array_divisions as $key => $value ) {
							?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php
						}

					?>

					</select>
				</div> <!-- .single-filter -->

				<div class="single-filter">
					<span><?php echo __( 'Conference:', 'acmesports' ) ?></span>
					<select name="filter-conference" class="select-conference">
					<?php

					foreach ( $array_conferences as $key => $value ) {
						?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php
					}

					?>
					</select>
				</div> <!-- .single-filter -->

				<button class="button button-primary filter_button" type="button">
					<i class="fas fa-filter"></i>
					<?php echo __( 'Filter', 'acmesports' ); ?>
				</button>

				<div class="single-filter">
					<input type="search" 
						placeholder="<?php echo __( 'Filter by name/nickname...', 'acmesports' ) ?>" 
						class="filter-by-name"
					/>
				</div> <!-- .single-filter -->

			</div> <!-- .table-filters -->

			<table class="table-list">
				<thead>
					<th class="orderby" data-orderby="name" data-order="asc">
						<?php echo __( 'Name', 'acmesport' ); ?>
						<i></i>
					</th>
					<th class="orderby" data-orderby="nickname" data-order="asc">
						<?php echo __( 'Nickname', 'acmesport' ); ?>
						<i></i>
					</th>
					<th>
						<?php echo __( 'Division', 'acmesport' ); ?>
					</th>
					<th>
						<?php echo __( 'Conference', 'acmesport' ); ?>
					</th>
				</thead>
				<tbody></tbody>
			</table> <!-- .table-list -->
		</div> <!-- .table-wrap -->
const render_list = data => {

	let html_table_body = '';

	data.forEach( element => {
		html_table_body += `<tr>`;
		html_table_body += `<td>${element.name}</td>`;
		html_table_body += `<td>${element.nickname}</td>`;
		html_table_body += `<td>${element.division}</td>`;
		html_table_body += `<td>${element.conference}</td>`;
		html_table_body += `</tr>`;
	});

	jQuery( '.table-list tbody' ).html( html_table_body );

}

jQuery(document).ready( function( $ ) {

	const teams = data_json.results.data.team;
	let teams_filtered = teams;

	render_list( teams_filtered );

	/**
	 * Order by Name and Nickname
	 */
	$( '.orderby' ).click( function( e ) {
		e.preventDefault();

		const orderby = $( this ).data( 'orderby' );
		const order = $( this ).data( 'order' );

		$( '.orderby i' ).removeClass();

		if ( 'asc' === order ) {
			// Set to DESC for next time
			$( this ).data( 'order', 'desc' );
			$( 'i', this ).addClass( 'fas fa-caret-down' );
		} else {
			// Set to ASC for next time
			$( this ).data( 'order', 'asc' );
			$( 'i', this ).addClass( 'fas fa-caret-up' );
		}
		
		teams_filtered.sort( function( a, b ){
			const x = a[orderby];
			const y = b[orderby];

			if ( 'asc' === order ) {
				if ( x < y ) { return -1; }
				if ( x > y ) { return 1; }
				return 0;	
			} else {
				if ( x > y ) { return -1; }
				if ( x < y ) { return 1; }
				return 0;	
			}
		});

		render_list( teams_filtered );

	});

	/**
	 * Filtering
	 */
	$( '.filter_button' ).click( function( e ){

		const division_value = $( '.select-division' ).val();
		const conference_value = $( '.select-conference' ).val();

		teams_filtered = teams.filter( el => {

			if ( division_value !== 'all' && conference_value !== 'all' ) {
				return el.division === division_value && el.conference === conference_value;
			}
			if ( division_value !== 'all' ) {
				return el.division === division_value;
			}
			if ( conference_value !== 'all' ) {
				return el.conference === conference_value;
			}
			return true;

		});

		render_list( teams_filtered );

	});

	/**
	 * Filtering by name
	 */
	$( '.filter-by-name' ).keyup( function(e){

		// Reset filters
		$( '.select-division' ).val( 'all' );
		$( '.select-conference' ).val( 'all' );

		const search_term = $( this ).val().toLowerCase();

		const result = teams.filter( el => 
			el.name.toLowerCase().indexOf( search_term ) >= 0 || 
			el.nickname.toLowerCase().indexOf( search_term ) >= 0
		);

		render_list( result );

	});

	$( '.filter-by-name' ).on( 'search', function( e ){
		// User click on X to clear the search field
		$( this ).keyup();
	});

});
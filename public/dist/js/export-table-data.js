/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'excel', 'pdf', 'print'
		]
	} );
} );
/*
	@ Harris Christiansen (Harris@HarrisChristiansen.com)
	2016-09-18
	Project: HTML5 Boilerplate
*/


$(document).ready(function() { 
	$(".sortable").tablesorter();

	$('.validate').bValidator();

	$(".datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
	});

	$("#alert").click(function(evt) {
		displayMessage("Example alert!");
	});
});

function displayMessage(msg, isFailure=false) {
	if (isFailure) {
		$('<div class="alert alert-danger" role="alert">'+msg+"</div>").appendTo('#msgs').delay(2200).slideUp(300);
	} else {
		$('<div class="alert alert-success" role="alert">'+msg+"</div>").appendTo('#msgs').delay(2200).slideUp(300);
	}
}
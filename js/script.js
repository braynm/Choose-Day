var baseUrl = "";
var slideTime = 200;
var coins = 10;
	

$(function () {

	$('[data-toggle="tooltip"]').tooltip();
	$('.checkout-form').on('submit', function() {
		return false;
	});


	// slide down
	// manipulate data!
	$('.img-holder').on('click', function() {		
		$(this).siblings('.selected').slideDown(slideTime, function() {
			coins--;
			updateTextCoins();
		});
	});

	// slide up
	$('.selected').on('click', function() {
		$(this).slideUp(slideTime, function() {
			coins++;
			updateTextCoins();
		});
	});
});

function updateTextCoins() {
	$('.coins').text(coins);
}


function serialize() {

}
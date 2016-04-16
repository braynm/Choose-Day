var slideTime = 200;
var coins = 10;
var ids = [];
var maxItem = 5;
var itemCounter = 0;

var courierCounter = 0;
	
$(function () {

	$('.up-container').hide();
	$('.couriers-container').hide();
	$('[data-toggle="tooltip"]').tooltip();

	// get three couriers
	$('.checkout-form').on('submit', function() {
		$(this).attr('disabled', true).addClass('disabled');
		if (ids.length < 1) {
			alert("You didn't select any items.");
			return false;
		}

		getCouriers(ArrToString()).then(function(r) {
			$('.checkout-form').attr('disabled', false).removeClass('disabled');
			console.log(r);
			r.forEach(function(v, i) {
				$($('.courier-item')[i]).find('.selected').attr('data-id', v.id);
				$($('.courier-item')[i]).find('.img-holder').attr('data-id', v.id);
				$($('.courier-item')[i]).find('.panel-footer').text(v.name);
				$($('.courier-item')[i]).find('.panel-footer').attr("title", v.description).attr("data-original-title", v.description);
			});

			$('.couriers-container').show();
			$('html, body').animate({
		        scrollTop: $(".checkout-form").offset().top + 100
		    }, 2000);
		});

		return false;
	});


	// slide down
	// manipulate data!
	$('.img-holder').on('click', function() {

		if (itemCounter < maxItem) {
			var id = $(this).attr('data-id');

			if ($.inArray(id, ids) === -1) {
				ids.push(id);
			}

			$(this).siblings('.selected').stop().slideDown(slideTime, function() {
				coins--;
				updateTextCoins();
			});

			itemCounter++;
		} else {
			alert("ALREADY REACHED MAXIMUM.");
		}
	});

	// slide up
	$('.selected').on('click', function() {

		var id = $(this).attr('data-id');
		var index = $.inArray(id, ids);

		if (index !== -1) {
			// found
			// splice it!
			ids.splice(index, 1);
		}


		$(this).stop().slideUp(slideTime, function() {
			coins++;
			updateTextCoins();
		});

		itemCounter--;
	});

	// scroll top
	$('.up-btn').on('click', function() {
		$('html, body').animate({ scrollTop: 0}, "slow");
		return false;	
	});

	$(window).on('scroll', function(e) {
		var top  = window.pageYOffset || document.documentElement.scrollTop;
		if (top >= 300) {
			$('.up-container').stop().show(500);
		} else {
			$('.up-container').stop().hide(500);			
		}
	});
});

function getCouriers(data) {
	return $.ajax({
		url: apiUrl + "pres/get-couriers",
		type: "POST",
		data: data,
		dataType: "JSON",
		headers: {
			"Content-Type": "application/json"
		}
	});
}

function ArrToString() {
	var s = "[";
	ids.forEach(function(v, i) {
		s += v;
		if (i < (ids.length-1)) {
			s += ",";
		}
	});
	s += "]";
	return s;
}

function updateTextCoins() {
	$('.coins').text(coins);
}
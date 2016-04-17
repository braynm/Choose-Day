
var slideTime = 200;  // slide time
var coins = 5; // default value of total coins
var ids = []; // storage of items
var maxItem = 5; // total max items
var itemCounter = 0; // item counter

	
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

				var descArr = v.description.split("|");
				var standArr = v.stand.split("|");

				criticizedForTxt = "";
				standTxt = "";
				descArr.forEach(function(item, j) {

					criticizedForTxt += item;
					criticizedForTxt += "\n";
					
				});

				standArr.forEach(function(item, j) {

					standTxt += item;
					standTxt += "\n";
					
				});

				$($('.courier-item')[i]).find('.courier-name').text(v.name);
				$($('.courier-item')[i]).find('.courier-img').attr('data-id', v.id);
				$($('.courier-item')[i]).find('.panel-footer .criticized-for').parent().attr("title", criticizedForTxt).attr("data-original-title", criticizedForTxt);

				$($('.courier-item')[i]).find('.panel-footer .stand').parent().attr("title", standTxt).attr("data-original-title", standTxt);
			});

			$('.couriers-container').show();
			$('html, body').animate({
		        scrollTop: $(".checkout-form").offset().top + 100
		    }, 500);
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
		} else if (top > 200) {
			$('nav').slideDown(300);

		} else if (top < 200) {
			$('nav').slideUp(300);
			$('.up-container').stop().hide(500);			

		}


	});

	$('.courier-img').on('click', function() {

		var id = $(this).attr('data-id');
		var c = confirm("Are you sure to choose this courier?");

		if (c) {
			getCandidate(id, ArrToString()).then(function(r) {
				console.log(r);
				window.location =  "http://localhost/hacksyon/receipt.php?id=" + r;
			});
		} else {

		}

		return false;
	}); 

	// receipt modal show on load
	$('#receipt-modal').modal('show');
});

function getCandidate(id, data) {

	return $.ajax({
		url: apiUrl + "pres/courier/" + id,
		type: "POST",
		dataType: "JSON",
		data: data,
		headers: {
			"Content-Type" : "application/json"
		}
	});
}

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
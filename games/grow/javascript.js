$(function () {

	$(window).load(function () {
		var $start = false;
		$coords = $('#coords');

		water = [];
		setInterval(function () {
			water.push(waterDrop());
		}, 4550);

		setInterval(function () {
			sunDrop();
		}, 6130);

		$(document).on('keydown', function () {
			$coords.html(move());
			$coords.append("<br>"+water);
			water.forEach(function (e) {
				if (e > move()) {
					$coords.append("<br>"+e);
				}
			})
		})

		$('#waterDrop').on('change', function () {
			$('#coords').html($('#waterDrop').css('left'));
		})

		$(document).on('mousemove', function (e) {
			var x = e.pageX;
			var y = e.pageY;
			$('#coords').html("X: "+x+" Y: "+y);
		})

	})


})


function waterDrop() {
	var $water = '<div id="waterDrop"></div>';
	$('#gameBox').prepend($water);
	var $start = !$start;
	var $left = (Math.random()*370) +30 ;
	var $right = (Math.random()*370) + 400;
	var $top = $start ? $right : $left;
	$('#waterDrop').css('left', $top+"px").animate({top: '480px'}, 6500, "linear", function () {
		$(this).remove();
		water.shift();
	})

	return Math.round(parseFloat($('#waterDrop').css('left')));
}

function sunDrop() {
	var $water = '<div id="sunDrop"></div>';
	$('#gameBox').prepend($water);
	var $start = !$start;
	var $left = (Math.random()*370) +30 ;
	var $right = (Math.random()*370) + 400;
	var $top = $start ? $right : $left;
	$('#sunDrop').css('left', $top+"px").animate({top: '480px'}, 4500, "linear", function () {
		$(this).remove();
	})
	return parseFloat($('#sunDrop').css('left'));
}

function move(e) {
	var $keypress = (window.event) ? event.keyCode : e.which;
	var key =  String.fromCharCode($keypress).toLowerCase();
	switch(key) {
		case 'd' :
			$('#basket').css('left', '+=15px');
			break;

		case 'a' :
			$('#basket').css('left', '-=15px');
			break;
	}
	return parseFloat($('#basket').offset().left);
}
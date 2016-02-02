$(function () {

	$(window).on("load", function () {
		$("#gameBox").after("<img id='sprite' />");
	});
	i=0;

	$(document).on("mousemove", function (e) {
		if (window.event) {
			var x = event.x;
			var y = event.y;
		}
		else if(e) {
			var x = e.pageX;
			var y = e.pageY;
		}
		$("#sprite").offset({left: x-20, top: y-20});
		$("#coords").html("X: "+x+" Y: "+y);
	});

	$(document).on('mousedown', function () {
		shoot = setInterval(function () {
			var x = $("#sprite").offset().left;
			var y = $("#sprite").offset().top;
			$("<div id='bullets'></div>").appendTo("#gameBox").offset({top: y, left: x+20.5})
				.animate({top: '-=870px'}, {
					duration: 2000,
					easing: "linear",
					step: function (now, fx) {
						if ($(this).offset().top <= 100) {
								this.remove();
							}
						if (now <= $('#target').offset().top + $('#target').height() &&
							now >= $('#target').offset().top &&
						$('#target').offset().left <= $(this).offset().left  &&
						$(this).offset().left <= ($('#target').offset().left + $('#target').width())) {
						 	i++;
							$('#step').html(i);
							this.remove();
						}
					}
				})
		}, 100);
	}).on('mouseup', function () {
		clearInterval(shoot);
	})

	var channel = new MessageChannel();
	var win = document.getElementById('msgbox').contentWindow;
	win.postMessage("Hola", "http://localhost/apps/fun/msgbox.php", [channel.port2]);

	channel.port1.postMessage("Hello");

	channel.port1.onmessage = handleMessage;
	function handleMessage(event){
		document.getElementById('para').innerHTML = event.data;
	}

});
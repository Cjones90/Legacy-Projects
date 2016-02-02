$(function (){


	$('#header p').click(function () {
		$('#login_box').toggle('slow');
	});

/*
	$('#login').submit(function (e) {
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: "POST",
			url: '/submit.php',
			
			cache: false,
			async: false,
			data: formData,
			success: function(data) {
				alert("Logged in successfuly");
			},
			contentType: false,
       		processData: false,

		});
	})
*/

});

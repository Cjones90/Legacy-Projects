$(function () {

	$(document).on('click', '.filter', function () {
		var filter = $(this).text();
		$('.postBox').hide();
		$('.postBox').each(function () {
			if ($(this).hasClass(filter)) {
				$(this).show();
			}
		})
	})


})

// var time = new Date();
// var hour = time.getHours();
// var minute = time.getMinutes();
// var now = hour+":"+minute;
// var sayArr = [];

// alert("Time now is "+now);

// if (localStorage.getItem("firstVisit")) {
// 	sayArr.push("First visit at "+localStorage.getItem("firstVisit"));
// 	if(localStorage.getItem("lastVisit")) {
// 		sayArr.push("Last visit was at "+localStorage.getItem("lastVisit"));
// 	}
// }
// else {
// 	localStorage.setItem("firstVisit", now);
// 	alert("Your first visit was at "+localStorage.getItem("firstVisit"))
// }

// localStorage.setItem("lastVisit", now);

// for(x in sayArr) {
// 	alert(sayArr[x]);
// }
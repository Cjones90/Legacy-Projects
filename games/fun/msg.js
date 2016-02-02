function sendMsg() {
	var win = document.getElementById('msgbox').contentWindow;
	win.postMessage("Message from "+document.domain, "http://localhost/apps/fun/msgbox.php");
}

function readMsg(event) {
	if(event.origin === "http://localhost") {
		document.getElementById('para').innerHTML = event.data;
	}
}

function init() {
	document.getElementById('host').innerHTML += document.domain;
	window.addEventListener('message', readMsg, false);
	document.getElementById('btn').onclick = sendMsg;
}
document.addEventListener("DOMContentLoaded", init, false);
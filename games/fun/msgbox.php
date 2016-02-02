<script src='msg.js'></script>
<script>
function readMsg(event) {
		if(event.origin === "http://localhost") {
			document.getElementById('para').innerHTML = event.data;
			event.source.postMessage('A response', event.origin)
		}
	}
</script>

<p id='host'>Iframe Page Domain:</p>
<p id='para'></p>
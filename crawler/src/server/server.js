var http = require('http');

var server = {

	startServer: function (port, requests) {
	  http.createServer(function (req, res) {

	  	requests.routeReq(req, res);

	  }).listen(port);
	}
}

module.exports = server;

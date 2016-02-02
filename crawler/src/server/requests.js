var fs = require("fs");
var pathMod = require("path");
var url = require("url");
var base = "src/client";

var requests = {
	routeReq: function (req, res) {
		var pathname = url.parse(req.url).pathname;
		console.log("Routing request to "+pathname);
		var extname = pathMod.extname(pathname);
		if(extname !== ".jsx" && extname !== ".js")
			switch(pathname) {
				case "/home": pathname = "/index.html";
				break;
				default: pathname = "/index.html";
			}
		var content = "text/html";
		switch(extname) {
			case ".jsx": content = "text/javascript";
						base = 'src/client';
			break;
			case ".js": content = "text/javascript";
						base = 'src/js';
			break;
		}
		res.writeHead(200, {"Content-Type": content});
		res.end(fs.readFileSync(base+pathname));

		// else {
		// 	res.writeHead(404);
		// 	res.end("404: Page cannot be found.");
		// }
	}
}

module.exports = requests;
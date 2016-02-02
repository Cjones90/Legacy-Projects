/** @jsx React.DOM */

var Home = React.createClass({
	render: function() {
		return <div>This is what appears on the home page!</div>;
	}

});

React.render(<Home />, document.getElementById("home"));
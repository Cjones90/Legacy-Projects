/** @jsx React.DOM */

var Index = React.createClass({
	render: function() {
		return <div>HELLO TO YOU SIR!</div>;
	}

});

React.render(<Index />, document.getElementById("test"));
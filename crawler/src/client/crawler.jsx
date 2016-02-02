/** @jsx React.DOM */

var Hello = React.createClass({
    render: function() {
        return <div>Hello {this.props.name}, I'm a JSX file</div>;
    }
});
 
React.render(<Hello name="World" />, document.getElementById("jsx"));


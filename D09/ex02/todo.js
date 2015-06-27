var button = document.getElementById('button');
var ft_list = document.getElementById('ft_list');

button.onclick = function() {
	var todo_txt = prompt("New 'To Do'");
	if (todo_txt && todo_txt !== "")
	{
		addToDiv(todo_txt);
		setCookie();
	}
};

function delTodo(todo) {
	if (confirm("Delete " + todo.innerHTML))
		ft_list.removeChild(todo);
	setCookie();
}

function addToDiv(todo_txt)
{
		var div = document.createElement('div');
		div.id	= 'todo';
		div.addEventListener( "click", function() { delTodo(div);} , false );
		var text = document.createTextNode(todo_txt);
		div.appendChild(text);
		ft_list.insertBefore(div, ft_list.firstChild);
}

function setCookie() {

	var nodes = ft_list.childNodes;
	if (nodes.length != 0)
	{
		var date = new Date();
		date.setTime(date.getTime()+(24*60*60*1000));
		var expires = "; expires="+date.toGMTString();

		var txt = [];
		for(i = 0; i < nodes.length; i++) {
	    	txt.push(nodes[i].innerHTML);
		}
		txt = JSON.stringify(txt);

		document.cookie = "todo_list=" + txt + expires;
	}
	else
		document.cookie = "todo_list=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

};

function getCookie() {
    var name = "todo_list=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
        	c = c.substring(1);
        if (c.indexOf(name) == 0)
        {
        	var tmp = JSON.parse(c.substring(name.length,c.length));
        	for(j = tmp.length - 1; j >= 0; j--) {
				addToDiv(tmp[j]);
        	}
        }
    }
};

window.onload = getCookie();
var button = document.getElementById('button');
var ft_list = document.getElementById('ft_list');

function setCookie() {

	var date = new Date();
	date.setTime(date.getTime()+(24*60*60*1000));
	var expires = "; expires="+date.toGMTString();

	document.cookie = "todo_list=" + ft_list.innerHTML + expires;
};


function getCookie() {
    var name = "todo_list=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ')
        	c = c.substring(1);
        if (c.indexOf(name) == 0)
        	ft_list.innerHTML = c.substring(name.length,c.length);
    }
};

button.onclick = function() {
	var todo_txt = prompt("New 'To Do'");
	if (todo_txt !== "")
	{
		var div = document.createElement('div');
		div.id	= 'todo';
		var text = document.createTextNode(todo_txt);
		div.appendChild(text);
		ft_list.insertBefore(div, ft_list.firstChild);
		setCookie();
	}

	var todo = document.getElementById("todo");
	todo.onclick = function() {
		if (confirm("Delete " + todo.firstChild.nodeValue))
		ft_list.removeChild(todo);
		setCookie();
	};
};

window.onload = getCookie();
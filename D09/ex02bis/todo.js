$(document).ready(function(){

	getCookie();

	$("#button").click(function() {
		var todo_txt = prompt("New 'To Do'");
		if (todo_txt && todo_txt !== "")
		{
			addToDiv(todo_txt);
			setCookie();
		}
	});

	function addToDiv(todo_txt)
	{
		$("#ft_list").prepend("<div id=\"todo\">" + todo_txt + "</div>");
		setCookie();
	}

	$(document).on( "click", "#todo", function() {
		if (confirm("Delete " + $(this).text()))
			$(this).remove();
		setCookie();
	});

	function setCookie() {
		var nodes = $("#ft_list").children();
		if (nodes.length != 0)
		{
			var date = new Date();
			date.setTime($.now()+(24*60*60*1000));
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
	}

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
	}
});

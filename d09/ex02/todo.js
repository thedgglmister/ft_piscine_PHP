var list_data = [];

function update_cookie(data)
{
	var date = new Date;
	date.setHours(date.getHours() + 24);
	date = date.toUTCString();
	document.cookie = "todo=" + JSON.stringify(data) + "; expires=" + date + "; path=/";
}

function remove_from_list()
{
	if (confirm("Are you sure you want to remove '" + this.innerHTML + "'?"))
	{
		var todo_content = this.innerHTML;
		var i = list_data.indexOf(todo_content);
		list_data.splice(i, 1);
		update_cookie(list_data);
		this.parentNode.removeChild(this);
	}
}

function add_to_list(str)
{
	var list = document.getElementById("ft_list");
	var new_elem = document.createElement("div");
	var new_content = document.createTextNode(str);
	new_elem.appendChild(new_content);
	var current_first = list.firstChild;
	list.insertBefore(new_elem, current_first);
	new_elem.addEventListener("click", remove_from_list);
}

function init_list()
{
	var cookies = document.cookie.split(';');
	for (var i = 0; i < cookies.length; i++)
	{
		if (cookies[i].startsWith("todo="))
		{
			list_data = JSON.parse(cookies[i].substr(5, undefined));
			for (var j = 0; j < list_data.length; j++)
				add_to_list(decodeURIComponent(list_data[j]));
		}
	}
}

function init_button()
{
	var butt = document.getElementById("butt");
	butt.addEventListener("click", function() {
		var todo_content = prompt("new TO DO: ");
		if (todo_content)
		{
			list_data.push(encodeURIComponent(todo_content));
			update_cookie(list_data);
			add_to_list(todo_content);
		}
	});
}

init_list();
init_button();

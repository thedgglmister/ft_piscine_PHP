
$(document).ready(function() {

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
	if (confirm("Are you sure you want to remove '" + $(this).text() + "'?"))
	{
		var todo_content = $(this).text();
		var i = list_data.indexOf(todo_content);
		list_data.splice(i, 1);
		update_cookie(list_data);
		$(this).remove();
	}
}

function add_to_list(str)
{
	$("#ft_list").prepend("<div>" + str + "</div>");
	$("#ft_list").children().first().on("click", remove_from_list);
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

	$("#butt").on("click", function() {
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

});

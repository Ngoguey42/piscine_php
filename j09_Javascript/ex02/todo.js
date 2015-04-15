
function setCookie(name,value,days)
{	
	var date = new Date();

	date.setTime(date.getTime()+(days*24*60*60*1000));
	document.cookie = name + "=" + value + "; expires="+ date.toGMTString() + "; path=/";
	return ;
}

function deleteCookie(name)
{
	setCookie(name, 'deleted', -2);
	return ;
}

function padZero(num, size)
{
	var s = num + "";
	while (s.length < size)
		s = "0" + s;
	return (s);
}

var i = 0;

function addDiv(str)
{	
	var div = document.createElement('div');
	var ft_list = document.getElementById('ft_list');

	div.addEventListener(
		"click",
		function()
		{
			if (confirm('Really?'))
			{
				ft_list.removeChild(div);
				console.log(div.getAttribute('name'));
				deleteCookie(div.getAttribute('name'));
			}
		}, false);
	div.innerHTML = str.replace('%3D', '=').replace('%3B', ';');
	setCookie('todo' + padZero(i++, 3), str.replace('=', '%3D').replace(';', '%3B'), 7);
	ft_list.insertBefore(div, ft_list.firstChild);
}

function newTodo()
{
	var str = prompt("Enter the new todo");
	if (str.length > 0)
		addDiv(str);
	console.log(document.cookie);
}

function getCookies()
{
	var cookiesArray = document.cookie.split(';');
	var array = {};

	for (var x in cookiesArray)
	{
		var toto = cookiesArray[x].split("=");

		if (toto.length > 1)
			array[toto[0].trim()] = toto[1].trim();		
	}
	return (array);
}

var cookies = getCookies();
var sortedKeys = Object.keys(cookies).sort();

console.log(document.cookie);
console.log(sortedKeys);
for (var x in sortedKeys)
{
	deleteCookie(sortedKeys[x]);
	addDiv(cookies[sortedKeys[x]]);
}
console.log(document.cookie);
console.log(sortedKeys);

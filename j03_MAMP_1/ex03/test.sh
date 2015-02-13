#!/bin/sh

function catcook()
{
	echo "cat cook.txt:\033[31m"
	cat cook.txt
	echo "\033[0m\n"
}

url='http://j03.local.42.fr:8080/ex03/cookie_crisp.php'

rm cook.txt
catcook



curl -c cook.txt $url'?action=set&name=plat&value=choucroute'
catcook

curl -c cook.txt $url'?action=set&name=plat2&value=choucroute2'
catcook

curl -c cook.txt $url'?action=del&name=plat'
catcook


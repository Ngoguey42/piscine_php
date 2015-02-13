#!/bin/sh

function catcook()
{
	echo "\033[0mcat cook.txt:\033[31m"
	cat cook.txt
	echo "\033[0m\n"
}

function curlit()
{
	echo "curl" $1 cook.txt ...$2 ":\033[32m"
	curl $1 cook.txt $url$2

	
	catcook
}



url='http://j03.local.42.fr:8080/ex03/cookie_crisp.php'
clear

rm cook.txt
catcook

curlit -c '?action=set&name=plat&value=choucroute'
curlit -b '?action=get&name=plat'
curlit -c '?action=del&name=plat'
curlit -b '?action=get&name=plat'



# curl -c cook.txt $url'?action=set&name=plat&value=choucroute'
# catcook

# curl -c cook.txt $url'?action=set&name=plat2&value=choucroute2'
# catcook


# curl -b cook.txt $url'?action=get&name=plat'
# catcook


# curl -c cook.txt $url'?action=del&name=plat'
# catcook


# curl -b cook.txt $url'?action=get&name=plat'
# catcook

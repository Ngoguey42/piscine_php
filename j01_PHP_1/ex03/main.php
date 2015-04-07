#!/usr/bin/php
<?PHP

include("ft_split.php");

print_r(ft_split(""));
print_r(ft_split(" "));
print_r(ft_split("		 "));
print_r(ft_split("           Hello World zzz"));
print_r(ft_split("Hello hihi AAA          "));
print_r(ft_split("        bbb World AAA           "));
print_r(ft_split("        Hello       lol AAA           "));
print_r(ft_split("		Hello World         AAA           "));
print_r(ft_split("        Hello  b   AAA           "));
print_r(ft_split("        Hello	b   AAA           "));

?>

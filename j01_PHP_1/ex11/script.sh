
echo "params: '$1'"
./do_op_2.php "$1";
echo "bc:"
echo "$1" | bc;

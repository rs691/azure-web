<?php
$text = "red,blue,green";
$array = explode(",", $text);
print_r($array);
// Output:
// Array ( [0] => red [1] => blue [2] => green )




$str = 'first_name,last_name,email,phone';
$headers = explode(',', $str);

print_r($headers);
?>

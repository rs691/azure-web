<?php
$string = "Hello, world!";
$char = "w";

if (strpos($string, $char) !== false) {
    echo "The character '{$char}' exists in the string.";
} else {
    echo "The character '{$char}' does not exist in the string.";
}


$str = 'To do or not to do';
$position = strpos($str, 'do');

echo $position; // 3
?>

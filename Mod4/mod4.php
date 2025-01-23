<?php 
$name = "John";
echo "Hello, {$name} Smith!"; // Output: Hello, JohnDoe!

//as we know, positions are 0,1,2
$colors = ['red', 'blue', 'green'];
// Output: My favorite color is blue.
echo "My favorite color is {$colors[1]}."; 

// Output: The area of a square with side 5 is 25.
$length = 5;
echo "The area of a square with side {$length} is " . ($length ** 2) . "."; 

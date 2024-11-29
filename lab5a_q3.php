<?php
function calculateArea($width, $height) {
    return $width * $height;
}

$width = 8;
$height = 3;
$area = calculateArea($width, $height);

echo "The area of a rectangle with a width of {$width} and {$height} is {$area}";
?>
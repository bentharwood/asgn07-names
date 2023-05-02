<?php
include "functions/names-functions.php";
include 'functions/utility-functions.php';
$fileName = 'names-short-list.txt';


$fullNames = loadFullNames($fileName);

$firstNames = loadFirstNames($fullNames);

$lastNames = loadLastNames($fullNames);

// Get valid names
for($i = 0; $i < sizeof($fullNames); $i++) {
  // jam the first and last name toghether without a comma, then test for alpha-only characters
  if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
    $validFirstNames[$i] = $firstNames[$i];
    $validLastNames[$i] = $lastNames[$i];
    $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
  }
}

$mostCommonLast = commonLastName($validLastNames);
$mostCommonFirst = commonFirstName($validFirstNames);
// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
$uniqueValidLastNames = (array_unique($validLastNames));
echo ("<p>There are " . sizeof($uniqueValidLastNames) . " Unique Last names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidLastNames as $uniqueValidLastNames) {
        echo "<li>$uniqueValidLastNames</li>";
    }
echo "</ul>";

echo '<h2>Unique First Names</h2>';
$uniqueValidFirstNames = (array_unique($validFirstNames));
echo ("<p>There are " . sizeof($uniqueValidFirstNames) . " Unique First names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidFirstNames as $uniqueValidFirstNames) {
        echo "<li>$uniqueValidFirstNames</li>";
    }
echo "</ul>";

echo "<h2>The most common last Name is:</h2>";
echo "$mostCommonLast";

echo "<h2>The most common first Name is:</h2>";
echo "$mostCommonFirst";



?>









<?php
function loadFullNames($fileName) {
  // Load up the array
  $lineNumber = 0;
  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);

  while (!feof($FH)) {
    if ($lineNumber % 2 == 0) {
      $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }

    $lineNumber++;
    $nextName = fgets($FH);
  }

  return $fullNames;
}

function loadFirstNames($fullNames) {
  // Get all first names
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function loadLastNames($fullNames) {
  // Get all last names
  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}

function commonLastName($lastNames) {
  $count = array_count_values($lastNames);
  arsort($count);
  $mostCommonLastRaw = array_slice(array_keys($count), 0, 1, true);
  $mostCommonLast = implode($mostCommonLastRaw);
  return $mostCommonLast;
}

function commonFirstName($firstNames) {
  $count = array_count_values($firstNames);
  arsort($count);
  $mostCommonFirstRaw = array_slice(array_keys($count), 0, 1, true);
  $mostCommonFirst = implode($mostCommonFirstRaw);
  return $mostCommonFirst;
}


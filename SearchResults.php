<?php
$offset = $_GET['next'];

$file = fopen("cruise.csv","r");
$result = [];

for ($x = 0; $x <= $offset + 4; $x++) {
  $newRow = fgetcsv($file);
  
  if ($x >= $offset && $newRow[0] !== null) {
  	$result[] = $newRow;
  }
  
  if (feof($file)) {
        break;
  }
} 
fclose($file);
echo json_encode($result);


//<?php
//$offset = $_GET['next'];
//
//$file = fopen("cruise.csv","r");
//$result = [];
//
//for ($x = 0; $x <= $offset + 4; $x++) {
//  $newRow = fgetcsv($file);
//  
//  if ($x >= $offset && $newRow[0] !== null) {
//  	$result[] = $newRow;
//  }
//  
//  if (feof($file)) {
//  	break;
//  }
//} 
//fclose($file);
//echo json_encode($result);
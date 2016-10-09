<?php
/**
 * Description of Fahrzeug_Trupp_Bezeichnung
 * @author AdminNova 
 */

/*
** TODO
 /* Array  Construct Station and Sub Station (Database)
 *  Array(Station and Sub Station) = [Station][SubStation 1][SubStation 2][SubStation 3][SubStation 4];
 */
$Wachzuordnung = Array('FW_1300','FW_1310','FW_2620');

$Dienststelle = $Wachzuordnung[0];
$Stützpunkt_1 = $Wachzuordnung[1];
$Stützpunkt_2 = $Wachzuordnung[2];
/*
** TODO
/*  Array  Construct Cars from FireStation (Database)
 * Array (vehicle allocation) = Array([Station or SubStation][vehicle 1 - 10][Day and Night or Day or Night]],
*/
$Fahrzeugzuordnung = ['$Dienststelle' => Array('LHF_1', 'DLK', 'LHF_2', 'RTW_1'),
                      '$Stützpunkt_1' => Array('RTW_1', 'RTW_2'),
                      '$Stützpunkt_2' => ['RTW_1']];


$arr_length_j = count($Fahrzeugzuordnung);
print_r($arr_length_j);
print("-");
//$arr_length_i = count($Fahrzeugzuordnung[1]);

$arr_length_i = max( array_map( 'count',  $Fahrzeugzuordnung ) );
print_r($arr_length_i);

print("-");

for ($j =0; $j < $arr_length_j; $j++) {  
  for ($i =0; $i < $arr_length_i; $i++) {
     
      print_r($j);
      print_r($i);
      print("-");
    }
}


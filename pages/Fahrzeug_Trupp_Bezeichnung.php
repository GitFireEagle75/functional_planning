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
$Fahrzeugzuordnung = ['FW_1300' => ['LHF_1', 'DLK', 'LHF_2', 'RTW_1'],
                      'FW_1310' => ['RTW_1', 'RTW_2'],
                      'FW_2620' => ['RTW_1']];
$value = $Fahrzeugzuordnung[0];

                  print_r($value);
                  

$arr_length_j = count($Fahrzeugzuordnung);
print_r($arr_length_j);
print("-");

for ($a=1; $a < $arr_length_j; $a++){
  $value =  $Fahrzeugzuordnung[$a];
  $arr_length_i = count($Fahrzeugzuordnung);  //max( array_map( 'count', $Fahrzeugzuordnung) );
//print_r($arr_length_i);
}

print("-");

for ($j =0; $j < $arr_length_j; $j++) {  
 // for ($i =0; $i < $arr_length_i; $i++) {
     
      print_r($j);
     // print_r($i);
      print("-");
    }
//}


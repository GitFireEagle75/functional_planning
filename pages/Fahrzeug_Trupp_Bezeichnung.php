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
$Fahrzeugzuordnung = [$Dienststelle => ['LHF_1'=>['T/N'], 'DLK'=>['T/N'], 'LHF_2'=>['T/N'], 'RTW_1'=>['T/N]']],
                      $Stützpunkt_1 => ['RTW_1'=>['T/N'], 'RTW_2'=>['T']],
                      $Stützpunkt_2 => ['RTW_1'=>['T/N']]];

$arr_length_j = count($Fahrzeugzuordnung);
print_r($arr_length_j);

foreach($Fahrzeugzuordnung as $Ort => $Fahrzeug){
    str
    print "Dienststelle: ($Fahrzeug)[] ";
    Switch($Ort){
    case 'LHF_1':
    Echo"<tr><td class='FunktionAuswahl'>Stf_1<td><td class='FunktionAuswahl'>(37)</td></tr>
        <tr><td class='FunktionAuswahl'>MA_1<td><td class='FunktionAuswahl'>(52)</td></tr>
	<tr><td class='FunktionAuswahl'>Atr_1<td><td class='FunktionAuswahl'>(52)</td></tr>
	<tr><td class='FunktionAuswahl'>Wtr_1<td><td class='FunktionAuswahl'>(54)</td></tr>
	<tr><td class='border'><td><td class='border'><td></tr>
    <tr><td class='border'><td><td class='border'><td></tr>";}
   

//  $arr_length_i = count($Fahrzeugzuordnung);  //max( array_map( 'count', $Fahrzeugzuordnung) );
//print_r($arr_length_i);
}

for ($j =0; $j < $arr_length_j; $j++) {  
 // for ($i =0; $i < $arr_length_i; $i++) {
     
      //print_r($j);
     // print_r($i);
 
    }
//}


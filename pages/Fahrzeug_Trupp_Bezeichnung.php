<?php
/**
 * Description of Fahrzeug_Trupp_Bezeichnung
 * @author MarcelFeesche 
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
$Fahrzeugzuordnung = [  ['Standort' => $Dienststelle ,'Fahrzeug' => 'LHF_1','Dienst' =>'T/N'],
                        ['Standort' => $Dienststelle ,'Fahrzeug' => 'DLK', 'Dienst' =>'T/N'],
                        ['Standort' => $Dienststelle ,'Fahrzeug' => 'LHF_2','Dienst' =>'T/N'],
                        ['Standort' => $Dienststelle ,'Fahrzeug' => 'RTW_1', 'Dienst' =>'T/N'],
                        ['Standort' => $Stützpunkt_1 ,'Fahrzeug' => 'RTW_1','Dienst' =>'T/N'],
                        ['Standort' => $Stützpunkt_1 ,'Fahrzeug' => 'RTW_2', 'Dienst' =>'T'],
                        ['Standort' => $Stützpunkt_2 ,'Fahrzeug' => 'RTW_1','Dienst' =>'T/N']];

  $Fahrzeuge = array_column($Fahrzeugzuordnung, 'Fahrzeug');
  for($i=0; $i < count($Fahrzeuge); $i++){
    Switch($Fahrzeuge[$i]){        
    case 'LHF_1':
    Echo "
        
        <tr><td class='FunktionAuswahl'>Stf_1<td><td class='FunktionAuswahl'>(37)</td></tr>
        <tr><td class='FunktionAuswahl'>MA_1<td><td class='FunktionAuswahl'>(52)</td></tr>
	<tr><td class='FunktionAuswahl'>Atr_1<td><td class='FunktionAuswahl'>(52)</td></tr>
	<tr><td class='FunktionAuswahl'>Wtr_1<td><td class='FunktionAuswahl'>(54)</td></tr>
	<tr><td class='border'><td><td class='border'><td></tr>
        <tr><td class='border'><td><td class='border'><td></tr>        
        ";
        break;
    case 'DLK' :    
    Echo "        
        <tr><td class='FunktionAuswahl'>Dlk<td><td class='FunktionAuswahl'>(51)</td></tr>
        <tr><td class='border'><td><td class='border'><td></tr>
        <tr><td class='border'><td><td class='border'><td></tr>        
        ";
        break;
    case 'LHF_2' :    
    Echo "    
        <tr><td class='FunktionAuswahl'>Stf_2<td><td class='FunktionAuswahl'>(38)</td></tr>
	<tr><td class='FunktionAuswahl'>MA_2<td><td class='FunktionAuswahl'>(53)</td></tr>
	<tr><td class='FunktionAuswahl'>Atr_2<td><td class='FunktionAuswahl'>(53)</td></tr>
	<tr><td class='FunktionAuswahl'>Wtr_2<td><td class='FunktionAuswahl'>(55)</td></tr>
        <tr><td class='border'><td><td class='border'><td></tr>
        <tr><td class='border'><td><td class='border'><td></tr>
        ";
        break;
    }

}


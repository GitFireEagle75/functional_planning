<h1>Fahrzeugzuordnung</h1>
<?php
/*
TODO
// Array  Construct Cars from FireStation (Database) 
 * 
 */

$Dienststelle = 'FW_1300';
$Stützpunkt_1 = 'FW_1310';
$Stützpunkt_2 = 'FW_2620';

$Fahrzeugzuordnung = ['1' =>[$Dienststelle][LHF_1],
                            [$Dienststelle][DLK],
                            [$Dienststelle][LHF_2],
                            [$Dienststelle][RTW_1],
                            [$Stützpunkt_1][RTW_1],
                            [$Stützpunkt_1][RTW_2],
                            [$Stützpunkt_2][RTW_1],
    ];
        
  $arr_length = count($Fahrzeugzuordnung);
  for ($i = 0; $i < $arr_length; $i++) {
    switch ($Fahrzeugzuordnung[][i]) {
        case 'LHF_1':
        echo"<tr><td class='FunktionAuswahl'>Stf_1<td><td class='FunktionAuswahl'>(37)</td></tr>
            <tr><td class='FunktionAuswahl'>MA_1<td><td class='FunktionAuswahl'>(52)</td></tr>
            <tr><td class='FunktionAuswahl'>Atr_1<td><td class='FunktionAuswahl'>(52)</td></tr>
            <tr><td class='FunktionAuswahl'>Wtr_1<td><td class='FunktionAuswahl'>(54)</td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>"            
            ;
            break;
        case 'LHF_2':
            
            
            ;
            break;
    }
}
?>
    
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
            <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'LHF_2':
            Echo"<tr><td class='FunktionAuswahl'>Stf_2<td><td class='FunktionAuswahl'>(38)</td></tr>
                <tr><td class='FunktionAuswahl'>MA_2<td><td class='FunktionAuswahl'>(53)</td></tr>
                <tr><td class='FunktionAuswahl'>Atr_2<td><td class='FunktionAuswahl'>(53)</td></tr>
                <tr><td class='FunktionAuswahl'>Wtr_2<td><td class='FunktionAuswahl'>(55)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'DLK':
            Echo"<tr><td class='FunktionAuswahl'>Dlk<td><td class='FunktionAuswahl'>(51)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_1':
            Echo"<tr><td class='FunktionAuswahl'>RTW_1<td><td class='FunktionAuswahl'>(71)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_2':
            Echo"<tr><td class='FunktionAuswahl'>RTW_2<td><td class='FunktionAuswahl'>(72)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_3':
            Echo"<tr><td class='FunktionAuswahl'>RTW_3<td><td class='FunktionAuswahl'>(73)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_4':
            Echo"<tr><td class='FunktionAuswahl'>RTW_4<td><td class='FunktionAuswahl'>(74)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_5':
            Echo"<tr><td class='FunktionAuswahl'>RTW_5<td><td class='FunktionAuswahl'>(75)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_6':
            Echo"<tr><td class='FunktionAuswahl'>RTW_6<td><td class='FunktionAuswahl'>(76)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_7':
            Echo"<tr><td class='FunktionAuswahl'>RTW_7<td><td class='FunktionAuswahl'>(77)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_8':
            Echo"<tr><td class='FunktionAuswahl'>RTW_8<td><td class='FunktionAuswahl'>(78)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        case 'RTW_9':
            Echo"<tr><td class='FunktionAuswahl'>RTW_9<td><td class='FunktionAuswahl'>(79)</td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        }
}
?>
    
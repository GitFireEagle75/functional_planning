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
$Dienste = array_column($Fahrzeugzuordnung, 'Dienst');
  for($i=0; $i <count($Fahrzeuge); $i++){
    Switch($Fahrzeuge[$i]){ 
        case 'LHF_1':
            echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
                break;
        
        case 'LHF_2':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'DLK':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";

            break;
        
        case 'RTW_1':
            if($Dienste[$i] == 'T/N'){
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
            </tr>";}
            elseif($Dienste[$i] == 'T') {
                
            Echo"
                <tr><td class='PersAuswahl'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td></tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";                
            }else{
                Echo"Kein Dienst";
                
            }
            break;
        
        case 'RTW_2':
            if($Dienste[$i] == 'T/N'){
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
            </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    Echo"
                        <tr>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                    </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td></tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                    </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td><td class='PersAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td></tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                    </tr>";
                }else{
                    Echo"
                        <tr>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                        <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                    </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_3':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_4':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_5':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_6':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_7':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_8':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'RTW_9':
            Echo"
                <tr>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                <td class='PersAuswahl' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
            
        }
    }
?>
    
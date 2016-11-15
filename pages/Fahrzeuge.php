<?php
/**
 * Description of Fahrzeug_Trupp_Bezeichnung
 * @author MarcelFeesche 
 */
/*
** TODO
 /* Array  Construct Station and Sub Station (Database)
 *  Array(Station and Sub Station) = [Station][SubStation 1][SubStation 2][SubStation 3][SubStation 4].........;
 * 
 * Abruf, nach Selektierung der Hauptwache, aller untergeordneten Stützpunkte aus der Datenbanktabelle 
 */
$Wachzuordnung = Array('FW_1300','FW_1310','FW_2620');
/*
** TODO
/*  Array  Construct Vehicle from FireStation (Database)
 * Array (vehicle allocation) = Array([Station or SubStation][vehicle 1 - 10][Day and Night or Day or Night]],
 * 
*/
$Fahrzeugzuordnung = [  ['Standort' => $Wachzuordnung[0] ,'Fahrzeug' => 'LHF_1','Dienst' =>'T/N'], 
                        ['Standort' => $Wachzuordnung[0] ,'Fahrzeug' => 'DLK', 'Dienst' =>'T/N'],
                        ['Standort' => $Wachzuordnung[0] ,'Fahrzeug' => 'LHF_2','Dienst' =>'T/N'],
                        ['Standort' => $Wachzuordnung[0] ,'Fahrzeug' => 'RTW_1', 'Dienst' =>'T/N'],
                        ['Standort' => $Wachzuordnung[1] ,'Fahrzeug' => 'RTW_1','Dienst' =>'T/N'],
                        ['Standort' => $Wachzuordnung[1] ,'Fahrzeug' => 'RTW_2', 'Dienst' =>'T'],
                        ['Standort' => $Wachzuordnung[2] ,'Fahrzeug' => 'RTW_1','Dienst' =>'T/N']];
/*
** TODO
/*  Array  Construct Function from Vehicle (Database)
 * Array (Function) = Array([Vehicle Name][Function 1- 9]],
*/
$Funktionszuordnung =  [['Fahrzeug' => 'LHF_1','Funktion' =>'371'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'372'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'521'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'522'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'523'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'524'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'541'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'542'],
                        ['Fahrzeug' => 'LHF_1','Funktion' =>'543'],
                        ['Fahrzeug' => 'DLK',  'Funktion' =>'511'],
                        ['Fahrzeug' => 'DLK',  'Funktion' =>'512'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'381'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'382'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'531'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'532'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'533'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'534'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'551'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'552'],
                        ['Fahrzeug' => 'LHF_2','Funktion' =>'553'],
                        ['Fahrzeug' => 'RTW_1','Funktion' =>'711'],
                        ['Fahrzeug' => 'RTW_1','Funktion' =>'712'],
                        ['Fahrzeug' => 'RTW_1','Funktion' =>'713'],
                        ['Fahrzeug' => 'RTW_2','Funktion' =>'721'],
                        ['Fahrzeug' => 'RTW_2','Funktion' =>'722'],
                        ['Fahrzeug' => 'RTW_2','Funktion' =>'723']];
/*
** TODO
/*  Array  Construct Funktionsbesetzung from Datum on FireStation (Database)
 * Array (Personalplanung) = Array([Planungs Date][Station or SubStation Day and Night][function number Day Night][Name] [Pers Number]],
 * Personal_Personal_ID,Wachabteilung_Wachabteilung_ID,Planungs_Datum,Plan_Dienststelle_Tag,Plan_Funktion_Tag,Plan_Dienststelle_Nacht,Plan_Funktion_Nacht 
*/
$Einteilung = [ ['Planungs_Datum' => '17.10.2016','Dienststelle_Tag' => 'FW_1300','Dienststelle_Nacht' => 'FW_1310', 'Funktionsname_Tag' => '531', 'Funktionsname_Nacht' => '711', 'Name' => 'Meyer Frank', 'Persnr' => '47456798' ],
                ['Planungs_Datum' => '17.10.2016','Dienststelle_Tag' => 'FW_2620','Dienststelle_Nacht' => 'FW_2620', 'Funktionsname_Tag' => '711', 'Funktionsname_Nacht' => '711', 'Name' => 'Schale Mike', 'Persnr' => '47411798' ],
                ];

$Planungs_Datum = array_column($Einteilung, 'Planungs_Datum');
$Planungs_Name = array_column($Einteilung, 'Name');
$Planungs_Persnr = array_column($Einteilung, 'Persnr');

$Funktion_Tag = array_column($Einteilung, 'Funktionsname_Tag');
$Dienststelle_Tag = array_column($Einteilung, 'Dienststelle_Tag');

$Funktion_Nacht = array_column($Einteilung, 'Funktionsname_Nacht');
$Dienststelle_Nacht = array_column($Einteilung, 'Dienststelle_Nacht');

$FahrzeugeArt = array_column($Funktionszuordnung, 'Fahrzeug');
$FahrzeugeFunktion = array_column($Funktionszuordnung, 'Funktion');

$Fahrzeuge = array_column($Fahrzeugzuordnung, 'Fahrzeug');
$Dienste = array_column($Fahrzeugzuordnung, 'Dienst');
$Gebäude = array_column($Fahrzeugzuordnung, 'Standort');

  for($i=0; $i <count($Fahrzeuge); $i++){
    Switch($Fahrzeuge[$i]){ 
        case 'LHF_1':
                $Standort = substr($Gebäude[$i], 3);
            
                $Funktion1 = ($var_Zeit.$Standort.'371'); //Staffelführer
                $Funktion2 = ($var_Zeit.$Standort.'372'); // Staffelfuhrer Praktikant
                $Funktion3 = ($var_Zeit.$Standort.'521'); // Maschinist
                $Funktion4 = ($var_Zeit.$Standort.'522'); // Angriffs Trupp Führer
                $Funktion5 = ($var_Zeit.$Standort.'523'); // Angriffs Trupp Mann
                $Funktion6 = ($var_Zeit.$Standort.'524'); // Gast/Praktikant
                $Funktion7 = ($var_Zeit.$Standort.'541'); // Wasser Trupp Führer
                $Funktion8 = ($var_Zeit.$Standort.'542'); // Wasser Trupp Mann
                $Funktion9 = ($var_Zeit.$Standort.'543'); // Gast/Praktikant
            
            
            echo"
                <tr>                                  
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr' ></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion4' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion5' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion6' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion7' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion8' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion9' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
                break;
        
        case 'LHF_2':
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'381'); //Staffelführer
                $Funktion2 = ($var_Zeit.$Standort.'382'); // Staffelfuhrer Praktikant
                $Funktion3 = ($var_Zeit.$Standort.'531'); // Maschinist
                $Funktion4 = ($var_Zeit.$Standort.'532'); // Angriffs Trupp Führer
                $Funktion5 = ($var_Zeit.$Standort.'533'); // Angriffs Trupp Mann
                $Funktion6 = ($var_Zeit.$Standort.'534'); // Gast/Praktikant
                $Funktion7 = ($var_Zeit.$Standort.'551'); // Wasser Trupp Führer
                $Funktion8 = ($var_Zeit.$Standort.'552'); // Wasser Trupp Mann
                $Funktion9 = ($var_Zeit.$Standort.'553'); // Gast/Praktikant
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion4' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion5' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion6' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='PersAuswahl' name='$Funktion7' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion8' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion9' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";
            break;
        
        case 'DLK':
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'511');
                $Funktion2 = ($var_Zeit.$Standort.'512');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
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
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'711');
                $Funktion2 = ($var_Zeit.$Standort.'712');
                $Funktion3 = ($var_Zeit.$Standort.'713');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'711');
                    $Funktion2 = ($var_Zeit.$Standort.'712');
                    $Funktion3 = ($var_Zeit.$Standort.'713');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_2':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'721');
                $Funktion2 = ($var_Zeit.$Standort.'722');
                $Funktion3 = ($var_Zeit.$Standort.'723');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'721');
                    $Funktion2 = ($var_Zeit.$Standort.'722');
                    $Funktion3 = ($var_Zeit.$Standort.'723');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_3':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'731');
                $Funktion2 = ($var_Zeit.$Standort.'732');
                $Funktion3 = ($var_Zeit.$Standort.'733');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'731');
                    $Funktion2 = ($var_Zeit.$Standort.'732');
                    $Funktion3 = ($var_Zeit.$Standort.'733');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_4':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'741');
                $Funktion2 = ($var_Zeit.$Standort.'742');
                $Funktion3 = ($var_Zeit.$Standort.'743');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'741');
                    $Funktion2 = ($var_Zeit.$Standort.'742');
                    $Funktion3 = ($var_Zeit.$Standort.'743');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_5':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'751');
                $Funktion2 = ($var_Zeit.$Standort.'752');
                $Funktion3 = ($var_Zeit.$Standort.'753');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'751');
                    $Funktion2 = ($var_Zeit.$Standort.'752');
                    $Funktion3 = ($var_Zeit.$Standort.'753');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_6':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'761');
                $Funktion2 = ($var_Zeit.$Standort.'762');
                $Funktion3 = ($var_Zeit.$Standort.'763');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'761');
                    $Funktion2 = ($var_Zeit.$Standort.'762');
                    $Funktion3 = ($var_Zeit.$Standort.'763');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_7':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'771');
                $Funktion2 = ($var_Zeit.$Standort.'772');
                $Funktion3 = ($var_Zeit.$Standort.'773');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'771');
                    $Funktion2 = ($var_Zeit.$Standort.'772');
                    $Funktion3 = ($var_Zeit.$Standort.'773');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_8':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'781');
                $Funktion2 = ($var_Zeit.$Standort.'782');
                $Funktion3 = ($var_Zeit.$Standort.'783');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'781');
                    $Funktion2 = ($var_Zeit.$Standort.'782');
                    $Funktion3 = ($var_Zeit.$Standort.'783');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
        
        case 'RTW_9':
            if($Dienste[$i] == 'T/N'){
                $Standort = substr($Gebäude[$i], 3);
                $Funktion1 = ($var_Zeit.$Standort.'791');
                $Funktion2 = ($var_Zeit.$Standort.'792');
                $Funktion3 = ($var_Zeit.$Standort.'793');
            Echo"
                <tr>
                    <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                    <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>
                <tr>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                    <td class='border'></td><td class='border'></td><td class='border'></td>
                </tr>";}
            elseif ($Dienste[$i] == 'T') {
                if ($DivDienst == 'main_plan_left' && $DienstZeit == 'Tagdienst'){
                    $Standort = substr($Gebäude[$i], 3);
                    $Funktion1 = ($var_Zeit.$Standort.'791');
                    $Funktion2 = ($var_Zeit.$Standort.'792');
                    $Funktion3 = ($var_Zeit.$Standort.'793');
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_left' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }elseif ($DivDienst == 'main_plan_right' && $DienstZeit == 'Nachtdienst') {
                    Echo"
                        <tr>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                            <td class='PersOhneAuswahl'>&nbsp;</td><td class='PersInfo'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";
                }else{
                    Echo"
                        <tr>
                            <td class='PersAuswahl' name='$Funktion1' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion2' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                            <td class='PersAuswahl' name='$Funktion3' value='.PersNr'></td><td><input class='PersInfo' type='submit' value='i'/></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>
                        <tr>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                            <td class='border'></td><td class='border'></td><td class='border'></td>
                        </tr>";                    
                }
            }else{
                Echo"Kein Dienst";                
            }
            break;
            
        }
    }
?>
    
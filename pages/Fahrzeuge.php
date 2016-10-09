<h1>Fahrzeugzuordnung</h1>
<?php
/*
TODO
 /* Array  Construct Station and Sub Station (Database)
 *  Array(Station and Sub Station) = [Station][SubStation 1][SubStation 2][SubStation 3][SubStation 4];
 */
$Wachzuordnung = Array('FW_1300','FW_1310','FW_2620');

$Dienststelle = $Wachzuordnung[0];
$Stützpunkt_1 = $Wachzuordnung[1];
$Stützpunkt_2 = $Wachzuordnung[2];
/*
TODO
/*  Array  Construct Cars from FireStation (Database)
 * Array (vehicle allocation) = Array([Station or SubStation][vehicle 1 - 10][Day and Night or Day or Night]],
*/
$Fahrzeugzuordnung = ['$Dienststelle' => Array(LHF_1, DLK, LHF_2, RTW_1),
                      '$Stützpunkt_1' => Array(RTW_1, RTW_2),
                      '$Stützpunkt_2' => Array(RTW_1)];

Echo"<div id='main_funktion' class='border'>
                    <table>";


  
  $aktuellesDatum  = date('d.m.Y');
		$aktuelleZeit    = date('H:i:s');
		$Zeit_jetzt       = date('d.m.Y.H:i:s');
		$verglZeitBeginn = date($aktuellesDatum.'.07:30:00');
		$verglZeitEnde   = date($aktuellesDatum.'.19:30:00');
		
		if($Zeit_jetzt < $verglZeitBeginn && $Zeit_jetzt >$verglZeitEnde){
		  $timestamp       = strtotime($aktuellesDatum.' - 1 day');
		   $Anwesend          = date('d.m.Y', $timestamp);}
		  
		else{ 
			$timestamp       = strtotime($aktuellesDatum.' + 1 day');
			$Anwesend          = date('d.m.Y', $timestamp);}
  
  

ECHO"    <table>  
    </div>";		
		
    if($Zeit_jetzt > $verglZeitBeginn && $Zeit_jetzt < $verglZeitEnde)
        {echo "<div id='main_plan_left' class='border'>
                <label>Tagdienst     </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum."> 
                <!-- Aufbau Tagdienst Fahrzeuge-->				
               <table>";  
  
for ($j = 0; $j < $arr_length_j; $j++) {  
  for ($i = 0; $i < $arr_length_i; $i++) {
      
    switch ($Fahrzeugzuordnung[$j][$i]) {
        case 'LHF_1':
        echo"
            <tr><td class='border'><td><td class='border'><td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'LHF_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'DLK':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_1':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_3':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_4':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_5':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_6':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_7':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_8':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_9':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        }
    }
}
Echo"    <table>  
    </div>";

	Echo"<div id='main_plan_right' class='border'> 
		<label>Nachtdienst     </label><input class='Datum' type='date' name='Datum_rechts' value= ".$aktuellesDatum.">
		<!-- Aufbau Nachtdienst	Fahrzeuge-->
		<table>";
        
 for ($j = 0; $j < $arr_length_j; $j++) {  
  for ($i = 0; $i < $arr_length_i; $i++) {
      
    switch ($Fahrzeugzuordnung[$j][$i]) {
        case 'LHF_1':
        echo"
            <tr><td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
            <option value='.PersNr'>Feesche</option></select><input class='PersInfo' type='submit' value='i'/></td>
            <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
            <option value='.PersNr'>Feesche</option></select><input class='PersInfo' type='submit' value='i'/></td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'LHF_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'DLK':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_1':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_3':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_4':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_5':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_6':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_7':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_8':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_9':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        }
    }            
 }
 Echo"    <table>  
    </div>";
 
        }else{
             echo"<div id='main_plan_left' class='border'>
		 	<label>Nachtdienst   </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum.">
		     <!--Aufbau Nachtdienst
		      Fahrzeuge-->
		 	<table>";  
  
for ($j = 0; $j < $arr_length_j; $j++) {  
  for ($i = 0; $i < $arr_length_i; $i++) {
      
    switch ($Fahrzeugzuordnung[$j][$i]) {
        case 'LHF_1':
        echo"
            <tr><td class='border'><td><td class='border'><td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'LHF_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'DLK':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_1':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_3':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_4':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_5':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_6':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_7':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_8':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_9':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        }
    }
}
Echo"    <table>  
    </div>";
       
	Echo"<div id='main_plan_right' class='border'>
		<label>Tagdienst       </label><input class='Datum' type='date' name='Datum_rechts' value= ".$Anwesend.">
		<!--Aufbau Tagdienst Fahrzeuge-->
            <table>";
        
 for ($j = 0; $j < $arr_length_j; $j++) {  
  for ($i = 0; $i < $arr_length_i; $i++) {
      
    switch ($Fahrzeugzuordnung[$j][$i]) {
        case 'LHF_1':
        echo"
            <tr><td class='border'><td><td class='border'><td></tr>
            <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'LHF_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'DLK':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_1':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_2':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_3':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_4':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_5':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_6':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_7':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_8':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        
        case 'RTW_9':
            Echo"
                <tr><td class='border'><td><td class='border'><td></tr>
                <tr><td class='border'><td><td class='border'><td></tr>";
            break;
        }
    }            
 }
 Echo"    <table>  
    </div>";
 }
?>
    
	<h1>Wachbesetzung</h1>
	
<!-- 	Code Wachauswahl -->
 
		<div id="main_head">
		<form action="" method="post">
		<label style='display: block; line-height: 24px; line-width: 120px'>Dienststelle:			
		<select id='Dienststelle' name='Dienststelle'>                          
 			<option value='0'></option>
			<option value='1'>FW_1300</option>
 			<option value='2'>FW_2200</option>
 			<option value='3'>FW_2600</option>		
 		</select> <input type='submit' name='DienststellenZuordnung' value='Auswahl'>
				
		</label>
		</form>
		</div>	
				
		<div id="main_funktion" class="border">
		<label><span>Funktionen</span></label>
		<table>		
                    <?php include("pages/Fahrzeug_Trupp_Bezeichnung.php");?>
		</table>
		</div>
		
                <?php
		$aktuellesDatum  = date('d.m.Y');
		$aktuelleZeit    = date('H:i:s');
                $timestamp       = strtotime($aktuellesDatum.' - 1 day');
                $Datum_gestern   = date('d.m.Y', $timestamp);
                $Datum_morgen   = strtotime(date($aktuellesDatum.' + 1 day'));
		$Zeit_jetzt      = date('d.m.Y.H:i:s');
		$verglZeitBeginn = date($aktuellesDatum.'.07:30:00');
		$verglZeitEnde   = date($aktuellesDatum.'.19:30:00');
		
		if($Zeit_jetzt <$verglZeitBeginn && $Zeit_jetzt >$Datum_gestern) {
                    $timestamp       = strtotime($aktuellesDatum.' - 1 day');
		    $Anwesend        = date('d.m.Y', $timestamp);
                    $timestamp       = strtotime($aktuellesDatum);
                    $Ablösung        = date('d.m.Y', $timestamp); 
                                        
                }elseif($Zeit_jetzt >$verglZeitBeginn && $Zeit_jetzt < $verglZeitEnde){
		    $Anwesend        = $aktuellesDatum;
                    $Ablösung        = $aktuellesDatum; 
                    
                }                                		  
		elseif($Zeit_jetzt >$verglZeitEnde){ 
                    $timestamp       = strtotime($aktuellesDatum);
		    $Anwesend        = date('d.m.Y', $timestamp);
                    $timestamp       = strtotime($aktuellesDatum.' + 1 day');
                    $Ablösung        = date('d.m.Y', $timestamp);                    
                }                
                else{
                    
                }                    
		
		 if($Zeit_jetzt >$verglZeitBeginn && $Zeit_jetzt <$verglZeitEnde){                       
                        
                        Echo"<div id='main_plan_left' class='border'>
		 	<label>Tagdienst     </label><input class='Datum' type='date' name='Datum_links' value= ".$Anwesend."> 
		        <!-- Aufbau Tagdienst Fahrzeuge-->				
		 	<table>";
                        
                        $DivDienst = 'main_plan_left';
                        $DienstZeit = 'Tagdienst';                        

		 	include('pages/Fahrzeuge.php');

		 	Echo"</table>		
		 	</div>";
		 
		        Echo "<div id='main_plan_right' class='border'> 
		 	<label>Nachtdienst     </label><input class='Datum' type='date' name='Datum_rechts' value= ".$Ablösung.">
		 	<!-- Aufbau Nachtdienst	Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_right';
                        $DienstZeit = 'Nachtdienst';
		        include('pages/Fahrzeuge.php');

		 	Echo "</table>
		 	</div>";}		 

		    else{ 
                        Echo "<div id='main_plan_left' class='border'>
		 	<label>Nachtdienst   </label><input class='Datum' type='date' name='Datum_links' value= ".$Anwesend.">
		        <!--Aufbau Nachtdienst Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_left';
                        $DienstZeit = 'Nachtdienst';                        
                        include('pages/Fahrzeuge.php');
 
		 	echo "</table>
		 	</div>";
		
		        Echo"<div id='main_plan_right' class='border'>
		 	<label>Tagdienst       </label><input class='Datum' type='date' name='Datum_rechts' value= ".$Ablösung.">
		        <!--Aufbau Tagdienst Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_right';
                        $DienstZeit = 'Tagdienst';
                        
		 	include('pages/Fahrzeuge.php');
                        
		 	Echo"</table>
		 	</div>";}
  
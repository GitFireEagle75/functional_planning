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
		$Zeit_jetzt       = date('d.m.Y.H:i:s');
		$verglZeitBeginn = date($aktuellesDatum.'.07:30:00');
		$verglZeitEnde   = date($aktuellesDatum.'.19:30:00');
		
		if($Zeit_jetzt <$verglZeitBeginn && $Zeit_jetzt >$verglZeitEnde){
		    $timestamp       = strtotime($aktuellesDatum.' - 1 day');
		    $Anwesend          = date('d.m.Y', $timestamp);}
		  
		else{ 
                    $timestamp       = strtotime($aktuellesDatum.' + 1 day');
                    $Anwesend          = date('d.m.Y', $timestamp);}
 
                    
		
		 if($Zeit_jetzt >$verglZeitBeginn && $Zeit_jetzt <$verglZeitEnde){                       
                        
                        Echo"<div id='main_plan_left' class='border'>
		 	<label>Tagdienst     </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum."> 
		        <!-- Aufbau Tagdienst Fahrzeuge-->				
		 	<table>";
                        
                        $DivDienst = 'main_plan_left';
                        $DienstZeit = 'Tagdienst';                        

		 	include('pages/Fahrzeuge.php');

		 	Echo"</table>		
		 	</div>";
		 
		        Echo "<div id='main_plan_right' class='border'> 
		 	<label>Nachtdienst     </label><input class='Datum' type='date' name='Datum_rechts' value= ".$aktuellesDatum.">
		 	<!-- Aufbau Nachtdienst	Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_right';
                        $DienstZeit = 'Nachtdienst';
		        include('pages/Fahrzeuge.php');

		 	Echo "</table>
		 	</div>";}		 

		    else{ 
                        Echo "<div id='main_plan_left' class='border'>
		 	<label>Nachtdienst   </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum.">
		        <!--Aufbau Nachtdienst Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_left';
                        $DienstZeit = 'Nachtdienst';                        
                        include('pages/Fahrzeuge.php');
 
		 	echo "</table>
		 	</div>";
		
		        Echo"<div id='main_plan_right' class='border'>
		 	<label>Tagdienst       </label><input class='Datum' type='date' name='Datum_rechts' value= ".$Anwesend.">
		        <!--Aufbau Tagdienst Fahrzeuge-->
		 	<table>";
                        
                        $DivDienst = 'main_plan_right';
                        $DienstZeit = 'Tagdienst';
                        
		 	include('pages/Fahrzeuge.php');
                        
		 	Echo"</table>
		 	</div>";}
  
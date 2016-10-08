	<h1>Wachbesetzung</h1>
	
<!-- 	Code Wachauswahl -->
 
		<div id="main_head">
		<form action="mysql.php" method="post">
		<label style='display: block; line-height: 24px; line-width: 120px'>Dienststelle:			
		<select id='Dienststelle' name='Dienststelle'>                          
 			<option value='0'></option>
			<option value='1'>FW_1300</option>
 			<option value='2'>FW_2200</option>
 			<option value='3'>FW_2600</option>		
 		</select> <input type='submit' name='DienststellenZuordnung' value='Auswahl'>"
		?>
		
		</label>
		</form>
		</div>
		
		
		
		<div id="main_funktion" class="border">
		<label><span>Funktionen</span></label>
		<table>		
                        <tr><td class='FunktionAuswahl'>Stf_1<td><td class='FunktionAuswahl'>(37)</td></tr>
                        <tr><td class='FunktionAuswahl'>MA_1<td><td class='FunktionAuswahl'>(52)</td></tr>
		        <tr><td class='FunktionAuswahl'>Atr_1<td><td class='FunktionAuswahl'>(52)</td></tr>
		        <tr><td class='FunktionAuswahl'>Wtr_1<td><td class='FunktionAuswahl'>(54)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>
		        <tr><td class='FunktionAuswahl'>Dlk<td><td class='FunktionAuswahl'>(51)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>		 
		        <tr><td class='FunktionAuswahl'>Stf_2<td><td class='FunktionAuswahl'>(38)</td></tr>
		        <tr><td class='FunktionAuswahl'>MA_2<td><td class='FunktionAuswahl'>(53)</td></tr>
		        <tr><td class='FunktionAuswahl'>Atr_2<td><td class='FunktionAuswahl'>(53)</td></tr>
		        <tr><td class='FunktionAuswahl'>Wtr_2<td><td class='FunktionAuswahl'>(55)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>		 
		        <tr><td class='FunktionAuswahl'>RTW_1<td><td class='FunktionAuswahl'>(71)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>	
		        <tr><td class="border"><td><td class="border"><td></tr>	 
		        <tr><td class='FunktionAuswahl'>RTW_2620<td><td class='FunktionAuswahl'>(71)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>	
		        <tr><td class="border"><td><td class="border"><td></tr>	 
		        <tr><td class='FunktionAuswahl'>RTW_1310<td><td class='FunktionAuswahl'>(71)</td></tr>
		        <tr><td class="border"><td><td class="border"><td></tr>	
		        <tr><td class="border"><td><td class="border"><td></tr>	 
		        <tr><td class='FunktionAuswahl'>RTW_1310<td><td class='FunktionAuswahl'>(72)</td></tr>
                        <tr><td class="border"><td><td class="border"><td></tr>	
		        <tr><td class="border"><td><td class="border"><td></tr>
		</table>
		</div>
		
		<?php
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
		
		 if($Zeit_jetzt > $verglZeitBeginn && $Zeit_jetzt < $verglZeitEnde)
		 {echo "<div id='main_plan_left' class='border'>
		 	<label>Tagdienst     </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum."> 
		      <!-- Aufbau Tagdienst
		      Fahrzeuge-->				
		 	<table>
            <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		<tr>
		 	<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>		
		</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
          <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 			
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	</table>		
		 	</div>
		 
		    <div id='main_plan_right' class='border'> 
		 	<label>Nachtdienst     </label><input class='Datum' type='date' name='Datum_rechts' value= ".$aktuellesDatum.">
		 	<!-- Aufbau Nachtdienst
		 	Fahrzeuge-->
		 	<table>
            <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		<tr>
		 	<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>		
		</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
          <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 			
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 
		 	<tr>
		 		<td class='PersAuswahl'>&nbsp;</td>
		 	    <td class='PersAuswahl'>&nbsp;</td>
		 	</tr>
		 	
		 	</table>
		 	</div>";}		 

		 else{  
		 	echo "<div id='main_plan_left' class='border'>
		 	<label>Nachtdienst   </label><input class='Datum' type='date' name='Datum_links' value= ".$aktuellesDatum.">
		     <!--Aufbau Nachtdienst
		      Fahrzeuge-->
		 	<table>
            <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		<tr>
		 	<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>		
		</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
          <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 			
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 
		 	<tr>
		 		<td class='PersAuswahl'>&nbsp;</td>
		 	    <td class='PersAuswahl'>&nbsp;</td>
		 	</tr>
		 	
		 	</table>
		 	</div>
		
		    <div id='main_plan_right' class='border'>
		 	<label>Tagdienst       </label><input class='Datum' type='date' name='Datum_rechts' value= ".$Anwesend.">
		    <!--Aufbau Tagdienst
		 	Fahrzeuge-->
		 	<table>
            <tr><td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		    <option value='.PersNr'>Feesche</option></select>
                    <input class='PersInfo' type='submit' value='i'/></td>
            <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		    <option value='.PersNr'>Feesche</option></select>
		    <input class='PersInfo' type='submit' value='i'/></td></tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		<tr>
		 	<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>		
		</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		  <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
          <tr>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>	
		 </tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 			
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 	<tr><td class='border'></td><td class='border'></td><td class='border'></td></tr>
		 
		 	<tr>
		 			<td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
			      <input class='PersInfo' type='submit' value='i'/></td>
		 	  <td><select class='PersAuswahl'><option value='.PersNr'>Kratzenstein</option>
		 	    <option value='.PersNr'>Feesche</option></select>
		 		  <input class='PersInfo' type='submit' value='i'/></td>
		 	</tr>
		 	
		 	</table>
		 	</div>";}
   ?>
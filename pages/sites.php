<?php
switch($section) {
	case "Wachbesetzung" :
            
		include ('./pages/Wachbesetzung.php');
               	break;
	
	case "Planung" :
		include ("./pages/Planung.php");
		break;
		
	case "Anwesenheit" :
		include ("./pages/Anwesenheit.php");
		break;
	
	case "Personal" :
		include ("./pages/Personal.php");
		break;
	
	case "Fahrzeuge" :
		include ("./pages/Fahrzeuge.php");
		break;
	
	case "login" :
		include ("./pages/login.php");
		break;
	
	case "logout" :
		include ("./pages/logout.php");
		break;
	
	default :
		include ("./pages/startseite.php");
                break;}

?>
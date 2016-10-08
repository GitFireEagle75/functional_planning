<ul>
	<li><a href="index.php?section=startseite">Startseite</a></li> 
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Diensteinteilung">Einteilung</a></li> <?php } ?>
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Personalverwaltung">Verwaltung</a></li> <?php } ?>
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Fahrzeuge">Fahrzeuge</a></li> <?php } ?>
	<li><a href="index.php?section=login">Login</a></li>
</ul>
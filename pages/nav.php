<ul>
	<li><a href="index.php?section=Wachbesetzung">Wachbesetzung</a></li> 
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Planung">Planung</a></li> <?php } ?>
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Anwesenheit">Anwesenheit</a></li> <?php } ?>
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Personal">Personal</a></li> <?php } ?>
	<?php if($db->isUserLoggedIn()) { ?><li><a href="index.php?section=Fahrzeuge">Fahrzeuge</a></li> <?php } ?>
	<li><a href="index.php?section=login">Login</a></li>

</ul>
<h1>Login</h1>
<?php
	if($db->isUserLoggedIn() === TRUE) {
		echo "Du bist bereits eingeloggt! :) - <a href='index.php?section=logout' alt='Ausloggen'>(ausloggen)</a>";
	} else {
		if(isset($_POST['einloggen'])) {
			$persnr = $_POST['persnr'];
			$passwort = sha1($_POST['passwort']);
			
			if($db->login($persnr, $passwort) === TRUE) {
				echo "Erfolgreich eingeloggt!";
			} else {
				echo "Einloggen fehlgeschlagen!";	
			}
		}
        }    
?>

<form action="index.php?section=login" method="POST">
    <table>
        <tr><td>Personalnummer:</td><td><input type="text" name="persnr" required /></td></tr>
        <tr><td>Passwort:</td><td><input type="password" name="passwort" required /></td></tr>
        <tr><td><td><input type="submit" name="einloggen" value="Einloggen" /><td></td></tr>
    </table>
</form>


<?php
class DB {
	private static $_db_username 		= "Marcel";
	private static $_db_password 		= "47114711";
	private static $_db_host 		= "localhost";
	private static $_db_name		= "Funktionsbesetzung_BF_Berlin";
	private static $_db;	
	
	function __construct() {
		try {
		self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
              	} catch (PDOException $err){
			echo "Datenbankverbindung gescheitert!. $err->getMessage() .";
			die();
		}
	}
	
	function isUserLoggedIn() {
                //error_reporting(E_STRICT);//Fehlerausgabe unterdrückt
		$stmt = self::$_db->prepare("SELECT pers.Personal_ID, pers.Personalnummer, rech.Passwort, rech.Session FROM personal AS pers INNER JOIN rechte AS rech ON (pers.Personal_ID = rech.Personal_Personal_ID) WHERE rech.Session=:sid");
		$stmt->bindParam(":sid", session_id());
               	$stmt->execute();
		
		if($stmt->rowCount() === 1) {
			return true;
		} else {
			return false;	
		}
	}
	
	function login($userPersNr, $pw) {
		$stmt = self::$_db->prepare("SELECT pers.personal_ID, ers.Personalnummer, rech.Passwort, rech.Session FROM personal AS pers inner join rechte AS rech ON (pers.Personal_ID = rech.Personal_Personal_ID) WHERE  persnr=:persnr AND passwort=:pw");
		
		$stmt->bindParam(":persnr", $userPersNr);
		$stmt->bindParam(":pw", $pw);
		print_r($pw);
		$stmt->execute();

		if($stmt->rowCount() === 1) {
	 		$stmt = self::$_db->prepare("UPDATE personal INNER JOIN rechte AS rech SET rech.Session=:sid WHERE persnr=:persnr AND passwort=:pw");
			$stmt->bindParam(":sid", session_id());
			$stmt->bindParam(":persnr", $userPersNr);
			$stmt->bindParam(":pw", $pw);
			$stmt->execute();
			
			return true;
		} else {
			return false;
		}	
	}
	
	function logout() {
		$stmt = self::$_db->prepare("Update Rechte SET Session='' WHERE Session=:sid");	
		$stmt->bindParam(":sid", session_id());
		$stmt->execute();
	}
	
	function getAllEntries($sort = "DESC") {
		if($sort != "ASC" && $sort != "DESC") {
			return -1;	
		}
		
		$stmt = self::$_db->prepare("SELECT * FROM Eintraege ORDER BY Eintrag_ID " . $sort);	
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	   
// schlie�t alle Anweisungen neue Function davor einf�gen 
}
?>


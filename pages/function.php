function getPage($PersonalDaten){ global $db_Pers_host; global
$db_Pers_name; global $db_Pers_user; global $db_Pers_pass; $db_PersDatBa
= mysqli_connect($db_Pers_host, $db_Pers_user, $db_Pers_pass,
$db_Pers_name); if($db_PersDatBa === FALSE){ die("
<p>Es konnte keine Verbindung zur Personal Datenbank hergestellt werden!
<p>
<p>".mysqli_error()."</p>
"); } $sql = 'SELECT PersID, PersNr, Nachname, Vorname, DG, Wache,
Abteilung, Rett_Funktion FROM
`personal`';//.mysql_real_escape_string(PersNr).' ";'; $result =
$db_PersDatBa->query($sql); if (!$result) { die ('Etwas stimmte mit dem
Query nicht: '.$db_PersDatBa->error); } echo 'Die Ergebnistabelle
besitzt '.$result->num_rows." Datens�tze
<br />
\n"; while ($row = $result->fetch_assoc()) { // NULL ist �quivalent zu
false // $row ist nun das Array mit den Werten echo '"Daten f�r
Personal Nummer: "'.$row['PersNr'].'" Namen: "'.$row['Nachname'].'","'
.$row['Vorname'].'" DG: "'.$row['DG'].'" Wache: "'.$row['Wache'].'"
Abteilung: "'.$row['Abteilung'].'" Funktion Rettungsdienst:
"'.$row['Rett_Funktion']."\"
<br />
\n"; } $result->close(); unset($result); // und referenz zum objekt
l�schen, brauchen wir ja nicht mehr... } ?>

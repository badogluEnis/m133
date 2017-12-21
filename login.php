<?php
$meldung = "";
if(empty($_POST['email']) & empty($_POST['passwort'])){
    $email = "";
    $password = "";
} else {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $uid = getUserIdFromDb($email, $passwort);
    if (empty($uid)){
        $meldung = "Login ist Falsch";
        header('Location: index.php?function=login&bid='.$blogId.'');
    } else {        
        $_SESSION['uid'] = $uid;
        header('Location: index.php?function=entriesMember&bid='.$uid.'');
    }
}
// $_SERVER['PHP_SELF'] = login.php in diesem Fall (also die PHP-Datei, die gerade ausgeführt wird).
// Mit andern Worten: Nach Senden des Formulars wird wieder login.php aufgerufen.
// Die Funktionen zur Überprüfung, ob die Login-Daten gültig sind, muss also hier oben im PHP-Teil stehen!
// Wenn Login-Daten korrekt sind:
// Session-Variable mit Benutzer-ID setzen und Wechsel in Memberbereich
// $_SESSION['uid'] = $uid;
// header('Location: index.php?function=entries_member');
// Wenn Formular gesendet worden ist, die Login-Daten aber nicht korrekt sind:
// Unten auf der Seite Anzeige der Fehlermeldung.
?>
<form method="post" action="<?= $_SERVER['PHP_SELF']."?function=login"; ?>">
  <label for="email">Benutzername</label>
  <div style="width: 400px;">
	<input class="form-control" type="email" id="email" name="email" placeholder="E-Mail" value="" />
  </div>
  <label for="passwort">Passwort</label>
  <div style="width: 400px;">
	<input class="form-control" type="password" id="passwort" name="passwort" placeholder="Passwort" value="" />
  </div>
    <p style="color:red" ><?php echo $meldung; ?></p>
  <div>
	<button class="btn btn-primary" type="submit">senden</button>
  </div>
  <br>
</form>

<?php  die('Noch keinen Account?  <a href="index.php?function=register&bid='.$blogId.'">hier</a> Registrieren!');
 echo "<br><a href=\"javascript:history.go(-1)\">zurück</a>"; ?>
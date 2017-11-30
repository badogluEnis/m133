<?php
require_once 'include/functions_db.php';
  $meldung = "";
  $email = "";
  $passwort = "";
  $userId = "";
  // $_SERVER['PHP_SELF'] = login.php in diesem Fall (also die PHP-Datei, die gerade ausgeführt wird).
  // Mit andern Worten: Nach Senden des Formulars wird wieder login.php aufgerufen.
  // Die Funktionen zur Überprüfung, ob die Login-Daten gültig sind, muss also hier oben im PHP-Teil stehen!
  // Wenn Login-Daten korrekt sind:
  // Session-Variable mit Benutzer-ID setzen und Wechsel in Memberbereich
  // $_SESSION['uid'] = $uid;	
  // header('Location: index.php?function=entries_member');
  // Wenn Formular gesendet worden ist, die Login-Daten aber nicht korrekt sind:
  // Unten auf der Seite Anzeige der Fehlermeldung.
      if (isset($_POST['email']) && isset($_POST['passwort'])){
      $email = $_POST['email'];
      $passwort = $_POST['passwort'];
      $userId = getUserIdFromDb($email, $passwort);
      if ( $userId == 0){
          $meldung = "<p style=\"color:red;\">Login daten inkorrekt!</p>";
          echo "<p>$meldung</p>";
      } else {
          $_SESSION['uid'] = $userId;
          $_SESSION['username'] = getUserName($userId);
          header('Location: index.php?function=entries_member');
        }
      }
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=login"; ?>">
  <label for="email">Benutzername</label>
  <div>
	<input type="email" id="email" name="email" placeholder="E-Mail" value="" />
  </div>
  <label for="passwort">Passwort</label>
  <div>
	<input type="password" id="passwort" name="passwort" placeholder="Passwort" value="" />
  </div>
  <div>
	<button type="submit">senden</button>
  </div>
  <div>
  	<p id="error" style="color: red"></p>
  </div>
</form>

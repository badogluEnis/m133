<?php
session_start();
require_once("include/functions.php");
require_once("include/functions_db.php");
require_once("include/functions_db_plus.php");
define("DBNAME", "db/blog.db");

// Datenbankverbindung herstellen, diesen Teil nicht ändern!
if (!file_exists(DBNAME)) exit("Die Datenbank 'blog.db' konnte nicht gefunden werden!");
$db = new SQLite3(DBNAME);
setValue("cfg_db", $db);

// Einfacher Dispatcher: Aufruf der Funktionen via index.php?function=xy
if (isset($_GET['function'])) $function = $_GET['function'];
else $function = "login";
// Prüfung, ob bereits ein Blog ausgewählt worden ist
if (isset($_GET['bid'])) $blogId = $_GET['bid'];
else $blogId = 0;
if (isset($_GET['eid'])) $entryId = $_GET['eid'];
else $entryId = 0;
if (isset($_GET['cid'])) $commentId = $_GET['cid'];
else $commentId = 0;
$updateValues = array('title' => '','content' => '');
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">

<!-- BOOTSTRAP - falls nicht gewünscht, einfach die Zeilen zwischen den kommentaren löschen-->
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!-- BOOTSTRAP - falls nicht gewünscht, einfach die Zeilen zwischen den kommentaren löschen-->
  
  <script src="include/functions.js"></script>
  
  <title>Blog-Projekt</title>
</head>

<body>
<!-- innerhalb von <nav> und </nav> wird Boostrap verwendet wenn nicht gewünscht, einfach entfernen oder anpassen -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
      <div class="navbar-header">
		<a class="navbar-brand"><?= getMenuTitle($blogId); ?></a>
      </div>
      <ul class="nav navbar-nav">
		<?= getMenu($blogId); ?>
      </ul>
	</div>
  </nav>
  <div class="container" style="margin-top:80px">
  <?php
  if (!file_exists("$function.php")) exit("Die Datei '$function.php' konnte nicht gefunden werden!");        // Für jede Funktion, die mit ?function=xy in der URL übergeben wird, muss eine Datei (in diesem Fall xy.php) existieren.
  require_once("$function.php");     	// Diese Datei wird aufgerufen, um den Content der Seite aufzubereiten und anzuzeigen.
  ?>
  </div>
</body>
</html>
<?php
  // Datenbankverbindung schliessen, diesen Teil nicht ändern!
  $db = getValue('cfg_db');
  $db->close();
?>
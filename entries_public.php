<?php

    require_once 'include/functions_db.php';
    
    foreach (getEntries($_GET['bid']) as $entry) {
        echo "<h2>$entry[2]</h2>";
        echo "<p>$entry[3]</p>";
    }
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
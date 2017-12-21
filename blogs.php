<?php
    require_once 'include/functions.php';
    
    foreach (getUserNames() as $user){
        if ($_GET['bid'] == $user[0]) {
            echo "<div><a href='index.php?function=entriesPublic&bid=$user[0]' id='$user[0]' title='Blog von $user[1] auswählen'><u><h4>$user[1]</h4></u></a></div>";
        } else {
        echo "<div><a href='index.php?function=entriesPublic&bid=$user[0]' id='$user[0]' title='Blog von $user[1] auswählen'><h4>$user[1]</h4></a></div>";
        }
    }

  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
?>

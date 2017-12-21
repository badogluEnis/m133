<?php
// Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
// Hier Code... (Schlaufe über alle Einträge dieses Blogs)
$entries = getEntries($blogId);
if ($entries != NULL) {
    foreach ($entries as $entry => $blogs) {
        $content = preg_replace("/[^ ]*$/", '', substr($blogs['content'], 0, 100));
        $content = "<pre>".$content.'...'."</pre>";
        echo '<h4>'.$blogs['title'].'</h4>';
        echo date('d.m.Y',$blogs['datetime']);
        echo '<br>';
        echo $content;
        echo '<a class="btn btn-success" href="index.php?function=entriesPublicDetails&bid='.$blogId.'&eid='.$blogs['eid'].'">Blog anzeigen </a>';
        echo "<br>"."<br>";
    }
} else {
    echo "Dieser User hat noch keinen Blog erstellt.";
}
echo '<br><a href="index.php?function=blogs&bid='.$blogId.'">Zurück</a>';
// Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
<?php
if(getUserId() == true) {
    echo '<h1>Meine Blogs<h1>';
    $entries = getEntries($blogId);
    if ($entries == NULL) {
        echo "Sie haben noch keinen Blog erstellt";
        echo '<a href="index.php?function=entriesMemberCreate&bid='.$blogId.'">Blog erstellen </a>';
    } else {
        foreach ($entries as $entry => $blogs) {
            $content =  preg_replace("/[^ ]*$/", '', substr($blogs['content'], 0, 100));
            $content = "<pre>".$content.'...'."</pre>";
            echo "<h4>".$blogs['title']."</h4>";
            echo date('d.m.Y',$blogs['datetime'])."<br>";
            echo $content;
            echo '<a style="margin-left: 5px;" class="btn btn-success" href="index.php?function=entriesMemberDetails&bid='.$blogId.'&eid='.$blogs['eid'].'">Blog anzeigen </a>';
            echo '<a style="margin-left: 5px;" class="btn btn-danger" onclick="return confirmDelete()" href="index.php?function=entriesMemberDelete&bid='.$blogId.'&eid='.$blogs['eid'].'">Blog Löschen </a>';
            echo '<a style="margin-left: 5px;" class="btn btn-warning" href="index.php?function=entriesMemberEdit&bid='.$blogId.'&eid='.$blogs['eid'].'">Blog bearbeiten </a>';
            echo "<br>"."<br>";
        }
    }
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>
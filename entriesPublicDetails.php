<?php
// Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
// Hier Code... (Schlaufe über alle Einträge dieses Blogs)
$detailBlog = getEntry($entryId);
echo ' <div class="Entry">
    <div class="title">
      <h1>';
echo $detailBlog['title'];
echo '</h1>
    </div>
    <div class="created_on">
      <p>';
echo date('d.m.Y',$detailBlog['datetime']);
echo '</p>
    </div>
    <div class="clontent">
      <p>';
echo nl2br($detailBlog['content']);
echo '<p/>
    </div>
  </div>';
// Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>

<?php
    echo "<br><br>";
    echo "<h3>Kommentare</h3>";
    $allComments =  getComments($entryId);
    foreach ($allComments as $comments => $comment) {
      echo "<h4><b>".$comment['name'].":</b></h4>";
      echo nl2br($comment['content']."<br>");
      echo date('d.m.Y', $comment['datetime'])."<br>";
      
    }
?>
  <h3>Neuer Kommentar</h3>
  <form method="post" action='<?= $_SERVER['PHP_SELF']."?function=entriesPublicDetails"; ?>'>
    <input type="hidden" name="bid" value="<?= $blogId ?>">
    <input type="hidden" name="eid" value="<?= $entryId ?>">
        <label for="commentTitle">Benutzername</label>
      <div>
    	   <input class="form-control" type="text" id="title" name="titleComment" placeholder="Kommentar Titel" required="required"/>
      </div>
        <label for="contentComment">Kommentar</label>
      <div>
        <textarea class="form-control" name="contentComment" rows="10" cols="80" placeholder="Dein Kommentar"></textarea>
      </div>
      <div>
    	   <button style="margin-top: 5px;" class="btn btn-primary" type="submit">senden</button>
      </div>
    </form>

    <?php
      if(empty($_POST['titleComment']) & empty($_POST['contentComment'])){
        $titel = '';
        $content = '';
      } else {
      $titel = $_POST['titleComment'];
      $content = $_POST['contentComment'];
      addComment($_POST['eid'] ,$titel,$content);
      header('Location: index.php?function=entriesPublicDetails&bid='.$_POST['bid'].'&eid='.$_POST['eid'].'');
      }
      echo '<br><a href="index.php?function=entriesPublic&bid='.$blogId.'">zurück</a>';
?>
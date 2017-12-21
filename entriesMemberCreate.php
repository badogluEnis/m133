<?php
if(getUserId() == 0) {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
} else {
    $meldung = "";
    if(empty($_POST['titel']) & empty($_POST['content'])){
        $titel = '';
        $content = '';
    } else {
        $titel = $_POST['titel'];
        $content = $_POST['content'];
        $createdEntry = addEntry($_SESSION['uid'],$titel,$content);
        
        header('Location: index.php?function=entriesMember&bid='.$_POST['bid'].'');
    }
    ?>

<form method="post" action="<?=  $_SERVER['PHP_SELF'].'?function=entriesMemberCreate&bid='.$blogId.''; ?>">
  <input  class="form-control" type="hidden" name="bid" value="<?= $blogId ?>"/>

  <label for="titel">Titel</label>
  <div style="width: 50%;">
	<input class="form-control" id="titel" name="titel" placeholder="Blog Titel" required="required"/>
  </div>
  <label for="content">Blog-Text</label>
  <div style="width: 50%;">
    <textarea class="form-control" name="content" rows="10" cols="80"></textarea>
  </div>
  	<br>
	<button class="btn btn-primary" type="submit">Posten</button>
</form>

<?php echo  "<br><a href=\"javascript:history.go(-1)\">zurück</a>";
}
 ?>
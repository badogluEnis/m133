<?php
$detailBlog = getEntry($entryId);
if(getUserId() == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['titel']) &&   isset($_POST['content']) && isset( $_POST['eid'])){
            $createdEntry = updateEntry($_POST['eid'], $_POST['titel'], $_POST['content']);
            header('Location: index.php?function=entriesMember&bid='.$_SESSION['uid']);
        }
    }
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>

 <form method="post" action="<?= $_SERVER['PHP_SELF']."?function=entriesMemberEdit" ?>">
  <div>
  	<input class="form-control" id="id" name="eid" type="hidden" class="form-control input-md" value="<?= $detailBlog['eid']?>">
  </div>
   <label for="titel">Titel</label>
   <div>
 	<input class="form-control" type="text" id="titel" name="titel" placeholder="Blog Titel" required="required" value="<?php  echo $detailBlog['title'] ?>"/>
   </div>
   <label style="margin-top: 5px;" for="content">Blog content</label>
   <div>
     <textarea class="form-control" name="content" rows="10" cols="80"><?= $detailBlog['content'] ?></textarea>
   </div>
   <div>
 	<button class="btn btn-primary" style="margin-top: 5px;" type="submit">senden</button>
   </div>
 </form>
 <?= "<br><a href=\"javascript:history.go(-1)\">zurück</a>"; ?>
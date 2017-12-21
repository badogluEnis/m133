<?php
$detailBlog = getEntry($entryId);
if(getUserId() == true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateValues['title'] = $_POST['titel'];
        $updateValues['content'] = $_POST['content'];
        $updateValues['eid'] = $_POST['eid'];
        $createdEntry = updateEntry($updateValues['eid'], $updateValues['title'], $updateValues['content']);
        header('Location: index.php?function=entriesMember&bid='.$_SESSION['uid']);
    }
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>

 <form method="post" action="<?= $_SERVER['PHP_SELF']."?function=entriesMemberEdit" ?>">
  <div>
  	<input id="id" name="eid" type="hidden" class="form-control input-md" value="<?= $detailBlog['eid']?>">
  </div>
   <label for="titel">Titel</label>
   <div>
 	<input type="text" id="titel" name="titel" placeholder="Blog Titel" required="required" value="<?php  echo $detailBlog['title'] ?>"/>
   </div>
   <label for="content">Blog content</label>
   <div>
     <textarea name="content" rows="10" cols="80"><?= $detailBlog['content'] ?></textarea>
   </div>
   <div>
 	<button type="submit">senden</button>
   </div>
 </form>
 <?= "<br><a href=\"javascript:history.go(-1)\">zurück</a>"; ?>
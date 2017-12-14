<?php
if(getUserIdFromSession() == true) {
    if(empty($_POST)){
        $titel = '';
        $content = '';
    } else {
        $titel = $_POST['titleComment'];
        $content = $_POST['contentComment'];
        addComment($_POST['eid'] ,$titel,$content);
        header('Location: index.php?function=entriesMemberDetails&bid='.$_POST['bid'].'&eid='.$_POST['eid'].'');
    }
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>
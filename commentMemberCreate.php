<?php
if(getUserIdFromSession() == !true) {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
} else {
    if(empty($_POST)){
        $titel = '';
        $content = '';
    } else {
        $titel = $_POST['titleComment'];
        $content = $_POST['contentComment'];
        addComment($_POST['eid'] ,$titel,$content);
        header('Location: index.php?function=entries_member_details&bid='.$_POST['bid'].'&eid='.$_POST['eid'].'');
    }
}
?>
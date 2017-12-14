<?php
if(getUserIdFromSession() == true) {
    deleteComment($commentId);
    header('Location: index.php?function=entriesMemberDetails&bid='.$blogId.'&eid='.$entryId.'');
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>
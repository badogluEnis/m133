<?php
if(getUserIdFromSession() == !true) {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
} else {
    deleteComment($commentId);
    header('Location: index.php?function=entries_member_details&bid='.$blogId.'&eid='.$entryId.'');
}
?>
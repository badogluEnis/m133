<?php
if(getUserIdFromSession() == true) {
    deleteEntry($entryId);
    header('Location: index.php?function=entriesMember&bid='.$_SESSION['uid']);
} else {
    die('Bitte zuerst <a href="index.php?function=login">einloggen</a>');
}
?>
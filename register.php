<?php
$meldung = '';
$password = '';
$confirm_password = '';
if(empty($_POST)){
    $benutzername = '';
    $email = '';
    $password = '';
} else {
    if ($_POST['password'] === $_POST['confirm_password']) {
        $benutzername = $_POST['benutzername'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rolle = $_POST['role'];
        $password = md5($password);
        addUser($benutzername, $email, $password, $rolle);
        header('Location: index.php?function=login&bid='.$blogId.'');
    } else {
        $meldung = "Ihr Passwörter stimmen nicht überein";
    }
}
?>


<form method="post" action="<?= $_SERVER['PHP_SELF']."?function=register"; ?>">
  <div class="">
    <input type="hidden" name="bid" value='<?= $blogId ?>'>
  </div>
  <label for="name">Benutzername</label>
  <div>
	<input type="text" id="benutzername" name="benutzername" placeholder="Benutzername" required="required" />
  </div>
  <label for="email">E-Mail</label>
  <div>
  <input type="email" id="email" name="email" placeholder="E-Mail" required="required" />
  </div>
  <label for="passwort">Passwort</label>
  <div>
	<input type="password" id="password" name="password" placeholder="Passwort" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Bitte geben sie ein Passwort mit mindestens 8 Zeichen, mindestens ein Grossbuchstabe, mindestens eine Zahl und mindestens ein Sonderzeichen"/>
  </div>
  <label for="passwort">Passwort Wiederholen</label>
  <div>
  <input type="password" id="confirmpassword" name="confirm_password" placeholder="Passwort Wiederholen" required="required"/>
  </div>
  <div>
  <input type="hidden" id="role" name="role" value="1" />
  </div>
  <div class="meldung">
    <p style="color:red" ><?php echo $meldung; ?></p>
  </div>
  <div>
	<button type="submit">senden</button>
  </div>
</form>
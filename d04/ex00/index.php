<?php
session_start();
if (isset($_GET['login']) && isset($_GET['passwd']) && $_GET['login'] !== "" && $_GET['passwd'] !== "" && isset($_GET['submit']) && $_GET["submit"] == 'OK')
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html>
	<body>
		<form method="get" action="index.php">
		<?php if (isset($_SESSION['login'])) { ?>
			Identifiant: <input required type="text" name="login" value=<?php echo $_SESSION['login']; ?> />
		<?php } else { ?>
			Identifiant: <input required type="text" name="login" value="" />
		<?php } ?>
			<br />
		<?php if (isset($_SESSION['passwd'])) { ?>
			Mot de passe: <input required type="password" name="passwd" value=<?php echo $_SESSION['passwd']; ?> />
		<?php } else { ?>
			Mot de passe: <input required type="password" name="passwd" value="" />
		<?php } ?>
			<input type="submit" name = "submit" value="OK" />
		</form>
	</body>
</html>

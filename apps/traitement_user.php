<?php




	require('models/User.class.php');
	require('models/UserManager.class.php');







$userManager = new UserManager($db);
if (isset($_POST['login'], $_POST['password']))
{
	try
	{
		$user = $userManager->getByLogin($_POST['login']);
		if ($user->verifPassword($_POST['password']))
		{
			$_SESSION['id'] = $user->getId();
			$_SESSION['login'] = $user->getLogin();
			header('Location: tchat');
			exit;
		}
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}
?>

<?php


require('models/User.class.php');
require('models/UserManager.class.php');
$usermanager = new UserManager($db);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'login')
	{
		if (isset($_POST['login'], $_POST['password']))
		{
			try
			{
				$manager = new UserManager($db);
				$user = $manager->getByLogin($_POST['login']);
				$user->verifPassword($_POST['password']);
				$_SESSION['id'] = $user->getId();
				$_SESSION['login'] = $user->getLogin();
				header('Location: home');
				exit;
			}
			catch (Exception $e)
			{
				$login = $_POST['login'];
				$error = $e->getMessage();
			}
		}
	}
	if ($action == 'register')
	{
		if (isset($_POST['login'],$_POST['password1'],$_POST['password2']))
		{
			try
			{
				$user = $usermanager->createLogin($_POST['login'],$_POST['password1'],$_POST['password2']);
				header('Location: home');
				exit;
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
		}
	}
}

?>

<?php

require('models/Message.class.php');
require('models/MessageManager.class.php');
$messagemanager = new MessageManager($db);

// if (isset($_POST['action']))
// {
// 	$action = $_POST['action'];
// 	// Récupération de l'action Create Ticket
// 	if ($action == 'new_message')
// 	{
// 		if(isset($_POST['message']))
// 		{
// 			$message = $_POST['message'];
// 			// Securisation des variables
// 			$message = mysqli_real_escape_string($db, $message);
// 			// Insertion des différentes valeurs dans la table message
// 			$query = "INSERT INTO message (content) VALUES('".$message."')";
// 			$res = mysqli_query($db, $query);
// 				if ($res === false)
// 				{
// 					$error = "Erreur interne au serveur";
// 				}
// 				else
// 				{
// 					header('Location: home');
// 					exit;
// 				}
// 		}
// 	}
// }

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'new_message')
	if (isset($_POST['content']))
	{
		try
		{
			$message = $messagemanager->createMessage($_POST['content'],$_SESSION['id']);
			header('Location: home');
			exit;
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}

}

// SELECT login.user, content.message FROM message, user WHERE id_user.user = id_author.message

?>
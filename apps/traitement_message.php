<?php
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	// Récupération de l'action Create Ticket
	if ($action == 'new_message')
	{
		if(isset($_POST['message']))
		{
			$message = $_POST['message'];
			// Securisation des variables
			$message = mysqli_real_escape_string($db, $message);		
			// Insertion des différentes valeurs dans la table tickets
			$query = "INSERT INTO message (content) VALUES('".$message."')";
			$res = mysqli_query($db, $query);
				if ($res === false)
				{
					$error = "Erreur interne au serveur";
				}
				else
				{
					header('Location: home');
					// var_dump($titre);
					exit;
				}
		}
	}
}


?>
<?php 

$query = "SELECT id_author, content FROM message";// On déclare une variable qui contiendra notre requête SQL
$result = mysqli_query($db, $query);// On exécute notre requête SQL
$number = 1;
while ($message = mysqli_fetch_assoc($result))// On récupère les résultats de notre requête un par un
{
	$id = $message['id_author'];
	$content = $message['content'];
	$number++;
	require('views/display_message.phtml'); 
}



?>
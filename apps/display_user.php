<?php
$userManager = new userManager($db);
$userManager->editDate($_SESSION['id']);
$listUser = $userManager->getUserConnect();
$count = 0;
$max = sizeof($listUser);
while ($count < $max)// On récupère les résultats de notre requête un par un
{
	$users = $listUser[$count];
	require('views/display_user.phtml');
	$count++;
}
?>
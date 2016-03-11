<?php
$userManager = new userManager($db);
$userManager->editDate($_SESSION['id']);
$listUser = $userManager->getUserConnect();
$count = 0;
$max = sizeof($listUser);
while ($count < $max)
{
	$users = $listUser[$count];
	require('views/user.phtml'); 
	$count++;
}
?>

<?php
// SESSION
session_start();

$db = @mysqli_connect("localhost", "root", "troiswa", "miaou_project");
// if (!$db)
// 	require('apps/offline.php');

$traitements_action = [
	'home'=>'message',
];

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($traitements_action[$action])) {
		$value = $traitements_action[$action];
		require('apps/traitement_'.$value.'.php');
	} else {
		header('Location: home');
		exit;
	}

}

	require ('apps/skel.php');

?>

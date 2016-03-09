<?php
// SESSION
session_start();

spl_autoload_register(function($class)
{
    require('models/'.$class.'.class.php');
});

/*	AVANT :
function __autoload($class)
{
    require('models/'.$class.'.class.php');
}
*/

$db = @mysqli_connect("192.168.1.76", "miaou_project", "password", "miaou_project");
// if (!$db)
// 	require('apps/offline.php');

$page = "home";
$access_page = ['home'];

if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access_page))
	{
		$page = $_GET['page'];
	}
	else
	{
		header('Location: home');
		exit;
	}
}

$traitements_action = [
	'new_message'=>'message',
	'register'=>'user',
	'login'=>'user',
	'logout'=>'user',
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
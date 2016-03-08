<?php
/* ##PASCAL ~> Pas obligé d'utiliser une variable ici, mais pourquoi pas */
// if ( $session_role == 'admin' )
// 	$header = 'header_admin';
if (isset ($_SESSION['login']))
 	$header = 'header_connect';
else
	$header = 'header';

require('views/'.$header.'.phtml');


?>
<?php
if (isset ($_SESSION['login']))
 	$header = 'header_connect';
else
	$header = 'header';

require('views/'.$header.'.phtml');


?>
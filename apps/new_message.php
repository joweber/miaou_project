<?php 

	if (isset ($_SESSION['login']))
		require('views/new_message.phtml'); 
	else
		require('views/message_disconnect.phtml');
?>
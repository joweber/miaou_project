<?php
class MessageManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function createMessage($content)
	{
		$message = new Message();
		$message->setContent($content);
		$content = mysqli_real_escape_string($this->db, $message->getContent());
		$query = "INSERT INTO message (content) VALUES('".$content."')";
		$res = mysqli_query($this->db, $query);
	}
}
?>
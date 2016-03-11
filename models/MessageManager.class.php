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

	public function createMessage($content, User $author)
	{
		$message = new Message($this->db);
		$message->setContent($content);
		$message->setAuthor($author);
		$content = $this->db->quote($message->getContent());
		$id_author = intval($message->getAuthor()->getId());
		$query = "INSERT INTO message (content, id_author) VALUES(".$content.",'".$id_author."')";
		$res = $this->db->exec($query);
	}

	// public function getLastMessage()
	// {
	// 	$query = "SELECT * FROM message ORDER BY id_message LIMIT 1";
	// 	$result = $this->db->query($query);
	// 	$lastmessage = [];
	// 	while ($lastmessage = $result->fetchObject('Message', [$this->db]))
	// 	{
	// 		$lastmessage[] = $lastmessage;
	// 	}
	// 	return $lastmessage;
	// }

	public function getAll()
	{

		// $query = "SELECT * FROM message LIMIT 100";
		$query = "SELECT * FROM (SELECT * FROM message ORDER BY id_message DESC LIMIT 100) sub ORDER BY id_message ASC";
		$result = $this->db->query($query);
		$messages = [];
		while ($message = $result->fetchObject('Message', [$this->db]))
		{
			$messages[] = $message;
		}
		return $messages;
	}
}
?>
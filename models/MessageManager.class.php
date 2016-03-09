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
		$content = mysqli_real_escape_string($this->db, $message->getContent());
		$id_author = intval($message->getAuthor()->getId());
		$query = "INSERT INTO message (content, id_author) VALUES('".$content."','".$id_author."')";
		$res = mysqli_query($this->db, $query);
	}

	public function getAll()
	{
		$query = "SELECT * FROM message LIMIT 0, 100";
		$result = mysqli_query($this->db, $query);
		$messages = [];
		while ($message = mysqli_fetch_object($result, 'Message', [$this->db]))
		{
			$messages[] = $message;
		}
		return $messages;
	}
}
?>
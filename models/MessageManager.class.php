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
		// var_dump($content);
		// var_dump($id_author);
		$query = "INSERT INTO message (content, id_author) VALUES(".$content.",'".$id_author."')";
		// var_dump($query);
		$res = $this->db->exec($query);
	}

	public function getAll()
	{
		$query = "SELECT * FROM message LIMIT 0, 100";
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
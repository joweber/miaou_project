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
		$content = mysqli_real_escape_string($this->db, $content);
		$query = "INSERT INTO message (content) VALUES('".$content."')";
		$res = mysqli_query($this->db, $query);
		if ($res)
		{
			$message = mysqli_fetch_object($res, "Message");
			if ($message)
			{
				return $message;
			}
			else
				throw new Exception("La requête SQL n'a pas été exécutée");
		}
		else 
			throw new Exception("Erreur interne");
	}
	
}
?>
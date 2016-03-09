<?php
class Message
{
	// Déclarer les propriétés
	private $db;
	private $id;
	private $id_author;
	private $author;
	private $content;
	private $date;

	// GETTER

	public function getId()
	{
		return $this->id; 
	}

	public function getAuthor()
	{
		if ($this->author === null)
		{
			try
			{
				$manager = new UserManager($this->db);
				$this->author = $manager->getById($this->id_author);
			}
			catch (Exception $e)
			{

			}
		}
		return $this->author;
	}	

	public function getContent()
	{
		return $this->content;
	}

	public function getDate()
	{
		return $this->date;
	}

	// SETTER

	public function setContent($content)
	{
		if (strlen($content) > 0 && strlen($content) < 255)
			$this->content = $content;
		else 
			throw new Exception("Le message doit être compris entre 1 et 254 caractères");
	}	

	public function setAuthor($author)
	{
		if (strlent($author) > 0 && strlen($author) < 11)
			$this->author = $author;
	}

}

?>
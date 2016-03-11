<?php
class Message
{
	// Déclarer les propriétés
	private $db;
	private $id;
	private $id_author;// -> User
	private $author;// -> calculée -> composition
	private $content;
	private $date;

	// GETTER
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getId()
	{
		return $this->id; 
	}

	public function getAuthor()
	{
		if ($this->author == null)
		{
			$manager = new UserManager($this->db);
			$this->author = $manager->getById($this->id_author);
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
		if (strlen($content) > 0 && strlen($content) < 1023)
			$this->content = $content;
		else 
			throw new Exception("Le message doit être compris entre 1 et 1023 caractères");
	}	

	public function setAuthor(User $author)
	{
		$this->author = $author;
		$this->id_author = $author->getId();
	}

}

?>
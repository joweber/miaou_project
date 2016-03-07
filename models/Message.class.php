<?php
class Message
{
	// Déclarer les propriétés
	private $id;
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
	}	

	public function setAuthor($author)
	{
		if ($this->author !== null)
			$this->author = $author;
	}

}

?>
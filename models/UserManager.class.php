<?php
class UserManager
{
	// Déclarer les propriétés
	private $db;

	// Constructeur
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getByLogin($login)
	{
		$login = mysqli_real_escape_string($this->db, $login);
		$query = "SELECT * FROM user WHERE login='".$login."'";
		$res = mysqli_query($this->db, $query);
		if ($res)
		{
			$user = mysqli_fetch_object($res, "User");
			if ($user)
			{
				return $user;
			}
			else
				throw new Exception("Utilisateur non existant");
		}
		else
			throw new Exception("Erreur interne");
	}

	public function createLogin($login, $password1, $password2)
	{
		$user = new User();
		$user->setLogin($login);
		$user->setAdmin(false);
		$user->initPassword($password1,$password2);
		$hash = mysqli_real_escape_string($this->db, $user->getHash());
		$login = mysqli_real_escape_string($this->db, $user->getLogin());
		$query = "INSERT user (login, hash) VALUES('".$login."','".$hash."')";
		try
		{
			$res = mysqli_query($this->db, $query);
		}
		catch (Exception $e)
		{
			throw new Exception("Erreur interne");
		}
		return $this->getByLogin($user->getLogin());
	}

}
?>
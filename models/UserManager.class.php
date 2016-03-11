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
		$login = $this->db->quote($login);
		$query = "SELECT * FROM user WHERE login=".$login."";
		$res = $this->db->query($query);
		if ($res)
		{
			$user = $res->fetchObject("User");
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
	public function getById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM user WHERE id_user=".$id."";
		$res = $this->db->query($query);
		if ($res)
		{
			$user = $res->fetchObject("User");
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

	public function getLoginExist($login)
	{
		$loginVerif = $this->db->quote($login);
		$query = "SELECT id_user FROM user WHERE login=".$loginVerif."";
		$res = $this->db->query($query);
		if ($res)
		{
			if ($res->rowCount() == 0)
			{
				return TRUE; 
			}
			else
			{
				return FALSE;
			}
		}
		else
			throw new Exception("Erreur lors du test du login");
	}

	public function createLogin($login, $password1, $password2)
	{
		$user = new User();
		$user->setLogin($login);
		$user->setAdmin(false);
		$user->initPassword($password1,$password2);
		if($this->getLoginExist($login))
		{
			$login = $this->db->quote($user->getLogin());
			$hash = $this->db->quote($user->getHash());
			$query = "INSERT user (login, hash) VALUES(".$login.",".$hash.")";
			try
			{
				$res = $this->db->exec($query);
			}
			catch (Exception $e)
			{
				throw new Exception("Erreur interne");
			}
			return $this->getByLogin($user->getLogin());
		}
		else
		{
			throw new Exception("L'utilisateur existe déjà.");
		}
	}


}
?>
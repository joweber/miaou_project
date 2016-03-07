<?php
class User
{
	// Déclarer les propriétés
	private $id; //même nom que dans la BDD.
	private $login;
	private $hash;
	private $date;
	private $admin;

	// Déclarer les méthodes
	//Liste des différents getter
	// getter de $Id -> getId
	public function getId()
	{
		return $this->id; //On récupère la propriété id de $this - Ne pas mettre de $ après une flèche.
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function isAdmin() // Un getter de booleen transforme le get en is
	{
		return $this->admin;
	}

	//Liste des différents setter
	

	public function setLogin($login)
	{
		if (strlen($login) > 3 && strlen($login) < 31)
			$this->login = $login;
	}
	
	public function setAdmin($admin)
	{
		if ($admin === true || $admin === false)
			$this->admin = $admin;
	
		// ou
		// 		$this->admin = (bool)$admin;// (bool) permet de "caster" une variable en un type particulier, transformer n'importe quel type en booleen (ici)
	}

	// Liste des méthodes "autres"
	// Vérfier le password ?
	public function verifPassword($password)
	{
		return password_verify($password, $this->password); //retourne true ou false, en fonction si c'est bon ou pas.
	}

		// modifier password ?
	public function editPassword($oldPassword, $newPassword1, $newPassword2)
	{
		if ($newPassword1 === $newPassword2)
		{
			$newPassword = $newPassword1;
			if (strlen($newPassword) > 5)
			{
				if ($this->verifPassword($oldPassword))
				{
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
			}
		}
	}
	public function initPassword($newPassword1, $newPassword2)
	{
		if ($this->hash == null)
		{
			if ($newPassword1 === $newPassword2)
			{
				$newPassword = $newPassword1;
				if (strlen($newPassword) > 5)
				{
					$this->hash = password_hash($newPassword, PASSWORD_BCRYPT, ["cost"=>12]);
				}
			}
		}
	}

}

?>
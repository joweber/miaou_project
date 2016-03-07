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

// Tout ça n'a rien a foutre dans le fichier User.class.php, mais c'est plus pratique pour apprendre
// On va instancier notre classe User (créer une nouvelle entrée)
$user = new User();
// $user -> objet
// User -> classe
// Un objet est une instance d'une classe
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => null
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->setLogin("toto");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->setLogin("aa");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => null
  private 'date' => null
  private 'admin' => null
*/
$user->initPassword("totototo", "totototo");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null
*/
$user->initPassword("titititi", "titititi");
var_dump($user);
/*
object(User)[1]
  private 'id' => null
  private 'login' => string 'toto' (length=4)
  private 'hash' => string '$2y$12$9n144prWnPaTt2SmtJGj6OVfHX9lZZQVELrQWwQqwD0OHPiYmQzBi' (length=60)
  private 'date' => null
  private 'admin' => null
*/

?>
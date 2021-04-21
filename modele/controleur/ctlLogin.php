<?php
require_once './modele/ModelPersonne.php';
$action = $_GET['action'];
switch($action){
		//CONNEXION
		case 'valconnect':
		{
			$login = $_POST['login'];
			$mdp = $_POST['pass'];
			$connection = ModelPersonne::connect($login, $mdp);
			if (is_array($connection)) {
				$_SESSION['login'] = $connection['login'];
				$_SESSION['idClient'] = $connection['idClient'];
				$_SESSION['nom'] = $connection['nom'];
				$_SESSION['prenom'] = $connection['prenom'];
			}else {
				header('Location: index.php?err=ok');
			}
		break;
		}

		//DECONNECT
		case 'deconnect':
		{
			unset($_SESSION);
			session_destroy();
			header('Location: index.php');
		break;
		}

		//INSCRIPTION
		case 'valreg':
		{
			$login = $_POST['login'];
			$mdp = $_POST['mdp'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$register = ModelPersonne::register($login);
			if (is_array($register)) {
				header('Location: index.php?reg=oui&err=1');
			}else{
				$register = ModelPersonne::valregister($login, $mdp, $nom, $prenom);
				header('Location: index.php');
			}
		break;
		}
}
?>
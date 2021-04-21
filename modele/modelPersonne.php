<?php
require_once  'dbPDO.php';

class ModelPersonne extends dbPdo {
	
	public static function connect($login, $mdp) {
		try {
			
			$sql='SELECT idClient, nom, prenom, login, mdp FROM users WHERE login = "'.$login.'" AND mdp = "'.$mdp.'"';
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetch();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

	public static function register($login) {
		try {
			
			$sql="SELECT * FROM users WHERE login = '".$login."'";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetch();
			return $liste;

			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

	public static function valregister($login, $mdp, $nom, $prenom, $classe) {
		try {
			
			$sql="INSERT INTO users (nom, prenom, classe, login, mdp, admin) VALUES ('".$nom."', '".$prenom."', '".$classe."', '".$login."', '".$mdp."', 0)";
			$result=dbPdo::$pdo->query($sql);
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

	public static function selconf($creneau) {
		try {
			
			$sql="SELECT * FROM conference WHERE creneau = '".$creneau."'ORDER BY dateConference";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

	public static function modifconference() {
		try {
			
			$sql="SELECT * FROM conference";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}
	public static function selmodifconf($id) {
		try {
			
			$sql="SELECT * FROM conference WHERE id = ".$id."";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

	public static function valmodif($id, $titre, $salle, $place, $theme, $date, $photo, $desc, $creneau) {
		try {
			
			$sql='UPDATE conference SET titre="'.$titre.'",salle="'.$salle.'",place="'.$place.'",theme="'.$theme.'",dateConference="'.$date.'",photo="'.$photo.'",description="'.$desc.'", creneau="'.$creneau.'" WHERE id= "'.$id.'" ' ;
			$result=dbPdo::$pdo->query($sql);
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

		//methode de suppression
		public static function supprimer($id) {
		try {
			
			$sql="DELETE FROM conference WHERE id=$id";
			$result=dbPdo::$pdo->exec($sql);

			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
	}

		//AJOUTER PERSONNE
		public static function valajout($titre, $salle, $place, $theme, $date, $photo, $desc, $creneau)
		{
			try 
			{
				$sql='INSERT INTO conference(titre, salle, place, theme, dateConference, photo, description, creneau) VALUES("'.$titre.'","'.$salle.'","'.$place.'","'.$theme.'","'.$date.'","'.$photo.'","'.$desc.'","'.$creneau.'")';
				$result=dbPdo::$pdo->query($sql);
			}catch (PDOException $e) 
			{
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function selreserv($id) {
		try {
			
			$sql="SELECT * FROM conference WHERE id = ".$id."";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}


		public static function estinscrit($creneau, $idelev) {
		try {
			
			$sql="SELECT * FROM reservation WHERE id_eleve = ".$idelev." AND creneau = '".$creneau."'";
			$result=dbPdo::$pdo->query($sql);
			$inscrit=$result->fetch();
			return $inscrit;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}

		//RESERVATIONS
		public static function valreserv($idconf, $idelev, $creneau) {
		try {
			
			$sql="INSERT INTO reservation(id_conference, id_eleve, creneau) VALUES('".$idconf."','".$idelev."','".$creneau."')";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function nbplace($idconf) {
		try {
			
			$sql="UPDATE conference SET place=place-1 WHERE id= '".$idconf."' " ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function lstconf() {
		try {
			
			$sql="SELECT * FROM conference C, reservation R, users U WHERE C.id = R.id_conference AND R.id_eleve = U.id_eleve AND U.id_eleve = ".$_SESSION['id']."" ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}

		public static function delreserv($id) {
		try {
			
			$sql="DELETE FROM reservation WHERE id_conference=$id AND id_eleve='".$_SESSION['id']."'";
			$result=dbPdo::$pdo->exec($sql);
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}

		public static function nbplace2($id) {
		try {
			
			$sql="UPDATE conference SET place=place+1 WHERE id= '".$id."' " ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function lstinscrit($id) {
		try {
			
			$sql="SELECT nom, prenom, classe, U.id_eleve FROM users U, conference C, reservation R WHERE U.id_eleve = R.id_eleve AND R.id_conference = C.id AND C.id = $id AND R.id_conference = $id" ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function estpresent($id) {
		try {
			
			$sql="SELECT nom, prenom, classe FROM users U, conference C, absences A WHERE U.id_eleve = A.id_eleve AND A.id_conference = C.id AND C.id = $id AND A.id_conference = $id" ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function test($idelev) {
		try {
			
			$sql="SELECT id_eleve FROM reservation WHERE id_eleve= '".$idelev."' " ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetch();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function nbeleve() {
		try {
			
			$sql="SELECT COUNT(DISTINCT id_eleve) FROM reservation " ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function nume($present) {
		try {
			
			$sql="SELECT id_eleve FROM users WHERE num_e = ".$present."" ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function valpresence($ide, $id) {
		try {
			
			$sql="INSERT INTO absences(id_eleve, id_conference) VALUES('".$ide."','".$id."')" ;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function estpresen($id, $ide) {
		try {
			
			$sql="SELECT * FROM absences WHERE id_eleve = $ide AND id_conference = ".$id;
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetch();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function voireinscrit($classe) {
		try {
			
			$sql="SELECT nom, prenom, classe, titre, salle FROM users U, conference C, reservation R WHERE U.id_eleve = R.id_eleve AND R.id_conference = C.id AND C.creneau = '8:20' AND U.classe = '".$classe."'";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
		public static function voireinscrit2($classe) {
		try {
			
			$sql="SELECT nom, prenom, classe, titre, salle FROM users U, conference C, reservation R WHERE U.id_eleve = R.id_eleve AND R.id_conference = C.id AND C.creneau = '10:25' AND U.classe = '".$classe."'";
			$result=dbPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
			
			}catch (PDOException $e) {
				echo $e->getMessage();
				die("Erreur dans la BDD");
			}
		}
}
?>
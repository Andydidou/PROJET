<?php
session_start();
//HEADER
include("vue/entete.php");

//CONTROLEUR//
if(isset($_GET['ctl']))
	{
		$control = $_GET['ctl'];
		switch($control)
		{
			case "centre":{
				include 'vue/centre.php';
				break;}
			case "accueil":{
					include 'vue/accueil.php';
					break;}
			case "info":{
					include 'vue/information.php';
					break;}
			case "gestion":{
					include 'vue/gestion.php';
					break;}
			case "connexion":{
					include 'vue/connexion.php';
					break;}
			case "inscription":{
					include 'vue/inscription.php';
					break;}
			case "login":{
					include 'controleur/ctlLogin.php';
					break;}
		}
	}

	if (!isset($_SESSION['login'])) {
		if (!isset($_GET['reg'])) {
			include("vue/connexion.php");
		}else{
			include("vue/inscription.php");
		}
	}

include("vue/pied.php");
?>
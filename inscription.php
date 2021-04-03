<?php
$conn = mysqli_connect("mysql-reservaccination.alwaysdata.net", "231132", "vaccination.reservation", "reservaccination_77");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ( empty($_POST['nom']) ) {
        echo "Le champ Nom est vide."; 
    } elseif( empty($_POST['prenom']) ) {
        echo "Le champ Prénom est vide.";
    } elseif( empty($_POST['telephone']) ) {
        echo "Le champ Téléphone est vide.";
    } elseif( empty($_POST['mail']) ) {
        echo "Le champ Adresse Mail est vide.";
    } elseif( empty($_POST['age']) ) {
        echo "Le champ Age est vide.";
    } elseif( empty($_POST['login']) ) {
        echo "Le champ Login est vide.";
    } elseif( empty($_POST['mdp']) ) {
        echo "Le champ Mot de Passe est vide.";
    } else { 

$sql = "INSERT INTO client SET nom='".$_POST['nom']."', prenom='".$_POST['prenom']."', telephone='".$_POST['telephone']."', mail='".$_POST['mail']."', risque='".$_POST['risque']."', age='".$_POST['age']."', login='".$_POST['login']."', mdp='".md5($_POST['mdp'])."'";

            if (mysqli_query($conn, $sql)) {
               echo "Inscription Validée";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
  }  
?>
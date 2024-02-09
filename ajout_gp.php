<?php
//Appel du fichier de connexion
require_once('connexion_db/conn_db.php');
//Récupération des données par post
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$num=$_POST['numtel_gp'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];

//Définition de la requête d'insertion
$sql_ajout="insert into gp values(null,'$nom',
        '$prenom','$num','$email','$mdp')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
echo"<h2>Merci $nom $prenom ! Votre inscription a bien &eacute;t&eacute; prise en compte</h2>
    <a href='gp/index.php'>se connecter</a>";
    
?>
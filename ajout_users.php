<?php
//Appel du fichier de connexion
require_once('connexion_db/conn_db.php');
//Récupération des données par post
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$num=$_POST['num_client'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];

//Définition de la requête d'insertion
$sql_ajout="insert into client values(null,'$nom','$prenom','$num','$email','$mdp')";
//Exécution de la requête
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_home.css">
    <title>ajout user</title>
</head>
<body>
<?php include "menu.php"; 
echo"<h2 style='margin-left: 20%;'>Merci $nom $prenom ! Votre inscription a bien &eacute;t&eacute; prise en compte</h2>
";

?>
</body>
</html>


<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'a pas été créee
    header("location:index.php");
    exit();
}


?>
<?php include "menu.php"; ?>





<?php

//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from annonces natural join gp ";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="../style/style_user.css">  
     <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Latest compiled and minified CSS -->

        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <table id='annonces' style="display: flex; align-items: center; font-size: xx-large; ">
<caption><h1>Annonces</h1></caption> 
</table>
<div style="display: flex;
    width: 40%;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-end; ">
    <form action="recherche.php" method="post">
<caption>Recherche annonce</caption>
    <div class="field">
        
        <input type="text" required placeholder="Entrer la ville d'expedition *" name="lieu_depart">
    </div>
    <div class="field">
        
        <input type="text" required placeholder="Entrer la ville de reception *" name="lieu_arrive">
    </div>
    <div class="field">
        <label><h3> la date d'envoie</h3></label>
        <input type="date" required placeholder="Entrer la date " name="date_envoie">
    </div>
    <div class="field">
        
        <input type="submit" required value="rechercher">
    </div>
    </form>
</div>
<div style="display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center; background-color: rgba(255, 255, 255, 0.8);
  color: #007bff;">



    <?php
    while($part=mysqli_fetch_array($query_part)){//Tant qu'on extrait des lignes sous forme de tableau associatif
        extract($part);
        echo"
<table id='annonces'>
    <div class='col mb-5'>


        <div class='card h-100'>
                                    <!-- Product image-->
                                    <!-- Product details-->
                <div class='card-body p-4'>

                    <div class='text-center'>
                                            <!-- Product name-->
                        <h1 class='fw-bolder'>Annonce</h1> 
                             <p>
    <h3>pays destination : $pays_dest</h3>
    
    <h3>lieu depart: $lieu_depart</h3>
    
    <h3>lieu d'arrivee: $lieu_arrive </h3>
    
    <h3>date depart: $date_depart    </h3>
                                              
    <h3>date d'arrive: $date_arrive</h3>   
    
    <h3>date cloture: $date_cloture</h3> 
    
    <h3>nombre kg: $nombre_kg</h3> 
    
    <h3>prix kg: $prix_kg </h3>
    
    <h3>transport:$transport</h3>
   
    <h1>information sur le gp</h1>
    $nom $prenom
   <h3>numero : $numtel_gp</h3> 
    <h3>e_mail: $email_gp</h3>
  </p>   
                </div>
                </div>
                                    <!-- Product actions-->
                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                    <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='form_destinataire.php?id0=$id_gp&id1=$id_annonce'>Postuler</a></div>
                </div>
        </div>
    </div>
</table>
";
    }
    ?>   
</body>
</html>
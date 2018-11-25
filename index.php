<?php
require 'autoload.php';

$connexPDO=Utilisateur::getInstance();

$requete= "Select * from utilisateur ";
$reponse=$connexPDO->query($requete);
$utilisateurs=$reponse->fetchAll(PDO::FETCH_OBJ);

$requete2= "Select nom,  AVG (age) AS age_moyen,SUM(age) AS age_total,MIN(age) AS age_min ,MAX(age)AS age_max from utilisateur GROUP BY (nom) ";
$reponse2=$connexPDO->query($requete2);
$stats=$reponse2->fetchAll(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table BORDER="2">
    <tr>
        <td>id</td>
        <td>NOM</td>
        <td>PRENOM</td>
        <td>AGE</td>
        <td>sexe</td>

    </tr>

    <?php foreach ($utilisateurs as $utilisateur){?>
        <tr>
            <td><?= $utilisateur->id;?></td>
            <td><?= $utilisateur->nom;?></td>
            <td><?= $utilisateur->prenom;?></td>
            <td><?= $utilisateur->age;?></td>
            <td><?= $utilisateur->sexe;?></td>


        </tr>
    <?php } ?>
</table>

<table BORDER="2">
    <tr>

        <td>NOM</td>
        <td>age moyen</td>
        <td>age min</td>
        <td>age max</td>

    </tr>

    <?php foreach ($stats as $stat){   ?>

        <tr>
            <td><?= $stat->nom;?></td>
            <td><?= $stat->age_moyen;?></td>
            <td><?= $stat->age_min;?></td>
            <td><?= $stat->age_max;?></td>



        </tr>

    <?php } ?>
</table>

</body>
</html>
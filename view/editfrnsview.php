<?php

$params=[];
require_once('./Controllers/fournisseurController.php');
require_once("connexion.php");
$sql="SELECT * FROM fournisseur WHERE id_fournisseur=$id";
$req=$cnx->prepare($sql);
$req->execute();
$data=$req->fetchAll();
foreach($data as $result){
   // var_dump($result);
    $id=$result['id_fournisseur'];
    $nom=$result['nom'];
    $prenom=$result['prenom'];
    $adresse=$result['adresse'];
    $tel=$result['tel'];
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/TEIG-Clone/view/style/editMedica.css">

    <title>modifier</title>
</head>
<body>
    <section>
    <form action="" method="POST" >
    <table >
            
            <tr>
                <td>ID:</td>
                <td><input type="number" name="id_fournisseur" value="<?php echo htmlspecialchars($id) ;?>" ></td>
            </tr>
            <tr>
                <td>nom :</td>
                <td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>" ></td>
            </tr>
            <tr>
                <td>prenom</td>
                <td><input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom) ;?>" ></td>
            </tr>
            <tr>
                <td>adresse</td>
                <td><input type="text" name="adresse" value="<?php echo htmlspecialchars($adresse) ;?>" ></td>
            </tr>
            <tr>
                <td>tel</td>
                <td><input type="number" name="tel" value="<?php echo htmlspecialchars($tel) ;?>" ></td>
            </tr>
            <tr>
            <?php  ?>
                <td><input type="submit" name="modifier" value="midifier" class="submit"></td>
            </tr>
        </table>
    </form>
    </section>
</body>
</html>
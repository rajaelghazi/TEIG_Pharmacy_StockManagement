<?php
require_once('./Controllers/medicamentController.php');
require_once("connexion.php");
$sql="SELECT * FROM medicament WHERE id_medica=$id";
$req=$cnx->prepare($sql);
$req->execute();
$data=$req->fetchAll();
foreach($data as $result){
    // var_dump($result);
    $id=$result['id_medica'];
    $Terme=$result['Terme'];
    $date_EX=$result['date_EX'];
    $details=$result['details'];
    $prixUnit=$result['prixUnit'];
    $Quantite=$result['Quantite'];
    $type=$result['id_type'];
    $familé=$result['id_famile'];
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhos:t/PHARMACYTIEG/mvcc/view/style/editMedica.css">

    <title>modifier</title>
</head>
<body>
    <section>
    <form action="" method="POST" >
    <table >
            <tr><td >ID :</td>
                <td ><input type="number" name="id_medica" value="<?php echo htmlspecialchars($id) ;?>" readOnly ></td>
            </tr>
            <tr><td>Terme :</td>
                <td><input type="text" name="Terme" value="<?php echo htmlspecialchars($Terme);?>" ></td>
            </tr>
            <tr><td>date_EX :</td>
                <td><input type="text" name="date_EX" value="<?php echo htmlspecialchars($date_EX) ;?>" ></td>
            </tr>
            <tr>
                <td>details :</td>
                <td><textarea name="" id="" cols="80" rows="7" ><?php echo htmlspecialchars($details) ;?></textarea></td>
            </tr>
            <tr><td>prixUnit :</td>
                <td><input type="number" name="prixUnit" value="<?php echo htmlspecialchars($prixUnit) ;?>" ></td>
            </tr>
            <tr><td>Quantité :</td>
                <td><input type="number" name="prixUnit" value="<?php echo htmlspecialchars($Quantite) ;?>" ></td>
            </tr>
            <tr>
            <tr><td>type :</td>
                <td><input type="text" name="id_type" value="<?php echo htmlspecialchars($type) ;?>" ></td>
            </tr>
            <tr><td>falimé :</td>
                <td><input type="number" name="id_famile" value="<?php echo htmlspecialchars($familé) ;?>" ></td>
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
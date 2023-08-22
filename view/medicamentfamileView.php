<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" >
    <table border="1">
        <tr>
            <th>id</th>
            <th>Terme</th>
            <th>date_EX</th>
            <th>details</th>
            <th>prixUnit</th>
            <th>Quantité</th>
            <th>familé</th>
        
            <th colspan="2">action</th>
        </tr>
        <?php
        require_once('./Controllers/medicamentController.php');
        foreach ($data as $result){ ?>

            <tr>
                <td><?php echo $result['id_medica'];?></td>
                <td><?php echo $result['Terme'];?></td>
                <td><?php echo$result['date_EX'];?></td>
                <td><?php echo $result['details'];?></td>
                <td><?php echo $result['prixUnit'];?></td>
                <td><?php echo $result['Quantite'];?></td>
                <td><?php echo $result['id_famile'];?></td>
                
                <td><a href="medicament/edit/<?php echo $result['id_medica'];?>">  <i class="fa-solid fa-pen-to-square"></i> </a>
                <td><a href="medicament/supprimer/<?php echo $result['id_medica'];?>"> ><i class="fa-solid fa-trash-can"></i></td></tr>
                <td class="vente"><a href="medicament/vente/<?php echo $result['id_medica'];?>" ><i class="fa-solid fa-cart-shopping"></i></td></tr>
            </tr>

            <?php } ?>
            </form>

    </table>
</body>
</html>
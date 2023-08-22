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
            <th>nom</th>
            <th>prenom</th>
            <th>adresse</th>
            <th>tel</th>
            <th colspan="2">action</th>
        </tr>
        <?php
        require_once('./Controllers/venteController.php');
        foreach ($data as $result){ ?>

            <tr>
            <td><?php echo $result['id_vente'];?></td>
                <td><?php echo $result['nom'];?></td><td><?php echo$result['prenom'];?></td>
            <td><?php echo $result['adresse'];?></td><td><?php echo $result['tel'];?></td>
            <td><a href="vente/editfrns/<?php echo $result['id_vente'];?>"> edit </a>
            <td><a href="vente/supprimer/<?php echo $result['id_vente'];?>"> supprimer</td></tr>
            </tr>

            <?php } ?>
            </form>
       
    </table>
</body>
</html>
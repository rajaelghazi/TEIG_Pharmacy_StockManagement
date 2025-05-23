<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/TEIG-Clone/view/style/stylefournisseur.css">

    <title>TIEG</title>
</head>
<body>
    <section>
    <form action="" method="POST" >
    <table border="1">
        <tr>
            <th class="th">nom</th>
            <th class="th">prenom</th>
            <th class="th">adresse</th>
            <th class="th">tel</th>
            <th colspan="2" class="th " >action</th>
        </tr>
        <?php
        require_once('./Controllers/fournisseurController.php');
        foreach ($data as $result){ ?>
            <tr>
                <td class="td"><?php echo $result['nom'];?></td>
                <td class="td"><?php echo$result['prenom'];?></td>
                <td class="td"><?php echo $result['adresse'];?></td>
                <td class="tel td" td><?php echo $result['tel'];?></td>
                <td class="edsu"><a href="fournisseur/edit/<?php echo $result['id_fournisseur'];?>"> <i class="fa-solid fa-pen-to-square"></i> </a>
                <td class="edsu"><a href="fournisseur/supprimer/<?php echo $result['id_fournisseur'];?>"> <i class="fa-solid fa-trash-can"></i></td></tr>
            </tr>

            <?php } ?>
            </form>
    </table>
    </section>
</body>
</html>
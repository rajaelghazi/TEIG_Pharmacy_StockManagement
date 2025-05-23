<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/TEIG-Clone/view/style/styleTable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <section>
    <form action="" method="POST">
    <table border="1">
        <tr>
            <th>id</th>
            <th>Terme</th>
            <th>date_EX</th>
            <th>details</th>
            <th>prixUnit</th>
            <th>type</th>
            <th>family</th>
            <th colspan="3">action</th>
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
                <td><?php //echo $result['id_type'];?></td>
                
                <td><a href="medicament/edit/<?php echo $result['id_medica'];?>"> <i class="fa-solid fa-pen-to-square"> </a></td>
                <td><a href="medicament/supprimer/<?php echo $result['id_medica'];?>"> <i class="fa-solid fa-trash-can"></i></td></tr>
                <td><a href="medicament/supprimer/<?php echo $result['id_medica'];?>"> <i class="fa-solid fa-cart-shopping"></i></td></tr>

            </tr>

            <?php } ?>
            </form>

    </table>
    </section>
</body>
</html>
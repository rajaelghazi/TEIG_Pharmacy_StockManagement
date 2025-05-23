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
    
    <table >
        <tr>
            <th >id</th>
            <th >Terme</th>
            <th >type</th>
            <th >date_EX</th>
            <th >details</th>
            <th >prixUnit</th>
            <th >Quantité</th>
            
    
            <th colspan="2">action</th>
        </tr>
        <?php
        require_once('./Controllers/medicamentController.php');
        foreach ($data as $result){ ?>

            <tr>
                <td><?php echo $result['id_medica'];?></td>
                <td><?php echo $result['Terme'];?></td>
                <td><?php echo $result['type'];?></td>
                <td><?php echo$result['date_EX'];?></td>
                <td><?php echo $result['details'];?></td>
                <td><?php echo $result['prixUnit'];?></td>
                <td><?php echo $result['Quantite'];?></td>
    

                <td><a href="medicament/edit/<?php echo $result['id_medica'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="medicament/supprimer/<?php echo $result['id_medica'];?>"> <i class="fa-solid fa-trash-can"></td>
                <td class="supprimer"><a href="<?php echo $result['id_medica'];?>" ><i class="fa-solid fa-cart-shopping"></i></td></tr>
                
            </tr>

            <?php } ?>

    </table>
    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PHARMACYTIEG/mvcc/view/style/styleTable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>TIEG</title>
</head>
<body>
    <section>
    
    <table border="1" >
        <tr>
            
            <th class="terme">Terme</th>
            <th class="date">Date_EX</th>
            <th  class="details">Details</th>
            <th class='prix'>PrixUnit</th>
            <th class='prix'>Quantite</th>
            
            <th colspan="3" class="action">Action</th>
        </tr>
        <?php
        
        require_once('./Controllers/medicamentController.php');
        foreach ($data as $result){ ?>

            <tr>
                <td class='terme'><?php echo $result['Terme'];?></td>
                <td class="date"><?php echo$result['date_EX'];?></td>
                <td class="details"><?php echo $result['details'];?></td>
                <td class="prixtd"><?php echo $result['prixUnit'];?> dh</td>
                <td class="Quantite"><?php echo $result['Quantite'];?></td>
                
                <td class="edit"><a href="medicament/edit/<?php echo $result['id_medica'];?>"  > <i class="fa-solid fa-pen-to-square"></i> </a></td>
                <td class="supprimer"><a href="medicament/supprimer/<?php echo $result['id_medica'];?>" ><i class="fa-solid fa-trash-can"></i></td>
                <td class="vente"><a href="medicament/vente/<?php echo $result['id_medica'];?>" ><i class="fa-solid fa-cart-shopping"></i></td></tr>
                
            </tr>

            <?php } ?>
            

    </table>
    </section>
</body>
</html>
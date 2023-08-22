<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('/Controllers/fournisseurController.php');
    if(isset($_GET['id'])){
        foreach ($data as $result){ 
            if($_GET['id']==$result['id_fournisseur']){
    ?>
    <form action="">
        <table>
            
            <tr>
                <td>ID:</td>
                <td><input type="number" name="id_fournisseur" value="<?php echo $result['id_fournisseur'] ;?>"></td>
            </tr>
            <tr>
                <td>nom :</td>
                <td><input type="text" name="nom" value="<?php echo $result['nom'] ;?>"></td>
            </tr>
            <tr>
                <td>prenom</td>
                <td><input type="text" name="prenom" value="<?php echo $result['prenom'] ;?>"></td>
            </tr>
            <tr>
                <td>adresse</td>
                <td><input type="text" name="adresse" value="<?php echo $result['adresse'] ;?>"></td>
            </tr>
            <tr>
                <td>tel</td>
                <td><input type="number" name="tel" value="<?php echo $result['tel'] ;?>"></td>
            </tr>
            <tr>
            <?php }}} ?>
                <td><input type="submit" name="submit" value="update"></td>
            </tr>
        </table>
    </form>
    function Type($cherche){
        // if(isset($_GET['id_medica'])&& isset($_GET['type'])){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->Type($cherche);
        // $data=$mod->findAll();
        require_once('./view/medicamentTypeView.php');
        return $data;
        
    // }
    }
    function famile ($cherche){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->famile($cherche);
        require_once('./view/medicamentfamileView.php');
        return $data;
        
    // }
    }
    function Type($cherche){
        include('connexion.php');
        $req="SELECT M.id_medica,M.Terme,M.date_EX,M.details,M.prixUnit,T.type from medicament M INNER JOIN type T on M.id_type=T.id_type WHERE M.id_type=?";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$cherche]);
        $data=$req->fetchAll();
        return $data;
    }
    function famile($cherche){
        include('connexion.php');
        $req="SELECT M.id_medica,M.Terme,M.date_EX,M.details,M.prixUnit,f.famile from medicament M INNER JOIN famile f on M.id_famile=f.id_famile WHERE M.id_famile=?";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$cherche]);
        $data=$req->fetchAll();
        return $data;
    }
</body>
</html>
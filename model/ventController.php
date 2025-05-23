<?php
class venteModel{
    public $id;
    public function findAll(){
        include('connexion.php');
        $req="SELECT * FROM vente ORDER BY Quantité_vendue ";
        $req=$cnx->prepare($req);
        $req->execute();
        $data=$req->fetchAll();
        return $data;
    }
    public function rechercher($cherche){
        include('connexion.php');
        if (is_int($cherche)==1){
            
            $req="SELECT * FROM vente WHERE id_vente=? ";  
            $req=$cnx->prepare();
            $req->execute([$cherche]);
            $data=$req->fetchAll();
            return $data;
        }else{
            $req = $cnx->prepare('SELECT * FROM vente WHERE Quantité_vendue LIKE :monlike ORDER BY Quantité_vendue');
            $req->execute([':monlike' => '%'.$cherche.'%']);
            $data=$req->fetchAll();
            return $data;
        }
    
    }
    
    public function ajouter(){
        if(isset($_POST['submit'])){
            if (isset($_POST['id_vente'])&& isset($_POST['Quantité_vendue'])){
                if(!empty($_POST['id_vente'])){
                    $id=$_POST['id_vente'];        
                }
                if(!empty($_POST['Quantité_vendue'])){
                    $Quantité_vendue=$_POST['Quantité_vendue'];        
                }
                
        }
        
        include('connexion.php');
        $req="INSERT INTO vente (id_vente,Quantité_vendue)VALUES(?,?) ";
        $req=$cnx->prepare($req);
        $data=$req->execute([$id,$Quantité_vendue]);
        if ($data) {
            return "Insert Data Successfully.";
        }else{
            return "Error...! Not Inserted.";
        }
    }}

        
        
    
        

    
    public function edit(){
        if(isset($_POST['modifier'])){
            if (isset($_POST['id_vente'])&& isset($_POST['Quantité_vendue'])){
                if(!empty($_POST['id_vente'])){
                    $id=$_POST['id_vente'];        
                }
                if(!empty($_POST['Quantité_vendue'])){
                    $Quantité_vendue=$_POST['Quantité_vendue'];        
                }
             
        }
       
        include('connexion.php');
        $sql="UPDATE vente SET  Quantité_vendue=? WHERE id_vente=$id";
        $req=$cnx->prepare($sql);
        $data=$req->execute([$Quantité_vendue]);
        if ($data) {
            echo "Update data Successfully";
            header("location:http://localhost:/PHARMACYTIEG/mvcc/vente");
        }else{
            return "Error...! Not updated.";
        }
      

    }
}
    function supprimer($id){
        include('connexion.php');
        $req="DELETE FROM vente WHERE id_vente=? ";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$id]);
        header("location:http://localhost/TEIG-Clone/vente");
        
    }

}

?>
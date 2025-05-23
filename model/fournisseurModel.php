<?php
class fournisseurModel{
    public $id;
    public function findAll(){
        include('connexion.php');
        $req="SELECT * FROM fournisseur ORDER BY nom ";
        $req=$cnx->prepare($req);
        $req->execute();
        $data=$req->fetchAll();
        return $data;
    }
    public function rechercher($cherche){
        include('connexion.php');
        if (is_int($cherche)==1){
            
            $req="SELECT * FROM fournisseur WHERE id_fournisseur=? ";  
            $req=$cnx->prepare();
            $req->execute([$cherche]);
            $data=$req->fetchAll();
            return $data;
        }else{
            $req = $cnx->prepare('SELECT * FROM fournisseur WHERE nom LIKE :monlike ORDER BY nom');
            $req->execute([':monlike' => '%'.$cherche.'%']);
            $data=$req->fetchAll();
            return $data;
        }
        
    }
    
public function ajouter(){
    if(isset($_POST['submit'])){
        if ( isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['adresse'])&& isset($_POST['tel'])){
                if(!empty($_POST['nom'])){
                    $nom=$_POST['nom'];        
                }
                if(!empty($_POST['prenom'])){
                    $prenom=$_POST['prenom'];        
                }
                if(!empty($_POST['adresse'])){
                    $adresse=$_POST['adresse'];        
                }
                if(!empty($_POST['tel'])){
                    $tel=$_POST['tel'];        
                }
        }
        
        include('connexion.php');
        $req="INSERT INTO fournisseur (nom,prenom,adresse,tel)VALUES(?,?,?,?) ";
        $req=$cnx->prepare($req);
        $data=$req->execute([$nom,$prenom,$adresse,$tel]);

    }}
    public function edit(){
        if(isset($_POST['modifier'])){
            if (isset($_POST['id_fournisseur'])&& isset($_POST['nom'])&& isset($_POST['prenom'])
            && isset($_POST['adresse'])&& isset($_POST['tel'])){
                if(!empty($_POST['id_fournisseur'])){
                    $id=$_POST['id_fournisseur'];        
                }
                if(!empty($_POST['nom'])){
                    $nom=$_POST['nom'];        
                }
                if(!empty($_POST['prenom'])){
                    $prenom=$_POST['prenom'];        
                }
                if(!empty($_POST['adresse'])){
                    $adresse=$_POST['adresse'];        
                }
                if(!empty($_POST['tel'])){
                    $tel=$_POST['tel'];        
                }}
        include('connexion.php');
        $req="UPDATE fournisseur SET nom=? ,prenom=? ,adresse=? , tel=?  WHERE id_fournisseur=$id";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$nom,$prenom,$adresse,$tel]);
        if ($data) {
            header("location:http://localhost/TEIG-Clone/fournisseur");
        }
        
    }}

    function supprimer($id){
        include('connexion.php');
        $req="DELETE FROM fournisseur WHERE id_fournisseur=? ";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$id]);
        header("location:http://localhost/TEIG-Clone/fournisseur");
    
    }
}

?>
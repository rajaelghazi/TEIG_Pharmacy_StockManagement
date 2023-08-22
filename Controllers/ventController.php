<?php
if (isset($_GET['code'])){
    $cherche=$_GET['code'];
}
if (isset($_GET['id_vente'])){
    $id=$_GET['id_vente'];
}

class venteController{

    public function findAll(){
        require_once('./model/venteModel.php');
        $mod=new venteModel();
        $data=$mod->findAll();
        require_once('./view/venteView.php');
        return $data;
    }
    public function rechercher($cherche){
        require_once('./model/venteModel.php');
        $mod=new venteModel();
        $data=$mod->rechercher($cherche);
        require_once('./view/venteView.php');
        return $data;
    }
    public function ajouter(){
        require_once('./view/ajouterventeView.php');
        include('./model/venteModel.php');
        $mod=new venteModel();
        $data=$mod->ajouter();
        echo($data);
        
        // header("location:http://localhost/PHARMACYTIEG/mvcc/");
        
        
    }
    public function edit($id){
        require_once('./view/editventeView.php');
        require_once('./model/venteModel.php');
        $mod=new venteModel();
        $data=$mod->edit();
       
        //require_once('./view/venteView.php');
        // return $data;
    }
    public function supprimer($id){
        require_once('./model/venteModel.php');
        $mod=new venteModel();
        $data=$mod->supprimer($id);
        $data=$mod->findAll();
        
    }
   



?>
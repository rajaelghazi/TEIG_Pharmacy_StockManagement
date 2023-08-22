<?php
if (isset($_GET['code'])){
    $cherche=$_GET['code'];
}
if (isset($_GET['id_medica'])){
    $id=$_GET['id_medica'];
}

class medicamentController{

    public function findAll(){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->findAll();
        require_once('./view/nav.php');
        require_once('./view/medicamentView.php');
        return $data;

    }
    public function rechercher($cherche){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->rechercher($cherche);
        require_once('./view/nav.php');
        require_once('./view/medicamentView.php');
        return $data;
    }
    public function ajouter(){
        require_once('./view/nav.php');
        require_once('./view/ajouterMedicaView.php');
        include('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->ajouter();
    
    }
    public function edit($id){
        require_once('./view/nav.php');
        require_once('./view/editMedicaView.php');
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->edit();
        // require_once('./view/medicamentView.php');
    }
    public function vente($cherche){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->vente($cherche);
        $data=$mod->findAll();
        require_once('./view/nav.php');
        require_once('./view/medicamentView.php');
        return $data;
    }

    public function supprimer($id){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->supprimer($id);
        $data=$mod->findAll();
        
    }
    function Type($cherche){
        require_once('./model/medicamentModel.php');
        $mod=new medicamentModel();
        $data=$mod->Type($cherche);
        require_once('./view/nav.php');
        require_once('./view/medicamentTypeView.php');
        return $data;
    }
}


?>
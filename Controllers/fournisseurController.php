<?php
    if (isset($_GET['code'])){
        $cherche=$_GET['code'];
    }
    if (isset($_GET['id_fournisseur'])){
        $id=$_GET['id_fournisseur'];
    }
    class fournisseurController{
        public function findAll(){
            require_once('./model/fournisseurModel.php');
            $mod=new fournisseurModel();
            $data=$mod->findAll();
            require_once('./view/fournisseurView.php');
            require_once('./view/nav.php');
            return $data;
        }
        public function rechercher($cherche){
            require_once('./view/nav.php');
            require_once('./model/fournisseurModel.php');
            $mod=new fournisseurModel();
            $data=$mod->rechercher($cherche);
            require_once('./view/fournisseurView.php');
            return $data;
        }
        public function ajouter(){
            require_once('./view/ajouterfrnsView.php');
            include('./model/fournisseurModel.php');
            $mod=new fournisseurModel();
            $data=$mod->ajouter();
            if($data){
                header("location:http://localhost/PHARMACYTIEG/mvcc/fournisseur");
            }
            require_once('./view/nav.php');
        }
        public function edit($id){
            require_once('./view/nav.php');
            require_once('./view/editfrnsView.php');
            require_once('./model/fournisseurModel.php');
            $mod=new fournisseurModel();
            $data=$mod->edit();
            require_once('./view/nav.php');
            return $data;
            require_once('./view/fournisseurView.php'); 
        }
        public function supprimer($id){
            require_once('./model/fournisseurModel.php');
            $mod=new fournisseurModel();
            $data=$mod->supprimer($id);
            $data=$mod->findAll(); 
        }

    }



    ?>
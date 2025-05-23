<?php
class medicamentModel{
    public $id;
    public function findAll(){
        include('connexion.php');
        $req="SELECT * FROM medicament ORDER BY Terme ";
        $req=$cnx->prepare($req);
        $req->execute();
        $data=$req->fetchAll();
        return $data;
    }
    public function rechercher($cherche){
        include('connexion.php');
            $req = $cnx->prepare('SELECT * FROM medicament WHERE Terme LIKE :monlike ORDER BY Terme');
            $req->execute([':monlike' => '%'.$cherche.'%']);
            $data=$req->fetchAll();
            return $data;
        
        
    }
    
    public function ajouter(){
        if(isset($_POST['submit'])){
            if ( isset($_POST['Terme'])&& isset($_POST['date_EX'])&& isset($_POST['details'])&& isset($_POST['prixUnit'])&& isset($_POST['Quantite']) && isset($_POST['id_type']) && isset($_POST['id_famile'])){
                if(!empty($_POST['Terme'])){
                    $Terme=$_POST['Terme'];        
                }
                if(!empty($_POST['date_EX'])){
                    $date_EX=$_POST['date_EX'];        
                }
                if(!empty($_POST['details'])){
                    $details=$_POST['details'];        
                }
                if(!empty($_POST['prixUnit'])){
                    $prixUnit=$_POST['prixUnit'];        
                }
                if(!empty($_POST['Quantite'])){
                    $Quantite=$_POST['Quantite'];        
                }
                if(!empty($_POST['id_type'])){
                    $timestamps = true;  
                    $type=$_POST['id_type'];      
                }
                if(!empty($_POST['id_famile'])){
                    $famile=$_POST['id_famile']; 
                    $timestamps = true;       
                }
        }
        
    include('connexion.php');
    $req="INSERT INTO medicament (Terme,date_EX,details,prixUnit,Quantite,id_type,id_famile)VALUES(?,?,?,?,?,?,?) ";
    $req=$cnx->prepare($req);
    $data=$req->execute([$Terme,$date_EX,$details,$prixUnit,$Quantite,$type,$famile]);
    
    }}

    public function edit(){
        if(isset($_POST['submit'])){
            if (  isset($_POST['id_medica'])&&isset($_POST['Terme'])&& isset($_POST['date_EX'])&& isset($_POST['details'])&& isset($_POST['prixUnit'])&& isset($_POST['Quantite']) && isset($_POST['id_type']) && isset($_POST['id_famile'])){
                if(!empty($_POST['id_medica'])){
                    $id=$_POST['id_medica'];      
                }
                
                if(!empty($_POST['Terme'])){
                    $Terme=$_POST['Terme'];        
                }
                if(!empty($_POST['date_EX'])){
                    $date_EX=$_POST['date_EX'];        
                }
                if(!empty($_POST['details'])){
                    $details=$_POST['details'];        
                }
                if(!empty($_POST['prixUnit'])){
                    $prixUnit=$_POST['prixUnit'];        
                }
                if(!empty($_POST['Quantite'])){
                    $Quantite=$_POST['Quantite'];        
                }
                if(!empty($_POST['id_type'])){
                    $timestamps = true;  
                    $type=$_POST['id_type'];      
                }
                if(!empty($_POST['id_famile'])){
                    $famile=$_POST['id_famile']; 
                    $timestamps = true;       
                }
        }
        

        include('connexion.php');
        $sql=" UPDATE medicament SET Terme=?,date_EX=?,details=?,prixUnit=?,Quantite=?,id_type=?,id_famile=? WHERE id_medica=$id" ;
        $req=$cnx->prepare($sql);
        $data=$req->execute([$Terme,$date_EX,$details,$prixUnit,$Quantite, $type, $famile]);
        // var_dump($data);
        if ($data) {
            header("location:http://localhost/TEIG-Clone");
        }
    }
}
    function supprimer($id){
        include('connexion.php');
        $req="DELETE FROM medicament WHERE id_medica=? ";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$id]);
        header("location:http://localhost/TEIG-Clone");
        
    }
    function Type($cherche){
        include('connexion.php');
        $req="SELECT M.id_medica,M.Terme,M.date_EX,M.details,M.prixUnit,M.Quantite,T.type from medicament M INNER JOIN type T on M.id_type=T.id_type WHERE M.id_type=?";
        $req=$cnx->prepare($req);
        $data=$req-> execute([$cherche]);
        $data=$req->fetchAll();
        return $data;
    }


    public function vente( $cherche){

        include('connexion.php');
        $req="INSERT INTO vente (id_medica)VALUES(?) ";
        $req=$cnx->prepare($req);
        $datas=$req->execute([$cherche]);
        if($datas){
            $req="SELECT * FROM medicament WHERE id_medica=? ";  
            $req=$cnx->prepare($req);
            $data=$req->execute([$cherche]);
            if($data){
                while($result=$req->fetch()){
                    $Quantite=$result['Quantite'];
                    $req="UPDATE medicament  SET Quantite=Quantite-1 WHERE id_medica=$cherche";
                    $req=$cnx->prepare($req);
                    $datas=$req->execute([]);
                    header("location:http://localhost/TEIG-Clone");
                } 
                $sql="UPDATE vente SET Quantite_vendue=Quantite_vendue+1 WHERE id_medica=$cherche ";
                $req=$cnx->prepare($sql);
                $data=$req->execute([$cherche]);
                var_dump($data);




















    // include('connexion.php');
    // $req="SELECT * FROM medicament WHERE id_medica=? ";  
    // $req=$cnx->prepare($req);
    // $data=$req->execute([$cherche]); 
    // return $data;
    // var_dump($data);
    // if($data){
    //     while($data=$data->fetch()){
    //         if($data['id_medica']!=$cherche){
    //             $req="INSERT INTO vente (id_medica)VALUES(?)";
    //             $req=$cnx->prepare($req);
    //             $datas=$req->execute([$cherche]);
    //             $sql="UPDATE vente SET Quantite_vendue=Quantite_vendue+1 WHERE id_medica=$cherche ";
    //             $req=$cnx->prepare($sql);
    //             $dat=$req->execute([$cherche]);
    //             // header("location:http://localhost/PHARMACYTIEG/mvcc/medicament");
    //         } }
    //         $req="SELECT * FROM medicament WHERE id_medica=? ";  
    //         $req=$cnx->prepare($req);
    //         $data=$req->execute([$cherche]);
    //         while($result=$req->fetch()){
    //             $Quantite=$result['Quantite'];
    //             $req="UPDATE medicament  SET Quantite=Quantite-1 WHERE id_medica=$cherche";
    //             $req=$cnx->prepare($req);
    //             $datas=$req->execute([]);
    //             header("location:http://localhost/PHARMACYTIEG/mvcc/medicament");
    //         } 
                
        
       
                
    //     } 

    // include('connexion.php');
    // $req="SELECT * FROM medicament WHERE id_medica=? ";  
    // $req=$cnx->prepare($req);
    // $data=$req->execute([$cherche]);
    // while($result=$req->fetch()){
    //     $Quantite=$result['Quantite'];
    // }
    
//     $sql="SELECT * FROM vente WHERE id_medica=? ";  
//     $reqp=$cnx->prepare($sql);
//     $dataa=$reqp->execute([$cherche]);
//     return $dataa;
//     while($result=$dataa->fetch()){
//         $id_medica=$result['id_medica'];
//     }
//     if($id_medica==$cherche){
//         $sql="UPDATE vente SET Quantite_vendue=Quantite_vendue+1 WHERE id_medica=? ";
//         $req=$cnx->prepare($sql);
//         $dat=$req->execute([$cherche]);
//         return $dat;
//         var_dump($dat);
//         if($dat){
//             $req="UPDATE medicament  SET Quantite=Quantite-1 WHERE id_medica=$cherche";
//             $req=$cnx->prepare($req);
//             $datas=$req->execute([]);
//             header("location:http://localhost/PHARMACYTIEG/mvcc");
//                     }
        
//         }
//     if($id_medica!=$cherche){
//         $req="INSERT INTO vente (id_medica)VALUES(?) ";
//         $req=$cnx->prepare($req);
//         $datas=$req->execute([$cherche]);
//         return $datas;
//         var_dump($datas);
//         if($datas){
//             $sql="UPDATE vente SET Quantite_vendue=Quantite_vendue+1 WHERE id_medica=$cherche ";
//             $req=$cnx->prepare($sql);
//             $dat=$req->execute([$cherche]); 
//             return($dat);
//             var_dump($dat);
//             if($dat){
//                 $req="UPDATE medicament  SET Quantite=Quantite-1 WHERE id_medica=$cherche";
//                 $req=$cnx->prepare($req);
//                 $datas=$req->execute([]);
//                 header("location:http://localhost/PHARMACYTIEG/mvcc");
//             }
//         }
// }
        
//     }   
}}}}   
   
?>
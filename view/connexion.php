<?php
$sgbd="mysql";
$host="localhost";
$dbname="tieg";
$charset="utf8";
$dns=$sgbd.":host=".$host.";dbname=".$dbname.";charset".$charset;
$user="root";
$password="";
$err=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);


try {
    $cnx=new PDO ($dns,$user,$password,$err);
    } catch (PDOException $e) {
    echo " <p style = 'color :red '> connexion echouer...!! $e->getMessage() </p>";

    }

?>
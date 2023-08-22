<?php 
$controller_name="medicament";
$action="findAll";
$code="";
$params=[];
if(isset($_GET['url'])&& !empty($_GET['url'])){
    $params=explode('/',$_GET['url']);
    if(isset($params[0])){
        $controller_name=$params[0];
    }
    if(isset($params[1])){
        $action=$params[1];
    }
    if(isset($params[2])){
        $code=$params[2];
    }
}
$controller_name=strtolower($controller_name)."Controller";
if(file_exists("Controllers/".$controller_name.".php")){
    require_once("Controllers/".$controller_name.".php");
    $controller=new $controller_name();
    if($code!="")
    $controller->$action($params[2]);
    else 
    $controller->$action();
} else{
    echo "<p> Erreur 404. <br> la page ".$controller_name." n'existe pas </p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login à pharmacie TIEG </title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_feild">
                <input type="text" required>
                <span></span>
                <label >Username</label>
            </div>
            <div class="txt_feild">
                <input type="password" required>
                <span></span>
                <label >Password</label>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>



<?php 
$controller_name = "adminController";
$action ="Admin";
$code= "";
$params = [];
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $params = explode('/', $_GET['p']);
if (isset($params[0])) {
    $controller_name= $params[0];
}

if (isset($params[1])) {
    $action= $params[1];
}
if (isset($params[2])) {

    $code= $params[2];
}
}

$controller_name= ucfirst(strtolower($controller_name)).'Controller';
if (file_exists("Controllers/".$controller_name.".php")) {
    require_once "Controllers/".$controller_name.".php";
    $controller = new $controller_name();
    if ($code!="")
        $controller->$action($params[2]);
else
        $controller->$action();
}
else {
    echo "<p>Erreur 404. <br> La page " . $controller_name . " n'existe pas</p>";
}


?>

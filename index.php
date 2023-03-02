<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
date_default_timezone_set("America/Sao_Paulo");

require './vendor/autoload.php';
require './routes/router.php';

try{

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];

    if(!isset($router[$request])){
        throw new Exception("Route {$uri} doesn't exists");
    }

    if(!array_key_exists($uri, $router[$request])){
        throw new Exception("Route {$uri} doesn't exists");
    }

   $controller = $router[$request][$uri];
   $controller();

}catch(Exception $e){
    echo $e->getMessage();
}










// if (isset($_GET['path'])) {
//     $path = explode("/", $_GET['path']);
// } else {
//     echo json_encode(["error" => "path noth found"]);
//     exit;
// }

// if (isset($path[0])) {
//     $api = $path[0];
// } else {
//     echo "path noth found";
//     exit;
// }
// if (isset($path[1])) {
//     $controller = 'App\Controller\\'. ucfirst($path[1]) . 'Controller';
// } else {
//     $controller = '';
// }
// if (isset($path[2])) {
//     $param = [$path[2]];
// } else {
//     $param = [''];
// }

// $method = strtolower($_SERVER['REQUEST_METHOD']);

// try{
//     call_user_func_array(array(new $controller, $method), $param);
//     // $teste = new $controller;
//     // $teste->$method($param);
// }catch(\Exception $e){
//     //
// }

// var_dump($method);
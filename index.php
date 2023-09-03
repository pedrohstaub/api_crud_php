<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, PATCH, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header(
    "Access-Control-Allow-Headers: " .
    "Version,Accept,Accept-Encoding,Accept-Language,Connection,Coockie," .
    "Authorization,DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With," .
    "If-Modified-Since,Cache-Control,Content-Type, x-xsrf-token, x_csrftoken, X-Requested-With"
);
header("Cache-Control: no-store, no-cache, must-revalidate");
header('Content-type: application/json');
date_default_timezone_set("America/Sao_Paulo");

require './vendor/autoload.php';

use App\routes\router;

$router = new router();

$router->get("/login", "login", "UserController", false);

//User
$router->get("/user", "get", "UserController", true);
$router->post("/user", "insert", "UserController", false);

//Products
$router->get("/product", "get", "ProductController", false);
$router->post("/product", "insert", "ProductController", true);
$router->patch("/product", "update", "ProductController", true);
$router->get("/product-best-sales", "getBestSales", "ProductController", false);
$router->get("/product-recent", "getRecent", "ProductController", false);

//Billboard
$router->get("/billboard", "get", "BillboardController", false);
$router->get("/billboard-index", "getIndex", "BillboardController", false);

//Files
$router->get("/files", "getByExternal", "FileController", false);
$router->get("/files-id", "get", "FileController", true);

//Payment
$router->get("/testpay", "requirePix", "PaymentController", true);

//Buy
$router->post("/buy", "buy", "OrderController", false); //false because buyer can registrate now


$router->dispatch();

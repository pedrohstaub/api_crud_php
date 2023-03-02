<?php

function load(string $controller, string $action)
{
    try {
        $controllerNamespace = "App\\Controller\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("Path {$controller} does't exist");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("Method {$action} doesn't exist in {$controller}");
        }

        $controllerInstance->$action((object) $_REQUEST);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
    "GET" => [
        "/client" => fn() => load("ClientController", "get")
    ],
    "POST" => [
        "/client" => fn() => load("ClientController", "post")
    ]
];

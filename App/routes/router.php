<?php

namespace App\routes;

use App\routes\routerModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class router
{
    private $uri;
    private $method;
    private $routes = array();

    function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    function get($route, $action, $controller, $tokenAutentication)
    {
        array_push($this->routes, (new routerModel($route, "GET", $controller, $action, $tokenAutentication)));
    }

    function post($route, $action, $controller, $tokenAutentication)
    {
        array_push($this->routes, (new routerModel($route, "POST", $controller, $action, $tokenAutentication)));
    }

    function put($route, $action, $controller, $tokenAutentication)
    {
        array_push($this->routes, (new routerModel($route, "PUT", $controller, $action, $tokenAutentication)));
    }

    function patch($route, $action, $controller, $tokenAutentication)
    {
        array_push($this->routes, (new routerModel($route, "PATCH", $controller, $action, $tokenAutentication)));
    }

    function delete($route, $action, $controller, $tokenAutentication)
    {
        array_push($this->routes, (new routerModel($route, "DELETE", $controller, $action, $tokenAutentication)));
    }

    function dispatch()
    {
        foreach ($this->routes as $route) {
            if ($route->getUri() == $this->uri && $route->getMethod() == $this->method) {
                //Caso não precise fazer autenticação simplesmente chama a rota
                if (!$route->getTokenAutentication()) {
                    $this->load($route->getController(), $route->getAction(), $route->getMethod());
                    return;
                }

                $payload = $this->validateToken();

                if (!$payload) {
                    http_response_code(401);
                    echo "Invalid Token";
                    return;
                }

                $this->load($route->getController(), $route->getAction(), $route->getMethod(), $payload);
                return;
            }
        }
        echo "Route not found";
    }

    private function validateToken()
    {
        try {
            $tokenIsValid = JWT::decode($this->getToken(), new Key(getenv('JWT_KEY'), 'HS256'));
            return $tokenIsValid ? true : false;
        } catch (Exception $e) {
            return false;
        }
    }

    private function getToken()
    {
        //$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
        $headers = getallheaders();
        $authorization = array_key_exists("Authorization", $headers) ? $headers["Authorization"] : false;
        if ($authorization) {
            if (strpos($authorization, 'Bearer ') === 0) {
                $jwt = substr($authorization, 7);
                return $jwt;
            }
        }

        return false;
    }

    function load(string $controller, string $action, string $method, $payload = null)
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

            if ($method == "POST" || $method == 'PUT' || $method == 'PATCH')
                $controllerInstance->$action((object) json_decode(file_get_contents('php://input')), $payload);
            else
                $controllerInstance->$action((object) $_REQUEST, $payload);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

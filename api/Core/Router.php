<?php

namespace Isabellaalves21\Lembretemvc\Core;

class Router{
        //getlembrete
    private $controller; 
    private $method;
    private $methodController;
    private $parameters = [];

    public function __construct(){
        $url = $this->parseURL();
        if (file_exists("../api/Controllers/" .
        ucfirst($url[2]) . ".php")) {
        $this->controller = $url[2];
        unset($url[2]);
    } elseif (empty($url[2])) {
        echo "Bem vindo à Lembrete API MVC - Versão 1.0.0 ";
        exit;
    } else {
        http_response_code(404);
        echo json_encode(["erro" => "Recurso não encontrado"], JSON_UNESCAPED_UNICODE);
        exit;
    }
    }

    private function parseURL(): array|bool{
        //localhost/lembretemvc/lembrete/getAll
        //quebra a url em um array usando / como separador
        return explode("/", $_SERVER["SERVER_NAME"] .
        $_SERVER["REQUEST_URI"]);
    }

}
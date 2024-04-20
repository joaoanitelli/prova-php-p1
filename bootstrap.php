<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojetocomposer\Router($metodo, $caminho);

#ROTAS

$r->get('/index','Php\Primeiroprojetocomposer\Controllers\HomeController@index');
$r->get('/carro','Php\Primeiroprojetocomposer\Controllers\CarroController@index');
$r->post('/carro','Php\Primeiroprojetocomposer\Controllers\CarroController@create');
$r->get('/cliente','Php\Primeiroprojetocomposer\Controllers\ClienteController@index');
$r->post('/cliente','Php\Primeiroprojetocomposer\Controllers\ClienteController@create');
$r->get('/fornecedor','Php\Primeiroprojetocomposer\Controllers\FornecedorController@index');
$r->post('/fornecedor','Php\Primeiroprojetocomposer\Controllers\FornecedorController@create');
$r->get('/filial','Php\Primeiroprojetocomposer\Controllers\FilialController@index');
$r->post('/filial','Php\Primeiroprojetocomposer\Controllers\FilialController@create');


#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure) {
    echo $resultado($r->getParams());
}elseif(is_string($resultado)){
    $resultado = explode('@',$resultado);
    $controller = new $resultado[0];
    $action = $resultado[1];

    echo $controller->$action($r->getParams());
}
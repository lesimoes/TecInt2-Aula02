<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once('../models/ContaPF.php');
use Models\ContaPF;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$contas = array(new ContaPF(12, 'Winglerson'), new ContaPF(13, 'Leandro'), new ContaPF(14, 'Detetive Pikachu'));

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$result = array();

// Pega uma conta especifica
if (!empty($uri[3])) {

    $id = $uri[3];
    foreach ($contas as $key => $conta) {
        if ($conta->getId() == $id) {
            $result[] = array(
                'id' => $conta->getId(),
                'owner' => $conta->getOwner(),
                'limit' => $conta->getLimit()
            );
        }
    }

} else {
    //Lista todas as contas
    foreach($contas as $conta) {
        $result[] = array(
            'id' => $conta->getId(),
            'owner' => $conta->getOwner(),
            'limit' => $conta->getLimit()
        );
    }
}

if (empty($result)) {
    $result[] = array(
        'data' => 'Conta não encontrada'
    );
    http_response_code(404);    
} else {
    http_response_code(202);
}
print_r(json_encode($result));



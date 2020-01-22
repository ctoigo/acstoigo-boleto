<?php
require 'autoload.php';

$retorno = ACSToigo\Cnab\Retorno\Factory::make(__DIR__ . DIRECTORY_SEPARATOR . 'arquivos' . DIRECTORY_SEPARATOR . 'bancoob.ret');
$retorno->processar();

echo $retorno->getBancoNome();
print_r($retorno->getDetalhes());

<?php
require 'autoload.php';

$retorno = ACSToigo\Cnab\Retorno\Factory::make(__DIR__ . DIRECTORY_SEPARATOR . 'arquivos' . DIRECTORY_SEPARATOR . '4370_00496200_20200120_C240_00.ret');
$retorno->processar();

echo $retorno->getBancoNome();

foreach ($retorno->getDetalhes() as $key => $value) {
    print_r($value);
}


<?php

require 'autoload.php';
$beneficiario = new \ACSToigo\Pessoa(
        [
    'nome' => 'ACME',
    'endereco' => 'Rua um, 123',
    'cep' => '99999-999',
    'uf' => 'UF',
    'cidade' => 'CIDADE',
    'documento' => '99.999.999/9999-99',
        ]
);

$pagador = new \ACSToigo\Pessoa(
        [
    'nome' => 'Cliente',
    'endereco' => 'Rua um, 123',
    'bairro' => 'Bairro',
    'cep' => '99999-999',
    'uf' => 'UF',
    'cidade' => 'CIDADE',
    'documento' => '999.999.999-99',
        ]
);

$boleto = new \ACSToigo\Boleto\Banco\Bancoob(
        [
    'logo' => realpath(__DIR__ . '/../logos/') . DIRECTORY_SEPARATOR . '756.png',
    'dataVencimento' => new \Carbon\Carbon(),
    'valor' => 100,
    'multa' => false,
    'juros' => false,
    'juros_apos' => 1,
    'diasProtesto' => false,
    'numero' => 1,
    'parcela' => 1,
    'numeroDocumento' => 1,
    'pagador' => $pagador,
    'beneficiario' => $beneficiario,
    'carteira' => 1,
    'agencia' => 1111,
    'agenciaDv' => 1,
    'convenio' => 123123,
    'conta' => 22222,
    'contaDv' => 2,
    'aceite' => 'S',
    'especieDoc' => 'DM',
    'range' => 0,
    'ios' => 0,
    'variacaoCarteira' => 0,
    'codigoCliente' => 123123,
    'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
    'instrucoes' => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
        ]
);

$boleto-
header('Content-type: application/pdf');
echo $boleto->renderPDF(
        $print = false, 
        $instrucoes = false, 
        $comprovante = true
);
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

$boleto = new \ACSToigo\Boleto\Banco\Itau(
        [
    'logo' => realpath(__DIR__ . '/../logos/') . DIRECTORY_SEPARATOR . '341.png',
    'dataVencimento' => new \Carbon\Carbon(),
    'valor' => 100,
    'multa' => false,
    'juros' => false,
    'juros_apos' => 1,
    'diasProtesto' => false,
    'numero' => 2608263,
    'parcela' => 1,
    'numeroDocumento' => 2608263,
    'pagador' => $pagador,
    'beneficiario' => $beneficiario,
    'carteira' => 109,
    'agencia' => 8933,
    'agenciaDv' => null,
    'convenio' => null,
    'conta' => 13392,
    'contaDv' => 1,
    'aceite' => 'S',
    'especieDoc' => 'DM',
    'range' => null,
    'ios' => null,
    'variacaoCarteira' => null,
    'codigoCliente' => null,
    'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
    'instrucoes' => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
        ]
);

header('Content-type: application/pdf');
echo $boleto->renderPDF(
        $print = false, 
        $instrucoes = false, 
        $comprovante = true
);
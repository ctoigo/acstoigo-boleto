<?php

namespace ACSToigo\Boleto\Banco;

use ACSToigo\Boleto\AbstractBoleto;
use ACSToigo\CalculoDV;
use ACSToigo\Contracts\Boleto\Boleto as BoletoContract;
use ACSToigo\Util;

/**
 * Class Bancoob
 * @package ACSToigo\Boleto\Banco
 */
class Bancoob extends AbstractBoleto implements BoletoContract {

    /**
     * Código do banco
     * @var string
     */
    protected $codigoBanco = self::COD_BANCO_BANCOOB;
    
    /**
     * Codigo do cliente junto ao banco.
     *
     * @var string
     */
    protected $codigoCliente;

    /**
     * Define as carteiras disponíveis para este banco
     * @var array
     */
    protected $carteiras = [
        '1',
        '3'
    ];

    /**
     * Espécie do documento, coódigo para remessa
     * @var string
     */
    protected $especiesCodigo = [
        'DM' => '01',
        'NP' => '02',
        'DS' => '12',
    ];

    /**
     * Define o número do convênio (4, 6 ou 7 caracteres)
     *
     * @var string
     */
    protected $convenio;

    /**
     * Parcela do boleto.
     *
     * @var string
     */
    protected $parcela;
    
    /**
     * Bancoob constructor.
     * @param array $params
     */
    public function __construct(array $params = []) {
        parent::__construct($params);
        $this->addCampoObrigatorio('convenio');
    }
    
    /**
     * Define o número do convênio. Sempre use string pois a quantidade de caracteres é validada.
     *
     * @param  string $convenio
     * @return Bancoob
     */
    public function setConvenio($convenio) {
        $this->convenio = $convenio;
        return $this;
    }

    /**
     * Retorna o número do convênio
     *
     * @return string
     */
    public function getConvenio() {
        return $this->convenio;
    }

    /**
     * Gera o Nosso Número.
     *
     * @throws \Exception
     * @return string
     */
    protected function gerarNossoNumero() {
        return $this->getNumero() . CalculoDV::bancoobNossoNumero($this->getAgencia(), $this->getConvenio(), $this->getNumero());
    }

    /**
     * Método que retorna o nosso numero usado no boleto. alguns bancos possuem algumas diferenças.
     *
     * @return string
     */
    public function getNossoNumeroBoleto() {
        return substr_replace($this->getNossoNumero(), '-', -1, 0);
    }

    /**
     * Método para gerar o código da posição de 20 a 44
     *
     * @return string
     * @throws \Exception
     */
    protected function getCampoLivre() {
        if ($this->campoLivre) {
            return $this->campoLivre;
        }

        $nossoNumero = $this->getNossoNumero();

        $campoLivre = Util::numberFormatGeral($this->getCarteira(), 1);
        $campoLivre .= Util::numberFormatGeral($this->getAgencia(), 4);
        $campoLivre .= Util::numberFormatGeral($this->getCarteira(), 2);
        $campoLivre .= Util::numberFormatGeral($this->getConvenio(), 7);
        $campoLivre .= Util::numberFormatGeral($nossoNumero, 8);
        $campoLivre .= Util::numberFormatGeral($this->getParcela(), 3);

        return $this->campoLivre = $campoLivre;
    }

    /**
     * Método para gerar a Agencia e o Codigo do Beneficiario
     *
     * @return string
     * @throws \Exception
     */
    public function getAgenciaCodigoBeneficiario() {
        $agencia = $this->getAgencia();
        $conta = $this->getCodigoCliente();
        return $agencia . ' / ' . $conta;
    }


    /**
     * Seta o codigo do cliente.
     *
     * @param mixed $codigoCliente
     *
     * @return $this
     */
    public function setCodigoCliente($codigoCliente) {
        $this->codigoCliente = $codigoCliente;

        return $this;
    }

    /**
     * Retorna o codigo do cliente.
     *
     * @return string
     */
    public function getCodigoCliente() {
        return $this->codigoCliente;
    }

    /**
     * Seta a Parcela.
     *
     * @param mixed $parcela
     *
     * @return $this
     */
    public function setParcela($parcela) {
        $this->parcela = $parcela;

        return $this;
    }

    /**
     * Retorna a Parcela.
     *
     * @return string
     */
    public function getParcela() {
        return $this->parcela;
    }

}

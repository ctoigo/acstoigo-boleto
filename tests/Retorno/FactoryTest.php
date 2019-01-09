<?php

namespace ACSToigo\Tests\Retorno;

use ACSToigo\Tests\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @expectedException     \Exception
     */
    public function testCriarEmBranco(){
        $retorno = \ACSToigo\Cnab\Retorno\Factory::make('');
        $retorno->processar();
    }

}
<?php echo $this->render('html/header', ['css' => $css]); ?>

<?php foreach ($boletos as $i => $boleto): ?>
    <?php extract($boleto); ?>
    <?php if ($mostrar_instrucoes): ?>
        <div class="noprint info">
            <h2>Instruções de Impressão</h2>
            <ul>
                <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo
                    econômico).
                </li>
                <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do
                    formulário.
                </li>
                <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de
                    barras.
                </li>
                <li>Caso não apareça o código de barras no final, pressione F5 para atualizar esta tela.</li>
                <li>Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou
                    no
                    internet banking:
                </li>
            </ul>
            <span class="header">Linha Digitável: <?php echo $linha_digitavel; ?></span>
            <span class="header">Número: <?php echo $numero; ?></span>
            <?= $valor ? '<span class="header">Valor: R$' . $valor . '</span>' : ''; ?>
            <br>
        </div>
    <?php endif; ?>

    <?php if ($mostrar_comprovante): ?>
        <?php echo $this->render('html/header', ['css' => $css]); ?>

        <?php foreach ($boletos as $i => $boleto): ?>
            <?php extract($boleto); ?>
            <?php if ($mostrar_instrucoes): ?>
                <div class="noprint info">
                    <h2>Instruções de Impressão</h2>
                    <ul>
                        <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo
                            econômico).
                        </li>
                        <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do
                            formulário.
                        </li>
                        <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de
                            barras.
                        </li>
                        <li>Caso não apareça o código de barras no final, pressione F5 para atualizar esta tela.</li>
                        <li>Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou
                            no
                            internet banking:
                        </li>
                    </ul>
                    <span class="header">Linha Digitável: <?php echo $linha_digitavel; ?></span>
                    <span class="header">Número: <?php echo $numero; ?></span>
                    <?= $valor ? '<span class="header">Valor: R$' . $valor . '</span>' : ''; ?>
                    <br>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_comprovante): ?>
                <table class="table-boleto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td valign="bottom" colspan="8" class="noborder nopadding">
                                <div class="logocontainer">
                                    <div class="logobanco">
                                        <img src="<?php echo $logo_banco_base64; ?>" alt="logo do banco">
                                    </div>
                                    <div class="codbanco"><?php echo $codigo_banco_com_dv; ?></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" width="280" class="top-2">
                                <div class="titulo">Beneficiário</div>
                                <div class="conteudo"><?php echo $beneficiario['nome']; ?></div>
                            </td>
                            <td class="top-2">
                                <div class="titulo">Ag/Cod. Beneficiário</div>
                                <div class="conteudo rtl"><?php echo $agencia_codigo_beneficiario; ?></div>
                            </td>
                            <td colspan="2" width="210" class="top-2">
                                <div class="titulo" style="text-align: center;">Motivos de não entregar (Para uso da empresa entregadora)</div>
                                <div class="conteudo"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="titulo">Pagador</div>
                                <div class="conteudo"><?php echo $pagador['nome_documento']; ?></div>
                            </td>
                            <td>
                                <div class="titulo">Nosso número</div>
                                <div class="conteudo rtl"><?php echo $nosso_numero_boleto; ?></div>
                            </td>
                            <td colspan="2" width="210" class="notopborder">
                                <div class="titulo" style="text-align: center;">( ) Mudou-se&nbsp;&nbsp;&nbsp;( ) Ausente&nbsp;&nbsp;&nbsp;( ) Não existe no indicado</div>
                                <div class="conteudo"></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="40">
                                <div class="titulo">Vencimento</div>
                                <div class="conteudo rtl"><?php echo $data_vencimento->format('d/m/Y'); ?></div>
                            </td>
                            <td width="40">
                                <div class="titulo">Nº documento</div>
                                <div class="conteudo rtl"><?php echo $numero_documento; ?></div>
                            </td>
                            <td width="20">
                                <div class="titulo">Espécie</div>
                                <div class="conteudo"><?php echo $especie; ?></div>
                            </td>
                            <td width="40">
                                <div class="titulo">Quantidade</div>
                                <div class="conteudo rtl"></div>
                            </td>
                            <td width="90">
                                <div class="titulo">(=) Valor Documento</div>
                                <div class="conteudo rtl"><?php echo $valor; ?></div>
                            </td>
                            <td colspan="2" width="210" class="notopborder">
                                <div class="titulo" style="text-align: center;">( ) Recusado&nbsp;&nbsp;&nbsp;( ) Não procurado&nbsp;&nbsp;&nbsp;( ) Endereço insuficiente</div>
                                <div class="conteudo"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="topborder bottomborder">
                                <div class="titulo">Recebi(emos) o bloqueto/título com as características acima</div>
                                <div class="conteudo"></div>
                            </td>
                            <td colspan="2" class="topborder bottomborder">
                                <div class="titulo">Data do documento</div>
                                <div class="conteudo"><?php echo $data_documento->format('d/m/Y'); ?></div>
                            </td>
                            <td class="topborder bottomborder">
                                <div class="titulo">Assinatura</div>
                                <div class="conteudo rtl"></div>
                            </td>
                            <td class="topborder bottomborder">
                                <div class="titulo">Data</div>
                                <div class="conteudo rtl"></div>
                            </td>
                            <td class="topborder bottomborder">
                                <div class="titulo">Entregador</div>
                                <div class="conteudo rtl"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="linha-pontilhada" style="margin-bottom: 20px;">Recibo do pagador</div>

            <div class="info-empresa">
                <?php if ($logo): ?>
                    <div style="display: inline-block;">
                        <img alt="logo" width="80px;" src="<?php echo $logo_base64; ?>"/>
                    </div>
                <?php endif; ?>
                <div style="display: inline-block; vertical-align: super;">
                    <div><strong><?php echo $beneficiario['nome']; ?></strong></div>
                    <div><?php echo $beneficiario['documento']; ?></div>
                    <div><?php echo $beneficiario['endereco']; ?></div>
                    <div><?php echo $beneficiario['endereco2']; ?></div>
                </div>
            </div>
            <br>

            <table class="table-boleto" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        <td valign="bottom" colspan="8" class="noborder nopadding">
                            <div class="logocontainer">
                                <div class="logobanco">
                                    <img src="<?php echo $logo_banco_base64; ?>" alt="logo do banco">
                                </div>
                                <div class="codbanco"><?php echo $codigo_banco_com_dv; ?></div>
                            </div>
                            <div class="linha-digitavel"><?php echo $linha_digitavel; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="250" class="top-2">
                            <div class="titulo">Beneficiário</div>
                            <div class="conteudo"><?php echo $beneficiario['nome']; ?></div>
                        </td>
                        <td class="top-2">
                            <div class="titulo">CPF/CNPJ</div>
                            <div class="conteudo"><?php echo $beneficiario['documento']; ?></div>
                        </td>
                        <td width="120" class="top-2">
                            <div class="titulo">Ag/Cod. Beneficiário</div>
                            <div class="conteudo rtl"><?php echo $agencia_codigo_beneficiario; ?></div>
                        </td>
                        <td width="120" class="top-2">
                            <div class="titulo">Vencimento</div>
                            <div class="conteudo rtl"><?php echo $data_vencimento->format('d/m/Y'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="titulo">Pagador</div>
                            <div class="conteudo"><?php echo $pagador['nome_documento']; ?></div>
                        </td>
                        <td>
                            <div class="titulo">Nº documento</div>
                            <div class="conteudo rtl"><?php echo $numero_documento; ?></div>
                        </td>
                        <td>
                            <div class="titulo">Nosso número</div>
                            <div class="conteudo rtl"><?php echo $nosso_numero_boleto; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="titulo">Espécie</div>
                            <div class="conteudo"><?php echo $especie; ?></div>
                        </td>
                        <td>
                            <div class="titulo">Quantidade</div>
                            <div class="conteudo rtl"></div>
                        </td>
                        <td>
                            <div class="titulo">Valor</div>
                            <div class="conteudo rtl"><?php echo $valor; ?></div>
                        </td>
                        <td>
                            <div class="titulo">(-) Descontos / Abatimentos</div>
                            <div class="conteudo rtl"></div>
                        </td>
                        <td>
                            <div class="titulo">(=) Valor Documento</div>
                            <div class="conteudo rtl"><?php echo $valor; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="conteudo"></div>
                            <div class="titulo">Demonstrativo</div>
                        </td>
                        <td>
                            <div class="titulo">(-) Outras deduções</div>
                            <div class="conteudo"></div>
                        </td>
                        <td>
                            <div class="titulo">(+) Outros acréscimos</div>
                            <div class="conteudo rtl"></div>
                        </td>
                        <td>
                            <div class="titulo">(=) Valor cobrado</div>
                            <div class="conteudo rtl"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div style="margin-top: 10px" class="conteudo"><?php echo $demonstrativo[0]; ?></div>
                        </td>
                        <td class="noleftborder">
                            <div class="titulo">Autenticação mecânica</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="notopborder">
                            <div class="conteudo"><?php echo $demonstrativo[1]; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="notopborder">
                            <div class="conteudo"><?php echo $demonstrativo[2]; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="notopborder">
                            <div class="conteudo"><?php echo $demonstrativo[3]; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="notopborder bottomborder">
                            <div style="margin-bottom: 10px;" class="conteudo"><?php echo $demonstrativo[4]; ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="linha-pontilhada">Corte na linha pontilhada</div>
            <br>

            <!-- Ficha de compensação -->
            <?php echo $this->render('partials/ficha-compensacao', ['boleto' => $boleto]); ?>

            <?php if (count($boletos) > 1 && count($boletos) - 1 != $i): ?>
                <div style="page-break-before:always"></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php echo $this->render('html/footer', ['imprimir_carregamento' => $imprimir_carregamento]); ?>
    <?php endif; ?>

<?php endforeach; ?>

<?php echo $this->render('html/footer', ['imprimir_carregamento' => $imprimir_carregamento]); ?>
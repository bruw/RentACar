<section>
    <div class="container">
        <h1 class="font-edgeracer">RELATÓRIOS</h1>

        <?php if (empty($relatorioSelecionado) || ($relatorioSelecionado == 1)) : ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">filter_list</i>
                    <select id="select-relatorio">
                        <option value="1" selected>Relatório de Locações e Reparos de um Veículo</option>
                        <option value="2">Relatório de Lucros da Empresa</option>
                    </select>
                    <label>Categorias Relatório</label>
                </div>
            </div>
        <?php endif ?>

        <?php if (!empty($relatorioSelecionado) && ($relatorioSelecionado == 2)) : ?>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">filter_list</i>
                    <select id="select-relatorio">
                        <option value="1">Relatório de Locações e Reparos de um Veículo</option>
                        <option value="2" selected>Relatório de Lucros da Empresa</option>
                    </select>
                    <label>Categorias Relatório</label>
                </div>
            </div>
        <?php endif ?>

        <?php if (!empty($naoEncontrado)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $naoEncontrado ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($dataInferior)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $dataInferior ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($naoExisteRegistro)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $naoExisteRegistro ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($naoPossuiMovimentacao)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $naoPossuiMovimentacao ?></p>
            </div>
        <?php endif ?>


        <form action="<?= URL_RAIZ . 'relatorio/veiculo' ?>" method="get">
            <div id="div-pesquisa-chassi" class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">directions_car</i>
                    <input type="text" name="chassi-busca" value="<?= $this->getGet('chassi-busca') ?>" placeholder="1234cb4321dd34yp9">
                    <label for="icon_prefix">Número do Chassi</label>
                </div>
                <div class="col s12 m6">
                    <button id="button-pesquisar-veiculo" class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
        </form>

        <?php if (!empty($locacoes) || !empty($reparos)) : ?>
            <div id="div-informacao-veiculo" class="row">
                <h4>Dados do Veículo</h4>
                <div class="col s12 align-center">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img class="img-veiculos" src="<?= URL_IMG . $veiculo->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= ucfirst($veiculo->getModelo()) ?></span>
                            <p><span>Montadora: <?= ucfirst($veiculo->getMontadora()) ?></span></p>
                            <p><span>Modelo: <?= ucfirst($veiculo->getModelo()) ?></span></p>
                            <p><span>Número do Chassi: <?= $veiculo->getChassi() ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div-cabecalho-reparos" class="row">
                <h4>Histórico de locações e Reparos do Veículo</h4>
                <div class="col s12 table-total">
                    <table>
                        <tr>
                            <th>TOTAL LOCAÇÕES</th>
                            <th>TOTAL REPAROS</th>
                            <th>LUCRO</th>
                        </tr>
                        <tr>
                            <?php if ($locacoes !== null) : ?>
                                <th>R$<?= number_format($totalLocacao, 2, ',', '.') ?></th>
                            <?php endif ?>

                            <?php if ($reparos !== null) : ?>
                                <th>R$<?= number_format($totalReparos, 2, ',', '.') ?></th>
                            <?php endif ?>

                            <?php if ($lucro !== null) : ?>
                                <th>R$<?= number_format($lucro, 2, ',', '.') ?></th>
                            <?php endif ?>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="div-conteudo-reparos" class="col s12">
                <table>
                    <tr>
                        <th>Data de Locação / Reparo</th>
                        <th>Data de Devolução</th>
                        <th>Valor Total da Locação</th>
                        <th>Valor do Reparo</th>
                    </tr>
                    <?php foreach ($locacoes as $locacao) : ?>
                        <tr>
                            <th><?= date_format(date_create($locacao->getDataLocacao()), 'd-m-Y') ?></th>
                            <th><?= date_format(date_create($locacao->getDataDevolucao()), 'd-m-Y') ?></th>
                            <th>R$<?= number_format($locacao->getTotal(), 2, ',', '.') ?></th>
                            <th>--</th>
                        </tr>
                    <?php endforeach ?>

                    <?php foreach ($reparos as $reparo) : ?>
                        <tr>
                            <th><?= date_format(date_create($reparo->getDataEntrada()), 'd-m-Y') ?></th>
                            <th><?= date_format(date_create($reparo->getDataSaida()), 'd-m-Y') ?></th>
                            <th>--</th>
                            <th>R$<?= number_format($reparo->getTotal(), 2, ',', '.') ?></th>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        <?php endif ?>

        <form action="<?= URL_RAIZ . 'relatorio/balanco-empresa' ?>" method="get">
            <input type="hidden" name="relatorio-selecionado" value="2">

            <div id="div-filtro-data" class="row ocultar-conteudo">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" id="relatorio-data-inicio" name="data-inicio" class="datepicker date-relatorio" placeholder="Clique aqui para selecionar a data de ínicio">
                    <label for="icon_prefix">Data de Ínicio</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" id="relatorio-data-fim" name="data-fim" class="datepicker date-relatorio" placeholder="Clique aqui para selecionar a data final">
                    <label for="icon_prefix">Data de Fim</label>
                </div>
                <div class="col s12">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
        </form>

        <?php if (!empty($exibirBalanco)) : ?>
            <div id="div-relatorio-lucro" class="row ocultar-conteudo">
                <h4>Relatório de Lucros</h4>
                <div class="col s12 table-total">
                    <table>
                        <tr>
                            <th>TOTAL LOCAÇÕES PERÍODO</th>
                            <th>TOTAL REPAROS PERÍODO</th>
                            <th>LUCRO TOTAL</th>
                        </tr>
                        <tr>
                            <th>R$<?= number_format($totalLocacoes, 2, ',', '.') ?></th>
                            <th>R$<?= number_format($totalReparos, 2, ',', '.') ?></th>
                            <th>R$<?= number_format($lucroEmpresa, 2, ',', '.') ?></th>
                        </tr>
                    </table>
                </div>

                <div>
                    <table>
                        <tr>
                            <th>DATA INÍCIO</th>
                            <th>DATA FIM</th>
                            <th>TOTAL LOCAÇÕES PERÍODO</th>
                            <th>TOTAL REPAROS PERÍODO</th>
                        </tr>
                        <tr>
                            <th><?= date_format(date_create($dataInicio), 'd-m-Y') ?></th>
                            <th><?= date_format(date_create($dataFim), 'd-m-Y') ?></th>
                            <th>R$<?= number_format($totalLocacoes, 2, ',', '.') ?></th>
                            <th>R$<?= number_format($totalReparos, 2, ',', '.') ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endif ?>

    </div>
</section>
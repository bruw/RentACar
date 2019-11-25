<section>
    <div class="container">
        <h1 class="font-edgeracer">Novo pedido de Locação</h1>

        <form id="form-nova-locacao" action="<?= URL_RAIZ . 'locacoes/cliente-existe/' . $veiculo->getChassi() ?>" method="get">
            <div class="row">
                <div class="input-field col s12 m7">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" class="cpf" type="text" name="cpf-busca" value="<?= $this->getGet('cpf-busca') ?>" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF do Cliente</label>
                </div>
                <div class="col s12 m5">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
        </form>

        <?php if (!empty($naoEncontrado)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $naoEncontrado ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($totalNulo)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $totalNulo ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($cliente)) : ?>
            <form action="<?= URL_RAIZ . 'locacoes/calcular-total' ?>" method="get">
                <input type="hidden" name="cliente-cpf" value="<?= $cliente->getCpf() ?>">
                <input type="hidden" name="veiculo-chassi" value="<?= $veiculo->getChassi() ?>">

                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">date_range</i>
                                            <label class="black-text" for="icon_prefix">Data Atual: <?= date('d-m-Y') ?></label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">date_range</i>
                                            <input type="text" name="dataPrevistaEntrega" value="<?= $this->getGet('dataPrevistaEntrega') ?>" class="datepicker" placeholder="Clique aqui para selecionar uma data">
                                            <label for="icon_prefix">Data para Devolução</label>
                                            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'dataInferior']) ?>
                                            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'dataInexistente']) ?>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">attach_money</i>
                                            <label class="black-text" for="icon_prefix"> Diária do Veículo: R$ <?= number_format($veiculo->getPrecoDiaria(), 2, ',', '.') ?></label><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <button id="button-calcular-total" class="waves-effect waves-light btn green">Calcular Total</button>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <?php if (!empty($valorTotal)) : ?>
                                            <p id="total-locacao"><span>Total R$<?= number_format($valorTotal, 2, ',', '.') ?></span></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif ?>

        <?php if (!empty($cliente)) : ?>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= URL_IMG . 'servicos/teste.jpg' ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Dados do Cliente</span>
                            <p><span>Primeiro Nome: </span><?= ucfirst($cliente->getPrimeiroNome()) ?></p>
                            <p><span>Sobrenome: </span><?= ucfirst($cliente->getSobrenome()) ?></p>
                            <p><span>CPF: </span><?= $cliente->getCpf() ?></p>
                            <p><span>Celular: </span><?= $cliente->getCelular() ?></p>
                            <p><span>Número: </span><?= $cliente->getNumero() ?></p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= URL_IMG . $veiculo->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Dados do Veículo</span>
                            <p><span>Modelo: </span><?= ucfirst($veiculo->getModelo()) ?></p>
                            <p><span>Montadora: </span><?= ucfirst($veiculo->getMontadora()) ?></p>
                            <p><span>Número do Chassi: </span><?= $veiculo->getChassi() ?></p>
                            <p><span>Preço da Diária: R$</span><?= number_format($veiculo->getPrecoDiaria(), 2, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <form id="form-nova-locacao" action="<?= URL_RAIZ . 'locacoes' ?>" method="post">
                <input type="hidden" name="veiculo" value="<?= $veiculo->getId() ?>">
                <input type="hidden" name="cliente" value="<?= $cliente->getId() ?>">
                <?php if(!empty($valorTotal)) : ?>
                <input type="hidden" name="total" value="<?= $valorTotal ?>">
                <?php endif?>
                <input type="hidden" name="dataPrevistaEntrega" value="<?= $this->getGet('dataPrevistaEntrega') ?>">

                <div class="row">
                    <div class="col s12 m6">
                        <button class="waves-effect waves-light btn button-confirmar" type="submit">
                            <i class="material-icons left">check_circle</i>Confirmar Locação
                        </button>
                    </div>
                    <div class="col s12 m6">
                        <a href="<?= URL_RAIZ ?>" class="btn button-cancelar">
                            <i class="material-icons left">cancel</i>Cancelar
                        </a>
                    </div>
                </div>
            </form>

        <?php endif ?>
    </div>
</section>
<section>
    <div class="container">
        <h1 class="font-edgeracer">Devolução de Veículo</h1>
        <form action="<?= URL_RAIZ . 'locacoes/existe-locacao-cliente' ?>" method="get">
            <div class="row">
                <div class="input-field col s12 m8">
                    <i class="material-icons prefix">assignment</i>
                    <input class="cpf" name="cpf-busca" value="<?= $this->getGet('cpf-busca') ?>" type="text" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>
                <div class="col s12 m4">
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

        <?php if (!empty($devolucaoSucesso)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $devolucaoSucesso ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($cliente)) : ?>

            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-stacked">
                            <div class="card-content">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">date_range</i>
                                        <label class="black-text" for="icon_prefix">Data Locação: <?= $locacao->getDataLocacao() ?></label>
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">date_range</i>
                                        <label class="black-text" for="icon_prefix">Data Prevista Devolução: <?= $locacao->getDataPrevistaEntrega() ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">date_range</i>
                                        <label class="black-text" for="icon_prefix">Data Atual: <?= date('d-m-Y') ?></label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">attach_money</i>
                                        <label class="black-text" for="icon_prefix">Total Já Pago Sem Multa: R$<?= number_format($locacao->getTotal(), 2, ',', '.') ?></label>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <p id="multa"><span>Multa R$<?= number_format($multaAtraso, 2, ',', '.') ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-veiculos" src="<?= URL_IMG . 'servicos/teste.jpg' ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Dados do Cliente</span>
                            <p><span>Primeiro Nome: <?= $cliente->getPrimeiroNome() ?></span></p>
                            <p><span>Sobrenome: <?= $cliente->getSobrenome() ?></span></p>
                            <p><span>CPF: <?= $cliente->getCpf() ?></span></p>
                            <p><span>Celular: <?= $cliente->getCelular() ?></span></p>
                            <p><span>Número: <?= $cliente->getNumero() ?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-veiculos" src="<?= URL_IMG . $veiculo->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Dados do Veículo</span>
                            <p><span>Modelo: <?= $veiculo->getModelo() ?></span></p>
                            <p><span>Montadora: <?= $veiculo->getMontadora() ?></span></p>
                            <p><span>Número do Chassi: <?= $veiculo->getChassi() ?></span></p>
                            <p><span>Preço da Diária: R$<?= number_format($veiculo->getPrecoDiaria(), 2, ',', '.') ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?= URL_RAIZ . 'locacoes/' . $locacao->getId() . '/editar' ?>" method="post">
                <input type="hidden" name="_metodo" value="PATCH">
                <div class="row">
                    <div class="col s12 m6">
                        <button class="waves-effect waves-light btn right button-confirmar" type="submit">
                            <i class="material-icons left">check</i>confirmar Devolução
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
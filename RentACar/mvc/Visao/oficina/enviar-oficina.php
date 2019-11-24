<section>
    <div class="container">
        <h1 class="font-edgeracer">Enviar veículo para oficina</h1>
        <form action="<?= URL_RAIZ . 'oficina/pesquisar' ?>" method="get">
            <input type="hidden" name="enviar-oficina" value="true">
            <div class="row">
                <div class="input-field col s12 m7">
                    <i class="material-icons prefix">directions_car</i>
                    <input type="text" name="chassi-busca" value="<?= $this->getGet('chassi-busca') ?>" placeholder="1234cb4321dd34yp9">
                    <label for="icon_prefix">Número do Chassi</label>
                </div>
                <div class="col s12 m5">
                    <button id="button-pesquisar-veiculo" class="waves-effect waves-light btn button-pesquisar" type="submit">
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

        <?php if (!empty($estaLocado)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $estaLocado ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($estaNaOficina)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $estaNaOficina ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($sucesso)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $sucesso ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($veiculo)) : ?>

            <div class="row">
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

            <form action="<?= URL_RAIZ . 'oficina' ?>" method="post">
                <input type="hidden" name="veiculo-oficina" value="<?= $veiculo->getChassi() ?>">
                <div class="row">
                    <div class="col s12 m6">
                        <button class="waves-effect waves-light btn button-confirmar" type="submit">
                            <i class="material-icons left">build</i>Enviar para Oficina
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
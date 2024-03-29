<div class="container">
    <?php if (!empty($veiculos)) : ?>
        <h4 class="font-edgeracer">Veículos na Oficina</h4>
    <?php endif ?>


    <?php if (empty($veiculos)) : ?>
        <h1>Nenhum Veículo na Oficina!</h1>
    <?php endif ?>
</div>

<section>
    <div class="container">
        <?php if (!empty($reparoFinalizado)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $reparoFinalizado ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($veiculos)) : ?>
            <?php for ($i = 0; $i < count($veiculos); $i++) : ?>

                <?php if (($i % 2) == 0) : ?>
                    <div class="row">
                    <?php endif ?>

                    <div class="col s12 m6">
                        <div class="card">
                            <div class="card-image">
                                <img class="img-veiculos" src="<?= URL_IMG . $veiculos[$i]->getImagem() ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title"><?= ucfirst($veiculos[$i]->getModelo()) ?></span>
                                <p><span>Montadora: <?= ucfirst($veiculos[$i]->getMontadora()) ?></span></p>
                                <p><span>Modelo: <?= ucfirst($veiculos[$i]->getModelo()) ?></span></p>
                                <p><span>Número do Chassi: <?= $veiculos[$i]->getChassi() ?></span></p>

                            </div>
                            <div class="card-action">
                                <form action="<?= URL_RAIZ . 'oficina/atualizar/' . $veiculos[$i]->getChassi() ?>" method="post">
                                    <input type="hidden" name="_metodo" value="PATCH">
                                    <input type="hidden" name="id-reparo" value="<?= $reparos[$i]->getId() ?>">
                                    <input type="hidden" name="pagina-atual" value="<?= $pagina ?>">

                                    <div class="input-field">
                                        <i class="material-icons prefix">monetization_on</i>
                                        <input type="number" name="valor-reparo" placeholder="500,00">
                                        <label for="icon_prefix">Valor do reparo: R$</label>
                                        <?php if (!empty($inputErroVeiculo) && ($veiculos[$i]->getChassi() == $inputErroVeiculo)) : ?>
                                            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'totalReparo']) ?>
                                        <?php endif ?>
                                    </div>

                                    <button class="waves-effect waves-light btn button-confirmar" type="submit">
                                        <i class="material-icons left">build</i>Finalizar reparo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php if (($i % 2) != 0) : ?>
                    </div>
                <?php endif ?>

            <?php endfor ?>
        <?php endif ?>
    </div>

    <div class="container">
        <?php if ($pagina > 1) : ?>
            <a href="<?= URL_RAIZ . 'oficina?p=' . ($pagina - 1) ?>" class="btn button-pagina left">
                <i class="material-icons left">navigate_before</i>Página anterior
            </a>
        <?php endif ?>
        <?php if (($pagina < $ultimaPagina) && ($existeProximo)) : ?>
            <a href="<?= URL_RAIZ . 'oficina?p=' . ($pagina + 1) ?>" class="btn button-pagina right">
                <i class="material-icons right">navigate_next</i>Próxima página
            </a>
        <?php endif ?>
    </div>
</section>
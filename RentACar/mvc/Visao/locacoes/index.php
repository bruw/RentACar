<div class="container">
    <?php if (empty($veiculos)) : ?>
        <h1>Nenhum Veículo Disponível...</h1>
    <?php endif ?>


    <?php if (!empty($veiculos)) : ?>
        <h4 class="font-edgeracer">Veículos Disponíveis</h4>
    <?php endif ?>

    <?php if (!empty($sucesso)) : ?>
        <div class="msg-flash balao-flash-sucesso">
            <p><?= $sucesso ?></p>
        </div>
    <?php endif ?>
</div>


<?php if (!empty($veiculos)) : ?>
    <section>
        <div class="container">
            <?php for ($i = 0; $i < count($veiculos); $i++) : ?>
                <?php if (($i % 2) == 0) : ?>
                    <div class="row">
                    <?php endif ?>
                    <?php if ($veiculos[$i]->getStatusLocacao() == 0) : ?>
                        <div class="left col s12 m6">
                            <div class="card">
                                <div class="card-image">
                                    <img class="img-veiculos" src="<?= URL_IMG . $veiculos[$i]->getImagem() ?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?= ucfirst($veiculos[$i]->getModelo()) ?></span>
                                    <p>Montadora: <?= ucfirst($veiculos[$i]->getMontadora()) ?></p>
                                    <p>Categoria: <?= $veiculos[$i]->nomeCategoria($veiculos[$i]->getIdCategoria()) ?></p>
                                </div>
                                <div class="card-action">
                                    <p>Diária: R$<?= number_format($veiculos[$i]->getPrecoDiaria(), 2, ',', '.') ?></p>
                                    <a class="waves-effect waves-light btn green" href="<?= URL_RAIZ . 'locacoes/criar/' . $veiculos[$i]->getChassi() ?>">Alugar</a>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (($i % 2) != 0) : ?>
                    </div>
                <?php endif ?>
            <?php endfor ?>
        </div>
    </section>
<?php endif ?>

<div class="container">
    <?php if ($pagina > 1) : ?>
        <a href="<?= URL_RAIZ . 'locacoes?p=' . ($pagina - 1) ?>" class="btn button-pagina left">
            <i class="material-icons left">navigate_before</i>Página anterior
        </a>
    <?php endif ?>
    <?php if (($pagina < $ultimaPagina) && ($existeProximo)) : ?>
        <a href="<?= URL_RAIZ . 'locacoes?p=' . ($pagina + 1) ?>" class="btn button-pagina right">
            <i class="material-icons right">navigate_next</i>Próxima página
        </a>
    <?php endif ?>
</div>
<div class="container">
    <?php if (!empty($veiculos)) : ?>
        <section>
            <div id="div-categoria" class="row">
                <div class="col s12">
                    <form id="form-categoria" class="card-panel">
                        <h5>Filtrar por Categoria:</h5>
                        <label>
                            <input type="checkbox" class="filled-in" name="hatch" value="1">
                            <span>Hatch</span>
                        </label>
                        <label>
                            <input type="checkbox" class="filled-in" name="sedan" value="2">
                            <span>Sedãn</span>
                        </label>
                        <label>
                            <input type="checkbox" class="filled-in" name="suv" value="3">
                            <span>SUV</span>
                        </label>
                        <label>
                            <input type="checkbox" class="filled-in" name="pick-up" value="4">
                            <span>Pick-Ups</span>
                        </label>

                        <button id="button-pesquisa-filtro" class="waves-effect waves-light btn-small disabled" type="submit">
                            <i class="material-icons left"></i>Pesquisar
                        </button>
                    </form>
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php if (empty($veiculos)) : ?>
        <h1>Nenhum Veículo Disponível...</h1>
    <?php endif ?>
</div>

<?php if (!empty($veiculos)) : ?>
    <h4 class="font-edgeracer">Veículos Disponíveis</h4>
<?php endif ?>

<?php if (!empty($sucesso)) : ?>
    <div class="msg-flash balao-flash-sucesso">
        <p><?= $sucesso ?></p>
    </div>
<?php endif ?>

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
        <a  href="<?= URL_RAIZ . 'locacoes?p=' . ($pagina - 1) ?>" class="btn button-pagina left">Página anterior</a>
    <?php endif ?>
    <?php if (($pagina < $ultimaPagina) && ($existeProximo)) : ?>
        <a  href="<?= URL_RAIZ . 'locacoes?p=' . ($pagina + 1) ?>" class="btn button-pagina right">Próxima página</a>
    <?php endif ?>
</div>
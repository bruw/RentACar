<section>
    <div class="container">
        <div id="div-categoria" class="row">
            <div class="col s12">
                <form id="form-categoria" class="card-panel" action="">
                    <h5>Filtrar por Categoria:</h5>
                    <label>
                        <input type="checkbox" class="filled-in" name="categoria" value="hatch">
                        <span>Hatch</span>
                    </label>
                    <label>
                        <input type="checkbox" class="filled-in" name="categoria" value="sedan">
                        <span>Sedãn</span>
                    </label>
                    <label>
                        <input type="checkbox" class="filled-in" name="categoria" value="suv">
                        <span>SUV</span>
                    </label>
                    <label>
                        <input type="checkbox" class="filled-in" name="categoria" value="pick-ups">
                        <span>Pick-Ups</span>
                    </label>

                    <button id="button-pesquisa-filtro" class="waves-effect waves-light btn-small  disabled" type="submit">
                        <i class="material-icons left"></i>Pesquisar
                    </button>
                </form>
                <?php if (!empty($veiculos)) : ?>
                    <h4 class="font-edgeracer">Veículos disponíveis</h4>
                <?php endif ?>

                <?php if (empty($veiculos)) : ?>
                    <h1>Nenhum Veículo Disponível!</h1>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($sucesso)) : ?>
    <div class="msg-flash balao-flash-sucesso">
        <p><?= $sucesso ?></p>
    </div>
<?php endif ?>

<?php if (!empty($veiculos)) : ?>
    <section>
        <div class="container">
            <?php for($i = 0; $i < count($veiculos); $i++) : ?>
                <?php if(($i % 2) == 0) : ?>
                    <div class="row">
                <?php endif?>

                <?php if($veiculos[$i]->getStatusLocacao() == 1) : ?>
                <div class="left col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-veiculos veiculo-alugado" src="<?= URL_IMG . $veiculos[$i]->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= ucfirst($veiculos[$i]->getModelo()) ?></span>
                            <p>Montadora: <?= ucfirst($veiculos[$i]->getMontadora()) ?></p>
                            <p>Categoria: <?= $veiculos[$i]->nomeCategoria($veiculos[$i]->getIdCategoria()) ?></p>
                        </div>
                        <div class="card-action">
                            <p>Diária: R$<?= number_format($veiculos[$i]->getPrecoDiaria(), 2, ',', '.') ?></p>
                            <a class="btn red">ALUGADO</a>
                        </div>
                    </div>
                </div>
                <?php endif?>

                <?php if($veiculos[$i]->getStatusLocacao() == 0) : ?>
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
                <?php endif?>
                
                <?php if(($i % 2) != 0) : ?>
                    </div>
                <?php endif?>
            <?php endfor ?>
        </div>
    </section>
<?php endif ?>
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
                <h4 class="font-edgeracer">Veículos disponíveis</h4>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($sucesso)) : ?>
    <div class="msg-flash balao-flash-sucesso">
        <p><?= $sucesso ?></p>
    </div>
<?php endif ?>

<?php if (!empty($veiculo)) : ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= URL_IMG . $veiculo->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= ucfirst($veiculo->getModelo()) ?></span>
                            <p>Montadora: <?= ucfirst($veiculo->getMontadora()) ?></p>
                            <p>Categoria: <?= $veiculo->nomeCategoria($veiculo->getIdCategoria()) ?></p>
                        </div>
                        <div class="card-action">
                            <p>Diária: R$<?= $veiculo->getPrecoDiaria() ?></p>
                            <a href="<?= URL_RAIZ . 'locacoes/criar/' . $veiculo->getChassi() ?>">Alugar</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= URL_IMG . $veiculo2->getImagem() ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= ucfirst($veiculo2->getModelo()) ?></span>
                            <p>Montadora: <?= ucfirst($veiculo2->getMontadora()) ?></p>
                            <p>Categoria: <?= $veiculo2->nomeCategoria($veiculo2->getIdCategoria()) ?></p>
                        </div>
                        <div class="card-action">
                            <p>Diária: R$<?= $veiculo2->getPrecoDiaria() ?></p>
                            <a href="nova-locacao.html">Alugar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
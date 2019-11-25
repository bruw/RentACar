<section>
    <div class="container">
        <h1 class="font-edgeracer">Cadastro de Veículo</h1>

        <?php if (!empty($cadastroSucesso)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $cadastroSucesso ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($mensagemAtualizado)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $mensagemAtualizado ?></p>
            </div>
        <?php endif ?>

        <form action="<?= URL_RAIZ . 'frota' ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">directions_car</i>
                    <input id="input-chassi" type="text" name="chassi" value="<?= $this->getPost('chassi') ?>" placeholder="1234cb4321dd34yp9">
                    <label for="icon_prefix">Número do Chassi</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'chassi']) ?>
                </div>
            </div>
            <div id="div-dados-veiculo">
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">build</i>
                        <input type="text" name="montadora" value="<?= $this->getPost('montadora') ?>" placeholder="Fiat">
                        <label for="icon_prefix">Montadora</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'montadora']) ?>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">directions_car</i>
                        <input type="text" name="modelo" value="<?= $this->getPost('modelo') ?>" placeholder="Argo">
                        <label for="icon_prefix">Modelo</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'modelo']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">filter_list</i>
                        <select name="categoriaId">
                            <option value="">Selecione uma Categoria</option>
                            <?php foreach ($categorias as $categoria) : ?>
                                <?php $selected = $this->getPost('categoriaId') == $categoria->getId() ? 'selected' : '' ?>
                                <option value="<?= $categoria->getId() ?>" <?= $selected ?>><?= $categoria->getNome() ?></option>
                            <?php endforeach ?>
                        </select>
                        <label>Categoria</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'selecioneCategoria']) ?>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input type="text" name="preco" value="<?= $this->getPost('preco') ?>" placeholder="95,00">
                        <label for="icon_prefix">Preço Diária</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'precoDiaria']) ?>
                    </div>
                    <div class="row">
                        <div id="div-imagens-veiculo" class="input-field col s12">
                            <h1>Adicionar Imagem</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12">
                            <input type="file" id="input-imagem" name="foto" accept="image/*">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6">
                            <button class="waves-effect waves-light btn button-confirmar" type="submit">
                                <i class="material-icons left">check_circle</i>Cadastrar Veículo
                            </button>
                        </div>
                        <div class="col s12 m6">
                            <a href="<?= URL_RAIZ ?>" class="btn button-cancelar">
                                <i class="material-icons left">cancel</i>Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
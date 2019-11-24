<section>
    <div class="container">
        <h1 class="font-edgeracer">Atualizar Dados do Cliente</h1>

        <form action="<?= URL_RAIZ . 'clientes/pesquisar' ?>" method="get">
            <div class="row">
                <div class="input-field col s12 m7">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" class="cpf" name="cpf-busca" type="text" value="<?= $this->getGet('cpf-busca') ?>" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>
                <div class="col s12 m5">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar</button>
                </div>
            </div>
        </form>

        <?php if (!empty($mensagem)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $mensagem ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($naoEncontrado)) : ?>
            <div class="msg-flash balao-flash-erro">
                <p><?= $naoEncontrado ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty($cliente)) : ?>
            <form action="<?= URL_RAIZ . 'clientes/atualizar/' . $cliente->getId() ?>" method="post">
                <input type="hidden" name="_metodo" value="PATCH">
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="primeiroNome" value="<?= $cliente->getPrimeiroNome() ?>" placeholder="Darth">
                        <label for="icon_prefix">Primeiro Nome</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'primeiroNome']) ?>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="sobrenome" value="<?= $cliente->getSobrenome() ?>" placeholder="Vaider">
                        <label for="icon_prefix">Sobrenome</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'sobrenome']) ?>
                    </div>
                </div>

                <div class="row">
                    <div id="div-celular" class="input-field col s12 m6">
                        <i class="material-icons prefix">phone_iphone</i>
                        <input class="celular" name="celular" type="text" value="<?= $cliente->getCelular() ?>" placeholder="(00)00000-0000">
                        <label for="icon_prefix">Celular</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'celular']) ?>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">mail</i>
                        <input type="text" name="email" value="<?= $cliente->getEmail() ?>" placeholder="darthvaider@edisney.com">
                        <label for="icon_prefix">E-mail</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'email']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="input-cep" name="cep" class="cep" value="<?= $cliente->getCep() ?>" type="text" placeholder="85070700">
                        <label for="icon_prefix">CEP</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'cep']) ?>
                    </div>

                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">markunread_mailbox</i>
                        <input id="input-numero" name="numero" type="number" value="<?= $cliente->getNumero() ?>" placeholder="1024">
                        <label for="icon_prefix">Número</label>
                        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'numero']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m6">
                        <button class="waves-effect waves-light btn button-confirmar" type="submit">
                            <i class="material-icons left">check_circle</i>Confirmar mudanças
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
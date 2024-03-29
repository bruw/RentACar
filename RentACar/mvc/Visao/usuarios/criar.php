<section>
    <div class="container">
        <h1 class="font-edgeracer">Cadastro de Usuário</h1>

        <?php if (!empty($mensagem)) : ?>
            <div class="msg-flash balao-flash-sucesso">
                <p><?= $mensagem ?></p>
            </div>
        <?php endif ?>

        <form action="<?= URL_RAIZ . 'usuarios' ?>" method="post">
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="primeiro-nome" value="<?= $this->getPost('primeiro-nome') ?>" placeholder="Larissa">
                    <label for="icon_prefix">Primeiro Nome</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'primeiroNome']) ?>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="sobrenome" value="<?= $this->getPost('sobrenome') ?>" placeholder="Ferreira">
                    <label for="icon_prefix">Sobrenome</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'sobrenome']) ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input class="cpf" name="cpf" type="text" value="<?= $this->getPost('cpf') ?>" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'cpf']) ?>
                </div>


                <div id="div-celular" class="input-field col s12 m6">
                    <i class="material-icons prefix">phone_iphone</i>
                    <input class="celular" name="celular" type="text" value="<?= $this->getPost('celular') ?>" placeholder="(00)00000-0000">
                    <label for="icon_prefix">Celular</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'celular']) ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input type="text" name="email" value="<?= $this->getPost('email') ?>" placeholder="larissai@gmail.com">
                    <label for="icon_prefix">Email</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'email']) ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="input-cep" name="cep" class="cep" value="<?= $this->getPost('cep') ?>" type="text" placeholder="85070700">
                    <label for="icon_prefix">CEP</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'cep']) ?>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">markunread_mailbox</i>
                    <input id="input-numero" name="numero" type="number" value="<?= $this->getPost('numero') ?>" placeholder="1024">
                    <label for="icon_prefix">Número</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'numero']) ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="senha" placeholder="********">
                    <label for="icon_prefix">Senha</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'senha']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <button class="waves-effect waves-light btn button-confirmar" type="submit">
                        <i class="material-icons left">check_circle</i>Cadastrar
                    </button>
                </div>
                <div class="col s12 m6">
                    <a href="<?= URL_RAIZ ?>" class="btn button-cancelar">
                        <i class="material-icons left">cancel</i>Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
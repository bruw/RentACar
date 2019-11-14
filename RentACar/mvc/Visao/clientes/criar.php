<section>
    <div class="container">
        <h1 class="font-edgeracer">Cadastro de Cliente</h1>
        <form action="<?= URL_RAIZ . 'clientes'?>" method="post">
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="primeiroNome" value="<?= $this->getPost('primeiroNome') ?>" placeholder="Darth">
                    <label for="icon_prefix">Primeiro Nome</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'primeiroNome']) ?>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="sobrenome" value="<?= $this->getPost('sobrenome') ?>" placeholder="Vaider">
                    <label for="icon_prefix">Sobrenome</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'sobrenome']) ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" name="cpf" class="cpf" type="text" class="cep" value="<?= $this->getPost('cpf') ?>" placeholder="000.000.000-00">
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
                    <input type="text" name="email" value="<?= $this->getPost('email') ?>" placeholder="darthvaider@disney.com">
                    <label for="icon_prefix">E-mail</label>
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
                    <input id="input-numero" name="numero" value="<?= $this->getPost('numero') ?>" type="number" placeholder="1024">
                    <label for="icon_prefix">Número</label>
                    <?php $this->incluirVisao('util/formErro.php', ['campo' => 'numero']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l6">
                    <button class="waves-effect waves-light btn button-confirmar" type="submit">
                        <i class="material-icons left">check_circle</i>Cadastrar
                    </button>
                </div>
                <div class="col s12 m12 l6">
                    <button class="waves-effect waves-light btn button-cancelar">
                        <i class="material-icons left">cancel</i>Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
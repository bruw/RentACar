
<section>
    <div class="container">
        <h1 class="font-edgeracer">Atualizar Dados do Cliente</h1>
        <form action="<?= URL_RAIZ . 'clientes/pesquisar' ?>" method="post">
            <div class="row">
                <div class="input-field col s12 m7">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" class="cpf" name="cpf-busca" type="text" class="cep" value="<?= $this->getPost('cpf-busca') ?>" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>
                <div class="col s12 m5">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar</button>
                </div>
            </div>
        </form>

        <?php if ($cliente) : ?>
            <form action="<?= URL_RAIZ . 'clientes/atualizar/' . $cliente->getId() ?>" method="post">
            <input type="hidden" name="_metodo" value="PATCH">
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="primeiroNome"value="<?= $cliente->getPrimeiroNome() ?>" placeholder="Darth">
                        <label for="icon_prefix">Primeiro Nome</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="sobrenome" value="<?=$cliente->getSobrenome()?>" placeholder="Vaider">
                        <label for="icon_prefix">Sobrenome</label>
                    </div>
                </div>

                <div class="row">
                    <div id="div-celular" class="input-field col s12 m6">
                        <i class="material-icons prefix">phone_iphone</i>
                        <input class="celular" name="celular" type="text" value="<?=$cliente->getCelular()?>" placeholder="(00)00000-0000">
                        <label for="icon_prefix">Celular</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">mail</i>
                        <input type="email" name="email" value="<?=$cliente->getEmail()?>" placeholder="darthvaider@estreladamorte.com">
                        <label for="icon_prefix">E-mail</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="input-cep" name="cep" class="cep" value="<?=$cliente->getCep()?>" type="text" placeholder="85070700">
                        <label for="icon_prefix">CEP</label>
                    </div>

                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">markunread_mailbox</i>
                        <input id="input-numero" name="numero" type="number" value="<?=$cliente->getNumero()?>" placeholder="1024">
                        <label for="icon_prefix">Número</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m12 l6">
                        <button class="waves-effect waves-light btn button-confirmar" type="submit">
                            <i class="material-icons left">check_circle</i>Confirmar mudanças
                        </button>
                    </div>
                    <div class="col s12 m12 l6">
                        <button class="waves-effect waves-light btn button-cancelar" type="submit">
                            <i class="material-icons left">cancel</i>Cancelar
                        </button>
                    </div>
                </div>
            </form>
        <?php endif ?>
    </div>
</section>

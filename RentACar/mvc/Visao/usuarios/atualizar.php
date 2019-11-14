<section>
    <div class="container">
        <h1 class="font-edgeracer">Atualizar Dados do Usuário</h1>
        <form action="">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" class="cpf" type="text" name="cpf-busca" class="cep" value="<?= $this->getPost('cpf-busca')?>" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>
                <div class="col s12 m6">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
        </form>

        <form action="">
            <div id="div-dados-pessoa">
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" value="Fernanda" placeholder="Darth">
                        <label for="icon_prefix">Primeiro Nome</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">person</i>
                        <input type="text" value="Batista" placeholder="Vaider">
                        <label for="icon_prefix">Sobrenome</label>
                    </div>
                </div>

                <div class="row">
                    <div id="div-celular" class="input-field col s12 m6">
                        <i class="material-icons prefix">phone_iphone</i>
                        <input class="celular" type="text" value="(42)99999-9999" placeholder="(00)00000-0000">
                        <label for="icon_prefix">Celular</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">mail</i>
                        <input type="email" value="fernanda@email.com" placeholder="darthvaider@estreladamorte.com">
                        <label for="icon_prefix">E-mail</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="input-cep" class="cep" type="text" value="85070700" placeholder="85070700">
                        <label for="icon_prefix">CEP</label>
                    </div>

                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">markunread_mailbox</i>
                        <input id="input-numero" type="number" value="75" placeholder="1024">
                        <label for="icon_prefix">Número</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m12 l6">
                        <button class="waves-effect waves-light btn button-confirmar" type="submit">
                            <i class="material-icons left">check_circle</i>Confirmar Mudanças
                        </button>
                    </div>
                    <div class="col s12 m12 l6">
                        <button class="waves-effect waves-light btn button-cancelar" type="submit">
                            <i class="material-icons left">cancel</i>Cancelar
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

</section>
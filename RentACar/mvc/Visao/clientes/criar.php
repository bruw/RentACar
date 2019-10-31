<section>
    <div class="container">
        <h1 class="font-edgeracer">Cadastro de Cliente</h1>
        <form action="">
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" placeholder="Darth">
                    <label for="icon_prefix">Primeiro Nome</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" placeholder="Vaider">
                    <label for="icon_prefix">Sobrenome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="input-cpf" class="cpf" type="text" class="cep" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>

                <div id="div-celular" class="input-field col s12 m6">
                    <i class="material-icons prefix">phone_iphone</i>
                    <input class="celular" type="text" placeholder="(00)00000-0000">
                    <label for="icon_prefix">Celular</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input type="email" placeholder="darthvaider@estreladamorte.com">
                    <label for="icon_prefix">E-mail</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="input-cep" class="cep" type="text" placeholder="85070700">
                    <label for="icon_prefix">CEP</label>
                </div>

                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">markunread_mailbox</i>
                    <input id="input-numero" type="number" placeholder="1024">
                    <label for="icon_prefix">Número</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l6">
                    <button class="waves-effect waves-light btn button-confirmar" type="submit">
                        <i class="material-icons left">check_circle</i>Cadastrar
                    </button>
                </div>
                <div class="col s12 m12 l6">
                    <button class="waves-effect waves-light btn button-cancelar" type="submit">
                        <i class="material-icons left">cancel</i>Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
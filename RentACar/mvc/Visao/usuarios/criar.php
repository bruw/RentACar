<section>
    <div class="container">
        <h1 class="font-edgeracer">Cadastro de Usuário</h1>

        <form action="">
            <h4>Dados pessoais</h4>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" placeholder="Larissa">
                    <label for="icon_prefix">Primeiro Nome</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" placeholder="Ferreira">
                    <label for="icon_prefix">Sobrenome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">mail</i>
                    <input type="email" placeholder="larissai@gmail.com">
                    <label for="icon_prefix">Email</label>
                </div>

                <div id="div-celular" class="input-field col s12 m6">
                    <i class="material-icons prefix">phone_iphone</i>
                    <input class="celular" type="text" placeholder="(00)00000-0000">
                    <label for="icon_prefix">Celular</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person</i>
                    <input class="cpf" type="text" placeholder="000.000.000-00">
                    <label for="icon_prefix">CPF</label>
                </div>
            </div>

            <h4>Endereço</h4>
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

            <h4>Crie sua senha</h4>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" placeholder="********">
                    <label for="icon_prefix">Senha</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" placeholder="********">
                    <label for="icon_prefix">Confirmar Senha</label>
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
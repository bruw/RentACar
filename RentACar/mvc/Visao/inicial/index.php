<main>
    <section>
        <div class="container">
            <h1>Acesso ao Sistema</h1>
            <p id="p-mensagem">**VERSÃO SEM SENHA / CLIQUE EM "ENTRAR"**</p>
            <form action="<?=URL_RAIZ . 'frota'?>" method="get">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input type="number" name="cpf" placeholder="000.000.000.00">
                        <label for="icon prefix">CPF</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="senha" placeholder="********">
                        <label for="icon prefix">Senha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button id="button-login" class="waves-effect waves-light btn" type="submit">
                            <i class="material-icons left">check_circle</i>Entrar
                        </button>
                    </div>
                </div>
            </form>
    </section>
</main>
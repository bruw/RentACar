<section>
    <div class="container">
        <h1 class="font-edgeracer">Enviar veículo para oficina</h1>
        <form id="form-enviar-oficina" action="">
            <div class="row">
                <div class="input-field col s12 m7">
                    <i class="material-icons prefix">directions_car</i>
                    <input id="input-chassi" type="text" value="2275ca7689jj2019" placeholder="1234cb4321dd34yp9">
                    <label for="icon_prefix">Número do Chassi</label>
                </div>
                <div class="col s12 m5">
                    <button id="button-pesquisar-veiculo" class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
            <div class="row">
                <h4>Dados do Veículo</h4>
                <div class="col s12">
                    <p><span>Montadora: </span>Fiat</p>
                    <p><span>Modelo: </span>Argo</p>
                    <p><span>Número do Chassi: </span>2275ca7689jj2019</p>
                    <p><span>Descrição do veículo: </span> Cinza, 1.4, 4 portas e ar condicionado</p>
                </div>
            </div>
            <div class="row">
                <h4>Descrição do problema</h4>
                <div id="div-problema-veiculo" class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea class="materialize-textarea" placeholder="Não da partida corretamente"></textarea>
                    <label for="icon_prefix">Descrição</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button class="waves-effect waves-light btn button-confirmar" type="submit">
                        <i class="material-icons left">build</i>Enviar para Oficina
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<section>
    <div class="container">
        <h1 class="font-edgeracer">Atualizar dados do Veículo</h1>
        <form action="">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">directions_car</i>
                    <input id="input-chassi" type="text" value="2275ca7689jj2019" placeholder="1234cb4321dd34yp9">
                    <label for="icon_prefix">Número do Chassi</label>
                </div>
                <div class="col s12 m6">
                    <button class="waves-effect waves-light btn button-pesquisar" type="submit">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </div>
            <div id="div-dados-veiculo">
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">build</i>
                        <input type="text" value="Fiat" placeholder="Fiat">
                        <label for="icon_prefix">Montadora</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <i class="material-icons prefix">directions_car</i>
                        <input type="text" value="Argo" placeholder="Argo">
                        <label for="icon_prefix">Modelo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">filter_list</i>
                        <select>
                            <option value="1">Hatch</option>
                            <option value="2">Sedãn</option>
                            <option value="3">SUV</option>
                            <option value="4">Pick-Ups</option>
                        </select>
                        <label>Categoria</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">monetization_on</i>
                        <input type="text" value="R$95.00" placeholder="95,00">
                        <label for="icon_prefix">Preço Diária</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea class="materialize-textarea" placeholder="Veículo 4x4 - OFF Road">Motor 1.4, 4 portas e ar condicionado
                                    </textarea>
                            <label for="icon_prefix">Descrição</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="div-imagens-veiculo" class="input-field col s12">
                            <h4>Adicionar ou Alterar Imagem</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12">
                            <input id="input-imagem" type="file" accept="image/*">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l6">
                            <button class="waves-effect waves-light btn button-confirmar" type="submit">
                                <i class="material-icons left">check_circle</i>Confirmar Alterações
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
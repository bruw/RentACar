<section>
    <div class="container">
        <h1 class="font-edgeracer">Relatórios</h1>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">filter_list</i>
                <select id="select-relatorio">
                    <option value="1">Relatório de Locações e Reparos de um Veículo</option>
                    <option value="3">Relatório de Lucros da Empresa</option>
                </select>
                <label>Categorias Relatório</label>
            </div>
        </div>
        <div id="div-pesquisa-chassi" class="row">
            <div class="input-field col s12 m12">
                <i class="material-icons prefix">directions_car</i>
                <input id="input-chassi" type="text" value="2275ca7689jj2019" placeholder="1234cb4321dd34yp9">
                <label for="icon_prefix">Número do Chassi do Veículo</label>
            </div>
        </div>
        <div id="div-filtro-data" class="row ocultar-conteudo">
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">date_range</i>
                <input type="text" class="datepicker" placeholder="Clique aqui para selecionar a data de ínicio">
                <label for="icon_prefix">Data de Ínicio</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">date_range</i>
                <input type="text" class="datepicker" placeholder="Clique aqui para selecionar a data final">
                <label for="icon_prefix">Data de Fim</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button id="button-pesquisar-relatorio" class="waves-effect waves-light btn button-pesquisar" type="submit">
                    <i class="material-icons left">search</i>Pesquisar
                </button>
            </div>
        </div>
        <div id="div-informacao-veiculo" class="row">
            <div class="input-field col s12">
                <h4>Informações do Veículo</h4>
                <p><span>Veículo:</span> Fiat Argo</p>
                <p><span>Número do Chassi:</span> 2275ca7689jj2019</p>
            </div>
        </div>
        <div id="div-relatorio-locacao" class="row">
            <h4>Histórico de locações e Reparos do Veículo</h4>
            <div class="col s12 table-total">
                <table>
                    <tr>
                        <th>TOTAL LOCAÇÕES</th>
                        <th>TOTAL REPAROS</th>
                        <th>LUCRO</th>
                    </tr>
                    <tr>
                        <th>R$380.00</th>
                        <th>R$190.00</th>
                        <th>+R$190.00</th>
                    </tr>
                </table>
                <br>
            </div>

            <div class="col s12">
                <table>
                    <tr>
                        <th>Data de Locação / Reparo</th>
                        <th>Data de Devolução</th>
                        <th>Valor da Locação</th>
                        <th>Valor do Reparo</th>
                    </tr>
                    <tr>
                        <th>1/08/2019</th>
                        <th>2/08/2019</th>
                        <th>R$95.00</th>
                        <th>--</th>
                    </tr>
                    <tr>
                        <th>4/08/2019</th>
                        <th>5/08/2019</th>
                        <th>--</th>
                        <th>R$95.00</th>
                    </tr>
                    <tr>
                        <th>8/08/2019</th>
                        <th>9/08/2019</th>
                        <th>--</th>
                        <th>R$95.00</th>
                    </tr>
                    <tr>
                        <th>12/08/2019</th>
                        <th>13/08/2019</th>
                        <th>R$95.00</th>
                        <th>--</th>
                    </tr>
                    <tr>
                        <th>15/08/2019</th>
                        <th>16/08/2019</th>
                        <th>R$95.00</th>
                        <th>--</th>
                    </tr>
                    <tr>
                        <th>20/08/2019</th>
                        <th>21/08/2019</th>
                        <th>R$95.00</th>
                        <th>--</th>
                    </tr>
                </table>
            </div>
        </div>

        <div id="div-relatorio-lucro" class="row ocultar-conteudo">
            <h4>Relatório de Lucros</h4>
            <div class="col s12 table-total">
                <table>
                    <tr>
                        <th>TOTAL LOCAÇÕES</th>
                        <th>TOTAL REPAROS</th>
                        <th>LUCRO TOTAL</th>
                    </tr>
                    <tr>
                        <th>R$2.500</th>
                        <th>R$500.00</th>
                        <th>+R$2.000</th>
                    </tr>
                </table>
            </div>
            <div class="col s12">
                <table>
                    <tr>
                        <th>Ano</th>
                        <th>Mês</th>
                        <th>Locações R$</th>
                        <th>Reparos R$</th>
                        <th>Total R$</th>
                    </tr>
                    <tr>
                        <th>2019</th>
                        <th>junho</th>
                        <th>R$500.00</th>
                        <th>R$100.00</th>
                        <th>R$400.00</th>
                    </tr>
                    <tr>
                        <th>2019</th>
                        <th>julho</th>
                        <th>R$500.00</th>
                        <th>R$100.00</th>
                        <th>R$400.00</th>
                    </tr>
                    <tr>
                        <th>2019</th>
                        <th>agosto</th>
                        <th>R$500.00</th>
                        <th>R$100.00</th>
                        <th>R$400.00</th>
                    </tr>
                    <tr>
                        <th>2019</th>
                        <th>setembro</th>
                        <th>R$500.00</th>
                        <th>R$100.00</th>
                        <th>R$400.00</th>
                    </tr>
                    <tr>
                        <th>2019</th>
                        <th>outubro</th>
                        <th>R$500.00</th>
                        <th>R$100.00</th>
                        <th>R$400.00</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
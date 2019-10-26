<!DOCTYPE html>
<html>

<head>
    <title><?= APLICACAO_NOME ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bruno José dos Santos Wogt">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'materialize.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'style.css' ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <nav class="cor-principal">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">
                        <i class="material-icons left">directions_car</i>RentACar
                    </a>
                    <a href="#" data-target="barra-mobile" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="#modal-menu-servicos" class="modal-trigger">
                                <i class="material-icons left">apps</i>Serviços
                            </a>
                        </li>
                        <li>
                            <a href="#" class="modal-trigger">
                                <i class="material-icons left">power_settings_new</i>Encerrar Sessão
                            </a>
                        </li>
                    </ul>

                    <ul class="sidenav" id="barra-mobile">
                        <li>
                            <a href="#modal-menu-servicos" class="modal-trigger">
                                <i class="material-icons left">apps</i>Serviços
                            </a>
                        </li>
                        <li>
                            <a href="!#" class="modal-trigger">
                                <i class="material-icons left">power_settings_new</i>Encerar Sessão
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <?php $this->imprimirConteudo() ?>

    <div id="modal-menu-servicos" class="modal">
        <div class="modal-content">
            <h4>Serviços</h4>
            <div class="row ">
                <div class="col s6 m2 ">
                    <a href="#modal-gerenciar-locacao" class="modal-trigger">
                        <img src="../assets/resources/img/menu/locacao.png">
                        <p>Gerenciar Locações</p>
                    </a>
                </div>
                <div class="col s6 m2 ">
                    <a href="#modal-gerenciar-cliente" class="modal-trigger">
                        <img src="../assets/resources/img/menu/cliente.png">
                        <p>Gerenciar Clientes</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#modal-gerenciar-usuario" class="modal-trigger">
                        <img src="../assets/resources/img/menu/usuario.png">
                        <p>Gerenciar Usuários</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#modal-gerenciar-frota" class="modal-trigger">
                        <img src="../assets/resources/img/menu/veiculo.png">
                        <p>Gerenciar Frota</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#" class="modal-trigger">
                        <img src="../assets/resources/img/menu/relatorio.png">
                        <p>Relátorios</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <div id="modal-gerenciar-locacao" class="modal">
        <div class="modal-content">
            <h4>Gerenciar locações</h4>
            <div class="row">
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/locacao.png">
                        <p>Veículos disponíveis</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/devolucao.png">
                        <p>Devoluções</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    
    <div id="modal-gerenciar-cliente" class="modal">
        <div class="modal-content">
            <h4>Gerenciar Clientes</h4>
            <div class="row">
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/adicionar.png">
                        <p>Adicionar Cliente</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/atualizar-dados.png">
                        <p>Atualizar Dados do Cliente</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <div id="modal-gerenciar-usuario" class="modal">
        <div class="modal-content">
            <h4>Gerenciar Usuário</h4>
            <div class="row">
                <div class="col s6 m2 ">
                    <a href="#">
                        <img src="../assets/resources/img/menu/adicionar.png">
                        <p>Adicionar Usuário</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/atualizar-dados.png">
                        <p>Atualizar Dados do Usuário</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <div id="modal-gerenciar-frota" class="modal">
        <div class="modal-content">
            <h4>Gerenciar Frota</h4>
            <div class="row">
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/locacao.png">
                        <p>Adicionar Novo Veículo</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/atualizar-dados.png">
                        <p>Alterar Dados do Veículo</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/enviar-oficina.png">
                        <p>Enviar Veículo para oficina</p>
                    </a>
                </div>
                <div class="col s6 m2">
                    <a href="#">
                        <img src="../assets/resources/img/menu/retornar-oficina.png">
                        <p>Retornar Veículo da Oficina</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <section>
        <footer class="section cor-principal">
            <p>RentACar - Locações de automóveis - 2019</p>
        </footer>
    </section>

    <script src=<?= URL_JS . "/jquery-3.4.1.min.js" ?>></script>
    <script src=<?= URL_JS . "/materialize.min.js" ?>></script>
    <script src=<?= URL_JS . "/jquery.mask.min.js" ?>></script>
    <script src=<?= URL_JS . "/inicializacao-bibliotecas.js" ?>></script>
    <script src=<?= URL_JS . "/pesquisa-categoria.js" ?>></script>

</body>

</html>
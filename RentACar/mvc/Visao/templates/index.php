<!DOCTYPE html>
<html>

<head>
    <title><?= APLICACAO_NOME ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Bruno José dos Santos Wogt">
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
                        <i class="material-icons left t">directions_car</i>RentACar
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <?php $this->imprimirConteudo() ?>
    </main>

    <section>
        <footer class="section cor-principal">
            <p>RentACar - Locações de automóveis - 2019</p>
        </footer>
    </section>

    <script src=<?= URL_JS . "jquery-3.4.1.min.js" ?>></script>
    <script src=<?= URL_JS . "materialize.min.js" ?>></script>
    <script src=<?= URL_JS . "jquery.mask.min.js" ?>></script>
    <script src=<?= URL_JS . "inicializacao-bibliotecas.js" ?>></script>
    <script src=<?= URL_JS . "index.js" ?>></script>

</body>

</html>
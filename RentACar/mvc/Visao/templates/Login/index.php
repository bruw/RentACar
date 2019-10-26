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
                    <a href="index.html" class="brand-logo">
                        <i class="material-icons left t">directions_car</i>RentACar</a>
                </div>
            </div>
        </nav>
    </div>

    <?php $this->imprimirConteudo() ?>

    <section>
        <footer class="section cor-principal">
            <p>RentACar - Locações de automóveis - 2019</p>
        </footer>
    </section>

    <script src=<?= URL_JS . "/jquery-3.4.1.min.js" ?>></script>
    <script src=<?= URL_JS . "/materialize.min.js" ?>></script>
    <script src=<?= URL_JS . "/index.js" ?>></script>

</body>

</html>
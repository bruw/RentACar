(function() {
    function exibeRelatorioReparos() {
        $('#div-pesquisa-chassi').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
        $('#div-informacao-veiculo').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
        $('#div-cabecalho-reparos').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
        $('#div-conteudo-reparos').removeClass('ocultar-conteudo').addClass('exibir-conteudo');

        $('#div-relatorio-manutencao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-filtro-data').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-relatorio-lucro').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    }

    function exibeRelatorioLucroLocacoes() {
        $('#div-pesquisa-chassi').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-informacao-veiculo').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-cabecalho-reparos').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-conteudo-reparos').removeClass('exibir-conteudo').addClass('ocultar-conteudo');

        $('#div-relatorio-manutencao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
        $('#div-filtro-data').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
        $('#div-relatorio-lucro').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    }

    $(document).ready(function() {
        if($('#select-relatorio').val() == '1'){
            exibeRelatorioReparos();
        }else{
            exibeRelatorioLucroLocacoes();
        }
    });

    $('#select-relatorio').change(function() {
        if ($(this).val() == '1') {
            exibeRelatorioReparos();

        } else{
            exibeRelatorioLucroLocacoes();
        }
    });


    $('#relatorio-data-inicio').change(function(){
        let dataSelecionada = $('#relatorio-data-inicio').val().split('-');

        let dia = dataSelecionada[0];
        let mes = dataSelecionada[1];
        let ano = dataSelecionada[2];

        $('#relatorio-data-fim').datepicker({
            minDate: new Date(ano, mes-1, dia),
            maxDate: new Date(),
            format: 'dd-mm-yyyy'
        });
    });


})();
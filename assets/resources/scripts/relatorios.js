function exibeTelaLocacao() {
    $('#div-pesquisa-chassi').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    $('#div-informacao-veiculo').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    $('#div-relatorio-locacao').removeClass('ocultar-conteudo').addClass('exibir-conteudo');

    $('#div-relatorio-manutencao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-filtro-data').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-relatorio-lucro').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
}

function exibeTelaReparo() {
    $('#div-pesquisa-chassi').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    $('#div-informacao-veiculo').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    $('#div-relatorio-manutencao').removeClass('ocultar-conteudo').addClass('exibir-conteudo');

    $('#div-relatorio-locacao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-filtro-data').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-relatorio-lucro').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
}

function exibeTelaLucro() {
    $('#div-pesquisa-chassi').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-informacao-veiculo').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-relatorio-locacao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');

    $('#div-relatorio-manutencao').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    $('#div-filtro-data').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    $('#div-relatorio-lucro').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
}

$('#select-relatorio').change(function() {
    if ($(this).val() == '1') {
        exibeTelaLocacao();

    } else if ($(this).val() == '2') {
        exibeTelaReparo();
    } else {
        exibeTelaLucro();
    }
});
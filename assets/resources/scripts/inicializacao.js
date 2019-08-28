$(document).ready(function() {
  $('select').material_select();

  $('#input-cep').mask('00000-000');
  $('.input-telefone').mask('(00)0000-0000');
  $('.input-celular').mask('(00)00000-0000');
  $('#input-cpf').mask('000.000.000-00');
  $('#input-data-nascimento').mask('00/00/0000');
  $('#input-cnpj').mask('00.000.000/0000-00');

  $('#tipo-cliente').change(function() {
    $('form input').val('');
    $('#dados-localidade').removeClass('exibir-conteudo').addClass('ocultar-conteudo');

    let opcao = $("select option:selected").val();

    if (opcao == 0) {
      $('#dados-pessoa').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
      $('#dados-empresa').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    } else {
      $('#dados-pessoa').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
      $('#dados-empresa').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    }
  });

  $('#tipo-contato').change(function() {
    let opcao = $("#tipo-contato option:selected").val();

    if (opcao == 0) {
      $('#div-telefone').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
      $('#div-celular').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    } else {
      $('#div-telefone').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
      $('#div-celular').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    }
  });


  $('#input-cep').blur(function() {
    let cep = $(this).val().replace('-', '');

    if (cep.length < 8) {
      alert('CEP inválido... \nPor favor, informe um válido');
    } else {
      $('#dados-localidade').removeClass('ocultar-conteudo').addClass('exibir-conteudo');

      $.getJSON('https://viacep.com.br/ws/' + cep + '/json/?callback=?', function(dados) {
        if (!("erro" in dados)) {
          $('#input-rua').val(dados.logradouro);
          $('#input-bairro').val(dados.bairro);
          $('#input-cidade').val(dados.localidade);
          $('#input-estado').val(dados.uf);

        } else {
          alert('CEP não encontrado... Informe um CEP válido...');
          $('#input-cep').val('');
          $('#input-numero').val('');
          $('#dados-localidade input').val('');
        }
      });
    }
  })

});
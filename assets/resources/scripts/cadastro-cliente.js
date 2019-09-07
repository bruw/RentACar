+ function() {
  $(document).ready(function() {
    //iniciallização materialize
    $('.sidenav').sidenav();
    $('.modal').modal();


    //máscaras
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00');
    $('.celular').mask('(00)00000-0000');
    $('.data-nascimento').mask('00/00/0000');

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
    });

  });
}();

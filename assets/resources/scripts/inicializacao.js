$(document).ready(function() {
   $('select').material_select();

  $('select').change(function(){
    let opcao = $("select option:selected").val();

    if(opcao == 0){
      $('#form-pessoa-cpf').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
      $('#form-pessoa-cnpj').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
    }else{
      $('#form-pessoa-cpf').removeClass('exibir-conteudo').addClass('ocultar-conteudo');
      $('#form-pessoa-cnpj').removeClass('ocultar-conteudo').addClass('exibir-conteudo');
    }
  });

 });

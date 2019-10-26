(function() {
    function verificaCheckbox() {
        let categoria = document.getElementsByName('categoria');

        for (let i = 0; i < categoria.length; i++) {
            if (categoria[i].checked == true) {
                return true;
            }
        }
    }

    $('#form-categoria input:checkbox').click(function() {
        let exibir = verificaCheckbox();

        if (exibir == true) {
            $('#button-pesquisa-filtro').removeClass('disabled');
        } else {
            $('#button-pesquisa-filtro').addClass('disabled');
        }
    });
})();
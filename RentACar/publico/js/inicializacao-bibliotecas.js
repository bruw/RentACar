(function() {
    $(document).ready(function() {
        //iniciallização materialize
        $('.sidenav').sidenav();
        $('.modal').modal();
        $('select').formSelect();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            minDate: new Date()
           
        });

        $('.date-relatorio').datepicker({
            format: 'dd-mm-yyyy',
            maxDate: new Date()
        });

        $('#relatorio-data-fim').datepicker({
            minDate: new Date(),
            maxDate: new Date()
        });

        //máscaras
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00');
        $('.celular').mask('(00)00000-0000');
    });
})();
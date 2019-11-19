(function() {
    $(document).ready(function() {
        setTimeout(apagarMsg, 2000);

        function apagarMsg(){
            $('.msg-flash > p').fadeOut(2500);
            $('.msg-flash').fadeOut(2500)
        }
    });
})();
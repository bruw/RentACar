(function() {
    $(document).ready(function() {
        setTimeout(apagarMsg, 2000);

        function apagarMsg(){
            $('.msg-flash > p').fadeOut(1000);
            $('.msg-flash').fadeOut(1000)
        }
    });
})();
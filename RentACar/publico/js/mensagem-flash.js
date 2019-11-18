(function() {
    $(document).ready(function() {
        setTimeout(apagarMsg, 2000);

        function apagarMsg(){
            $('.msg-flash > p').fadeOut(2000);
            $('.msg-flash').fadeOut(2000)
        }
    });
})();
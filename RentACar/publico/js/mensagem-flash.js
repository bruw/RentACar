(function() {
    $(document).ready(function() {
        setTimeout(apagarMsg, 2000);

        function apagarMsg(){
            $('.msg-flash > p').fadeOut(3000);
            $('.msg-flash').fadeOut(3000)
        }
    });
})();
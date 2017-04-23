(function ($) {
    $(document).ready(function () {

        $(".dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            belowOrigin: true
        });
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $('.collapsible').collapsible();
        $('.tooltipped').tooltip({delay: 50});
        $('select').material_select();
        //supprime l'image sélectionnée d'un formulaire
        $('.file-reset').click(function () {
            var input = $("input[name=image], input.file-path");
            var fileName = input.val();

            if (fileName) { // returns true if the string is not empty
                input.val('');
            }

        });



    });
})(jQuery);


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

        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .0, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 200, // Transition out duration
            startingTop: '4%', // Starting top style attribute
            endingTop: '10%', // Ending top style attribute
        }
        );

  $('#modal1').modal('open');
          

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


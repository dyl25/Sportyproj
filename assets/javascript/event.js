
(function ($) {
    $(document).ready(function () {

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 1, // Creates a dropdown of 15 years to control year
            format: 'yyyy-m-d'
        });


    });
})(jQuery);
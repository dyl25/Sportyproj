
(function ($) {
    $(document).ready(function () {
        var $baseLocalite = $('select#localites');
        var $add = $('input#addPostcode, input#addLocalite');
        var $addPostcode = $('input#addPostcode');
        var $addLocalite = $('input#addLocalite');

        //pour edition on verifie si une valeur existe déjà
        if ($baseLocalite.find('option:selected') && $baseLocalite.val().length !== 0) {
            $add.prop("disabled", true);
        }

        $baseLocalite.change(function () {
            if ($(this).val().length !== 0) {
                $add.prop("disabled", true);
            } else {
                $add.prop("disabled", false);
            }
        });

        $add.keyup(function () {
            if ($(this).val().length !== 0) {
                $baseLocalite.prop("disabled", true);
                //on vérifie que les 2 champs sont bien vides
            } else if ($addPostcode.val().length == 0 && $addLocalite.val().length == 0) {
                $baseLocalite.prop("disabled", false);
            }
        });

    });
})(jQuery);
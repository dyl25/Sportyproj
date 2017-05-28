
(function ($) {
    $(document).ready(function () {
        var $role = $('select[name=role]');
        var $check = $('input[name=deleteAthlete]');
        $field1 = $('select[name=club]');
        $field2 = $('input[name=registerNum]');

        $check.change(function () {
            if ($check.prop('checked')) {
                $(this).closest('.input-field').append("<p class=\"red-text\ advert-message\">Si vous faite cela l'utilisateur sera supprimé des athlète et n'aura plus accès à son espace !</p>");
            }else{
                console.log($(this).closest('p.advert-message').remove("p.advert-message"));
            }
        });

        var $hiddenField = $('select[name=club], input[name=registerNum], select[name=category]').closest('div.row');
        if ($role.find('option:selected').text() != 'athlete') {
            $hiddenField.hide();
        }
//console.log($('input[name=registerNum]').closest('div.row'));
        $role.change(function () {
            console.log($role.find('option:selected').text());
            if ($role.find('option:selected').text() == 'athlete') {
                $hiddenField.fadeIn($(this).find('option:selected').text() == 'athlete');
            } else {
                $hiddenField.fadeOut($(this).find('option:selected').text() == 'athlete');
            }
        });

    });
})(jQuery);
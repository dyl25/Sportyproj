
(function ($) {
    $(document).ready(function () {
        var $role = $('select[name=role]');
        $field1 = $('select[name=club]');
        $field2 = $('input[name=registerNum]');
        var $hiddenField = $('select[name=club], input[name=registerNum], select[name=category]');
        $hiddenField.hide();

        $role.change(function () {
            $hiddenField.fadeToggle($(this).find('option:selected').text() == 'athlete');
        });

    });
})(jQuery);
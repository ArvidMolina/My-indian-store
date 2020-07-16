/**
 * 2015 DMConcept
 *
 * Proaccount Front Office Feature
 *
 * @authors DMConcept.fr <support@dmconcept.fr>
 * @copyright DMConcept 2015
 * +
 * +Languages: EN, FR
 * +PS version: 1.6
 **/

(function ($) {

    $(document).on('ready', function () {

        if (typeof $.uniform.defaults !== 'undefined') {
            if (typeof proaccount_fileDefaultHtml !== 'undefined')
                $.uniform.defaults.fileDefaultHtml = proaccount_fileDefaultHtml;
            if (typeof proaccount_fileButtonHtml !== 'undefined')
                $.uniform.defaults.fileButtonHtml = proaccount_fileButtonHtml;
        }

        // UPLOAD FILES
        $('#account-creation_form').attr('enctype', 'multipart/form-data');
    });

})(jQuery);
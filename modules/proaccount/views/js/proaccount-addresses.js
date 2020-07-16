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

$(function () {
    if (proaccount_require_address == true) {
        var $delete_address_btn = $('[data-id="addresses_confirm"]');
        var $proaccount_error_addresses = $('#proaccount_error_addresses');

        $delete_address_btn.on('click', function (event) {
            if ($delete_address_btn.length === 1) {
                event.preventDefault();
                if ($proaccount_error_addresses.length === 0) {
                    $($delete_address_btn.closest('.container')).prepend(
                        '<div id="proaccount_error_addresses" class="alert alert-danger">' + proaccount_error_addresses + '</div>'
                    );

                    $proaccount_error_addresses = $('#proaccount_error_addresses');
                } else if ($proaccount_error_addresses.is(':hidden')) {
                    $proaccount_error_addresses.fadeIn();
                }

                $proaccount_error_addresses.on('click', function (event) {
                    if (event.offsetX >= 16 && event.offsetX <= 39 && event.offsetY >= 16 && event.offsetY <= 34) {
                        $(this).fadeOut();
                    }
                });
            }
        });
    }
});

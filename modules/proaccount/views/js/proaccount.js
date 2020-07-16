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
    // Responsive header PS 1.7
    var mobile_id = $('.header-nav [id^="_mobile_"][id!="_mobile_logo"]');

    if (mobile_id.length > 0) {
        var desktop_proaccount_id = $('#_desktop_proaccount');
        var position = desktop_proaccount_id.parent().children().index(desktop_proaccount_id);
        var mobile_proaccount_header = '<div class="float-xs-right" id="_mobile_proaccount"></div>';

        // Mobile button at same position as desktop button
        mobile_id.each((index, element) => {
            if (index === mobile_id.length - position) {
                $(mobile_proaccount_header).insertBefore($(element));
            } else if (index === mobile_id.length - 1) {
                $(mobile_proaccount_header).insertAfter($(element));
            }
        });

        var mobile_proaccount_id = $('#_mobile_proaccount');

        if (desktop_proaccount_id.is(':visible') === false) {
            mobile_proaccount_id.html(desktop_proaccount_id.html());
        }
    }
});
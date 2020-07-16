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
    // If Auto affect group is off, don't show default group options
    var auto_affect_group_on = $("#PROACCOUNT_AUTO_AFFECT_GROUP_on");
    var auto_affect_group_off = $("#PROACCOUNT_AUTO_AFFECT_GROUP_off");
    var default_group = auto_affect_group_off.closest('.form-group').next();

    if (auto_affect_group_off.is(":checked")) {
        default_group.hide();
    }

    auto_affect_group_on.on('click', function (event) {
        default_group.fadeIn();
    });

    auto_affect_group_off.on('click', function (event) {
        default_group.fadeOut();
    });


    // If add address fields is off, don't show normal nor pro account registration options
    var register_with_address_on = $('#PROACCOUNT_REGISTER_WITH_ADDRESS_on');
    var register_with_address_off = $('#PROACCOUNT_REGISTER_WITH_ADDRESS_off');
    var register_address_normal_on = $('#PROACCOUNT_REGISTER_ADDRESS_NORMAL_on');
    var register_address_normal_off = $('#PROACCOUNT_REGISTER_ADDRESS_NORMAL_off');
    var register_address_pro_on = $('#PROACCOUNT_REGISTER_ADDRESS_PRO_on');
    var register_address_pro_off = $('#PROACCOUNT_REGISTER_ADDRESS_PRO_off');

    if (!is_version_17) {
        register_with_address_on.closest('.form-group').remove();
        register_address_normal_on.closest('.form-group').remove();
        register_address_pro_on.closest('.form-group').remove();
    } else {
        if (register_with_address_off.is(':checked')) {
            register_address_normal_on.closest('.form-group').hide();
            register_address_pro_on.closest('.form-group').hide();
        }

        register_with_address_on.on('click', function (event) {
            register_address_normal_on.closest('.form-group').fadeIn();
            register_address_pro_on.closest('.form-group').fadeIn();
            register_address_normal_on.trigger('click');
            register_address_pro_on.trigger('click');
        });

        register_with_address_off.on('click', function (event) {
            register_address_normal_on.closest('.form-group').fadeOut();
            register_address_pro_on.closest('.form-group').fadeOut();
            register_address_normal_off.trigger('click');
            register_address_pro_off.trigger('click');
        });
    }
});
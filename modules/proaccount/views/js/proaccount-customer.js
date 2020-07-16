/**
 * 2018 DMConcept
 *
 * Proaccount Front Office Feature
 *
 * @authors DMConcept.fr <support@dmconcept.fr>
 * @copyright DMConcept 2018
 * +
 * +Languages: EN, FR
 * +PS version: 1.7
 **/

$(function () {
    // Customer information/register form
    var company = $('[name="company"]');
    var siret = $('[name="siret"]');

    // Not external script because auth form can be load from ajax call
    company.closest('.form-group').remove();
    siret.closest('.form-group').remove();

    if (isPro_authentication) {
        $(document).on('ready', function () {
            $('form#customer-form').attr('action', auth_url).attr('enctype', 'multipart/form-data');
            $('[name="birthday"]').closest('.form-group').remove();
        });
    }
});
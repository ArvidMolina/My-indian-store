{*
* Proaccount Front Office Feature
*
* @authors DMConcept.fr <support@dmconcept.fr>
* @copyright DMConcept 2015
* +
* +Languages: EN, FR
* +PS version: 1.6
*}

{addJsDef isPro_authentication=$isPro_authentication}
{addJsDef register_with_address=$register_with_address}
{addJsDef auth_url=$link->getModuleLink('proaccount', 'authentication')}
{addJsDef required_fields=$required_fields}
<script type="text/javascript">
    (function ($) {
        // Not external script because auth form can be load from ajax call
        if (!isPro_authentication) {
            $('#company').closest('.account_creation').remove();
        } else {
            // This can be external ...
            $(document).on('ready', function () {
                $('form#account-creation_form').attr('action', auth_url);
                $('#days').closest('.form-group').remove();
                for (var field in required_fields) {
                    if (parseInt(required_fields[field])) {
                        $('#' + field).parent().find('label').append('&nbsp;<sup>*</sup>');
                    }
                }
                if (register_with_address) {
                    $('#firstname, #lastname').closest('.required').css({
                        'height': '0px',
                        'overflow': 'hidden',
                        'margin': '0px'
                    });
                }
            });
        }
    })(jQuery);
</script>
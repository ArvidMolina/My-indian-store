<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Improve/International/Currency/Blocks/exchange_rates.html.twig */
class __TwigTemplate_0873504e4eef3b0fb49ce7973f9bb4bbd34c31451d88bc85e7fd1408a8acb3a7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'currency_settings' => [$this, 'block_currency_settings'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_currencies_refresh_exchange_rates")]);
        echo "
  <div class=\"card\">
    <h3 class=\"card-header\">
      ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Exchange rate", [], "Admin.International.Feature"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        <div class=\"form-group row\">
          <label class=\"form-control-label\" for=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), "live_exchange_rate", []), "vars", []), "id", []), "html", null, true);
        echo "\">
            ";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Live exchange rates", [], "Admin.International.Feature"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), "live_exchange_rate", []), 'widget', ["attr" => ["class" => "js-live-exchange-rate", "data-url" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_currencies_update_live_exchange_rates")]]);
        echo "

            ";
        // line 39
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), "live_exchange_rate", []), "vars", []), "disabled", [])) {
            // line 40
            echo "                <small class=\"form-text\">
                  ";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please install the %module_name% module before using this feature.", ["%module_name%" => "cronjobs"], "Admin.International.Notification"), "html", null, true);
            echo "
                </small>
              ";
        } else {
            // line 44
            echo "                <small class=\"form-text js-exchange-rate-text-when-disabled ";
            echo ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), "live_exchange_rate", []), "vars", []), "value", []) == 0)) ? ("") : ("d-none"));
            echo "\">
                  ";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The exchange rates are not automatically updated", [], "Admin.International.Feature"), "html", null, true);
            echo "
                </small>
                <small class=\"form-text js-exchange-rate-text-when-enabled ";
            // line 47
            echo ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), "live_exchange_rate", []), "vars", []), "value", []) != 0)) ? ("") : ("d-none"));
            echo "\">
                  ";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The exchange rates are automatically updated", [], "Admin.International.Feature"), "html", null, true);
            echo "
                </small>
            ";
        }
        // line 51
        echo "          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"\" class=\"form-control-label\">
            ";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Update exchange rates", [], "Admin.International.Feature"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            <button class=\"btn btn-primary\">
              ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Update", [], "Admin.Actions"), "html", null, true);
        echo "
            </button>
          </div>
        </div>
        ";
        // line 63
        $this->displayBlock('currency_settings', $context, $blocks);
        // line 66
        echo "      </div>
    </div>
  </div>
";
        // line 69
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), 'form_end');
        echo "
";
    }

    // line 63
    public function block_currency_settings($context, array $blocks = [])
    {
        // line 64
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["exchangeRatesForm"]) ? $context["exchangeRatesForm"] : null), 'rest');
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Currency/Blocks/exchange_rates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 64,  124 => 63,  118 => 69,  113 => 66,  111 => 63,  104 => 59,  97 => 55,  91 => 51,  85 => 48,  81 => 47,  76 => 45,  71 => 44,  65 => 41,  62 => 40,  60 => 39,  55 => 37,  49 => 34,  45 => 33,  37 => 28,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Currency/Blocks/exchange_rates.html.twig", "/home/myindian/public_html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Currency/Blocks/exchange_rates.html.twig");
    }
}

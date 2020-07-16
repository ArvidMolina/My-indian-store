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

/* @PrestaShop/Admin/Improve/International/Currency/index.html.twig */
class __TwigTemplate_1fa814608eca4f361c81d2d29cfa052374aa70f7bf9e14d602a1af8b0cc40a81 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/International/Currency/index.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'exchange_rates_block' => [$this, 'block_exchange_rates_block'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 28
        $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_currencies_create"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new currency", [], "Admin.International.Feature"), "icon" => "add_circle_outline"]];
        // line 26
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        // line 38
        echo "
  <div class=\"row\">
    <div class=\"col\">
      ";
        // line 41
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", ["grid" => (isset($context["currencyGrid"]) ? $context["currencyGrid"] : null)]);
        echo "
    </div>
  </div>

  ";
        // line 45
        $this->displayBlock('exchange_rates_block', $context, $blocks);
        // line 52
        echo "
";
    }

    // line 45
    public function block_exchange_rates_block($context, array $blocks = [])
    {
        // line 46
        echo "    <div class=\"row\">
      <div class=\"col-lg-6 col-md-8\">
        ";
        // line 48
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Improve/International/Currency/Blocks/exchange_rates.html.twig", ["exchangeRatesForm" => $this->getAttribute((isset($context["currencySettingsForm"]) ? $context["currencySettingsForm"] : null), "exchange_rates", [])]);
        echo "
      </div>
    </div>
  ";
    }

    // line 55
    public function block_javascripts($context, array $blocks = [])
    {
        // line 56
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/currency.bundle.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Currency/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 59,  90 => 58,  84 => 56,  81 => 55,  73 => 48,  69 => 46,  66 => 45,  61 => 52,  59 => 45,  52 => 41,  47 => 38,  44 => 37,  40 => 26,  38 => 28,  22 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Currency/index.html.twig", "/home/myindian/public_html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Currency/index.html.twig");
    }
}

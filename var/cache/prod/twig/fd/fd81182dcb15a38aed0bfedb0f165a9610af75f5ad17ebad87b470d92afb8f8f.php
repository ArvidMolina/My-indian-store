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

/* @PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig */
class __TwigTemplate_fa0405a2e6ec52b2eb087452251db5d9a51e34dee41e98441da34c1a1f8f7371 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations_kpis_row' => [$this, 'block_translations_kpis_row'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 29
        list($context["addUpdateLanguageForm"], $context["copyLanguageForm"], $context["exportLanguageForm"], $context["modifyTranslationsForm"]) =         [$this->getAttribute(        // line 30
(isset($context["translationSettingsForm"]) ? $context["translationSettingsForm"] : null), "add_update_language", []), $this->getAttribute((isset($context["translationSettingsForm"]) ? $context["translationSettingsForm"] : null), "copy_language", []), $this->getAttribute(        // line 31
(isset($context["translationSettingsForm"]) ? $context["translationSettingsForm"] : null), "export_language", []), $this->getAttribute((isset($context["translationSettingsForm"]) ? $context["translationSettingsForm"] : null), "modify_translations", [])];
        // line 26
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 34
    public function block_content($context, array $blocks = [])
    {
        // line 35
        echo "  <div class=\"row justify-content-center\">
    <div class=\"col-xl-10\">
      <div class=\"card\">
        ";
        // line 38
        $this->displayBlock('translations_kpis_row', $context, $blocks);
        // line 46
        echo "      </div>
    </div>

    <div class=\"col-xl-10\">
      ";
        // line 50
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/modify_translations.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 50)->display($context);
        // line 51
        echo "    </div>

    <div class=\"col-xl-10\">
      ";
        // line 54
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/add_update_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 54)->display($context);
        // line 55
        echo "    </div>

    <div class=\"col-xl-10\">
      ";
        // line 58
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/export_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 58)->display($context);
        // line 59
        echo "    </div>

    <div class=\"col-xl-10\">
      ";
        // line 62
        $this->loadTemplate("@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", 62)->display($context);
        // line 63
        echo "    </div>
  </div>
";
    }

    // line 38
    public function block_translations_kpis_row($context, array $blocks = [])
    {
        // line 39
        echo "          <div class=\"row\">
            ";
        // line 40
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 42
(isset($context["kpiRow"]) ? $context["kpiRow"] : null)]));
        // line 43
        echo "
          </div>
        ";
    }

    // line 67
    public function block_javascripts($context, array $blocks = [])
    {
        // line 68
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/translation_settings.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 70,  109 => 68,  106 => 67,  100 => 43,  98 => 42,  97 => 40,  94 => 39,  91 => 38,  85 => 63,  83 => 62,  78 => 59,  76 => 58,  71 => 55,  69 => 54,  64 => 51,  62 => 50,  56 => 46,  54 => 38,  49 => 35,  46 => 34,  42 => 26,  40 => 31,  39 => 30,  38 => 29,  22 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Translations/translations_settings.html.twig", "/home/myindian/public_html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Translations/translations_settings.html.twig");
    }
}

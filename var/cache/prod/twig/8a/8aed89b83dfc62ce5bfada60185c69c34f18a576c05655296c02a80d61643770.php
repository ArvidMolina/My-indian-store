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

/* @PrestaShop/Admin/Translations/overview.html.twig */
class __TwigTemplate_683455935f200eb69052ba35cf30768b1fb95c0bf4a85cef32c6b8b5097e51ce extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Translations/overview.html.twig", 25);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        // line 28
        echo "    <div id=\"translations-app\"></div>
";
    }

    // line 31
    public function block_javascripts($context, array $blocks = [])
    {
        // line 32
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script>
        var data = {
            baseUrl: '";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", []), "getBasePath", [], "method"), "html", null, true);
        echo "',
            locale: '";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "locale"], "method"), "html", null, true);
        echo "',
            type: '";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "type"], "method"), "html", null, true);
        echo "',
            currentTheme: ";
        // line 39
        echo twig_jsonencode_filter($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "name", []));
        echo ",
            selected: '";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "selected"], "method"), "html", null, true);
        echo "',
            domainsTreeUrl: '";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_translation_domains_tree", ["lang" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 42
(isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "lang"], "method"), "type" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 43
(isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "type"], "method"), "selected" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 44
(isset($context["app"]) ? $context["app"] : null), "request", []), "query", []), "get", [0 => "selected"], "method")]), "html", null, true);
        // line 45
        echo "',
            translationUrl: '";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_i18n_translations_list", ["page" => "international"]);
        echo "',
            internationalUrl: '";
        // line 47
        echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminLocalization");
        echo "',
            translationsUrl: '";
        // line 48
        echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminTranslations");
        echo "'
        }
    </script>

    ";
        // line 52
        if ((isset($context["webpack_server"]) ? $context["webpack_server"] : null)) {
            // line 53
            echo "        <script src=\"http://localhost:8080/translations.bundle.js\"></script>
    ";
        } else {
            // line 55
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/translations.bundle.js"), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 57
        echo "
";
    }

    // line 60
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 61
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

  <link rel=\"stylesheet\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/translations.css"), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Translations/overview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 63,  123 => 61,  120 => 60,  115 => 57,  109 => 55,  105 => 53,  103 => 52,  96 => 48,  92 => 47,  88 => 46,  85 => 45,  83 => 44,  82 => 43,  81 => 42,  80 => 41,  76 => 40,  72 => 39,  68 => 38,  64 => 37,  60 => 36,  52 => 32,  49 => 31,  44 => 28,  41 => 27,  22 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Translations/overview.html.twig", "/home/myindian/public_html/src/PrestaShopBundle/Resources/views/Admin/Translations/overview.html.twig");
    }
}

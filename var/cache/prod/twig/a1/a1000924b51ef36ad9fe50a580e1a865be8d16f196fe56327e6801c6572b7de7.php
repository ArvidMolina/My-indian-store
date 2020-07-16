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

/* @PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig */
class __TwigTemplate_294b31e5af23c5faf069a657a5ca30a023716ab5da2aa15677b77b437eeffbda extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'copy_language' => [$this, 'block_copy_language'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('copy_language', $context, $blocks);
    }

    public function block_copy_language($context, array $blocks = [])
    {
        // line 29
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_international_translations_copy_language")]);
        echo "

  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">file_copy</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copy", [], "Admin.Actions"), "html", null, true);
        echo "
    </h3>

    <div class=\"card-block row\">
      <div class=\"card-text\">
        <div class=\"row\">
          <div class=\"col-sm\">
            <div class=\"alert alert-info\" role=\"alert\">
              <div class=\"alert-text\">
                ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copies data from one language to another.", [], "Admin.International.Help"), "html", null, true);
        echo "<br>
                ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning: This will replace all of the existing data inside the destination language.", [], "Admin.International.Help"), "html", null, true);
        echo "<br>
                ";
        // line 44
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If necessary [1][2] you must first create a new language[/1].", [], "Admin.International.Help"), ["[1]" => (("<a href=\"" . (isset($context["addLanguageUrl"]) ? $context["addLanguageUrl"] : null)) . "\">"), "[2]" => "<i class=\"material-icons\">launch</i>", "[/1]" => "</a>"]);
        echo "
              </div>
            </div>
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", [0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("From", [], "Admin.Global"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Language files must be complete to allow copying of translations.", [], "Admin.International.Notification")], "method"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            <div class=\"input-group\">
              ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "from_language", []), 'errors');
        echo "
              ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "from_language", []), 'widget');
        echo "

              ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "from_theme", []), 'errors');
        echo "
              ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "from_theme", []), 'widget');
        echo "
            </div>
          </div>
        </div>

        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To", [], "Admin.Global"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            <div class=\"input-group\">
              ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "to_language", []), 'errors');
        echo "
              ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "to_language", []), 'widget');
        echo "

              ";
        // line 74
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "to_theme", []), 'errors');
        echo "
              ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), "to_theme", []), 'widget');
        echo "
            </div>
          </div>
        </div>
        ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), 'rest');
        echo "
      </div>
    </div>

    <div class=\"card-footer\">
      <div class=\"d-flex justify-content-end\">
        <button class=\"btn btn-primary\">
          <i class=\"material-icons\">file_copy</i>
          <span>";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Copy", [], "Admin.Actions"), "html", null, true);
        echo "</span>
        </button>
      </div>
    </div>
  </div>

  ";
        // line 93
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["copyLanguageForm"]) ? $context["copyLanguageForm"] : null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  159 => 93,  150 => 87,  139 => 79,  132 => 75,  128 => 74,  123 => 72,  119 => 71,  112 => 67,  102 => 60,  98 => 59,  93 => 57,  89 => 56,  82 => 52,  71 => 44,  67 => 43,  63 => 42,  51 => 33,  43 => 29,  37 => 28,  34 => 27,  31 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/International/Translations/Blocks/copy_language.html.twig", "/home/myindian/public_html/src/PrestaShopBundle/Resources/views/Admin/Improve/International/Translations/Blocks/copy_language.html.twig");
    }
}

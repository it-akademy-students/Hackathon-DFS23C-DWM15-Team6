<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* preferences/two_factor/main.twig */
class __TwigTemplate_5d3544ae667dd7c6daf9081c59d96c946d9782a04c73024b877946191478d789 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
        // line 5
        echo _gettext("Two-factor authentication status");
        // line 6
        echo "        ";
        echo \PhpMyAdmin\Html\MySQLDocumentation::showDocumentation("two_factor");
        echo "
      </div>
      <div class=\"card-body\">
    ";
        // line 9
        if (($context["enabled"] ?? null)) {
            // line 10
            echo "      ";
            if ((($context["num_backends"] ?? null) == 0)) {
                // line 11
                echo "        <p>";
                echo _gettext("Two-factor authentication is not available, please install optional dependencies to enable authentication backends.");
                echo "</p>
        <p>";
                // line 12
                echo _gettext("Following composer packages are missing:");
                echo "</p>
        <ul>
          ";
                // line 14
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["missing"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 15
                    echo "            <li><code>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "dep", [], "any", false, false, false, 15), "html", null, true);
                    echo "</code> (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "class", [], "any", false, false, false, 15), "html", null, true);
                    echo ")</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "        </ul>
      ";
            } else {
                // line 19
                echo "        ";
                if (($context["backend_id"] ?? null)) {
                    // line 20
                    echo "          <p>";
                    echo _gettext("Two-factor authentication is available and configured for this account.");
                    echo "</p>
        ";
                } else {
                    // line 22
                    echo "          <p>";
                    echo _gettext("Two-factor authentication is available, but not configured for this account.");
                    echo "</p>
        ";
                }
                // line 24
                echo "      ";
            }
            // line 25
            echo "    ";
        } else {
            // line 26
            echo "      <p>";
            echo _gettext("Two-factor authentication is not available, enable phpMyAdmin configuration storage to use it.");
            echo "</p>
    ";
        }
        // line 28
        echo "      </div>
    </div>
  </div>
</div>

";
        // line 33
        if (($context["backend_id"] ?? null)) {
            // line 34
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
            // line 38
            echo twig_escape_filter($this->env, ($context["backend_name"] ?? null), "html", null, true);
            echo "
      </div>
      <div class=\"card-body\">
      <p>";
            // line 41
            echo _gettext("You have enabled two factor authentication.");
            echo "</p>
      <p>";
            // line 42
            echo twig_escape_filter($this->env, ($context["backend_description"] ?? null), "html", null, true);
            echo "</p>
      <form method=\"post\" action=\"";
            // line 43
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 44
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        <input class=\"btn btn-secondary\" type=\"submit\" name=\"2fa_remove\" value=\"";
            // line 46
            echo _gettext("Disable two-factor authentication");
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        } elseif ((        // line 52
($context["num_backends"] ?? null) > 0)) {
            // line 53
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
            // line 57
            echo _gettext("Configure two-factor authentication");
            // line 58
            echo "      </div>
      <div class=\"card-body\">
      <form method=\"post\" action=\"";
            // line 60
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 61
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["backends"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["backend"]) {
                // line 63
                echo "          <label class=\"displayblock\">
            <input type=\"radio\" name=\"2fa_configure\" value=\"";
                // line 64
                echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["backend"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["id"] ?? null) : null), "html", null, true);
                echo "\"";
                // line 65
                echo ((((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["backend"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["id"] ?? null) : null) == "")) ? (" checked") : (""));
                echo ">
            <strong>";
                // line 66
                echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["backend"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["name"] ?? null) : null), "html", null, true);
                echo "</strong>
            <p>";
                // line 67
                echo twig_escape_filter($this->env, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["backend"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["description"] ?? null) : null), "html", null, true);
                echo "</p>
          </label>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['backend'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "        <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
            echo _gettext("Configure two-factor authentication");
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "preferences/two_factor/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 70,  199 => 67,  195 => 66,  191 => 65,  188 => 64,  185 => 63,  181 => 62,  177 => 61,  173 => 60,  169 => 58,  167 => 57,  161 => 53,  159 => 52,  150 => 46,  146 => 44,  142 => 43,  138 => 42,  134 => 41,  128 => 38,  122 => 34,  120 => 33,  113 => 28,  107 => 26,  104 => 25,  101 => 24,  95 => 22,  89 => 20,  86 => 19,  82 => 17,  71 => 15,  67 => 14,  62 => 12,  57 => 11,  54 => 10,  52 => 9,  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/two_factor/main.twig", "C:\\Users\\admin\\Local Sites\\afupday2021\\app\\public\\wp-content\\plugins\\wp-phpmyadmin-extension\\lib\\phpMyAdmin_nZKb1YE2FpHUO5klM8dVcBz\\templates\\preferences\\two_factor\\main.twig");
    }
}

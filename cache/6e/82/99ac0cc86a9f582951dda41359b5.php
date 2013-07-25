<?php

/* _footer.php */
class __TwigTemplate_6e8299ac0cc86a9f582951dda41359b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "\t\t</section>
\t\t<footer class=\"footer\">
\t\t\t<hr />
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"large-3 columns\">&copy; Hubly ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y"), "html", null, true);
        echo "</div>
\t\t\t\t<div class=\"large-9 columns\">
\t\t\t\t\t<ul class=\"inline-list right\">
\t\t\t\t\t\t<li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_index")), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_help")), "html", null, true);
        echo "\">Help</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_about")), "html", null, true);
        echo "\">About</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_contact")), "html", null, true);
        echo "\">Contact</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_privacy_policy")), "html", null, true);
        echo "\">Privacy</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</footer>
\t\t<script src=\"/core/js/jquery-1.10.2.min.js\"></script>
\t\t<script src=\"/apps/hubly/js/foundation.min.js\"></script>
\t\t<script src=\"/apps/hubly/js/hubly.js\"></script>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "_footer.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  43 => 11,  39 => 10,  31 => 8,  25 => 5,  98 => 41,  89 => 35,  81 => 34,  77 => 32,  75 => 31,  70 => 28,  64 => 26,  56 => 24,  54 => 23,  50 => 22,  46 => 21,  24 => 5,  35 => 9,  23 => 3,  21 => 2,  19 => 1,);
    }
}

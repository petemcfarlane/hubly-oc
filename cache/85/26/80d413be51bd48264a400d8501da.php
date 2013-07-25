<?php

/* about.php */
class __TwigTemplate_852680d413be51bd48264a400d8501da extends Twig_Template
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
        $context["title"] = "Home";
        // line 2
        $this->env->loadTemplate("_header.php")->display($context);
        // line 3
        echo "

<div class=\"row\">
\t<div class=\"larege-12 columns\">
\t\t<p class=\"align-center\">Wouldn't it be great if you never had somewhere to record all your personal settings and preferences, so that each time you use a device or application, you can pick back up right where you left off. You'll never have to worry about loosing or damging your device. Wouldn't it also be great if these settings were then transferable across devices and platforms and you can share settings with your friends if you choose. What would be more brilliant is if all of this happened asynchronously, without you ever having to do anything.</p>
\t\t<p class=\"align-center\">That's the idea behind Hubly - it's a <strong>personal hub designed to keep your settings safe, seucre and synchronized across all your devices and platforms.</strong></p>
\t</div>
</div>

";
        // line 12
        $this->env->loadTemplate("_footer.php")->display($context);
    }

    public function getTemplateName()
    {
        return "about.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 12,  23 => 3,  21 => 2,  19 => 1,);
    }
}

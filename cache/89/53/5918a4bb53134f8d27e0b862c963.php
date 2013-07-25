<?php

/* contact.php */
class __TwigTemplate_89535918a4bb53134f8d27e0b862c963 extends Twig_Template
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
        $context["title"] = "Contact";
        // line 2
        $this->env->loadTemplate("_header.php")->display($context);
        // line 3
        echo "

<div class=\"row\">
\t<div class=\"larege-12 columns\">
\t\t<h1>Contact</h1>
\t\t<p>We love to hear your feedback and comments, especially the positive ones ;)</p>
\t\t<p>If you would like to provide feedback or make a suggestion please email us at <a href=\"#\">hello@hubly.me</a></p>
\t</div>
</div>

";
        // line 13
        $this->env->loadTemplate("_footer.php")->display($context);
    }

    public function getTemplateName()
    {
        return "contact.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 13,  23 => 3,  21 => 2,  19 => 1,);
    }
}

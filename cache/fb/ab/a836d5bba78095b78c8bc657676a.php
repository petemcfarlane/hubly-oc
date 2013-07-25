<?php

/* _header.php */
class __TwigTemplate_fbaba836d5bba78095b78c8bc657676a extends Twig_Template
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
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<title>";
        // line 5
        if ((isset($context["title"]) ? $context["title"] : null)) {
            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo " | ";
        }
        echo "Hubly</title>
\t\t<meta charset=\"utf-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width\">
\t\t<link href=\"/apps/hubly/css/normalize.css\" media=\"all\" rel=\"stylesheet\">
\t\t<link href=\"/apps/hubly/css/foundation.min.css\" media=\"all\" rel=\"stylesheet\">
\t\t<link href=\"/apps/hubly/css/hubly.css\" media=\"all\" rel=\"stylesheet\">
\t\t<link href=\"/apps/hubly/css/sommet-rounded.css\" media=\"all\" rel=\"stylesheet\">
\t\t<link href=\"/apps/hubly/img/hubly.svg\" rel=\"shortcut icon\" type=\"image/vnd.microsoft.icon\">
\t\t<script src=\"/apps/hubly/js/custom.modernizr.js\"></script>
\t\t<link rel=\"apple-touch-icon\" href=\"/apps/hubly/img/apple-touch-icon-57x57.png\" />
\t\t<link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/apps/hubly/img/apple-touch-icon-114x114.png\" />
\t</head>
\t<body>
\t\t<header>
\t\t\t<div class=\"row\">
\t\t\t\t<nav class=\"large-12 columns\">
\t\t\t\t\t<a href=\"";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_index")), "html", null, true);
        echo "\" class=\"left standard\">Home</a>
\t\t\t\t\t<a href=\"";
        // line 22
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_index")), "html", null, true);
        echo "\" class=\"header-logo\"><img src=\"/apps/hubly/img/hubly-logo.svg\" alt=\"Hubly\" class=\"hubly-logo\" /></a>
\t\t\t\t\t";
        // line 23
        if ((isset($context["uid"]) ? $context["uid"] : null)) {
            // line 24
            echo "\t\t\t\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_index")), "html", null, true);
            echo "\" class=\"right\">";
            echo twig_escape_filter($this->env, (isset($context["uname"]) ? $context["uname"] : null), "html", null, true);
            echo "</a>
\t\t\t\t\t";
        } else {
            // line 26
            echo "\t\t\t\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), array("hubly_login")), "html", null, true);
            echo "\" class=\"right\">Login</a>
\t\t\t\t\t";
        }
        // line 28
        echo "\t\t\t\t</nav>
\t\t\t</div>
\t\t</header>
\t\t";
        // line 31
        if ((isset($context["response"]) ? $context["response"] : null)) {
            // line 32
            echo "\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"large-12 columns\">
\t\t\t\t\t<div data-alert class=\"alert-box radius";
            // line 34
            if (($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "status") == "error")) {
                echo " alert";
            } elseif (($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "status") == "success")) {
                echo " success";
            }
            echo "\">
\t\t\t\t\t\t";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["response"]) ? $context["response"] : null), "message"), "html", null, true);
            echo "
\t\t\t\t\t\t<a href=\"#\" class=\"close\">&times;</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 41
        echo "\t\t<section>";
    }

    public function getTemplateName()
    {
        return "_header.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 41,  89 => 35,  81 => 34,  77 => 32,  75 => 31,  70 => 28,  64 => 26,  56 => 24,  54 => 23,  50 => 22,  46 => 21,  24 => 5,  35 => 13,  23 => 3,  21 => 2,  19 => 2,);
    }
}

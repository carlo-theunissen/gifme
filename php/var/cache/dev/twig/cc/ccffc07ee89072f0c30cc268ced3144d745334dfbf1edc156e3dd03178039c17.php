<?php

/* ApiBundle:Default:index.html.twig */
class __TwigTemplate_d1207cc891a82ab4c5d37a7cf69031b16bfe0d37c99cec94bb97e7cd0550d365 extends Twig_Template
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
        $__internal_50b97428e489693bcd563264b5ddd8b3143d3bd75f92fa8c160cef520acfbe0c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_50b97428e489693bcd563264b5ddd8b3143d3bd75f92fa8c160cef520acfbe0c->enter($__internal_50b97428e489693bcd563264b5ddd8b3143d3bd75f92fa8c160cef520acfbe0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ApiBundle:Default:index.html.twig"));

        $__internal_e39d37783b3b7e0232944e4c37efb44e253120d9054793819dea60feb88da8a1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e39d37783b3b7e0232944e4c37efb44e253120d9054793819dea60feb88da8a1->enter($__internal_e39d37783b3b7e0232944e4c37efb44e253120d9054793819dea60feb88da8a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ApiBundle:Default:index.html.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_50b97428e489693bcd563264b5ddd8b3143d3bd75f92fa8c160cef520acfbe0c->leave($__internal_50b97428e489693bcd563264b5ddd8b3143d3bd75f92fa8c160cef520acfbe0c_prof);

        
        $__internal_e39d37783b3b7e0232944e4c37efb44e253120d9054793819dea60feb88da8a1->leave($__internal_e39d37783b3b7e0232944e4c37efb44e253120d9054793819dea60feb88da8a1_prof);

    }

    public function getTemplateName()
    {
        return "ApiBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("Hello World!
", "ApiBundle:Default:index.html.twig", "/Applications/MAMP/htdocs/gifcreator/src/ApiBundle/Resources/views/Default/index.html.twig");
    }
}

<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_0bb95700e630619601a4b10dbd2f5bd185416f74283396aaa93fc5601708109d extends Twig_Template
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
        $__internal_0a0a0bf7012ed52eaecf3c8fda78723d87907e2addf6e3e32ac0da463a3fd6c8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0a0a0bf7012ed52eaecf3c8fda78723d87907e2addf6e3e32ac0da463a3fd6c8->enter($__internal_0a0a0bf7012ed52eaecf3c8fda78723d87907e2addf6e3e32ac0da463a3fd6c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        $__internal_e9d951e4905e79a5e41e328703e0336bd80584dd812656147d698782a52f75a5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e9d951e4905e79a5e41e328703e0336bd80584dd812656147d698782a52f75a5->enter($__internal_e9d951e4905e79a5e41e328703e0336bd80584dd812656147d698782a52f75a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => ($context["status_code"] ?? $this->getContext($context, "status_code")), "message" => ($context["status_text"] ?? $this->getContext($context, "status_text")), "exception" => $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_0a0a0bf7012ed52eaecf3c8fda78723d87907e2addf6e3e32ac0da463a3fd6c8->leave($__internal_0a0a0bf7012ed52eaecf3c8fda78723d87907e2addf6e3e32ac0da463a3fd6c8_prof);

        
        $__internal_e9d951e4905e79a5e41e328703e0336bd80584dd812656147d698782a52f75a5->leave($__internal_e9d951e4905e79a5e41e328703e0336bd80584dd812656147d698782a52f75a5_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
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
        return new Twig_Source("{{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}
", "@Twig/Exception/exception.json.twig", "/Applications/MAMP/htdocs/gifcreator/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.json.twig");
    }
}

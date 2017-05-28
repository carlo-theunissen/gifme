<?php

/* @Twig/Exception/traces.txt.twig */
class __TwigTemplate_a13a52feaa91d9d134e1e822207c08b5cbe11de4f2eaf11b20e4d7a1c97b75bd extends Twig_Template
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
        $__internal_7f541705f0ee3e7164d3d0b858f4f9279bfbb85e0b374253baa90daf4860124d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_7f541705f0ee3e7164d3d0b858f4f9279bfbb85e0b374253baa90daf4860124d->enter($__internal_7f541705f0ee3e7164d3d0b858f4f9279bfbb85e0b374253baa90daf4860124d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        $__internal_c6aec5ef61499f4633cf0d3e20dafbeb869935faf0368ba1dfbcff77fb6632b8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c6aec5ef61499f4633cf0d3e20dafbeb869935faf0368ba1dfbcff77fb6632b8->enter($__internal_c6aec5ef61499f4633cf0d3e20dafbeb869935faf0368ba1dfbcff77fb6632b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("@Twig/Exception/trace.txt.twig", "@Twig/Exception/traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_7f541705f0ee3e7164d3d0b858f4f9279bfbb85e0b374253baa90daf4860124d->leave($__internal_7f541705f0ee3e7164d3d0b858f4f9279bfbb85e0b374253baa90daf4860124d_prof);

        
        $__internal_c6aec5ef61499f4633cf0d3e20dafbeb869935faf0368ba1dfbcff77fb6632b8->leave($__internal_c6aec5ef61499f4633cf0d3e20dafbeb869935faf0368ba1dfbcff77fb6632b8_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  31 => 3,  27 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if exception.trace|length %}
{% for trace in exception.trace %}
{% include '@Twig/Exception/trace.txt.twig' with { 'trace': trace } only %}

{% endfor %}
{% endif %}
", "@Twig/Exception/traces.txt.twig", "/Applications/MAMP/htdocs/gifcreator/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/traces.txt.twig");
    }
}

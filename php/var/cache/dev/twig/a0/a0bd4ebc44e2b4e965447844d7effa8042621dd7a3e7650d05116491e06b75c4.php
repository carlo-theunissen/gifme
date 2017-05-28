<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_a2e62a00f866ee16ed3c0cef2927a228b3082d9e022970c06b3d13e41c6f5c39 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0a58efde8362c044babb91eac39c3a242a4d0366fdb3eae2bd35c57d64b0f321 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0a58efde8362c044babb91eac39c3a242a4d0366fdb3eae2bd35c57d64b0f321->enter($__internal_0a58efde8362c044babb91eac39c3a242a4d0366fdb3eae2bd35c57d64b0f321_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_b911b666801550f77386a233c2d5220bc7cd36b9c843995ebe4115bb3bd5f7f8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b911b666801550f77386a233c2d5220bc7cd36b9c843995ebe4115bb3bd5f7f8->enter($__internal_b911b666801550f77386a233c2d5220bc7cd36b9c843995ebe4115bb3bd5f7f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0a58efde8362c044babb91eac39c3a242a4d0366fdb3eae2bd35c57d64b0f321->leave($__internal_0a58efde8362c044babb91eac39c3a242a4d0366fdb3eae2bd35c57d64b0f321_prof);

        
        $__internal_b911b666801550f77386a233c2d5220bc7cd36b9c843995ebe4115bb3bd5f7f8->leave($__internal_b911b666801550f77386a233c2d5220bc7cd36b9c843995ebe4115bb3bd5f7f8_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d7b8dc99b838faadf29749f432ba91fa235550c5c72b5fe3717b0c02a041419d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d7b8dc99b838faadf29749f432ba91fa235550c5c72b5fe3717b0c02a041419d->enter($__internal_d7b8dc99b838faadf29749f432ba91fa235550c5c72b5fe3717b0c02a041419d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_4f31d85bdc101f7b0a6a0d01c324118e1caa6b19472b0ca65267fa436dbbf13c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f31d85bdc101f7b0a6a0d01c324118e1caa6b19472b0ca65267fa436dbbf13c->enter($__internal_4f31d85bdc101f7b0a6a0d01c324118e1caa6b19472b0ca65267fa436dbbf13c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_4f31d85bdc101f7b0a6a0d01c324118e1caa6b19472b0ca65267fa436dbbf13c->leave($__internal_4f31d85bdc101f7b0a6a0d01c324118e1caa6b19472b0ca65267fa436dbbf13c_prof);

        
        $__internal_d7b8dc99b838faadf29749f432ba91fa235550c5c72b5fe3717b0c02a041419d->leave($__internal_d7b8dc99b838faadf29749f432ba91fa235550c5c72b5fe3717b0c02a041419d_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_9e90057b50baae644bd4a8165f438a828d1e88dffb628399e07c79c9f6614c4e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9e90057b50baae644bd4a8165f438a828d1e88dffb628399e07c79c9f6614c4e->enter($__internal_9e90057b50baae644bd4a8165f438a828d1e88dffb628399e07c79c9f6614c4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_811b9e1497a35f4ae035f13663a763bc7b20e32f5ff4daba27c29856cb8f54ba = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_811b9e1497a35f4ae035f13663a763bc7b20e32f5ff4daba27c29856cb8f54ba->enter($__internal_811b9e1497a35f4ae035f13663a763bc7b20e32f5ff4daba27c29856cb8f54ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_811b9e1497a35f4ae035f13663a763bc7b20e32f5ff4daba27c29856cb8f54ba->leave($__internal_811b9e1497a35f4ae035f13663a763bc7b20e32f5ff4daba27c29856cb8f54ba_prof);

        
        $__internal_9e90057b50baae644bd4a8165f438a828d1e88dffb628399e07c79c9f6614c4e->leave($__internal_9e90057b50baae644bd4a8165f438a828d1e88dffb628399e07c79c9f6614c4e_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_471ac59efb5639d596450d02c9e3b4f377ac2f96940dd4816acfd6abc84f417f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_471ac59efb5639d596450d02c9e3b4f377ac2f96940dd4816acfd6abc84f417f->enter($__internal_471ac59efb5639d596450d02c9e3b4f377ac2f96940dd4816acfd6abc84f417f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_2062aff5bc26efc8da9cbb94c16e5fcd82ece42c824d4a52f6182d1d43b53099 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2062aff5bc26efc8da9cbb94c16e5fcd82ece42c824d4a52f6182d1d43b53099->enter($__internal_2062aff5bc26efc8da9cbb94c16e5fcd82ece42c824d4a52f6182d1d43b53099_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_2062aff5bc26efc8da9cbb94c16e5fcd82ece42c824d4a52f6182d1d43b53099->leave($__internal_2062aff5bc26efc8da9cbb94c16e5fcd82ece42c824d4a52f6182d1d43b53099_prof);

        
        $__internal_471ac59efb5639d596450d02c9e3b4f377ac2f96940dd4816acfd6abc84f417f->leave($__internal_471ac59efb5639d596450d02c9e3b4f377ac2f96940dd4816acfd6abc84f417f_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/Applications/MAMP/htdocs/gifcreator/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}

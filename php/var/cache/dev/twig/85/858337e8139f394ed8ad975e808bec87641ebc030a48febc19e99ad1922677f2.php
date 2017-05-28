<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_6a9bd7196d387d70dbd695944ae0c2d068b01b979c102db61596d331ad8cb906 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_4090014bf4ba6db95c149615a09b7558d3cd728b9ad2eb731c6d85bf7125168e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4090014bf4ba6db95c149615a09b7558d3cd728b9ad2eb731c6d85bf7125168e->enter($__internal_4090014bf4ba6db95c149615a09b7558d3cd728b9ad2eb731c6d85bf7125168e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_3325906bc049bf86283a01b447395001a55b02eeb3cf4b3b2d2a1dc58d12054f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3325906bc049bf86283a01b447395001a55b02eeb3cf4b3b2d2a1dc58d12054f->enter($__internal_3325906bc049bf86283a01b447395001a55b02eeb3cf4b3b2d2a1dc58d12054f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4090014bf4ba6db95c149615a09b7558d3cd728b9ad2eb731c6d85bf7125168e->leave($__internal_4090014bf4ba6db95c149615a09b7558d3cd728b9ad2eb731c6d85bf7125168e_prof);

        
        $__internal_3325906bc049bf86283a01b447395001a55b02eeb3cf4b3b2d2a1dc58d12054f->leave($__internal_3325906bc049bf86283a01b447395001a55b02eeb3cf4b3b2d2a1dc58d12054f_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_c118179c19c545c098c7625fc385b0fec6d0ad86622bf6cb1c4a518f65ec3195 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c118179c19c545c098c7625fc385b0fec6d0ad86622bf6cb1c4a518f65ec3195->enter($__internal_c118179c19c545c098c7625fc385b0fec6d0ad86622bf6cb1c4a518f65ec3195_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_813649fcd4f4b29d4099ad17a463d95133992a38c86f3516181c5e34c8ce99ad = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_813649fcd4f4b29d4099ad17a463d95133992a38c86f3516181c5e34c8ce99ad->enter($__internal_813649fcd4f4b29d4099ad17a463d95133992a38c86f3516181c5e34c8ce99ad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_813649fcd4f4b29d4099ad17a463d95133992a38c86f3516181c5e34c8ce99ad->leave($__internal_813649fcd4f4b29d4099ad17a463d95133992a38c86f3516181c5e34c8ce99ad_prof);

        
        $__internal_c118179c19c545c098c7625fc385b0fec6d0ad86622bf6cb1c4a518f65ec3195->leave($__internal_c118179c19c545c098c7625fc385b0fec6d0ad86622bf6cb1c4a518f65ec3195_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_6cc6406474a15a129e4e1a94faf3c9ae01ec4fda317bf69a2d0292b2819f7874 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6cc6406474a15a129e4e1a94faf3c9ae01ec4fda317bf69a2d0292b2819f7874->enter($__internal_6cc6406474a15a129e4e1a94faf3c9ae01ec4fda317bf69a2d0292b2819f7874_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_3c32fdd1ed8445d11524144f0a5ff48284a000ac55a8e9160b7bc9afcc59c69b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3c32fdd1ed8445d11524144f0a5ff48284a000ac55a8e9160b7bc9afcc59c69b->enter($__internal_3c32fdd1ed8445d11524144f0a5ff48284a000ac55a8e9160b7bc9afcc59c69b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_3c32fdd1ed8445d11524144f0a5ff48284a000ac55a8e9160b7bc9afcc59c69b->leave($__internal_3c32fdd1ed8445d11524144f0a5ff48284a000ac55a8e9160b7bc9afcc59c69b_prof);

        
        $__internal_6cc6406474a15a129e4e1a94faf3c9ae01ec4fda317bf69a2d0292b2819f7874->leave($__internal_6cc6406474a15a129e4e1a94faf3c9ae01ec4fda317bf69a2d0292b2819f7874_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_66966b8d1ea64b9dbe72538693ab942cbb2c332ba22f46ffe7b6bf7cd066a094 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_66966b8d1ea64b9dbe72538693ab942cbb2c332ba22f46ffe7b6bf7cd066a094->enter($__internal_66966b8d1ea64b9dbe72538693ab942cbb2c332ba22f46ffe7b6bf7cd066a094_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_5c82c59f0f6dee1fc68f54d883f5a0049e0cb74b20b990449b65d64f0d8ac6d5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5c82c59f0f6dee1fc68f54d883f5a0049e0cb74b20b990449b65d64f0d8ac6d5->enter($__internal_5c82c59f0f6dee1fc68f54d883f5a0049e0cb74b20b990449b65d64f0d8ac6d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_5c82c59f0f6dee1fc68f54d883f5a0049e0cb74b20b990449b65d64f0d8ac6d5->leave($__internal_5c82c59f0f6dee1fc68f54d883f5a0049e0cb74b20b990449b65d64f0d8ac6d5_prof);

        
        $__internal_66966b8d1ea64b9dbe72538693ab942cbb2c332ba22f46ffe7b6bf7cd066a094->leave($__internal_66966b8d1ea64b9dbe72538693ab942cbb2c332ba22f46ffe7b6bf7cd066a094_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Applications/MAMP/htdocs/gifcreator/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}

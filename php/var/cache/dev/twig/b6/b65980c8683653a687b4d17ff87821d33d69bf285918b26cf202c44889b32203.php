<?php

/* VideoUploadBundle::Dropzone.html.twig */
class __TwigTemplate_dec4af4a275409a60f24044728d5e312f84bf4208b397ea549ffad9099460819 extends Twig_Template
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
        $__internal_9a286d3463d7984c14d4b8fc66f9070fdc0d952a170274aec7387f85bead15e9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9a286d3463d7984c14d4b8fc66f9070fdc0d952a170274aec7387f85bead15e9->enter($__internal_9a286d3463d7984c14d4b8fc66f9070fdc0d952a170274aec7387f85bead15e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "VideoUploadBundle::Dropzone.html.twig"));

        $__internal_754978693cce1df41f7dde119104abd6172481f587d93158aded2e763c38ae1b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_754978693cce1df41f7dde119104abd6172481f587d93158aded2e763c38ae1b->enter($__internal_754978693cce1df41f7dde119104abd6172481f587d93158aded2e763c38ae1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "VideoUploadBundle::Dropzone.html.twig"));

        // line 1
        echo "﻿<script src=\"http://www.dropzonejs.com/new-js/dropzone.js?v=1473248119\"></script>

<form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('Oneup\UploaderBundle\Twig\Extension\UploaderExtension')->endpoint("gallery"), "html", null, true);
        echo "\" class=\"dropzone\" style=\"width:200px; height:200px; border:4px dashed black\">
</form>";
        
        $__internal_9a286d3463d7984c14d4b8fc66f9070fdc0d952a170274aec7387f85bead15e9->leave($__internal_9a286d3463d7984c14d4b8fc66f9070fdc0d952a170274aec7387f85bead15e9_prof);

        
        $__internal_754978693cce1df41f7dde119104abd6172481f587d93158aded2e763c38ae1b->leave($__internal_754978693cce1df41f7dde119104abd6172481f587d93158aded2e763c38ae1b_prof);

    }

    public function getTemplateName()
    {
        return "VideoUploadBundle::Dropzone.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("﻿<script src=\"http://www.dropzonejs.com/new-js/dropzone.js?v=1473248119\"></script>

<form action=\"{{ oneup_uploader_endpoint('gallery') }}\" class=\"dropzone\" style=\"width:200px; height:200px; border:4px dashed black\">
</form>", "VideoUploadBundle::Dropzone.html.twig", "/Applications/MAMP/htdocs/gifcreator/src/VideoUploadBundle/Resources/views/Dropzone.html.twig");
    }
}

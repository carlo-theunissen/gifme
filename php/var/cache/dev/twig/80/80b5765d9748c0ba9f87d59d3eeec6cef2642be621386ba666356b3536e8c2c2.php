<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_22fb839950fbbe2aab7bb61699e3b1a6efa306cecdfc338f58be8dcb6dee704e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d3b147db3bc0e4a3a0804ffc9a38961e6977eb676097a2e97b304053908dc86c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d3b147db3bc0e4a3a0804ffc9a38961e6977eb676097a2e97b304053908dc86c->enter($__internal_d3b147db3bc0e4a3a0804ffc9a38961e6977eb676097a2e97b304053908dc86c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_5b3e663a0cc82e89e91ef281c29e9ee28d9d27a0108c06206c0133c1d0a02dfb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5b3e663a0cc82e89e91ef281c29e9ee28d9d27a0108c06206c0133c1d0a02dfb->enter($__internal_5b3e663a0cc82e89e91ef281c29e9ee28d9d27a0108c06206c0133c1d0a02dfb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d3b147db3bc0e4a3a0804ffc9a38961e6977eb676097a2e97b304053908dc86c->leave($__internal_d3b147db3bc0e4a3a0804ffc9a38961e6977eb676097a2e97b304053908dc86c_prof);

        
        $__internal_5b3e663a0cc82e89e91ef281c29e9ee28d9d27a0108c06206c0133c1d0a02dfb->leave($__internal_5b3e663a0cc82e89e91ef281c29e9ee28d9d27a0108c06206c0133c1d0a02dfb_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_10ae049807d661a531c031fe190e01894e8dd7808e2e9e0b793520a143cc1704 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_10ae049807d661a531c031fe190e01894e8dd7808e2e9e0b793520a143cc1704->enter($__internal_10ae049807d661a531c031fe190e01894e8dd7808e2e9e0b793520a143cc1704_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_2f642feaed26bb33625ed9ef448df2257ec226e6214e61bfbf105df5639c3454 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f642feaed26bb33625ed9ef448df2257ec226e6214e61bfbf105df5639c3454->enter($__internal_2f642feaed26bb33625ed9ef448df2257ec226e6214e61bfbf105df5639c3454_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_2f642feaed26bb33625ed9ef448df2257ec226e6214e61bfbf105df5639c3454->leave($__internal_2f642feaed26bb33625ed9ef448df2257ec226e6214e61bfbf105df5639c3454_prof);

        
        $__internal_10ae049807d661a531c031fe190e01894e8dd7808e2e9e0b793520a143cc1704->leave($__internal_10ae049807d661a531c031fe190e01894e8dd7808e2e9e0b793520a143cc1704_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_ab06a4bb5173687a1104b01df5e5cd581e80863cae746770ca4ac72447dd17ec = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ab06a4bb5173687a1104b01df5e5cd581e80863cae746770ca4ac72447dd17ec->enter($__internal_ab06a4bb5173687a1104b01df5e5cd581e80863cae746770ca4ac72447dd17ec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_945a2bfd97c6c2aadb9dfa7c8d942023f65e5d0192eb142c24c1bc4742b45ce6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_945a2bfd97c6c2aadb9dfa7c8d942023f65e5d0192eb142c24c1bc4742b45ce6->enter($__internal_945a2bfd97c6c2aadb9dfa7c8d942023f65e5d0192eb142c24c1bc4742b45ce6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_945a2bfd97c6c2aadb9dfa7c8d942023f65e5d0192eb142c24c1bc4742b45ce6->leave($__internal_945a2bfd97c6c2aadb9dfa7c8d942023f65e5d0192eb142c24c1bc4742b45ce6_prof);

        
        $__internal_ab06a4bb5173687a1104b01df5e5cd581e80863cae746770ca4ac72447dd17ec->leave($__internal_ab06a4bb5173687a1104b01df5e5cd581e80863cae746770ca4ac72447dd17ec_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_b5c82b76a034d6e40ef0eb4734e27c754d129bc1ea73f380c94a99f6944c9146 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b5c82b76a034d6e40ef0eb4734e27c754d129bc1ea73f380c94a99f6944c9146->enter($__internal_b5c82b76a034d6e40ef0eb4734e27c754d129bc1ea73f380c94a99f6944c9146_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_d985ee216f98563e455a5b77eea5391d40f939662d176b80a18087f110f8f1ca = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d985ee216f98563e455a5b77eea5391d40f939662d176b80a18087f110f8f1ca->enter($__internal_d985ee216f98563e455a5b77eea5391d40f939662d176b80a18087f110f8f1ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_d985ee216f98563e455a5b77eea5391d40f939662d176b80a18087f110f8f1ca->leave($__internal_d985ee216f98563e455a5b77eea5391d40f939662d176b80a18087f110f8f1ca_prof);

        
        $__internal_b5c82b76a034d6e40ef0eb4734e27c754d129bc1ea73f380c94a99f6944c9146->leave($__internal_b5c82b76a034d6e40ef0eb4734e27c754d129bc1ea73f380c94a99f6944c9146_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/Applications/MAMP/htdocs/gifcreator/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}

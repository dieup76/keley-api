<?php

/* AcmeDemoBundle:Welcome:groups.html.twig */
class __TwigTemplate_4416b8b23280166a64528d2535eeab3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Welcome";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    
    <h1>Listes des groupes</h1>
    
    <ul id=\"groupsList\">

    </ul>

    
    <script src=\"/js/jq.js\"></script>
    <script>
    \t\$.ajax({
    \t\turl: '/app_dev.php/groups/',
    \t\tsuccess: function(data) {
    \t\t\tvar json = JSON.parse(data);
\t    \t\tfor(var key in json) {
    \t\t\t\t\$('#groupsList').append('<li><a href=\"/app_dev.php/tests/group/'+json[key].id+'\">'+json[key].name+'</a></li>');
    \t\t\t}
    \t\t\t
    \t\t}
    \t})
    </script>

";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Welcome:groups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}

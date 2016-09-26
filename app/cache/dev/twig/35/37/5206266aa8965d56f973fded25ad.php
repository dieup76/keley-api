<?php

/* AcmeDemoBundle:Welcome:add_group.html.twig */
class __TwigTemplate_35375206266aa8965d56f973fded25ad extends Twig_Template
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
    <h1>Ajouter un groupe</h1>
    
    <form action=\"#\" method=\"post\">
        <p id=\"result\"></p>

        <div>
            <label>Nom du groupe</label>
            <input type=\"text\" id=\"name\" name=\"name\" />
        </div>
        <div>
            <input type=\"submit\" value=\"Save\" />
        </div>


    </form>

    
    <script src=\"/js/jq.js\"></script>
    <script>
    \t\$('form').on('submit', function(e) {
            e.preventDefault();
            \$.ajax({
                url: '/app_dev.php/groups/',
                type: 'POST',
                data: {name: \$('#name').val()},
                success: function(data) {
                    var json = JSON.parse(data);
                    \$('#result').append('Le groupe '+json.name+' (id: '+json.id+') a été crée');
                }
            })
        })
    </script>

";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Welcome:add_group.html.twig";
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

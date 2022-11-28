<?php

namespace jordanbeattie\heroicons\variables;
use Craft;

Class HeroiconsVariable
{
    
    public function render( $iconName = null, $options = null )
    {
        
        if( is_array( $iconName ) )
        {
            $options = $iconName;
            $iconName = null;
        }

        $class = $options['class'] ?? '';
        $style = $options['style'] ?? "outline";
        $name  = $options['name']  ?? "code-bracket"; 
        $name  = $iconName         ?? $name;

        $templatePath = "heroicons/" . $style . "/" . $iconName;

        echo Craft::$app->view->renderTemplate( $templatePath, [
            'class' => $options['class'] ?? null
        ]);
    }
    
}

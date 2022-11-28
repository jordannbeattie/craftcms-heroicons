<?php

namespace jordanbeattie\heroicons\variables;
use Craft;

Class HeroiconsVariable
{
    
    public function icon( $iconName = null, $options = null )
    {
        
        if( is_array( $iconName ) )
        {
            $options = $iconName;
            $iconName = null;
        }

        $class        = $options['class'] ?? '';
        $style        = $options['style'] ?? "outline";
        $name         = $options['name']  ?? null; 
        $name         = $iconName         ?? $name;
        $templatePath = "heroicons/" . $style . "/" . $name;

        if( Craft::$app->view->resolveTemplate( $templatePath ) )
        {
            echo Craft::$app->view->renderTemplate( $templatePath, [
                'class' => $options['class'] ?? null
            ]);
        }

    }
    
}

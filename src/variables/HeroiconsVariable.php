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

        $version      = $options['version'] ?? 2;
        $version      = in_array( $version, [1, 2] ) ? $version : 2;
        $class        = $options['class']   ?? '';
        $style        = $options['style']   ?? "outline";
        $name         = $options['name']    ?? null; 
        $name         = $iconName           ?? $name;
        $templatePath = "heroicons/v" . $version . "/" . $style . "/" . $name;

        if( Craft::$app->view->resolveTemplate( $templatePath ) )
        {
            echo Craft::$app->view->renderTemplate( $templatePath, [
                'class' => $options['class'] ?? null
            ]);
        }

    }
    
}

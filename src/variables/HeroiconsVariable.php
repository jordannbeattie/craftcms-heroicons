<?php

namespace jordanbeattie\heroicons\variables;
use Craft;
use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

Class HeroiconsVariable
{
    
    /*
     * icon
     * Render an icon
     */
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

    /*
     * listIcons
     * List all icons
     */
    public function getFieldOptions()
    {
        
        $icons = [];
        $dir   = __DIR__ . "/../icons/v2/outline";

        foreach( new RecursiveDirectoryIterator( $dir ) as $file )
        {
            if( str_ends_with( $file->getFileName(), ".twig" ) )
            {
                
                $label = str_replace( "-", " ", $file->getFilename() );
                $label = str_replace( ".twig", "", $label );
                $label = ucwords( $label );
                
                $value = str_replace( ".twig", "", $file->getFilename() );
                
                $icons[ $label ] = $value;

            }
        }

        asort($icons);

        return $icons;
    
    }

    /*
     * getFieldAttributes
     * Get details on field selected value
     */
    public static function getFieldAttributes( $value )
    {
        $split = explode( "__", $value );
        return [
            'name'      => $split[0], 
            'version'   => $split[1],
            'style'     => $split[2]
        ];
    }
    
}

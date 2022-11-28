<?php

namespace jordanbeattie\heroicons;
use \craft\events\RegisterTemplateRootsEvent;
use \craft\web\twig\variables\CraftVariable;
use \craft\web\View;

use jordanbeattie\heroicons\variables\HeroiconsVariable;
use yii\base\Event;

class Heroicons extends \craft\base\Plugin
{
    public function init()
    {
        
        parent::init();
        
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function( RegisterTemplateRootsEvent $event ) 
            {
                $event->roots['heroicons'] = __DIR__ . '/icons';
            }
        );
        
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function( Event $event ) 
            {
                $variable = $event->sender;
                $variable->set('heroicons', HeroiconsVariable::class);
            }
        );

    }
}

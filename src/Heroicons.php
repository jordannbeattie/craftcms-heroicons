<?php

namespace jordanbeattie\heroicons;
use \craft\events\RegisterTemplateRootsEvent;
use \craft\web\twig\variables\CraftVariable;
use \craft\web\View;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use jordanbeattie\heroicons\fields\HeroiconField;
use jordanbeattie\heroicons\variables\HeroiconsVariable;
use yii\base\Event;
use Craft;
use craft\i18n\PhpMessageSource;

class Heroicons extends \craft\base\Plugin
{
    
    public static $plugin;

    public function init()
    {
        
        /* Initialise */
        parent::init();
        self::$plugin = $this;
        Craft::info(
            Craft::t(
                'app',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
        
        /* Register templates - Front-end */
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function( RegisterTemplateRootsEvent $event ) 
            {
                $event->roots['heroicons'] = __DIR__ . '/icons';
            }
        );

        /* Register templates - CP */
        Event::on(
            View::class,
            View::EVENT_REGISTER_CP_TEMPLATE_ROOTS,
            function( RegisterTemplateRootsEvent $event ) 
            {
                $event->roots['heroicons'] = __DIR__ . '/templates';
            }
        );
        
        /* Register Variables */
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function( Event $event ) 
            {
                $variable = $event->sender;
                $variable->set('heroicons', HeroiconsVariable::class);
            }
        );

        /* Register Fields */
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
              $event->types[] = HeroiconField::class;
            }
        );

        /* Set translations */
        Craft::$app->i18n->translations['heroicon'] = [
            'class' => PhpMessageSource::class,
            'sourceLanguage' => 'en',
            'basePath' => __DIR__ . '/translations',
            'allowOverrides' => true,
        ];

    }

}

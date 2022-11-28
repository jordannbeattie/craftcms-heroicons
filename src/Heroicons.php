<?php

namespace jordanbeattie\heroicons;
use \craft\web\View;
use \craft\events\RegisterTemplateRootsEvent;
use \craft\web\twig\variables\CraftVariable;

use yii\base\Event;

class Heroicons extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function(RegisterTemplateRootsEvent $event) {
                $event->roots['images'] = __DIR__ . '/icons';
            }
        );
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                $variable = $event->sender;
                $variable->set('images', HeroiconsVariable::class);
            }
        );
    }
}

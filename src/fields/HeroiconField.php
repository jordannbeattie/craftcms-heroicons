<?php

namespace jordanbeattie\heroicons\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Db;
use yii\db\Schema;
use craft\helpers\Json;

class HeroiconField extends Field
{

    public $dropdownOptions = '';

    public static function displayName(): string
    {
        return Craft::t('app', 'Heroicon');
    }

    public function getSettingsHtml(): ?string
    {
        return false;
    }

    public function getInputHtml(mixed $value, ?\craft\base\ElementInterface $element = null): string
    {

		$view = Craft::$app->getView();
		$templateMode = $view->getTemplateMode();
		$view->setTemplateMode($view::TEMPLATE_MODE_CP);

		$variables['element'] = $element;
		$variables['this'] = $this;

		$options = json_decode('[' . $view->renderString($this->dropdownOptions, $variables) . ']', true);

		$view->setTemplateMode($templateMode);

		foreach ($options as $key => $option) :

		    if ($this->isFresh($element) ) :
		    	if (!empty($option['default'])) :
		    		$value = $option['value'];
				endif;
			endif;

			// unset($options[$key]['selected']);

		endforeach;

        return Craft::$app->getView()->renderTemplate("heroicons/_includes/fields/heroicon", [
            'name' => $this->handle,
            'value' => $value,
            'options' => $options,
        ]);
    }
}
